import { actionToggler } from "@flexilla/utilities";

document.addEventListener("alpine:init", () => {
    Alpine.directive("sidebar", (el, {}, { cleanup }) => {
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
                {
                    element: "[data-sidebar-overlay]",
                    attributes: {
                        initial: {
                            "aria-hidden": "true",
                            "data-state": "close",
                        },
                        to: { "aria-hidden": "false", "data-state": "open" },
                    },
                },
            ],
            onToggle: ({ isExpanded }) => {
                document.body.classList[!isExpanded ? "add" : "remove"](
                    "overflow-y-auto"
                );
            },
        });

        const resizeSidebar = actionToggler({
            trigger: "[ data-toggle-sidebar-size]",
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
        cleanup(() => {
            toggleSidebar.destroy();
            resizeSidebar.destroy();
        });
    });
});
