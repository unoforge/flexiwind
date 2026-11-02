import { OffCanvas as FlexillaOffcanvas } from "@flexilla/offcanvas";
import { LayerPlugin } from "./layer";

function instanceOf(Alpine, id) {
    return Alpine.store("sheets")?.[id] ?? null;
}

/** Flexilla laisse overflow-y: auto sur <body> : on rend le style d'origine. */
function releaseBodyScroll() {
    const stillOpen = document.querySelector("[data-fx-offcanvas][data-state=open], dialog[data-fx-modal][open]");

    if (!stillOpen) {
        document.body.style.removeProperty("overflow");
        document.body.style.removeProperty("overflow-y");
    }
}

export function OffcanvasPlugin(Alpine) {
    LayerPlugin(Alpine);

    if (!Alpine.store("sheets")) {
        Alpine.store("sheets", {});
    }

    Alpine.directive("offcanvas", (el, {}, { cleanup }) => {
        const offcanvasId = el.getAttribute("id");

        if (!offcanvasId) {
            console.error("❌ id is required but missing on element:", el);
            return;
        }

        let instance = null;
        let disposed = false;

        const overlay = () => el.parentElement?.querySelector(`[data-slideover-overlay][data-sheet="${CSS.escape(offcanvasId)}"]`);

        const onOpen = () => overlay()?.setAttribute("data-state", "open");

        const onClose = () => {
            overlay()?.setAttribute("data-state", "close");
            queueMicrotask(releaseBodyScroll);
        };

        const setup = () => {
            // Copie détachée préparée par Livewire : pas d'instance.
            if (disposed || !el.isConnected) {
                return;
            }

            instance = new FlexillaOffcanvas(el);

            // Une seule ouverture à la fois : une deuxième verrouillerait la page deux fois.
            const open = instance.openOffCanvas.bind(instance);
            instance.openOffCanvas = () => {
                if (el.getAttribute("data-state") !== "open") {
                    open();
                }
            };

            Alpine.store("sheets")[offcanvasId] = instance;
            el.addEventListener("offcanvas-open", onOpen);
            el.addEventListener("offcanvas-close", onClose);
        };

        // Alpine lance la directive avant que Livewire ait inséré l'élément dans la page.
        el.isConnected ? setup() : queueMicrotask(setup);

        cleanup(() => {
            disposed = true;
            el.removeEventListener("offcanvas-open", onOpen);
            el.removeEventListener("offcanvas-close", onClose);
            overlay()?.setAttribute("data-state", "close");

            if (!instance) {
                return;
            }

            if (el.getAttribute("data-state") === "open") {
                instance.closeOffCanvas();
            }

            // Flexilla branche closeFromCloseBtn mais retire closeOffCanvas : on retire le bon.
            for (const button of instance.offCanvasCloseBtns) {
                button.removeEventListener("click", instance.closeFromCloseBtn);
            }

            instance.cleanup();
            // Un overlay créé par Flexilla (data-offcanvas-backdrop écrit à la main).
            document.querySelectorAll(`[data-fx-offcanvas-overlay][data-offcanvas-el="${CSS.escape(offcanvasId)}"]`).forEach((element) => element.remove());

            if (Alpine.store("sheets")[offcanvasId] === instance) {
                delete Alpine.store("sheets")[offcanvasId];
            }

            releaseBodyScroll();
        });
    });

    // Boutons rendus après l'initialisation du panneau : Flexilla ne les connaît pas.
    document.addEventListener("click", (event) => {
        const trigger = event.target.closest("[data-offcanvas-trigger][data-target]");

        if (trigger) {
            const instance = instanceOf(Alpine, trigger.dataset.target);

            if (instance && !instance.offCanvasTriggers.includes(trigger)) {
                instance.changeState();
            }

            return;
        }

        // L'overlay du Blade : un clic ferme le panneau, sauf s'il est statique.
        const backdrop = event.target.closest("[data-slideover-overlay]");

        if (backdrop) {
            const instance = instanceOf(Alpine, backdrop.dataset.sheet);

            if (instance && !instance.staticBackdrop) {
                instance.closeOffCanvas();
            }

            return;
        }

        const closer = event.target.closest("[data-offcanvas-close]");
        const panel = closer?.closest("[data-fx-offcanvas]");
        const instance = panel && instanceOf(Alpine, panel.id);

        if (instance && !instance.offCanvasCloseBtns.includes(closer)) {
            event.preventDefault();
            instance.closeOffCanvas();
        }
    });

    Alpine.magic("offcanvas", () => (id) => {
        const instance = instanceOf(Alpine, id);

        if (!instance) {
            console.warn(`⚠️ No offcanvas instance found for ID: ${id}`);
        }

        return instance;
    });
}
