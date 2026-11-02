import { Modal as FlexillaModal } from "@flexilla/modal";

/** Au-delà de la durée de l'animation de sortie, on n'attend plus animationend. */
const CLOSE_MARGIN = 150;

function instanceOf(Alpine, id) {
    return Alpine.store("modals")?.[id] ?? null;
}

/** Flexilla met overflow: hidden puis overflowY: auto : on rend le style d'origine. */
function releaseBodyScroll() {
    if (!document.querySelector("dialog[data-fx-modal][open]")) {
        document.body.style.removeProperty("overflow");
        document.body.style.removeProperty("overflow-y");
    }
}

/** Ferme sans attendre l'animation : ce que Flexilla fait à la fin de hideModal. */
function forceClose(instance, el) {
    if (!el.open) {
        return;
    }

    instance.closeModal();
    instance.closeLastAction();
    el.close("modal-closed");
}

function exitDuration(content) {
    return (parseFloat(getComputedStyle(content).animationDuration) || 0) * 1000;
}

export function ModalPlugin(Alpine) {
    if (!Alpine.store("modals")) {
        Alpine.store("modals", {});
    }

    Alpine.directive("f-modal", (el, {}, { cleanup }) => {
        const modalId = el.getAttribute("data-modal-id");

        if (!modalId) {
            console.error("❌ data-modal-id is required but missing on element:", el);
            return;
        }
        if (!(el instanceof HTMLDialogElement)) {
            console.error("❌ x-f-modal must be used only on an HTMLDialogElement:", el);
            return;
        }
        const content = el.querySelector("[data-modal-content]");
        if (!content) {
            console.error("❌ data-modal-content Element is required but missing in Modal Element:", el);
            return;
        }

        let instance = null;
        let observer = null;
        let fallback = null;
        let disposed = false;

        // `modal-close` vient de Flexilla (closeModal), juste avant dialog.close() :
        // on rend le défilement une microtâche plus tard, le dialog alors fermé.
        // L'événement natif `close` couvre une fermeture faite hors de Flexilla.
        const onDialogClose = () => {
            clearTimeout(fallback);
            queueMicrotask(releaseBodyScroll);
        };

        const setup = () => {
            // Copie détachée préparée par Livewire : pas d'instance.
            if (disposed || !el.isConnected) {
                return;
            }

            instance = new FlexillaModal(el, { dispatchEventToDocument: false });
            Alpine.store("modals")[modalId] = instance;

            // Le contenu passe à data-state="close" : si animationend ne vient pas, on ferme.
            observer = new MutationObserver(() => {
                clearTimeout(fallback);

                if (content.dataset.state === "close" && el.open) {
                    fallback = setTimeout(() => forceClose(instance, el), exitDuration(content) + CLOSE_MARGIN);
                }
            });
            observer.observe(content, { attributes: true, attributeFilter: ["data-state"] });
            el.addEventListener("modal-close", onDialogClose);
            el.addEventListener("close", onDialogClose);
        };

        // Alpine lance la directive avant que Livewire ait inséré l'élément dans la page.
        el.isConnected ? setup() : queueMicrotask(setup);

        cleanup(() => {
            disposed = true;
            clearTimeout(fallback);
            observer?.disconnect();
            el.removeEventListener("modal-close", onDialogClose);
            el.removeEventListener("close", onDialogClose);

            if (!instance) {
                return;
            }

            forceClose(instance, el);
            document.removeEventListener("keydown", instance.closeModalEsc);
            instance.cleanup();

            if (Alpine.store("modals")[modalId] === instance) {
                delete Alpine.store("modals")[modalId];
            }

            releaseBodyScroll();
        });
    });

    // Boutons rendus après l'initialisation du modal : Flexilla ne les connaît pas.
    document.addEventListener("click", (event) => {
        const trigger = event.target.closest("[data-modal-trigger][data-modal-id], [data-modal-target]");

        if (trigger && !trigger.closest("dialog")) {
            const instance = instanceOf(Alpine, trigger.dataset.modalTarget || trigger.dataset.modalId);

            if (instance && !instance.triggerButtons.includes(trigger)) {
                instance.showModal();
            }

            return;
        }

        const closer = event.target.closest("[data-close-modal]");
        const dialog = closer?.closest("dialog[data-fx-modal]");
        const instance = dialog && instanceOf(Alpine, dialog.dataset.modalId);

        if (instance && !instance.closeButtons.includes(closer)) {
            event.preventDefault();
            instance.hideModal();
        }
    });

    Alpine.magic("modal", () => (id) => {
        const instance = instanceOf(Alpine, id);

        if (!instance) {
            console.warn(`⚠️ No modal instance found for ID: ${id}`);
        }

        return instance;
    });
}
