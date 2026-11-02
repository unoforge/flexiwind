/**
 * Groupes de boutons à presser Flexiwind : <x-ui.toggle-group>.
 *
 * `single` se comporte comme des boutons radio (une valeur, les flèches la
 * déplacent) ; `multiple` comme une barre d'outils (un tableau, les flèches
 * déplacent seulement le focus). Une seule tabulation entre dans le groupe.
 */

export function ToggleGroupPlugin(Alpine) {
    Alpine.data("fwToggleGroup", toggleGroup);
}

function toggleGroup(config = {}) {
    const multiple = !!config.multiple;
    let root = null;

    return {
        value: config.value ?? (multiple ? [] : null),
        inputName: config.name ? config.name + (multiple && !config.name.endsWith("[]") ? "[]" : "") : null,

        init() {
            root = this.$el;
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
            return this.selected.length ? this.selected : multiple ? [] : [""];
        },

        fwIsOn(value) {
            return this.selected.includes(String(value));
        },

        fwToggle(value) {
            value = String(value);

            if (multiple) {
                this.value = this.fwIsOn(value) ? this.selected.filter((item) => item !== value) : [...this.selected, value];

                return;
            }

            // `required` : la valeur choisie ne se retire pas.
            if (this.fwIsOn(value)) {
                if (!config.required) {
                    this.value = null;
                }

                return;
            }

            this.value = value;
        },

        stops() {
            return [...root.querySelectorAll("[data-toggle-stop]")].filter((stop) => !stop.disabled);
        },

        syncTabStops(current = null) {
            const stops = this.stops();
            const active = current ?? stops.find((stop) => stop.hasAttribute("data-on")) ?? stops[0];

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
                // De droite à gauche, les flèches horizontales s'inversent.
                const flipped = getComputedStyle(root).direction === "rtl" && (event.key === "ArrowLeft" || event.key === "ArrowRight");
                const step = flipped ? -moves[event.key] : moves[event.key];
                next = stops[(index + step + stops.length) % stops.length];
            } else if (event.key === "Home") {
                next = stops[0];
            } else if (event.key === "End") {
                next = stops[stops.length - 1];
            }

            if (!next) {
                return;
            }

            event.preventDefault();
            this.syncTabStops(next);
            next.focus();

            // Comme des boutons radio : le focus emporte la valeur.
            if (!multiple) {
                this.value = next.dataset.value;
            }
        },
    };
}
