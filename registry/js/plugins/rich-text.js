/**
 * Rich text Flexiwind : <x-ui.rich-text>, sans dépendance.
 *
 * Le contenu est un `contenteditable` ; les commandes passent par
 * `document.execCommand`, encore présent dans tous les navigateurs pour ce
 * cas précis. Tout ce qui entre (valeur de départ, collage, dépôt, valeur
 * renvoyée par Livewire) et tout ce qui sort passe par `clean()` : une
 * liste blanche de balises et d'attributs. Le serveur nettoie à nouveau
 * avec App\Flexiwind\RichText::clean(), car un navigateur peut être forgé.
 *
 * Étendre :
 *   import { RichText } from "./plugins/rich-text";
 *   RichText.command("timestamp", {
 *       run: (editor) => editor.insertHtml(`<p>${new Date().toLocaleString()}</p>`),
 *   });
 *   <x-ui.rich-text.button command="timestamp" icon="ph--clock" label="Insert time" />
 */

const BLOCKS = ["p", "h1", "h2", "h3", "blockquote", "pre"];

const ALLOWED = {
    p: [], br: [], strong: [], em: [], u: [], s: [], sub: [], sup: [], code: [], mark: [],
    h1: [], h2: [], h3: [], blockquote: [], pre: [], ul: [], ol: [], li: [], hr: [],
    a: ["href"], figure: ["data-align"], figcaption: [], img: ["src", "alt"],
};

const RENAME = { b: "strong", i: "em", strike: "s", del: "s", div: "p", h4: "h3", h5: "h3", h6: "h3" };
const DROP = new Set(["script", "style", "iframe", "object", "embed", "link", "meta", "template", "svg", "math", "form", "input", "button", "select", "textarea", "noscript"]);
const ALIGNABLE = new Set(["p", "h1", "h2", "h3"]);

