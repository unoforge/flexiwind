import { $ } from "@flexilla/utilities";
import { actionToggler } from "@flexilla/utilities/toggler";
import { copyToClipboard } from "./utils";

const initScrollbar = () => {
    const sidebarTrigger = $("[data-sidebar-trigger]");
    const sidebar = $("[data-app-sidebar]");
    const overlay = $("[data-sidebar-overlay]");
    const closeBtn = $("[data-close-sidebar]");

    if (!sidebarTrigger || !sidebar || sidebarTrigger.dataset.docsSidebarBound === "true") {
        return;
    }

    const toggleSidebar = (action) => {
        const isOpen = action !== "open";
        sidebar.setAttribute("data-state", isOpen ? "close" : "open");
        overlay?.setAttribute("data-state", isOpen ? "close" : "open");
    };

    sidebarTrigger.addEventListener("click", () => toggleSidebar("open"));
    closeBtn?.addEventListener("click", () => toggleSidebar("close"));
    overlay?.addEventListener("click", () => toggleSidebar("close"));

    sidebarTrigger.dataset.docsSidebarBound = "true";
};

const initTabOfContent = () => {
    const tabOfContent = $("[data-table-of-content]");
    const trigger = $("[data-trigger-tab-content]");

    if (!tabOfContent || !trigger || trigger.dataset.docsTocBound === "true") {
        return;
    }

    let actionTab;

    const hideTabOfContent = () => {
        actionTab.toInitial();
    };

    const hideOnClickOutside = (event) => {
        if (!trigger.contains(event.target)) {
            actionTab.toInitial();
        }
    };

    actionTab = actionToggler({
        trigger,
        targets: [
            {
                element: tabOfContent,
                attributes: {
                    initial: { "data-state": "close" },
                    to: { "data-state": "open" },
                },
            },
        ],
        onToggle: ({ isExpanded }) => {
            document.body.classList[isExpanded ? "add" : "remove"]("hidden-scrollbar");

            if (isExpanded) {
                document.addEventListener("click", hideOnClickOutside);
                tabOfContent.addEventListener("click", hideTabOfContent);
            } else {
                document.removeEventListener("click", hideOnClickOutside);
                tabOfContent.removeEventListener("click", hideTabOfContent);
            }
        },
    });

    trigger.dataset.docsTocBound = "true";
};

const initCopyAsMarkdown = () => {
    const button = document.querySelector("[data-copy-markdown]");

    if (!button || button.dataset.docsCopyBound === "true") {
        return;
    }

    button.addEventListener("click", () => {
        const article = document.querySelector("[data-doc-content]");

        if (!article) {
            return;
        }

        const markdown = htmlToMarkdown(article);

        try {
            copyToClipboard({
                snippet: markdown,
                onCopy: () => {
                    button.innerHTML = "<span>Copying...</span>";
                },
                onCopyCompleted: () => {
                    flashCopyState(button);
                },
            });
        } catch (error) {
            const textarea = document.createElement("textarea");
            textarea.value = markdown;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            flashCopyState(button);
        }
    });

    button.dataset.docsCopyBound = "true";
};

const initAllDocs = () => {
    initScrollbar();
    initTabOfContent();
    initCopyAsMarkdown();
};

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAllDocs, { once: true });
} else {
    initAllDocs();
}

document.addEventListener("livewire:navigated", initAllDocs);

function flashCopyState(button) {
    button.innerHTML =
        '<span class="flex iconify ph--check mr-1.5"></span><span>Copied</span>';

    setTimeout(() => {
        button.innerHTML =
            '<span aria-hidden="true" class="flex iconify ph--copy text-sm mr-1.5"></span><span>Copy page</span>';
    }, 1800);
}

