/**
 * Dropdown Flexiwind : <x-ui.dropdown>, sur @flexilla/dropdown.
 *
 * Flexilla fait le menu (position, clavier, sous-menus, fermeture au clic
 * extérieur). Deux réglages le rendent sûr avec Livewire :
 *
 *  - le menu est placé dans <body> par Alpine (<template x-teleport> dans le
 *    Blade), pas par Flexilla : déplacé par Flexilla, Livewire le recréait à
 *    chaque rendu, les copies s'ouvraient toutes ensemble et un wire:click du
 *    menu ne trouvait plus son composant. Livewire, lui, suit x-teleport.
 *    Dans un modal, x-fw-layer le place dans le dialog (voir layer.js) ;
 *  - pendant un rendu, Alpine lance les directives sur une copie détachée du
 *    nouveau HTML : une instance créée là se brancherait sur le vrai bouton
 *    (Flexilla le cherche dans toute la page). On attend que l'élément soit
 *    dans la page.
 */

import { Dropdown as FlexillaDropdown } from "@flexilla/dropdown";
import { LayerPlugin } from "./layer";

export function DropdownPlugin(Alpine) {
    LayerPlugin(Alpine);

    Alpine.directive("f-dropdown", (el, {}, { cleanup }) => {
        let instance = null;
        let disposed = false;

        const setup = () => {
            if (!disposed && el.isConnected) {
                instance = new FlexillaDropdown(el);
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
