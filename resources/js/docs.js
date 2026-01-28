import { $, $$ } from "@flexilla/utilities";
import { actionToggler } from "@flexilla/utilities/toggler";
import { copyToClipboard } from "./utils";

const initScrollbar = () => {


    const sidebarTrigger = $("[data-sidebar-trigger]");
    const sidebar = $("[data-app-sidebar]");
    const overlay = $("[data-sidebar-overlay]");
    const closeBtn = $("[data-close-sidebar]");
    if (sidebarTrigger && sidebar) {
        const toggleSidebar = (action) => {
            const isOpen = action !== "open";
            sidebar.setAttribute("data-state", isOpen ? "close" : "open");
            overlay?.setAttribute("data-state", isOpen ? "close" : "open");
        };

        const openSidebar = () => {
            toggleSidebar("open");
        };
        const closeSidebar = () => {
            toggleSidebar("close");
        };
        sidebarTrigger.addEventListener("click", openSidebar);

        closeBtn?.addEventListener("click", closeSidebar);
        overlay?.addEventListener("click", closeSidebar);
    }
};

const initTabOfContent = () => {
    const tabOfContentMob = $("[data-table-of-content]");
    const trigger = $("[data-trigger-tab-content]");
    if (tabOfContentMob && trigger) {
        // Define the functions before using them
        let actionTab; // Declare actionTab variable first

        const hideTabOfContent = () => {
            actionTab.toInitial();
        };

        const hideOnClickOutSide = (ev) => {
            if (!trigger.contains(ev.target)) {
                actionTab.toInitial();
            }
        };

        actionTab = actionToggler({
            trigger,
            targets: [
                {
                    element: tabOfContentMob,
                    attributes: {
                        initial: { "data-state": "close" },
                        to: { "data-state": "open" },
                    },
                },
            ],
            onToggle: ({ isExpanded: isOpened }) => {
                document.body.classList[isOpened ? "add" : "remove"](
                    "hidden-scrollbar"
                );
                if (isOpened) {
                    document.addEventListener("click", hideOnClickOutSide);
                    tabOfContentMob.addEventListener("click", hideTabOfContent);
                } else {
                    document.removeEventListener("click", hideOnClickOutSide);
                    tabOfContentMob.removeEventListener(
                        "click",
                        hideTabOfContent
                    );
                }
            },
        });
    }
};

const initAllDocs = () => {
    initScrollbar();
    initTabOfContent();
    initCopyAsMarkdown();
};

initAllDocs();
document.addEventListener("livewire:navigated", initAllDocs);

// ---- Copy as Markdown ----
function initCopyAsMarkdown() {
    const btn = document.querySelector('[data-copy-markdown]');
    if (!btn) return;
    btn.addEventListener('click', async () => {
        const article = document.querySelector('[data-doc-content]');
        if (!article) return;
        const markdown = htmlToMarkdown(article);
        try {
            // await navigator.clipboard.writeText(markdown);
            copyToClipboard({
                snippet: markdown, onCopy: () => {
                    btn.innerHTML = '<span>Copying...</span>'
                }, onCopyCompleted: () => {
                    flashCopyState(btn);
                }
            });
            
        } catch (e) {
            const ta = document.createElement('textarea');
            ta.value = markdown;
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
            flashCopyState(btn);
        }
    });
}

function flashCopyState(button) {
    button.innerHTML = '<span class="flex iconify ph--check mr-1.5"></span><span>Copied</span>';
    setTimeout(() => (button.innerHTML = `<span aria-hidden="true" class="flex iconify ph--copy text-sm mr-1.5"></span><span>Copy as Markdown</span>`), 1800);
}

