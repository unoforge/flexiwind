/**
 * Étiquettes Flexiwind : <x-ui.tag-group> et <x-ui.tag-input>.
 *
 * La valeur vit dans Alpine (`value`, exposée par x-modelable) : wire:model
 * reçoit une chaîne ou un vrai tableau, et un formulaire classique reçoit un
 * champ caché par valeur (`name[]`).
 *
 * Ce qui est tapé reste du texte : il est affiché avec x-text, jamais en
 * HTML. Les règles du navigateur (e-mail, motif, maximum) aident la saisie ;
 * Livewire doit valider à nouveau ce qu'il reçoit.
 */

export function TagsPlugin(Alpine) {
    Alpine.data("fwTagGroup", tagGroup);
    Alpine.data("fwTagInput", tagInput);
}

/** Un identifiant par composant de la page, même si Blade en donne deux pareils. */
let sequence = 0;

const EMAIL = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function fill(text, values) {
    return Object.entries(values).reduce((result, [key, value]) => result.replaceAll(`:${key}`, value), text ?? "");
}

// ------------------------------------------------------------------ groupe

function tagGroup(config = {}) {
    const list = config.multiple || config.removable;
    // La racine : dans un gestionnaire posé sur un enfant, $el désigne cet enfant.
    let root = null;

    return {
        value: config.value ?? (list ? [] : null),
        inputName: config.name ? config.name + (list && !config.name.endsWith("[]") ? "[]" : "") : null,

        init() {
            root = this.$el;

            // Une liste à retirer sans valeur de départ : toutes les étiquettes affichées.
            if (config.removable && config.value === null) {
                this.value = this.tags().map((tag) => tag.dataset.value);
            }

            this.$nextTick(() => this.syncTabStops());
            this.$watch("value", () => this.$nextTick(() => this.syncTabStops()));
        },

        get selected() {
            if (Array.isArray(this.value)) {
                return this.value.map(String);
            }

            return this.value === null || this.value === undefined || this.value === "" ? [] : [String(this.value)];
        },

        get formValues() {
            return this.selected.length ? this.selected : list ? [] : [""];
        },

        tags() {
            return [...root.querySelectorAll('[data-slot="tag"][data-value]')];
        },

        fwTagIsOn(value) {
            return this.selected.includes(String(value));
        },

        fwTagIsHidden(value) {
            return config.removable && !this.selected.includes(String(value));
        },

        fwTagToggle(value) {
            value = String(value);

            if (!config.multiple) {
                this.value = this.value === value ? null : value;

                return;
            }

            this.value = this.fwTagIsOn(value) ? this.selected.filter((item) => item !== value) : [...this.selected, value];
        },

        fwTagRemove(value, from) {
            if (!config.removable) {
                return;
            }

            const stops = this.stops();
            const index = stops.indexOf(from);

            this.value = this.selected.filter((item) => item !== String(value));

            // Le focus passe à la voisine, sinon il se perdrait avec le bouton retiré.
            this.$nextTick(() => {
                const next = this.stops();
                const target = next[Math.min(Math.max(index, 0), next.length - 1)];
                target?.focus();
            });
        },

        // ------------------------------------------------------------ clavier

        /** Les éléments qui prennent le focus : boutons à presser ou boutons de retrait visibles. */
        stops() {
            // D'après la valeur, pas l'affichage : x-show n'a pas encore masqué une étiquette retirée.
            return [...root.querySelectorAll("[data-tag-focus]")].filter((element) => {
                const tag = element.closest('[data-slot="tag"]');

                return !element.disabled && !(tag && this.fwTagIsHidden(tag.dataset.value));
            });
        },

        /** Une seule tabulation entre dans le groupe ; les flèches font le reste. */
        syncTabStops(current = null) {
            const stops = this.stops();
            const active = current ?? stops.find((stop) => stop.getAttribute("aria-pressed") === "true") ?? stops[0];

            stops.forEach((stop) => stop.setAttribute("tabindex", stop === active ? "0" : "-1"));
        },

        onKeydown(event) {
            const stops = this.stops();
            const index = stops.indexOf(document.activeElement);

            if (index === -1) {
                return;
            }

            const moves = { ArrowRight: 1, ArrowDown: 1, ArrowLeft: -1, ArrowUp: -1 };
            let next = null;

            if (event.key in moves) {
                next = stops[(index + moves[event.key] + stops.length) % stops.length];
            } else if (event.key === "Home") {
                next = stops[0];
            } else if (event.key === "End") {
                next = stops[stops.length - 1];
            } else if ((event.key === "Backspace" || event.key === "Delete") && config.removable) {
                event.preventDefault();
                const tag = document.activeElement.closest('[data-slot="tag"]');
                this.fwTagRemove(tag?.dataset.value, document.activeElement);

                return;
            }

            if (next) {
                event.preventDefault();
                this.syncTabStops(next);
                next.focus();
            }
        },
    };
}

