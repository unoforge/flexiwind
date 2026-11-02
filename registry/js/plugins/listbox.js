import { Select } from "@flexilla/select";
import { Autocomplete } from "@flexilla/autocomplete";
import { LayerPlugin } from "./layer";

/** L'option fantôme : Flexilla exige au moins une option. */
const NONE = "__fw-none";

/**
 * La copie des résultats serveur vit dans le panneau : ses options portent
 * un autre data-select-id, que Flexilla ignore.
 */
const SOURCE = "__fw-source";

/** Un identifiant par composant de la page, même si Blade en donne deux pareils. */
let sequence = 0;

export function ListboxPlugin(Alpine) {
    LayerPlugin(Alpine);
    Alpine.data("fwListbox", listbox);
}

/**
 * Donne le focus à un élément du panneau dès qu'il peut le prendre :
 * Flexilla affiche le panneau après l'avoir positionné, et un élément
 * encore invisible refuse le focus. Quelques essais suffisent.
 */
function focusWhenShown(resolve, attempts = 20) {
    const element = resolve();

    if (!element) {
        return;
    }

    // Sans défilement : le panneau est positionné, la page ne doit pas sauter.
    element.focus({ preventScroll: true });

    if (document.activeElement !== element && attempts > 0) {
        setTimeout(() => focusWhenShown(resolve, attempts - 1), 25);
    }
}

