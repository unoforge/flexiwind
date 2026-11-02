import { Tooltip as FlexillaTooltip } from "@flexilla/tooltip";

export function TooltipPlugin(Alpine) {
    Alpine.directive("f-tooltip", (el, {}, { cleanup }) => {
        const tooltip_ = new FlexillaTooltip(el);
        cleanup(() => {
            tooltip_.cleanup();
        });
    });
}