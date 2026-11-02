/**
 * Menu de commandes Flexiwind : <x-ui.command-menu>.
 *
 * Un <dialog> natif : il garde le focus, se ferme avec Échap et rend le
 * focus à ce qui l'a ouvert. Le champ garde le focus pendant qu'on choisit
 * (combobox + aria-activedescendant) ; les éléments sont de vrais liens ou
 * boutons, activés par un clic ou Entrée.
 *
 * Le filtre lit le texte des éléments et leurs `data-keywords`. La partie
 * trouvée est mise en gras avec des nœuds texte : jamais de HTML écrit.
 */

export function CommandMenuPlugin(Alpine) {
    Alpine.data("fwCommandMenu", commandMenu);

    // Ailleurs dans la page : window.dispatchEvent(new CustomEvent('command-menu:open')).
    Alpine.magic("commandMenu", () => ({
        open: (id = null) => window.dispatchEvent(new CustomEvent("command-menu:open", { detail: { id } })),
    }));
}

let sequence = 0;

const isMac = () => /Mac|iPhone|iPad/.test(navigator.platform || navigator.userAgent);

function parseShortcut(value) {
    if (!value) {
        return null;
    }

    const parts = String(value).toLowerCase().split("+");

    return { key: parts.pop(), mod: parts.includes("mod"), ctrl: parts.includes("ctrl"), shift: parts.includes("shift"), alt: parts.includes("alt") };
}

function matchesShortcut(event, shortcut) {
    const mod = isMac() ? event.metaKey : event.ctrlKey;

    return (
        event.key.toLowerCase() === shortcut.key &&
        (!shortcut.mod || mod) &&
        (!shortcut.ctrl || event.ctrlKey) &&
        shortcut.shift === event.shiftKey &&
        shortcut.alt === event.altKey
    );
}