function htmlToMarkdown(root) {
    const lines = [];

    const walker = (node, context = { listDepth: 0 }) => {
        if (node.nodeType === Node.TEXT_NODE) {
            const text = node.nodeValue.replace(/\s+/g, " ").trim();

            if (text) {
                lines.push(text);
            }

            return;
        }

        if (node.nodeType !== Node.ELEMENT_NODE) {
            return;
        }

        const el = node;
        const tag = el.tagName.toLowerCase();
        const pushLine = (value = "") => lines.push(value);

        switch (tag) {
            case "h1":
            case "h2":
            case "h3":
            case "h4":
            case "h5":
            case "h6": {
                const level = parseInt(tag[1], 10);
                pushLine("#".repeat(level) + " " + getInlineText(el));
                pushLine("");
                break;
            }
            case "p": {
                const text = getInlineText(el);

                if (text) {
                    pushLine(text);
                    pushLine("");
                }
                break;
            }
            case "pre": {
                const code = el.querySelector("code");
                const lang = (code?.className || "").split("language-")[1] || "";
                const content = code ? code.textContent : el.textContent;

                pushLine("```" + lang);
                pushLine((content || "").replace(/\s+$/, ""));
                pushLine("```");
                pushLine("");
                break;
            }
            case "code": {
                pushLine("`" + (el.textContent || "") + "`");
                break;
            }
            case "a": {
                const href = el.getAttribute("href") || "";
                const text = getInlineText(el) || href;

                pushLine("[" + text + "](" + href + ")");
                break;
            }
            case "strong":
            case "b": {
                pushLine("**" + getInlineText(el) + "**");
                break;
            }
            case "em":
            case "i": {
                pushLine("*" + getInlineText(el) + "*");
                break;
            }
            case "ul": {
                Array.from(el.children).forEach((li) => {
                    if (li.tagName?.toLowerCase() !== "li") {
                        return;
                    }

                    pushLine("  ".repeat(context.listDepth) + "- " + (getInlineText(li) || ""));

                    Array.from(li.children).forEach((child) => {
                        const childTag = child.tagName?.toLowerCase();

                        if (childTag === "ul" || childTag === "ol") {
                            walker(child, { listDepth: context.listDepth + 1 });
                        }
                    });
                });

                pushLine("");
                break;
            }
            case "ol": {
                let index = 1;

                Array.from(el.children).forEach((li) => {
                    if (li.tagName?.toLowerCase() !== "li") {
                        return;
                    }

                    pushLine("  ".repeat(context.listDepth) + index + ". " + (getInlineText(li) || ""));
                    index++;

                    Array.from(li.children).forEach((child) => {
                        const childTag = child.tagName?.toLowerCase();

                        if (childTag === "ul" || childTag === "ol") {
                            walker(child, { listDepth: context.listDepth + 1 });
                        }
                    });
                });

                pushLine("");
                break;
            }
            case "blockquote": {
                pushLine("> " + getInlineText(el));
                pushLine("");
                break;
            }
            case "hr": {
                pushLine("---");
                pushLine("");
                break;
            }
            case "img": {
                const src = el.getAttribute("src") || "";
                const alt = el.getAttribute("alt") || "";

                pushLine("![" + alt + "](" + src + ")");
                pushLine("");
                break;
            }
            case "table": {
                const rows = Array.from(el.querySelectorAll("tr"));

                if (!rows.length) {
                    break;
                }

                const headerCells = Array.from(rows[0].children).map((cell) => sanitize(getInlineText(cell)) || "");

                pushLine("| " + headerCells.join(" | ") + " |");
                pushLine("|" + headerCells.map(() => " --- ").join("|") + "|");

                rows.slice(1).forEach((row) => {
                    const cells = Array.from(row.children).map((cell) => sanitize(getInlineText(cell)) || "");
                    pushLine("| " + cells.join(" | ") + " |");
                });

                pushLine("");
                break;
            }
            default: {
                Array.from(el.childNodes).forEach((child) => walker(child, context));
            }
        }
    };

    const clone = root.cloneNode(true);
    clone.querySelectorAll("script,style").forEach((node) => node.remove());
    Array.from(clone.childNodes).forEach((child) => walker(child));

    return lines.join("\n").replace(/\n{3,}/g, "\n\n").trim() + "\n";
}

function getInlineText(el) {
    if (el.tagName && el.tagName.toLowerCase() === "code") {
        return "`" + (el.textContent || "").trim() + "`";
    }

    if (el.tagName && el.tagName.toLowerCase() === "a") {
        const href = el.getAttribute("href") || "";
        const text = (el.textContent || "").trim() || href;

        return "[" + text + "](" + href + ")";
    }

    return (el.textContent || "").replace(/\s+/g, " ").trim();
}

function sanitize(value) {
    return (value || "").replace(/\|/g, "\\|");
}