// ------------------------------------------------------------------ champ

function tagInput(config = {}) {
    const texts = config.texts ?? {};
    const separators = config.separators?.length ? config.separators : [","];
    const pattern = config.pattern ? safeRegExp(config.pattern) : null;
    let key = "";
    let searchTimer = null;
    let observer = null;
    let root = null;

    return {
        value: (config.value ?? []).map(String),
        draft: "",
        open: false,
        active: -1,
        announcement: "",
        source: [],
        inputName: config.name ? config.name + (config.name.endsWith("[]") ? "" : "[]") : null,

        init() {
            root = this.$el;
            key = `${root.id || "tag-input"}-${++sequence}`;
            const script = root.querySelector("script[data-tag-suggestions]");

            if (script) {
                this.readSuggestions(script);
                // Livewire réécrit la liste après une recherche : on la relit.
                observer = new MutationObserver(() => this.readSuggestions(script));
                observer.observe(script, { childList: true, characterData: true, subtree: true });
            }

            this.$watch("value", (value) => {
                // wire:model peut renvoyer null ou une chaîne.
                if (!Array.isArray(value)) {
                    this.value = value === null || value === undefined || value === "" ? [] : [String(value)];
                }
            });
        },

        destroy() {
            observer?.disconnect();
            clearTimeout(searchTimer);
        },

        readSuggestions(script) {
            try {
                const parsed = JSON.parse(script.textContent || "[]");
                this.source = Array.isArray(parsed) ? parsed.map(String) : [];
            } catch {
                this.source = [];
            }

            // Des résultats arrivent pendant la frappe : le panneau s'ouvre.
            const focused = document.activeElement === this.$refs.input;
            this.open = focused && this.draft.trim() !== "" && this.options.length > 0;
            this.active = this.open ? Math.min(Math.max(this.active, 0), this.options.length - 1) : -1;
        },

        // ------------------------------------------------------------ lecture

        get full() {
            return config.max !== null && config.max !== undefined && this.value.length >= config.max;
        },

        get invalidTags() {
            return this.value.filter((tag) => !this.isValid(tag));
        },

        get countLabel() {
            return fill(texts.count, { count: this.value.length, max: config.max ?? "" });
        },

        get statusText() {
            if (this.invalidTags.length) {
                return fill(texts.invalid, { label: this.invalidTags[0] });
            }

            if (this.full && texts.max) {
                return texts.max;
            }

            return texts.hint ?? "";
        },

        get activeId() {
            return this.open && this.active >= 0 ? this.optionId(this.active) : null;
        },

        /** Les suggestions qui contiennent le texte tapé, puis « Créer… ». */
        get options() {
            const query = this.draft.trim();
            const needle = query.toLowerCase();
            const taken = new Set(this.value.map((tag) => tag.toLowerCase()));
            const options = this.source
                .filter((item) => !taken.has(item.toLowerCase()) && (!needle || item.toLowerCase().includes(needle)))
                .slice(0, 8)
                .map((item) => {
                    const at = needle ? item.toLowerCase().indexOf(needle) : -1;

                    return {
                        key: `s:${item}`,
                        value: item,
                        create: false,
                        before: at >= 0 ? item.slice(0, at) : item,
                        match: at >= 0 ? item.slice(at, at + needle.length) : "",
                        after: at >= 0 ? item.slice(at + needle.length) : "",
                    };
                });

            const exists = options.some((option) => option.value.toLowerCase() === needle);

            if (config.create && query && !exists && !taken.has(needle)) {
                options.push({ key: `c:${query}`, value: query, create: true, before: fill(texts.create, { query }), match: "", after: "" });
            }

            return options;
        },

        optionId(index) {
            return `${key}-option-${index}`;
        },

        isValid(tag) {
            if (config.type === "email") {
                return EMAIL.test(tag);
            }

            if (config.type === "url") {
                try {
                    return ["http:", "https:"].includes(new URL(tag).protocol);
                } catch {
                    return false;
                }
            }

            return pattern ? pattern.test(tag) : true;
        },

        removeLabel(tag) {
            return fill(texts.remove, { label: tag });
        },

        // ------------------------------------------------------------ écriture

        /** Ajoute un ou plusieurs textes ; renvoie le nombre d'étiquettes ajoutées. */
        add(text) {
            if (config.disabled) {
                return 0;
            }

            const parts = split(String(text), separators);
            const added = [];

            for (const part of parts) {
                const tag = part.trim();
                const exists = [...this.value, ...added].some((item) => item.toLowerCase() === tag.toLowerCase());

                if (!tag || exists || this.full || (config.max && this.value.length + added.length >= config.max)) {
                    continue;
                }

                added.push(tag);
            }

            if (added.length) {
                this.value = [...this.value, ...added];
                this.announcement = added.join(", ");
            }

            return added.length;
        },

        remove(index) {
            const [removed] = this.value.splice(index, 1);
            this.value = [...this.value];
            this.announcement = removed ? this.removeLabel(removed) : "";
            this.$nextTick(() => this.$refs.input?.focus());
        },

        pick(option) {
            this.add(option.value);
            this.draft = "";
            this.close();
            this.$refs.input?.focus();
        },

        close() {
            this.open = false;
            this.active = -1;
        },

        focusInput(event) {
            if (!event.target.closest("button") && !config.disabled) {
                this.$refs.input?.focus();
            }
        },

        // ------------------------------------------------------------ événements

        onInput() {
            if (this.full) {
                this.draft = "";

                return;
            }

            // Un séparateur tapé ou collé : tout ce qui précède devient étiquette.
            if (separators.some((separator) => this.draft.includes(separator)) || /\n/.test(this.draft)) {
                const parts = split(this.draft, separators);
                const rest = parts.pop() ?? "";
                this.add(parts.join(separators[0]));
                this.draft = rest.trimStart();
            }

            this.open = this.hasPanel() && this.draft.trim() !== "" && this.options.length > 0;
            this.active = this.open ? 0 : -1;
            this.searchServer();
        },

        onPaste(event) {
            const text = event.clipboardData?.getData("text") ?? "";

            if (separators.some((separator) => text.includes(separator)) || /\n/.test(text)) {
                event.preventDefault();
                this.add(text);
            }
        },

        onBlur() {
            // Un texte laissé dans le champ n'est pas perdu.
            if (this.draft.trim() && !this.open) {
                this.add(this.draft);
                this.draft = "";
            }

            setTimeout(() => this.close(), 0);
        },

        onKeydown(event) {
            const options = this.options;

            // À la limite, le champ ne prend plus de texte ; Retour arrière retire encore.
            if (this.full && event.key.length === 1 && !event.metaKey && !event.ctrlKey) {
                event.preventDefault();

                return;
            }

            if (event.key === "ArrowDown" || event.key === "ArrowUp") {
                if (!this.hasPanel()) {
                    return;
                }

                event.preventDefault();
                this.open = true;

                if (options.length) {
                    const step = event.key === "ArrowDown" ? 1 : -1;
                    this.active = (this.active + step + options.length) % options.length;
                }

                return;
            }

            if (event.key === "Enter") {
                // Jamais d'envoi du formulaire depuis ce champ.
                event.preventDefault();

                if (this.open && options[this.active]) {
                    this.pick(options[this.active]);
                } else if (this.draft.trim()) {
                    this.add(this.draft);
                    this.draft = "";
                    this.close();
                }

                return;
            }

            if (event.key === "Escape" && this.open) {
                event.preventDefault();
                this.close();

                return;
            }

            if (event.key === "Backspace" && this.draft === "" && this.value.length) {
                event.preventDefault();
                this.remove(this.value.length - 1);
            }
        },

        hasPanel() {
            return root.querySelector("script[data-tag-suggestions]") !== null;
        },

        searchServer() {
            if (!config.search) {
                return;
            }

            clearTimeout(searchTimer);
            const query = this.draft.trim().slice(0, 100);
            searchTimer = setTimeout(() => this.$wire?.$set(config.search, query), config.debounce ?? 300);
        },
    };
}

function split(text, separators) {
    const escaped = separators.map((separator) => separator.replace(/[.*+?^${}()|[\]\\]/g, "\\$&"));

    return text.split(new RegExp(`${escaped.join("|")}|\\r?\\n`));
}

function safeRegExp(source) {
    try {
        return new RegExp(`^(?:${source})$`);
    } catch {
        return null;
    }
}
