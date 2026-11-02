/**
 * Popover Flexiwind : <x-ui.popover>, sur @flexilla/popover.
 *
 * Mêmes réglages que le dropdown pour Livewire : le popover est placé dans
 * <body> par Alpine (<template x-teleport> dans le Blade), pas par Flexilla,
 * et aucune instance n'est créée sur la copie détachée qu'Alpine reçoit
 * pendant un rendu.
 */

import { Popover as FlexillaPopover } from "@flexilla/popover";
import { LayerPlugin } from "./layer";

export function PopoverPlugin(Alpine) {
    LayerPlugin(Alpine);

    Alpine.directive("f-popover", (el, {}, { cleanup }) => {
        let instance = null;
        let disposed = false;

        const setup = () => {
            if (!disposed && el.isConnected) {
                instance = new FlexillaPopover(el);
            }
        };

        // Alpine lance la directive avant que Livewire ait inséré l'élément dans la page.
        el.isConnected ? setup() : queueMicrotask(setup);

        cleanup(() => {
            disposed = true;
            instance?.hide();
            instance?.cleanup();
        });
    });
}