function safeUrl(url, image = false) {
    const value = String(url ?? "").trim();

    if (value === "") {
        return null;
    }

    if (/^(https?:|\/(?!\/)|#|\.\.?\/)/i.test(value) || (!image && /^mailto:/i.test(value))) {
        return value;
    }

    // Un lien saisi sans protocole (« flexiwind.dev ») devient https.
    return !image && /^[\w-]+(\.[\w-]+)+([/?#].*)?$/.test(value) ? `https://${value}` : null;
}

/** Ne garde que la liste blanche ; les liens et images dangereux sont retirés. */
export function clean(html) {
    const template = document.createElement("template");
    template.innerHTML = String(html ?? "");

    const walk = (parent) => {
        for (const node of [...parent.childNodes]) {
            if (node.nodeType === Node.TEXT_NODE) {
                continue;
            }

            if (node.nodeType !== Node.ELEMENT_NODE) {
                node.remove();
                continue;
            }

            let tag = node.tagName.toLowerCase();

            if (DROP.has(tag) || node.hasAttribute("data-rt-upload")) {
                node.remove();
                continue;
            }

            walk(node);

            // Les marques posées en style par certains navigateurs ou traitements de texte.
            const style = node.getAttribute("style") ?? "";
            const align = style.match(/text-align:\s*(center|right)/i)?.[1]?.toLowerCase() ?? node.getAttribute("align")?.toLowerCase();

            if (tag === "span" && /font-weight:\s*(bold|[6-9]00)/i.test(style)) {
                tag = "strong";
            } else if (tag === "span" && /font-style:\s*italic/i.test(style)) {
                tag = "em";
            }

            tag = RENAME[tag] ?? tag;

            if (!(tag in ALLOWED)) {
                node.replaceWith(...node.childNodes);
                continue;
            }

            const attributes = Object.fromEntries([...node.attributes].map((attribute) => [attribute.name, attribute.value]));
            const element = tag === node.tagName.toLowerCase() ? node : document.createElement(tag);

            if (element !== node) {
                element.append(...node.childNodes);
                node.replaceWith(element);
            }

            for (const name of Object.keys(attributes)) {
                element.removeAttribute(name);
            }

            for (const name of ALLOWED[tag]) {
                const value = attributes[name];

                if (value === undefined) {
                    continue;
                }

                if (name === "href" || name === "src") {
                    const url = safeUrl(value, name === "src");

                    if (url) {
                        element.setAttribute(name, url);
                    }
                } else if (name === "data-align") {
                    if (["left", "center", "wide"].includes(value)) {
                        element.setAttribute(name, value);
                    }
                } else {
                    element.setAttribute(name, value.slice(0, 300));
                }
            }

            if (tag === "a") {
                element.setAttribute("rel", "noopener noreferrer nofollow");
            }

            if ((tag === "img" && !element.hasAttribute("src")) || (tag === "p" && !element.childNodes.length)) {
                element.remove();
            }

            if (align && ALIGNABLE.has(tag)) {
                element.setAttribute("style", `text-align: ${align}`);
            }
        }
    };

    walk(template.content);

    // Dans un bloc de code, un saut de ligne est un caractère, pas un <br>.
    template.content.querySelectorAll("pre br").forEach((br) => br.replaceWith("\n"));

    return template.innerHTML
        .replace(/(<p><br><\/p>)+$/, "")
        .replace(/^(<p><\/p>)+|(<p><\/p>)+$/g, "")
        .trim();
}

function escapeHtml(text) {
    const span = document.createElement("span");
    span.textContent = text;

    return span.innerHTML;
}

/** Commandes : `run(editor)` agit, `active(editor)` dit si le bouton est enfoncé. */
const COMMANDS = {
    bold: { run: (e) => e.exec("bold"), active: () => document.queryCommandState("bold") },
    italic: { run: (e) => e.exec("italic"), active: () => document.queryCommandState("italic") },
    underline: { run: (e) => e.exec("underline"), active: () => document.queryCommandState("underline") },
    strike: { run: (e) => e.exec("strikeThrough"), active: () => document.queryCommandState("strikeThrough") },
    subscript: { run: (e) => e.exec("subscript"), active: () => document.queryCommandState("subscript") },
    superscript: { run: (e) => e.exec("superscript"), active: () => document.queryCommandState("superscript") },
    code: { run: (e) => e.toggleCode(), active: (e) => !!e.closest("code") && !e.closest("pre") },
    clear: { run: (e) => { e.exec("removeFormat"); e.exec("unlink"); } },
    paragraph: { run: (e) => e.setBlock("p"), active: (e) => e.block === "p" },
    h1: { run: (e) => e.setBlock("h1"), active: (e) => e.block === "h1" },
    h2: { run: (e) => e.setBlock("h2"), active: (e) => e.block === "h2" },
    h3: { run: (e) => e.setBlock("h3"), active: (e) => e.block === "h3" },
    quote: { run: (e) => e.setBlock("blockquote"), active: (e) => e.block === "blockquote" },
    "code-block": { run: (e) => e.setBlock("pre"), active: (e) => e.block === "pre" },
    "bullet-list": { run: (e) => e.exec("insertUnorderedList"), active: () => document.queryCommandState("insertUnorderedList") },
    "ordered-list": { run: (e) => e.exec("insertOrderedList"), active: () => document.queryCommandState("insertOrderedList") },
    divider: { run: (e) => e.insertHtml("<hr><p><br></p>") },
    "align-left": { run: (e) => e.exec("justifyLeft"), active: (e) => e.align === "left" },
    "align-center": { run: (e) => e.exec("justifyCenter"), active: (e) => e.align === "center" },
    "align-right": { run: (e) => e.exec("justifyRight"), active: (e) => e.align === "right" },
    link: { run: (e, button) => e.openPanel("link", button), active: (e) => !!e.closest("a") },
    unlink: { run: (e) => e.exec("unlink") },
    image: { run: (e, button) => e.openPanel("image", button) },
    undo: { run: (e) => e.undo() },
    redo: { run: (e) => e.redo() },
};

export const RichText = {
    /** Ajoute ou remplace une commande, utilisable par <x-ui.rich-text.button command="…">. */
    command(name, definition) {
        COMMANDS[name] = definition;
    },
    clean,
};

export function RichTextPlugin(Alpine) {
    Alpine.data("fwRichText", richText);
}

let sequence = 0;

function fill(text, values) {
    return Object.entries(values).reduce((result, [key, value]) => result.replaceAll(`:${key}`, value), text ?? "");
}

/** Les blocs qui enveloppent d'autres lignes : on doit pouvoir y entrer, en sortir et les retirer. */
const WRAPPERS = "pre, blockquote";
/** Après ces blocs, un paragraphe vide reste toujours là pour continuer à écrire. */
const TRAILING = new Set(["PRE", "BLOCKQUOTE", "FIGURE", "HR", "UL", "OL"]);

function richText(config = {}) {
    const texts = config.texts ?? {};
    let saved = null;
    // L'historique : l'annulation du navigateur se perd dès qu'un bloc est modifié à la main.
    const history = { past: [], future: [], current: null, timer: null, applying: false };
    // La racine de l'éditeur : depuis un x-data imbriqué (menu Format, panneau image), $root serait ce dernier.
    let root = null;

    return {
        value: config.value ?? "",
        focused: false,
        empty: true,
        block: "p",
        align: "left",
        states: {},
        words: 0,
        chars: 0,
        bubble: { open: false, x: 0, y: 0 },
        image: null,
        imageBar: { x: 0, y: 0 },
        panel: null,
        panelPos: { x: 0, y: 0 },
        linkUrl: "",
        imageUrl: "",
        imageAlt: "",
        over: false,
        depth: 0,
        error: "",
        announcement: "",
        disabled: !!config.disabled,
        invalid: !!config.invalid,

        placeholder: config.placeholder ?? "",

        init() {
            root = this.$root;

            const content = this.content();

            content.innerHTML = clean(this.value) || "";
            this.normalize();
            this.measure();
            history.current = this.snapshot();

            try {
                document.execCommand("defaultParagraphSeparator", false, "p");
                document.execCommand("styleWithCSS", false, false);
            } catch {
                // Navigateurs sans ces options : le nettoyage rattrape la différence.
            }

            // La valeur change ailleurs (Livewire, reset) : le contenu suit.
            this.$watch("value", (value) => {
                if (value !== this.serialize()) {
                    content.innerHTML = clean(value) || "";
                    this.normalize();
                    this.measure();
                    this.remember(true);
                }
            });

            // L'image cliquée porte un contour ; `clean()` retire l'attribut à l'enregistrement.
            this.$watch("image", (image, previous) => {
                previous?.removeAttribute?.("data-rt-selected");
                image?.setAttribute("data-rt-selected", "");
            });

            this.onSelection = () => this.refresh();
            document.addEventListener("selectionchange", this.onSelection);
        },

        destroy() {
            document.removeEventListener("selectionchange", this.onSelection);
        },

        get contentId() {
            return `${root?.id}-content`;
        },

        /** Le cadre de l'éditeur : bulle, panneaux et barres s'y placent en absolu. */
        frame() {
            return root.querySelector('[data-slot="rich-text-frame"]') ?? root;
        },

        content() {
            return root.querySelector("[data-rt-content]");
        },

        serialize() {
            return clean(this.content().innerHTML);
        },

        /**
         * Chrome peut poser une liste ou un titre dans un paragraphe : on les en sort.
         * Après un bloc de code, une citation, une image ou une liste en fin de texte,
         * un paragraphe vide permet toujours de continuer ; `clean()` ne l'envoie pas.
         */
        normalize() {
            const content = this.content();

            for (const nested of content.querySelectorAll(":scope > p > :is(ul, ol, pre, blockquote, h1, h2, h3, figure, hr)")) {
                const paragraph = nested.parentElement;

                if ([...paragraph.childNodes].every((node) => node === nested || (node.nodeType === Node.TEXT_NODE && node.textContent.trim() === "") || node.nodeName === "BR")) {
                    paragraph.replaceWith(nested);
                }
            }

            if (TRAILING.has(content.lastElementChild?.tagName)) {
                content.append(this.paragraph());
            }
        },

        paragraph(text = "") {
            const paragraph = document.createElement("p");

            if (text === "") {
                paragraph.append(document.createElement("br"));
            } else {
                paragraph.textContent = text;
            }

            return paragraph;
        },

        sync() {
            this.normalize();
            this.remember();

            const html = this.serialize();

            this.measure();

            if (html !== this.value) {
                this.value = html;
                this.$dispatch("rich-text:change", { value: html });
            }
        },

        measure() {
            const text = this.content().innerText.replace(/​/g, "").trim();

            this.chars = text.length;
            this.words = text === "" ? 0 : text.split(/\s+/).length;
            this.empty = text === "" && !this.content().querySelector("img, hr");
        },

        // --- Sélection -------------------------------------------------------

        inside(node) {
            return !!node && this.content().contains(node.nodeType === Node.ELEMENT_NODE ? node : node.parentNode);
        },

        selection() {
            const selection = window.getSelection();

            return selection?.rangeCount && this.inside(selection.anchorNode) ? selection : null;
        },

        closest(selector) {
            const node = this.selection()?.anchorNode;
            const element = node?.nodeType === Node.ELEMENT_NODE ? node : node?.parentElement;
            const found = element?.closest(selector);

            return found && this.content().contains(found) ? found : null;
        },

        save() {
            const selection = this.selection();
            saved = selection ? selection.getRangeAt(0).cloneRange() : null;
        },

        restore() {
            this.content().focus({ preventScroll: true });

            if (saved) {
                const selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(saved);
            }
        },

        refresh() {
            if (!this.selection()) {
                this.bubble.open = false;

                return;
            }

            const blockElement = this.closest("pre") ?? this.closest("blockquote") ?? this.closest(BLOCKS.join(","));
            this.block = blockElement?.tagName.toLowerCase() ?? "p";

            const alignValue = blockElement?.style.textAlign;
            this.align = alignValue === "center" || alignValue === "right" ? alignValue : "left";

            const states = {};

            for (const [name, command] of Object.entries(COMMANDS)) {
                try {
                    states[name] = command.active ? !!command.active(this) : false;
                } catch {
                    states[name] = false;
                }
            }

            this.states = states;
            this.placeBubble();
        },

        placeBubble() {
            const selection = this.selection();
            const bubble = root.querySelector("[data-rt-bubble]");

            if (!bubble || !selection || selection.isCollapsed || this.panel) {
                this.bubble.open = false;

                return;
            }

            const rect = selection.getRangeAt(0).getBoundingClientRect();
            const box = this.frame().getBoundingClientRect();

            if (!rect.width && !rect.height) {
                this.bubble.open = false;

                return;
            }

            const width = bubble.offsetWidth || 200;
            const x = Math.min(Math.max(rect.left - box.left + rect.width / 2 - width / 2, 4), box.width - width - 4);

            this.bubble = { open: true, x, y: rect.top - box.top - (bubble.offsetHeight || 40) - 8 };
        },

        // --- Commandes -------------------------------------------------------

        exec(name, argument = null) {
            if (this.disabled) {
                return;
            }

            this.content().focus({ preventScroll: true });
            document.execCommand(name, false, argument);
            this.sync();
            this.refresh();
        },

        run(name, event = null) {
            const command = COMMANDS[name];

            if (!command || this.disabled) {
                return;
            }

            if (!this.selection() && saved) {
                this.restore();
            }

            this.remember(true);
            command.run(this, event?.currentTarget ?? null);
            this.sync();
            this.remember(true);
            this.refresh();
        },

        isActive(name) {
            return !!this.states[name];
        },

        /**
         * Change le bloc du curseur. Le même bouton une seconde fois rend un paragraphe :
         * une citation ou un bloc de code se retirent comme ils se posent.
         */
        setBlock(tag) {
            if (this.disabled) {
                return;
            }

            this.content().focus({ preventScroll: true });

            const wrapper = this.closest("pre") ?? this.closest("blockquote");

            if (wrapper) {
                const same = wrapper.tagName.toLowerCase() === tag;

                this.unwrap(wrapper);

                if (same || tag === "p") {
                    this.sync();

                    return;
                }
            }

            if (tag === "pre" || tag === "blockquote") {
                this.wrap(tag);
                this.sync();

                return;
            }

            const heading = this.closest("h1, h2, h3");
            const next = heading && heading.tagName.toLowerCase() === tag ? "p" : tag;

            document.execCommand("formatBlock", false, `<${next}>`);
            this.sync();
        },

        /** Le bloc de premier niveau qui contient `node`. */
        topBlock(node) {
            const content = this.content();
            let current = node;

            while (current && current.parentNode !== content) {
                current = current.parentNode;
            }

            return current?.parentNode === content ? current : null;
        },

        /** Les blocs de premier niveau touchés par la sélection. */
        selectedBlocks() {
            const selection = this.selection();

            if (!selection) {
                return [];
            }

            const range = selection.getRangeAt(0);
            const first = this.topBlock(range.startContainer);
            const last = this.topBlock(range.endContainer) ?? first;
            const blocks = [];

            for (let block = first; block; block = block.nextSibling) {
                if (block.nodeType === Node.ELEMENT_NODE || block.textContent.trim() !== "") {
                    blocks.push(block);
                }

                if (block === last) {
                    break;
                }
            }

            return blocks;
        },

        wrap(tag) {
            const blocks = this.selectedBlocks().filter((block) => block.nodeName !== "FIGURE" && block.nodeName !== "HR");

            if (!blocks.length) {
                return;
            }

            if (tag === "blockquote") {
                const offset = this.caretOffset();
                const quote = document.createElement("blockquote");

                blocks[0].before(quote);
                blocks.forEach((block) => quote.append(block.nodeType === Node.TEXT_NODE ? this.paragraph(block.textContent) : block));
                this.setCaretOffset(offset);

                return;
            }

            // Un bloc de code : une ligne par bloc, une par élément de liste.
            const caretBlock = this.topBlock(this.selection()?.anchorNode);
            const caretColumn = caretBlock ? this.textBefore(caretBlock).length : 0;
            const lines = [];
            let position = null;

            for (const block of blocks) {
                const rows = block.nodeName === "UL" || block.nodeName === "OL"
                    ? [...block.children].map((item) => item.textContent)
                    : [block.textContent.replace(/\u200b/g, "")];

                if (block === caretBlock) {
                    position = lines.join("\n").length + (lines.length ? 1 : 0) + caretColumn;
                }

                lines.push(...rows);
            }

            const pre = document.createElement("pre");
            pre.textContent = lines.join("\n");
            blocks[0].before(pre);
            blocks.forEach((block) => block.remove());
            this.placeCaret(pre, position ?? pre.textContent.length);
        },

        unwrap(wrapper) {
            if (wrapper.nodeName === "PRE") {
                const before = this.textBefore(wrapper);
                const line = before.split("\n").length - 1;
                const column = before.length - before.lastIndexOf("\n") - 1;
                const paragraphs = wrapper.textContent.replace(/\n$/, "").split("\n").map((text) => this.paragraph(text));

                wrapper.replaceWith(...paragraphs);
                this.placeCaret(paragraphs[Math.min(line, paragraphs.length - 1)], column);

                return;
            }

            const offset = this.caretOffset();
            const children = [...wrapper.childNodes].filter((node) => node.nodeType === Node.ELEMENT_NODE || node.textContent.trim() !== "");
            const blocks = children.every((node) => node.nodeType === Node.ELEMENT_NODE && /^(P|H[1-3]|UL|OL|PRE|FIGURE|HR)$/.test(node.nodeName))
                ? children
                : [Object.assign(this.paragraph(), { innerHTML: "" })].map((paragraph) => {
                    paragraph.append(...wrapper.childNodes);

                    return paragraph;
                });

            wrapper.replaceWith(...(blocks.length ? blocks : [this.paragraph()]));
            this.setCaretOffset(offset);
        },

        /** Sort d'un bloc : un paragraphe vide juste après, le curseur dedans. */
        exitAfter(block) {
            let next = block.nextElementSibling;

            if (!next || next.nodeName !== "P" || next.textContent !== "") {
                next = this.paragraph();
                block.after(next);
            }

            this.placeCaret(next, 0);
            this.sync();
            this.remember(true);
        },

        // --- Curseur ---------------------------------------------------------

        textBefore(element) {
            const selection = this.selection();

            if (!selection) {
                return "";
            }

            const range = document.createRange();
            range.selectNodeContents(element);
            range.setEnd(selection.anchorNode, selection.anchorOffset);

            return range.toString();
        },

        textAfter(element) {
            const selection = this.selection();

            if (!selection) {
                return "";
            }

            const range = document.createRange();
            range.selectNodeContents(element);
            range.setStart(selection.focusNode, selection.focusOffset);

            return range.toString();
        },

        textAfterNode(element, node) {
            const range = document.createRange();
            range.selectNodeContents(element);
            range.setStartAfter(node);

            return range.toString();
        },

        caretOffset() {
            return this.selection() ? this.textBefore(this.content()).length : null;
        },

        /** Pose le curseur à `offset` caractères du début de `element`. */
        placeCaret(element, offset) {
            const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT);
            const range = document.createRange();
            let left = Math.max(offset ?? 0, 0);
            let node = walker.nextNode();
            let placed = false;

            while (node) {
                if (left <= node.textContent.length) {
                    range.setStart(node, left);
                    placed = true;
                    break;
                }

                left -= node.textContent.length;
                node = walker.nextNode();
            }

            if (!placed) {
                range.selectNodeContents(element);
                range.collapse(offset === 0);
            }

            range.collapse(true);

            const selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
        },

        setCaretOffset(offset) {
            if (offset === null || offset === undefined) {
                this.caretToEnd();

                return;
            }

            this.placeCaret(this.content(), offset);
        },

        // --- Historique ------------------------------------------------------

        snapshot() {
            return { html: this.content().innerHTML, caret: this.caretOffset() };
        },

        /** Garde l'état courant : tout de suite, ou après une pause dans la frappe. */
        remember(now = false) {
            if (history.applying) {
                return;
            }

            clearTimeout(history.timer);

            const commit = () => {
                const state = this.snapshot();

                if (history.current?.html === state.html) {
                    history.current.caret = state.caret;

                    return;
                }

                if (history.current) {
                    history.past.push(history.current);
                    history.past.length > 100 && history.past.shift();
                }

                history.current = state;
                history.future = [];
            };

            if (now) {
                commit();
            } else {
                history.timer = setTimeout(commit, 400);
            }
        },

        travel(from, to) {
            this.remember(true);

            if (!from.length) {
                return;
            }

            to.push(history.current);
            history.current = from.pop();
            history.applying = true;
            this.content().innerHTML = history.current.html;
            this.content().focus({ preventScroll: true });
            this.setCaretOffset(history.current.caret);
            this.sync();
            history.applying = false;
            this.refresh();
        },

        undo() {
            this.travel(history.past, history.future);
        },

        redo() {
            this.travel(history.future, history.past);
        },

        insertHtml(html) {
            this.content().focus({ preventScroll: true });

            if (!this.selection()) {
                this.caretToEnd();
            }

            document.execCommand("insertHTML", false, clean(html) || html);
            this.sync();
        },

        caretToEnd() {
            const range = document.createRange();
            range.selectNodeContents(this.content());
            range.collapse(false);

            const selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
        },

        toggleCode() {
            const code = this.closest("code");

            if (code) {
                code.replaceWith(...code.childNodes);

                return;
            }

            const selection = this.selection();

            if (!selection || selection.isCollapsed) {
                return;
            }

            const text = selection.toString();
            document.execCommand("insertHTML", false, `<code>${escapeHtml(text)}</code>&#8203;`);
        },

        label(name, fallback) {
            return texts[name] ?? fallback;
        },

        // --- Panneaux : lien et image ---------------------------------------

        openPanel(name, button) {
            this.save();
            this.bubble.open = false;

            if (name === "link") {
                this.linkUrl = this.closest("a")?.getAttribute("href") ?? "";
            } else {
                this.imageUrl = "";
                this.imageAlt = "";
                this.error = "";
            }

            const box = this.frame().getBoundingClientRect();
            const caret = this.selection()?.getRangeAt(0).getBoundingClientRect();
            const rect = button?.getBoundingClientRect() ?? (caret?.height ? caret : this.content().getBoundingClientRect());
            const width = name === "image" ? 320 : 300;

            this.panelPos = {
                x: Math.min(Math.max(rect.left - box.left, 4), Math.max(box.width - width - 4, 4)),
                y: rect.bottom - box.top + 6,
            };
            this.panel = name;

            this.$nextTick(() => root.querySelector(`[data-rt-panel="${name}"] input`)?.focus());
        },

        closePanel(restore = true) {
            this.panel = null;

            if (restore) {
                this.restore();
            }
        },

        applyLink() {
            const url = safeUrl(this.linkUrl);
            this.closePanel();

            if (!url) {
                this.exec("unlink");

                return;
            }

            const selection = window.getSelection();

            if (selection.isCollapsed && !this.closest("a")) {
                this.insertHtml(`<a href="${escapeHtml(url)}">${escapeHtml(url)}</a>&#8203;`);
            } else {
                this.exec("createLink", url);
            }
        },

        insertImageUrl() {
            const url = safeUrl(this.imageUrl, true);

            if (!url) {
                this.error = this.label("url", "Enter an image address that starts with https://.");

                return;
            }

            this.closePanel();
            this.insertHtml(this.figure(url, this.imageAlt));
        },

        figure(src, alt = "") {
            return `<figure data-align="center"><img src="${escapeHtml(src)}" alt="${escapeHtml(alt)}"></figure><p><br></p>`;
        },

        // --- Envoi d'images (Livewire) --------------------------------------

        canUpload() {
            return !!config.upload && !!this.$wire;
        },

        browse() {
            root.querySelector("[data-rt-picker]")?.click();
        },

        picked(event) {
            const files = [...(event.target.files ?? [])];
            event.target.value = "";
            this.closePanel();
            files.forEach((file) => this.upload(file));
        },

        check(file) {
            const accept = config.accept ?? [];
            const type = (file.type || "").toLowerCase();
            const name = file.name.toLowerCase();

            const typeOk = !accept.length || accept.some((rule) =>
                rule.startsWith(".") ? name.endsWith(rule) : rule.endsWith("/*") ? type.startsWith(rule.slice(0, -1)) : type === rule);

            if (!typeOk || !type.startsWith("image/") || type === "image/svg+xml") {
                return fill(this.label("type", ":name is not an accepted image type."), { name: file.name });
            }

            if (config.maxBytes && file.size > config.maxBytes) {
                return fill(this.label("size", ":name is over :max."), { name: file.name, max: config.maxLabel });
            }

            return null;
        },

        upload(file) {
            const problem = this.check(file);

            if (problem) {
                this.error = problem;
                this.announcement = problem;

                return;
            }

            if (!this.canUpload()) {
                return;
            }

            this.error = "";

            const id = `rt-upload-${++sequence}`;
            const holder = this.uploadHolder(id, file.name);
            const bar = holder.querySelector("[data-rt-progress]");
            const status = holder.querySelector("[data-rt-status]");

            this.content().focus({ preventScroll: true });

            if (!this.selection()) {
                this.caretToEnd();
            }

            const range = window.getSelection().getRangeAt(0);
            const anchor = this.closest("p, h1, h2, h3, blockquote, pre, ul, ol, figure");

            if (anchor && anchor.parentNode === this.content()) {
                anchor.after(holder);
            } else {
                range.insertNode(holder);
            }

            const fail = (message) => {
                holder.remove();
                this.error = message;
                this.announcement = message;
                this.sync();
            };

            this.$wire.upload(
                config.upload,
                file,
                async () => {
                    try {
                        const src = safeUrl(await this.$wire.call(config.store), true);

                        if (!src) {
                            fail(fill(this.label("failed", ":name could not be uploaded."), { name: file.name }));

                            return;
                        }

                        const wrapper = document.createElement("template");
                        wrapper.innerHTML = this.figure(src, file.name.replace(/\.[^.]+$/, "").replace(/[-_]+/g, " "));
                        holder.replaceWith(wrapper.content);
                        this.announcement = fill(this.label("uploaded", ":name uploaded."), { name: file.name });
                        this.sync();
                    } catch {
                        fail(fill(this.label("failed", ":name could not be uploaded."), { name: file.name }));
                    }
                },
                () => fail(fill(this.label("failed", ":name could not be uploaded."), { name: file.name })),
                (event) => {
                    const progress = event.detail?.progress ?? 0;
                    bar.style.width = `${progress}%`;
                    status.textContent = `${file.name} · ${progress}%`;
                },
            );
        },

        uploadHolder(id, name) {
            const holder = document.createElement("div");

            holder.setAttribute("data-rt-upload", id);
            holder.setAttribute("contenteditable", "false");
            holder.className = "my-3 flex h-28 flex-col items-center justify-center gap-2 rounded-ui bg-muted text-xs text-muted-foreground";
            holder.innerHTML = `<span data-rt-status class="max-w-[80%] truncate"></span><span class="h-1 w-48 overflow-hidden rounded-full bg-border"><span data-rt-progress class="block h-full w-0 rounded-full bg-primary transition-[width]"></span></span>`;
            holder.querySelector("[data-rt-status]").textContent = `${name} · 0%`;

            return holder;
        },

        // --- Images posées dans le texte ------------------------------------

        pick(event) {
            const img = event.target.closest?.("img");

            if (!img || !this.content().contains(img)) {
                this.image = null;

                return;
            }

            this.image = img;
            this.placeImageBar();
        },

        placeImageBar() {
            if (!this.image?.isConnected) {
                this.image = null;

                return;
            }

            const box = this.frame().getBoundingClientRect();
            const rect = this.image.getBoundingClientRect();
            const bar = root.querySelector("[data-rt-image-bar]");
            const width = bar?.offsetWidth || 260;

            this.imageBar = {
                x: Math.min(Math.max(rect.left - box.left + rect.width / 2 - width / 2, 4), box.width - width - 4),
                y: Math.max(rect.top - box.top - (bar?.offsetHeight || 40) - 8, 4),
            };
        },

        imageFigure() {
            if (!this.image) {
                return null;
            }

            let figure = this.image.closest("figure");

            if (!figure) {
                figure = document.createElement("figure");
                this.image.replaceWith(figure);
                figure.append(this.image);
            }

            return figure;
        },

        imageAlign(value) {
            const figure = this.imageFigure();

            if (figure) {
                figure.setAttribute("data-align", value);
                this.sync();
                this.$nextTick(() => this.placeImageBar());
            }
        },

        imageAligned(value) {
            return (this.image?.closest("figure")?.getAttribute("data-align") ?? "center") === value;
        },

        imageCaption() {
            const figure = this.imageFigure();

            if (!figure) {
                return;
            }

            let caption = figure.querySelector("figcaption");

            if (!caption) {
                caption = document.createElement("figcaption");
                caption.textContent = this.label("caption", "Caption");
                figure.append(caption);
            }

            const range = document.createRange();
            range.selectNodeContents(caption);
            const selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            this.image = null;
            this.sync();
        },

        imageAltText() {
            if (!this.image) {
                return;
            }

            const alt = window.prompt(this.label("alt", "Describe the image for screen readers"), this.image.getAttribute("alt") ?? "");

            if (alt !== null) {
                this.image.setAttribute("alt", alt.slice(0, 300));
                this.sync();
            }
        },

        imageRemove() {
            const target = this.image?.closest("figure") ?? this.image;

            target?.remove();
            this.image = null;
            this.sync();
        },

        // --- Clavier, collage, dépôt ----------------------------------------

        keydown(event) {
            const mod = event.metaKey || event.ctrlKey;
            const key = event.key.toLowerCase();

            if (mod && key === "z") {
                event.preventDefault();
                event.shiftKey ? this.redo() : this.undo();
            } else if (mod && key === "y") {
                event.preventDefault();
                this.redo();
            } else if (mod && key === "k") {
                event.preventDefault();
                this.run("link");
            } else if (mod && key === "e") {
                event.preventDefault();
                this.run("code");
            } else if (mod && event.shiftKey && key === "x") {
                event.preventDefault();
                this.run("strike");
            } else if (event.key === "Escape") {
                this.bubble.open = false;
                this.image = null;
            } else if (event.key === " " && !mod) {
                this.shortcut(event);
            } else if (event.key === "Enter" && config.submitOn === "enter" && !event.shiftKey) {
                event.preventDefault();
                root.closest("form")?.requestSubmit();
            } else if (event.key === "Enter" && mod && config.submitOn === "mod-enter") {
                event.preventDefault();
                root.closest("form")?.requestSubmit();
            } else if (event.key === "Enter" && mod) {
                // Ctrl+Entrée sort de n'importe quel bloc.
                const block = this.closest("pre") ?? this.closest("blockquote") ?? this.topBlock(this.selection()?.anchorNode);

                if (block) {
                    event.preventDefault();
                    this.exitAfter(block);
                }
            } else if (event.key === "Enter" && !event.shiftKey) {
                this.enter(event);
            } else if (event.key === "Backspace" && !mod) {
                this.backspace(event);
            } else if (event.key === "Tab" && this.closest("pre")) {
                event.preventDefault();

                if (!event.shiftKey) {
                    document.execCommand("insertText", false, "  ");
                }
            } else if (event.key === "ArrowRight" || event.key === "ArrowDown" || event.key === "ArrowUp") {
                this.arrow(event);
            }
        },

        /** Entrée : nouvelle ligne dans le code ; une ligne vide en fin de bloc en sort. */
        enter(event) {
            const pre = this.closest("pre");
            const selection = this.selection();

            if (pre && selection) {
                event.preventDefault();

                const before = this.textBefore(pre);
                const after = this.textAfter(pre);

                if (selection.isCollapsed && after.replace(/\n/g, "") === "" && (before === "" || before.endsWith("\n"))) {
                    if (pre.textContent.trim() === "") {
                        this.unwrap(pre);
                        this.sync();

                        return;
                    }

                    pre.textContent = pre.textContent.replace(/\n+$/, "");
                    this.exitAfter(pre);

                    return;
                }

                // Un vrai saut de ligne : Chrome poserait un <br>.
                this.remember(true);

                const range = selection.getRangeAt(0);
                range.deleteContents();

                const line = document.createTextNode("\n");
                range.insertNode(line);

                // Sans un saut de ligne final, le curseur ne s'affiche pas sur la ligne vide.
                if (!line.nextSibling || this.textAfterNode(pre, line) === "") {
                    pre.append(document.createTextNode("\n"));
                }

                range.setStartAfter(line);
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);
                pre.normalize();
                this.sync();
                this.remember(true);

                return;
            }

            const quote = this.closest("blockquote");
            const line = quote ? this.topLine(quote) : null;

            // Une ligne vide en fin de citation : on en sort.
            if (quote && line && line.textContent.replace(/\u200b/g, "") === "" && !line.nextElementSibling) {
                event.preventDefault();
                line.remove();

                // La citation ne contenait que cette ligne : elle redevient un paragraphe.
                if (!quote.textContent.trim() && !quote.querySelector("img, hr")) {
                    const paragraph = this.paragraph();
                    quote.replaceWith(paragraph);
                    this.placeCaret(paragraph, 0);
                    this.sync();
                    this.remember(true);

                    return;
                }

                this.exitAfter(quote);
            }
        },

        /** La ligne de la citation qui porte le curseur : un <p> enfant, ou la citation entière. */
        topLine(quote) {
            let node = this.selection()?.anchorNode;

            while (node && node.parentNode !== quote) {
                node = node.parentNode;
            }

            return node?.nodeType === Node.ELEMENT_NODE ? node : quote.childElementCount ? null : quote;
        },

        /** Retour arrière au tout début d'une citation ou d'un bloc de code : il redevient un paragraphe. */
        backspace(event) {
            const selection = this.selection();
            const wrapper = this.closest("pre") ?? this.closest("blockquote");

            if (!wrapper || !selection?.isCollapsed || this.textBefore(wrapper) !== "") {
                return;
            }

            event.preventDefault();
            this.remember(true);
            this.unwrap(wrapper);
            this.sync();
            this.remember(true);
        },

        arrow(event) {
            const selection = this.selection();

            if (!selection?.isCollapsed) {
                return;
            }

            const content = this.content();

            // Flèche droite à la fin d'un code en ligne : le curseur en sort.
            const code = this.closest("code");

            if (event.key === "ArrowRight" && code && !this.closest("pre") && this.textAfter(code) === "") {
                event.preventDefault();

                let after = code.nextSibling;

                if (!after || after.nodeType !== Node.TEXT_NODE) {
                    after = document.createTextNode("\u200b");
                    code.after(after);
                }

                const range = document.createRange();
                range.setStart(after, after.textContent.startsWith("\u200b") ? 1 : 0);
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);

                return;
            }

            // Flèche haut au tout début : un paragraphe avant un premier bloc de code, une citation, une image.
            const first = content.firstElementChild;

            if (event.key === "ArrowUp" && first && TRAILING.has(first.tagName) && this.textBefore(content) === "" && this.topBlock(selection.anchorNode) === first) {
                event.preventDefault();

                const paragraph = this.paragraph();
                first.before(paragraph);
                this.placeCaret(paragraph, 0);
                this.sync();
            }
        },

        beforeinput(event) {
            if (event.inputType === "historyUndo" || event.inputType === "historyRedo") {
                event.preventDefault();
                event.inputType === "historyUndo" ? this.undo() : this.redo();
            }
        },

        /** Raccourcis Markdown en début de ligne : « # », « ## », « > », « - », « 1. », « ``` ». */
        shortcut(event) {
            if (config.markdown === false) {
                return;
            }

            const selection = this.selection();
            const node = selection?.anchorNode;

            if (!selection?.isCollapsed || node?.nodeType !== Node.TEXT_NODE) {
                return;
            }

            const before = node.textContent.slice(0, selection.anchorOffset);
            const rules = { "#": "h1", "##": "h2", "###": "h3", ">": "blockquote", "```": "pre", "-": "bullet-list", "*": "bullet-list", "1.": "ordered-list" };
            const target = rules[before];
            const block = this.closest("p, h1, h2, h3");

            if (!target || !block || block.firstChild !== node) {
                return;
            }

            event.preventDefault();
            node.textContent = node.textContent.slice(before.length);

            // Le préfixe parti, le curseur revient au début du bloc.
            if (block.textContent === "") {
                block.innerHTML = "<br>";
            }

            const range = document.createRange();
            range.setStart(block.firstChild.nodeType === Node.TEXT_NODE ? block.firstChild : block, 0);
            range.collapse(true);
            selection.removeAllRanges();
            selection.addRange(range);

            if (target.endsWith("-list")) {
                this.run(target);
            } else {
                this.remember(true);
                this.setBlock(target);
                this.remember(true);
                this.refresh();
            }
        },

        paste(event) {
            const data = event.clipboardData;
            const images = [...(data?.files ?? [])].filter((file) => file.type.startsWith("image/"));

            event.preventDefault();

            if (images.length) {
                images.forEach((file) => this.upload(file));

                return;
            }

            const html = data?.getData("text/html");
            const text = data?.getData("text/plain") ?? "";

            this.remember(true);

            if (this.closest("pre")) {
                document.execCommand("insertText", false, text);
            } else if (html) {
                document.execCommand("insertHTML", false, clean(html.replace(/<!--[\s\S]*?-->/g, "")));
            } else {
                document.execCommand("insertText", false, text);
            }

            this.sync();
        },

        dragenter(event) {
            if (!event.dataTransfer?.types?.includes("Files") || !this.canUpload()) {
                return;
            }

            this.depth++;
            this.over = true;
        },

        dragleave() {
            this.depth = Math.max(this.depth - 1, 0);
            this.over = this.depth > 0;
        },

        drop(event) {
            const files = [...(event.dataTransfer?.files ?? [])];

            this.depth = 0;
            this.over = false;

            if (!files.length) {
                return;
            }

            event.preventDefault();

            const range = document.caretRangeFromPoint?.(event.clientX, event.clientY);

            if (range && this.inside(range.startContainer)) {
                const selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(range);
            }

            files.forEach((file) => this.upload(file));
        },

        countLabel() {
            return config.max ? fill(this.label("count", ":count / :max"), { count: this.chars, max: config.max }) : fill(this.label("words", ":count words"), { count: this.words });
        },

        get overLimit() {
            return !!config.max && this.chars > config.max;
        },
    };
}
