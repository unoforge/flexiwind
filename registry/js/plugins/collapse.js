import { Collapse as FlexillaCollapse } from "@flexilla/collapse";

export function CollapsePlugin(Alpine) {
    Alpine.directive("f-collapse", (el, {}, { cleanup }) => {
        const collapse = new FlexillaCollapse(el);
        cleanup(() => {
            collapse.cleanup();
        });
    });
}
