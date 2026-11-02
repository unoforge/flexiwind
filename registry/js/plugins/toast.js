/**
 * Toasts Flexiwind, sur @flexilla/toast.
 *
 *  - Alpine : `$toast.success('Link copied')` ;
 *  - Livewire : `$this->dispatch('toast', type: 'success', message: '…')` ;
 *  - après une redirection : `->with('toast', ['type' => 'success', 'message' => '…'])`,
 *    que <x-ui.toaster /> écrit dans la page.
 *
 * Tout ce qui vient du serveur passe par `show()` : types connus seulement,
 * textes convertis en chaînes. Flexilla les écrit en textContent, jamais en
 * HTML. Les couleurs viennent des variables --fx-toast-* du thème.
 */

import toast from "@flexilla/toast";

const TYPES = ["message", "success", "error", "warning", "info", "loading"];
const POSITIONS = ["top-left", "top-center", "top-right", "bottom-left", "bottom-center", "bottom-right"];

let started = false;

export function ToastPlugin(Alpine) {
    Alpine.magic("toast", () => toast);
    initToasts();
}

/** Sans Alpine : à appeler une fois. */
export function initToasts() {
    if (started) {
        return;
    }

    started = true;
    window.toast ??= toast;
    window.addEventListener("toast", (event) => show(event.detail));

    const boot = () => {
        configure();
        flushSession();
    };

    document.readyState === "loading" ? document.addEventListener("DOMContentLoaded", boot, { once: true }) : boot();
    document.addEventListener("livewire:navigated", boot);
}

/** Affiche un toast décrit par des données (Livewire, session, événement). */
export function show(detail = {}) {
    // Livewire 3 envoyait parfois les paramètres dans un tableau.
    const data = Array.isArray(detail) ? detail[0] ?? {} : detail ?? {};
    const message = text(data.message ?? data.title);

    if (!message) {
        return;
    }

    const type = TYPES.includes(data.type) ? data.type : "message";
    const options = {};
    const description = text(data.description);

    if (description) {
        options.description = description;
    }

    if (Number.isFinite(Number(data.duration)) && data.duration !== null && data.duration !== undefined) {
        options.duration = Math.max(0, Number(data.duration));
    }

    if (typeof data.id === "string" || typeof data.id === "number") {
        options.id = data.id;
    }

    if (POSITIONS.includes(data.position)) {
        options.position = data.position;
    }

    // Une action émet un événement Livewire : le composant décide quoi faire.
    const action = data.action;

    if (action && text(action.label) && typeof action.event === "string") {
        options.action = {
            label: text(action.label),
            cancel: Boolean(action.cancel),
            onClick: () => window.Livewire?.dispatch(action.event, action.params ?? {}),
        };
    }

    return toast[type](message, options);
}

/** Lit les réglages posés par <x-ui.toaster>. */
function configure() {
    const element = document.querySelector("[data-fw-toaster]");

    if (!element) {
        return;
    }

    const { position, duration, visible, closeButton, richColors, expand } = element.dataset;
    const config = {
        closeButton: closeButton !== undefined,
        richColors: richColors !== undefined,
        expand: expand !== undefined,
        closeButtonLabel: element.dataset.closeLabel || "Close notification",
    };

    if (POSITIONS.includes(position)) {
        config.position = position;
    }

    if (Number.isFinite(Number(duration)) && duration !== "") {
        config.duration = Number(duration);
    }

    if (Number.isFinite(Number(visible)) && visible !== "") {
        config.visibleToasts = Number(visible);
    }

    toast.config(config);
}

/** Les toasts laissés en session par une redirection. */
function flushSession() {
    document.querySelectorAll("script[data-fw-toast]").forEach((script) => {
        script.remove();

        try {
            const payload = JSON.parse(script.textContent);

            (Array.isArray(payload) ? payload : [payload]).forEach((item) => show(item));
        } catch {
            // Un contenu illisible ne doit pas casser la page.
        }
    });
}

function text(value) {
    return typeof value === "string" || typeof value === "number" ? String(value).trim() : "";
}
