import { actionToggler, $ } from "@flexilla/utilities";

document.addEventListener("alpine:init", () => {
    Alpine.directive("sidebar", (el, { }, { cleanup }) => {
        const overlayEl = $("[data-sidebar-overlay]")
        const toggleSidebar = actionToggler({
            trigger: "[data-toggle-sidebar]",
            targets: [
                {
                    element: el,
                    attributes: {
                        initial: { "data-state": "close" },
                        to: { "data-state": "open" },
                    },
                },
            ],
            onToggle: ({ isExpanded }) => {
                document.body.classList[!isExpanded ? "add" : "remove"](
                    "overflow-y-auto"
                );
                overlayEl?.setAttribute("aria-hidden", !isExpanded)
                overlayEl?.setAttribute("data-state", !isExpanded ? "close" : "open")
            },
        });

        const resizeSidebar = actionToggler({
            trigger: "[data-toggle-sidebar-size]",
            targets: [
                {
                    element: el,
                    attributes: {
                        initial: { "data-resized": "false" },
                        to: { "data-resized": "true" },
                    },
                },
            ],
        });
        overlayEl?.addEventListener("click", toggleSidebar.toInitial)
        cleanup(() => {
            toggleSidebar.destroy();
            resizeSidebar.destroy();
            overlayEl?.removeEventListener("click", toggleSidebar.toInitial)
        });
    });
});
