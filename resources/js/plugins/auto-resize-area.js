import {AutoResizeTextArea as FlexillaAutoresize} from "@flexilla/auto-resize-area"

export function AutoResizeAreaPlugin(Alpine) {
    Alpine.directive("auto-resize-area", (el, {}, { cleanup }) => {
        const resize_area = new FlexillaAutoresize(el);
        cleanup(() => {
            resize_area.cleanup();
        });
    });
}