function htmlToMarkdown(root) {
    const lines = [];
    const walker = (node, context = { listDepth: 0 }) => {
        if (node.nodeType === Node.TEXT_NODE) {
            const text = node.nodeValue.replace(/\s+/g, ' ').trim();
            if (text) lines.push(text);
            return;
        }
        if (node.nodeType !== Node.ELEMENT_NODE) {
            return;
        }
        const el = node;
        const tag = el.tagName.toLowerCase();

        const pushLine = (s = '') => lines.push(s);

        switch (tag) {
            case 'h1': case 'h2': case 'h3': case 'h4': case 'h5': case 'h6': {
                const level = parseInt(tag[1], 10);
                pushLine('#'.repeat(level) + ' ' + getInlineText(el));
                pushLine('');
                break;
            }
            case 'p': {
                const txt = getInlineText(el);
                if (txt) {
                    pushLine(txt);
                    pushLine('');
                }
                break;
            }
            case 'pre': {
                const code = el.querySelector('code');
                const lang = (code?.className || '').split('language-')[1] || '';
                const content = code ? code.textContent : el.textContent;
                pushLine('```' + (lang || ''));
                pushLine((content || '').replace(/\s+$/, ''));
                pushLine('```');
                pushLine('');
                break;
            }
            case 'code': {
                const txt = el.textContent || '';
                pushLine('`' + txt + '`');
                break;
            }
            case 'a': {
                const href = el.getAttribute('href') || '';
                const txt = getInlineText(el) || href;
                pushLine('[' + txt + '](' + href + ')');
                break;
            }
            case 'strong': case 'b': {
                pushLine('**' + getInlineText(el) + '**');
                break;
            }
            case 'em': case 'i': {
                pushLine('*' + getInlineText(el) + '*');
                break;
            }
            case 'ul': {
                Array.from(el.children).forEach(li => {
                    if (li.tagName?.toLowerCase() !== 'li') return;
                    const text = getInlineText(li) || '';
                    pushLine('  '.repeat(context.listDepth) + '- ' + text);
                    // handle nested lists
                    Array.from(li.children).forEach(child => {
                        if (child.tagName?.toLowerCase() === 'ul' || child.tagName?.toLowerCase() === 'ol') {
                            walker(child, { listDepth: context.listDepth + 1 });
                        }
                    });
                });
                pushLine('');
                break;
            }
            case 'ol': {
                let i = 1;
                Array.from(el.children).forEach(li => {
                    if (li.tagName?.toLowerCase() !== 'li') return;
                    const text = getInlineText(li) || '';
                    pushLine('  '.repeat(context.listDepth) + i + '. ' + text);
                    i++;
                    Array.from(li.children).forEach(child => {
                        if (child.tagName?.toLowerCase() === 'ul' || child.tagName?.toLowerCase() === 'ol') {
                            walker(child, { listDepth: context.listDepth + 1 });
                        }
                    });
                });
                pushLine('');
                break;
            }
            case 'blockquote': {
                const text = getInlineText(el);
                pushLine('> ' + text);
                pushLine('');
                break;
            }
            case 'hr': {
                pushLine('---');
                pushLine('');
                break;
            }
            case 'img': {
                const src = el.getAttribute('src') || '';
                const alt = el.getAttribute('alt') || '';
                pushLine('![' + alt + '](' + src + ')');
                pushLine('');
                break;
            }
            case 'table': {
                const rows = Array.from(el.querySelectorAll('tr'));
                if (!rows.length) break;
                const headerCells = Array.from(rows[0].children).map(c => sanitize(getInlineText(c)) || '');
                pushLine('| ' + headerCells.join(' | ') + ' |');
                pushLine('|' + headerCells.map(() => ' --- ').join('|') + '|');
                rows.slice(1).forEach(r => {
                    const cells = Array.from(r.children).map(c => sanitize(getInlineText(c)) || '');
                    pushLine('| ' + cells.join(' | ') + ' |');
                });
                pushLine('');
                break;
            }
            default: {
                // For unknown/custom elements, traverse children
                Array.from(el.childNodes).forEach(child => walker(child, context));
            }
        }
    };

    // Use a shallow clone to avoid mutating live DOM
    const clone = root.cloneNode(true);
    // Remove scripts/styles
    clone.querySelectorAll('script,style').forEach(n => n.remove());
    // Walk top-level children to keep spacing predictable
    Array.from(clone.childNodes).forEach(child => walker(child));

    // Merge lines and normalize spacing
    const out = lines
        .join('\n')
        .replace(/\n{3,}/g, '\n\n')
        .trim() + '\n';
    return out;
}

function getInlineText(el) {
    // Preserve inline code
    if (el.tagName && el.tagName.toLowerCase() === 'code') {
        return '`' + (el.textContent || '').trim() + '`';
    }
    // Convert links inline
    if (el.tagName && el.tagName.toLowerCase() === 'a') {
        const href = el.getAttribute('href') || '';
        const txt = (el.textContent || '').trim() || href;
        return '[' + txt + '](' + href + ')';
    }
    const text = (el.textContent || '').replace(/\s+/g, ' ').trim();
    return text;
}

function sanitize(s) {
    return (s || '').replace(/\|/g, '\\|');
}