function commandMenu(config = {}) {
    const shortcut = parseShortcut(config.shortcut);
    let key = "";
    let searchTimer = null;
    let observer = null;
    let onWindowKeydown = null;
    let onOpenEvent = null;

    return {
        query: "",
        page: null,
        pageLabel: "",
        active: -1,
        activeId: null,
        loading: false,

        init() {
            key = `${this.$el.id || "command-menu"}-${++sequence}`;
            this.localizeKeys(this.$el);

            onWindowKeydown = (event) => {
                if (shortcut && matchesShortcut(event, shortcut)) {
                    event.preventDefault();
                    this.isOpen() ? this.close() : this.open();
                }
            };
            onOpenEvent = (event) => {
                if (!event.detail?.id || event.detail.id === this.$el.id) {
                    this.open();
                }
            };

            window.addEventListener("keydown", onWindowKeydown);
            window.addEventListener("command-menu:open", onOpenEvent);

            // Livewire remplace des éléments (résultats d'une recherche) : on refiltre.
            observer = new MutationObserver(() => {
                this.loading = false;
                this.localizeKeys(this.$refs.list);
                this.filter();
            });
            observer.observe(this.$refs.list, { childList: true, subtree: true });

            this.$refs.list.addEventListener("click", (event) => this.onItemClick(event));
            this.$refs.list.addEventListener("mousemove", (event) => {
                const item = event.target.closest("[data-command-item]");
                const index = this.visibleItems().indexOf(item);

                if (item && index !== -1 && index !== this.active) {
                    this.setActive(index, false);
                }
            });

            this.filter();
        },

        destroy() {
            window.removeEventListener("keydown", onWindowKeydown);
            window.removeEventListener("command-menu:open", onOpenEvent);
            observer?.disconnect();
            clearTimeout(searchTimer);
        },

        /** ⌘ et ⌥ sur un Mac, Ctrl et Alt ailleurs. */
        localizeKeys(root) {
            if (!isMac()) {
                return;
            }

            const symbols = { mod: "⌘", alt: "⌥" };

            root.querySelectorAll("kbd[data-key]").forEach((kbd) => {
                const symbol = symbols[kbd.dataset.key];

                if (symbol && kbd.textContent !== symbol) {
                    kbd.textContent = symbol;
                }
            });
        },

        // ------------------------------------------------------------ ouverture

        isOpen() {
            return this.$refs.dialog.open;
        },

        open() {
            if (this.isOpen()) {
                return;
            }

            this.reset();
            this.$refs.dialog.showModal();
            this.$nextTick(() => this.$refs.input.focus());
        },

        close() {
            if (this.isOpen()) {
                this.$refs.dialog.close();
            }
        },

        onClose() {
            const searched = this.query.trim() !== "";
            this.reset();

            // Les résultats serveur de la recherche précédente ne reviennent pas à la réouverture.
            if (config.search && searched && this.$wire) {
                clearTimeout(searchTimer);
                this.$wire.$set(config.search, "");
            }
        },

        reset() {
            this.query = "";
            this.page = null;
            this.pageLabel = "";
            this.filter();
        },

        // ------------------------------------------------------------ filtre

        items() {
            return [...this.$refs.list.querySelectorAll("[data-command-item]")];
        },

        visibleItems() {
            return this.items().filter((item) => !item.hidden && !item.closest("[hidden]") && !item.disabled);
        },

        /** L'élément appartient-il à la page affichée (ou à l'accueil) ? */
        inCurrentPage(element) {
            const owner = element.closest("[data-command-page]");

            return this.page === null ? owner === null : owner?.dataset.commandPage === this.page;
        },

        filter() {
            const needle = this.query.trim().toLowerCase();
            const words = needle.split(/\s+/).filter(Boolean);
            const list = this.$refs.list;

            list.querySelectorAll("[data-command-page]").forEach((page) => {
                page.hidden = page.dataset.commandPage !== this.page;
            });

            this.items().forEach((item) => {
                const label = item.querySelector("[data-command-label]") ?? item;
                const text = `${label.textContent} ${item.dataset.keywords ?? ""}`.toLowerCase();
                const free = item.closest("[data-command-static]") !== null;
                const shown = this.inCurrentPage(item) && (free || words.every((word) => text.includes(word)));

                item.hidden = !shown;
                this.mark(label, shown && !free ? needle : "");
            });

            list.querySelectorAll("[data-command-group]").forEach((group) => {
                group.hidden = !this.inCurrentPage(group) || !group.querySelector("[data-command-item]:not([hidden])");
            });

            list.querySelectorAll("[data-command-separator]").forEach((separator) => {
                separator.hidden = needle !== "" || !this.inCurrentPage(separator);
            });

            const empty = list.querySelector("[data-command-empty]");

            if (empty) {
                empty.hidden = this.loading || this.visibleItems().length > 0;
                empty.querySelectorAll("[data-command-query]").forEach((element) => (element.textContent = this.query.trim()));
            }

            this.setActive(this.visibleItems().length ? 0 : -1);

            // Nos propres changements (gras, ids) ne relancent pas le filtre.
            observer?.takeRecords();
        },

        /** Met en gras la partie trouvée, avec des nœuds texte. */
        mark(label, needle) {
            if (label.dataset.commandText === undefined) {
                // Seuls les libellés en texte simple sont touchés.
                if (label.children.length) {
                    return;
                }

                label.dataset.commandText = label.textContent;
            }

            const text = label.dataset.commandText;
            const at = needle ? text.toLowerCase().indexOf(needle) : -1;

            label.replaceChildren();

            if (at === -1) {
                label.textContent = text;

                return;
            }

            const strong = document.createElement("span");
            strong.className = "font-semibold text-title-foreground";
            strong.textContent = text.slice(at, at + needle.length);
            label.append(text.slice(0, at), strong, text.slice(at + needle.length));
        },

        setActive(index, scroll = true) {
            const items = this.visibleItems();

            this.items().forEach((item) => item.setAttribute("aria-selected", "false"));
            this.active = index;

            const item = items[index];

            if (!item) {
                this.activeId = null;

                return;
            }

            item.id ||= `${key}-item-${this.items().indexOf(item)}`;
            item.setAttribute("aria-selected", "true");
            this.activeId = item.id;

            if (scroll) {
                item.scrollIntoView({ block: "nearest" });
            }
        },

        // ------------------------------------------------------------ actions

        activate(item) {
            if (!item || item.disabled) {
                return;
            }

            item.click();
        },

        onItemClick(event) {
            const item = event.target.closest("[data-command-item]");

            if (!item || item.disabled) {
                return;
            }

            if (item.dataset.page) {
                event.preventDefault();
                this.openPage(item.dataset.page);

                return;
            }

            // Le lien suit son cours, l'action Livewire part ; le menu se ferme.
            if (!item.hasAttribute("data-keep-open")) {
                this.close();
            }
        },

        openPage(name) {
            const page = this.$refs.list.querySelector(`[data-command-page="${CSS.escape(name)}"]`);

            if (!page) {
                return;
            }

            this.page = name;
            this.pageLabel = page.dataset.label ?? name;
            this.query = "";
            this.filter();
            this.$refs.input.focus();
        },

        back() {
            this.page = null;
            this.pageLabel = "";
            this.filter();
        },

        // ------------------------------------------------------------ clavier

        onInput() {
            this.filter();

            if (config.search) {
                clearTimeout(searchTimer);
                this.loading = true;
                const query = this.query.trim().slice(0, 100);

                searchTimer = setTimeout(() => {
                    const done = () => {
                        this.loading = false;
                        this.filter();
                    };

                    this.$wire ? Promise.resolve(this.$wire.$set(config.search, query)).finally(done) : done();
                }, config.debounce ?? 250);
            }
        },

        onKeydown(event) {
            const items = this.visibleItems();

            if (event.key === "ArrowDown" || event.key === "ArrowUp") {
                event.preventDefault();

                if (items.length) {
                    const step = event.key === "ArrowDown" ? 1 : -1;
                    this.setActive((this.active + step + items.length) % items.length);
                }
            } else if (event.key === "Enter") {
                event.preventDefault();
                this.activate(items[this.active]);
            } else if (event.key === "Escape") {
                event.preventDefault();
                this.close();
            } else if (event.key === "Backspace" && this.query === "" && this.page !== null) {
                event.preventDefault();
                this.back();
            }
        },
    };
}
