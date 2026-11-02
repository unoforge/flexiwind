export function LayerPlugin(Alpine) {
    Alpine.directive("fw-layer", (el) => {
        // _x_teleportBack : le <template x-teleport> d'où vient ce panneau.
        const dialog = el._x_teleportBack?.closest?.("dialog");

        if (dialog && el.parentElement !== dialog) {
            dialog.append(el);
        }
    });
}