/** Une URL qu'un modèle peut poser dans src ou href : pas de javascript:. */
function safeUrl(value) {
    return /^(https?:\/\/|\/(?!\/)|#|mailto:|tel:)/i.test(value) ? value : "";
}

/** Un style qu'un modèle peut poser : pas de url(), d'expression() ni d'@import. */
function safeStyle(value) {
    return /url\s*\(|expression\s*\(|@import|javascript:/i.test(value) ? "" : value;
}

/**
 * Remplit un modèle de valeur avec les liaisons de Flexilla. Tout passe par
 * textContent ou des attributs filtrés : une donnée n'est jamais du HTML.
 */
function fill(node, record, onRemove, removeLabel) {
    const all = (selector) => [...(node.matches(selector) ? [node] : []), ...node.querySelectorAll(selector)];

    all("[data-bind]").forEach((element) => {
        element.textContent = record[element.getAttribute("data-bind")] ?? "";
    });

    all("[data-select-label]").forEach((element) => (element.textContent = record.label ?? ""));
    all("[data-select-value]").forEach((element) => (element.textContent = record.value ?? ""));

    for (const attribute of ["src", "href", "alt", "title"]) {
        all(`[data-bind-${attribute}]`).forEach((element) => {
            const raw = record[element.getAttribute(`data-bind-${attribute}`)] ?? "";
            const value = attribute === "src" || attribute === "href" ? safeUrl(raw) : raw;

            if (value) {
                element.setAttribute(attribute, value);
                element.hidden = false;
            } else {
                element.removeAttribute(attribute);

                // Une image sans source ne laisse pas de trou.
                if (attribute === "src") {
                    element.hidden = true;
                }
            }
        });
    }

    all("[data-bind-style]").forEach((element) => {
        const value = safeStyle(record[element.getAttribute("data-bind-style")] ?? "");

        value ? element.setAttribute("style", value) : element.removeAttribute("style");
    });

    all("[data-select-remove]").forEach((button) => {
        if (!button.hasAttribute("aria-label")) {
            button.setAttribute("aria-label", removeLabel.replace(":label", record.label ?? record.value));
        }

        button.addEventListener("click", (event) => {
            event.preventDefault();
            event.stopPropagation();
            onRemove(record.value);
        });
    });
}

function listbox(config = {}) {
    const multiple = Boolean(config.multiple);
    const isAutocomplete = config.kind === "autocomplete";

    // Hors de l'état Alpine : un proxy réactif autour de Flexilla et du DOM n'apporte rien.
    let root = null;
    let key = "";
    let instance = null;
    let syncing = false;
    let resyncQueued = false;
    let refreshQueued = false;
    let previous = [];
    let wasOpen = false;
    let observer = null;
    let searchTimer = null;
    const listeners = [];

    /**
     * Le composant et son panneau. Le panneau vit dans <body> (x-teleport) :
     * on le retrouve par son template, resté dans le composant.
     */
    const scopes = () => [
        root,
        ...[...root.querySelectorAll("template[data-listbox-panel]")].map((template) => template._x_teleport).filter(Boolean),
    ];

    const part = (selector) => {
        for (const scope of scopes()) {
            const found = scope.matches(selector) ? scope : scope.querySelector(selector);

            if (found) {
                return found;
            }
        }

        return null;
    };

    const parts = (selector) => scopes().flatMap((scope) => [...(scope.matches(selector) ? [scope] : []), ...scope.querySelectorAll(selector)]);

    const listen = (target, type, handler, capture = false) => {
        target.addEventListener(type, handler, capture);
        listeners.push(() => target.removeEventListener(type, handler, capture));
    };

    const matches = (query, item) => {
        if (item.value === NONE) {
            return false;
        }

        // Côté serveur, les options reçues sont déjà les résultats.
        if (config.search) {
            return true;
        }

        return !query || (item.label ?? item.value).toLowerCase().includes(query.toLowerCase());
    };

    return {
        value: multiple ? [...(config.value ?? [])] : (config.value ?? null),
        records: {},
        query: "",
        multiple,
        disabled: Boolean(config.disabled),
        inputName: config.name ? config.name + (multiple && !config.name.endsWith("[]") ? "[]" : "") : null,

        init() {
            root = this.$el;
            key = `${root.dataset.listboxId || "listbox"}-${++sequence}`;

            // Le panneau (x-teleport) n'existe qu'une fois les enfants initialisés.
            this.$nextTick(() => this.setup());
        },

        setup() {
            // Copie détachée préparée par Livewire pendant un rendu : rien à brancher.
            if (!root.isConnected) {
                return;
            }

            this.wire();
            this.markSource();
            this.readRecords();
            this.connect();
            this.render();

            this.$watch("value", () => {
                this.push();
                this.render();
            });

            // Entrée choisit une option : sans preventDefault, le navigateur la
            // rejoue en clic sur le déclencheur, qui vient de reprendre le focus,
            // et le panneau se rouvre (ou le formulaire part, depuis l'input).
            // En capture : Flexilla ferme le panneau pendant sa propre écoute.
            for (const scope of scopes()) {
                listen(scope, "keydown", (event) => {
                    if (event.key === "Enter" && instance?.getState().open) {
                        event.preventDefault();
                    }
                }, true);
            }

            listen(root, "click", (event) => {
                if (event.target.closest("[data-listbox-clear]")) {
                    event.preventDefault();
                    this.clear();
                }
            });

            if (isAutocomplete) {
                // En capture : il passe avant Flexilla. Le panneau s'ouvre d'abord :
                // fermé, Flexilla remettrait le libellé choisi par-dessus la saisie.
                listen(root, "input", (event) => {
                    if (!event.target.matches?.("[data-autocomplete-id]")) {
                        return;
                    }

                    if (instance && !instance.getState().open) {
                        instance.open();
                    }

                    this.query = event.target.value;

                    if (config.search) {
                        this.searchServer();
                    }
                }, true);
            }

            const source = part("[data-autocomplete-source]");

            if (config.search && source) {
                observer = new MutationObserver(() => this.queueRefresh());
                // Pas `attributes` : le marquage des options relancerait l'observation.
                observer.observe(source, { childList: true, subtree: true, characterData: true });
            }
        },

        destroy() {
            observer?.disconnect();
            listeners.splice(0).forEach((remove) => remove());
            clearTimeout(searchTimer);
            instance?.cleanup();
            instance = null;
        },

        // ------------------------------------------------------------ lecture

        get values() {
            if (multiple) {
                return Array.isArray(this.value) ? this.value.map(String) : [];
            }

            return this.value === null || this.value === undefined || this.value === "" ? [] : [String(this.value)];
        },

        get hasValue() {
            return this.values.length > 0;
        },

        /** Ce que poste un formulaire : une valeur vide plutôt que rien en mode simple. */
        get formValues() {
            return this.values.length ? this.values : multiple ? [] : [""];
        },

        get canClear() {
            return !this.disabled && (this.query !== "" || (!multiple && this.hasValue));
        },

        /** Le message à la place des options tant que la saisie est trop courte. */
        get hint() {
            if (!isAutocomplete) {
                return "";
            }

            const length = this.query.trim().length;

            if (config.search && length === 0) {
                return config.startText ?? "";
            }

            if (length < (config.minChars ?? 0)) {
                return (config.minCharsText ?? "").replace(":count", config.minChars);
            }

            return "";
        },

        /** Tout ce qu'une option porte : libellé, valeur et ses data-*. */
        record(value) {
            return this.records[value] ?? { value, label: value };
        },

        // ------------------------------------------------------------ pièces

        /** Relie les pièces composées : un identifiant commun, et le libellé à son champ. */
        wire() {
            const content = part("[data-select-content]");
            const field = isAutocomplete
                ? parts("[data-select-input]").find((input) => !content?.contains(input))
                : part("[data-select-trigger]");

            parts("[data-select-trigger], [data-select-content], [data-select-input]").forEach((element) => {
                element.setAttribute("data-select-id", key);
            });

            if (isAutocomplete && field) {
                field.setAttribute("data-autocomplete-id", key);
            }

            // Le libellé du listbox, ou le premier <label> composé sans `for`.
            const label = part("[data-listbox-label]") ?? parts("label").find((element) => !element.htmlFor);

            if (label && field) {
                field.id ||= `${key}-field`;
                label.htmlFor = field.id;
            }
        },

        markSource() {
            part("[data-autocomplete-source]")?.querySelectorAll("[data-select-item]").forEach((element) => {
                element.setAttribute("data-select-id", SOURCE);
            });
        },

        /** Les options en mémoire : ce qu'affiche la valeur, même hors des résultats. */
        readRecords() {
            parts("[data-select-item]").forEach((element) => {
                const value = element.dataset.selectItem;

                if (value === NONE) {
                    return;
                }

                const { selectItem, label, disabled, ...data } = element.dataset;

                this.records[value] = { ...data, value, label: label || element.textContent.trim() || value };
            });
        },

        /** Rend chaque <x-ui.listbox.value> : libellé, puces, lignes, compteur ou liste courte. */
        render() {
            const values = this.values;
            const records = values.map((value) => this.record(value));

            parts("[data-listbox-value]").forEach((container) => {
                const mode = container.dataset.mode || (multiple ? "chips" : "single");
                const template = container.querySelector(":scope > template[data-selected-model]");
                const more = container.querySelector(":scope > template[data-selected-more]");
                const placeholder = container.querySelector(":scope > [data-placeholder]");
                const removeLabel = container.dataset.removeLabel || "Remove :label";

                container.querySelectorAll(":scope > [data-rendered]").forEach((node) => node.remove());

                if (placeholder) {
                    placeholder.hidden = values.length > 0;
                }

                if (!values.length) {
                    return;
                }

                const append = (node) => {
                    node.setAttribute("data-rendered", "");
                    container.insertBefore(node, placeholder);
                };

                const text = (value) => {
                    const span = document.createElement("span");

                    span.className = "truncate";
                    span.textContent = value;
                    append(span);
                };

                const clone = (record) => {
                    const node = template?.content.firstElementChild?.cloneNode(true);

                    if (!node) {
                        return text(record.label);
                    }

                    fill(node, record, (value) => this.remove(value), removeLabel);
                    append(node);
                };

                if (mode === "count") {
                    return text((container.dataset.countText || ":count selected").replace(":count", values.length));
                }

                if (mode === "compact") {
                    const limit = Number(container.dataset.limit) || 2;
                    const labels = records.map((record) => record.label);

                    return text(
                        labels.length <= limit
                            ? labels.join(", ")
                            : (container.dataset.compactText || ":labels and :count more")
                                  .replace(":labels", labels.slice(0, limit).join(", "))
                                  .replace(":count", labels.length - limit),
                    );
                }

                if (mode === "single") {
                    return clone(records[0]);
                }

                const max = Number(container.dataset.max) || 0;

                (max ? records.slice(0, max) : records).forEach(clone);

                if (max && records.length > max) {
                    const node = more?.content.firstElementChild?.cloneNode(true);

                    if (node) {
                        fill(node, { count: String(records.length - max) }, () => {}, removeLabel);
                        append(node);
                    } else {
                        text(`+${records.length - max}`);
                    }
                }
            });
        },

        // ------------------------------------------------------------ actions

        remove(value) {
            this.value = multiple ? this.values.filter((item) => item !== String(value)) : null;
        },

        clear() {
            this.value = multiple ? [] : null;
        },

        clearInput() {
            const input = part("[data-autocomplete-id]");

            input.value = "";
            this.query = "";
            instance?.setSearch("");

            if (!multiple) {
                this.value = null;
            }

            input.focus();
        },

        searchServer() {
            clearTimeout(searchTimer);

            const query = this.query.trim();

            if (query.length > 0 && query.length < (config.minChars ?? 0)) {
                return;
            }

            searchTimer = setTimeout(() => this.$wire?.$set(config.search, query), config.debounce ?? 300);
        },

        // ------------------------------------------------------------ Flexilla

        connect() {
            const options = { multiple, filter: matches, experimental: { teleport: false } };

            instance = isAutocomplete
                ? new Autocomplete(part("[data-autocomplete-id]"), { ...options, searchDebounce: config.search ? 0 : 100 })
                : new Select(part("[data-select-content]"), options);

            this.push();
            instance.subscribe((state) => this.onState(state));
        },

        /** Recrée l'instance après un changement d'options, sans perdre l'ouverture. */
        reconnect() {
            const input = part("[data-autocomplete-id]");
            const reopen = instance?.getState().open || (input && document.activeElement === input);

            instance?.cleanup();
            instance = null;
            wasOpen = false;
            this.connect();

            if (reopen) {
                instance.open();
            }
        },

        queueRefresh() {
            if (refreshQueued) {
                return;
            }

            refreshQueued = true;

            setTimeout(() => {
                refreshQueued = false;

                const list = part("[data-listbox-list]");
                const none = list.querySelector(`[data-select-item="${NONE}"]`);
                this.markSource();

                const fresh = [...part("[data-autocomplete-source]").children].map((node) => {
                    const copy = node.cloneNode(true);

                    [copy, ...copy.querySelectorAll("[data-select-item]")].forEach((element) => {
                        if (element.getAttribute("data-select-id") === SOURCE) {
                            element.removeAttribute("data-select-id");
                        }
                    });

                    return copy;
                });

                list.replaceChildren(...[none, ...fresh].filter(Boolean));
                this.readRecords();
                this.reconnect();
                this.render();
            });
        },

        /** Alpine → Flexilla : coche ce qui est choisi parmi les options affichées. */
        push() {
            if (!instance) {
                return;
            }

            const want = this.values;
            const have = instance.getState().selectedValues;

            syncing = true;

            try {
                have.filter((value) => !want.includes(value)).forEach((value) => instance.unselect(value));
                want.filter((value) => !have.includes(value) && instance.hasItem(value)).forEach((value) => instance.select(value));
            } finally {
                syncing = false;
                previous = [...instance.getState().selectedValues];
            }
        },

        /** Flexilla → Alpine : seul un choix de la personne change la valeur. */
        onState(state) {
            const next = state.selectedValues;

            if (!syncing) {
                const added = next.filter((value) => !previous.includes(value));
                // Une option désenregistrée par le filtre n'est pas désélectionnée.
                const removed = previous.filter((value) => !next.includes(value) && instance?.hasItem(value));

                if (added.length || removed.length) {
                    if (multiple) {
                        const kept = this.values.filter((value) => !removed.includes(value));

                        added.forEach((value) => kept.includes(value) || kept.push(value));
                        this.value = kept;

                        // Autocomplete multiple : le texte tapé a servi, place à la suivante.
                        if (isAutocomplete && added.length && this.query !== "") {
                            part("[data-autocomplete-id]").value = "";
                            this.query = "";
                            queueMicrotask(() => instance?.setSearch(""));
                        }
                    } else {
                        this.value = added.length ? added[added.length - 1] : null;
                    }
                }

                this.queueResync();
            }

            previous = [...next];

            if (state.open !== wasOpen) {
                wasOpen = state.open;
                state.open ? this.onOpen() : this.onClose();
            }
        },

        queueResync() {
            if (resyncQueued) {
                return;
            }

            resyncQueued = true;

            queueMicrotask(() => {
                resyncQueued = false;
                this.push();
            });
        },

        onOpen() {
            const content = part("[data-select-content]");
            const search = !isAutocomplete && content.querySelector("[data-select-input]");

            // Le panneau s'ouvre sur l'option choisie, pas sur la première.
            const selected = instance.getState().items.findIndex((item) => this.values.includes(item.value));

            if (selected >= 0) {
                instance.highlight(selected);

                // Ouvert au clavier, Flexilla a mis le focus sur la première option.
                setTimeout(() => {
                    const value = instance?.getState().items[selected]?.value ?? "";
                    const option = content.querySelector(`[data-select-item="${CSS.escape(value)}"]`);

                    if (!search && option && content.contains(document.activeElement) && document.activeElement !== option) {
                        focusWhenShown(() => option);
                    }
                });
            }

            if (search) {
                focusWhenShown(() => search);
            }
        },

        onClose() {
            // Le listbox rouvre sur toute la liste.
            const search = !isAutocomplete && part("[data-select-content] [data-select-input]");

            if (search && search.value !== "") {
                search.value = "";
                instance?.setSearch("");
            }
        },
    };
}
