import { Dropdown as FlexillaDropdown } from "@flexilla/dropdown";

export function DropdownPlugin(Alpine) {
    Alpine.directive("f-dropdown", (el, {}, { cleanup }) => {
        const dropdown_ = new FlexillaDropdown(el);
        cleanup(() => {
            dropdown_.cleanup();
        });
    });
}