import { $ } from "@flexilla/utilities";
import { copyToClipboard } from "./utils";

document.addEventListener("alpine:init", () => {
    Alpine.directive("ui-block", (el, {}, { cleanup }) => {
        const previewBox = $("[data-ui-previewbox]", el);
        


        cleanup(() => {
            
        });
    });

    Alpine.directive("copy-command", (el, {}, { cleanup }) => {
        const copyCommand = () => {
            const command = el.getAttribute("data-command");
            copyToClipboard({
                snippet: command,
                onCopy: () => {
                    el.innerHTML = `
                    <span aria-hidden="true" class="flex iconify ph--circle-notch animate-spin"></span>
                        <span class="text-fg-muted ml-1">Copying</span>`;
                },
                onCopyCompleted: () => {
                    el.innerHTML =
                        '<span aria-hidden="true" class="flex iconify ph--check mr-1.5"></span><span>Copied</span>';
                    setTimeout(
                        () =>
                            (el.innerHTML = `<span aria-hidden="true" class="flex iconify ph--terminal"></span>
                        <span class="text-fg-muted ml-1">${command}</span>`),
                        1800
                    );
                },
            });
        };
        el.addEventListener("click", copyCommand);

        cleanup(() => {
            el.removeEventListener("click", copyCommand);
        });
    });
    Alpine.directive("preview-frame", (el, {}, { cleanup }) => {
        // Function to sync theme with iframe
        const syncThemeToIframe = (isDark) => {
            try {
                const iframeDoc = el.contentDocument || el.contentWindow?.document;
                if (iframeDoc && iframeDoc.documentElement) {
                    iframeDoc.documentElement.classList.toggle("dark", isDark);
                }
            } catch (error) {
                // Silently fail if iframe is not accessible (cross-origin)
                console.warn("Cannot access iframe document:", error);
            }
        };

        // Initialize theme on iframe load
        const handleIframeLoad = () => {
            const currentTheme = localStorage.getItem("theme");
            const systemPrefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            const isDark = currentTheme ? currentTheme === "dark" : systemPrefersDark;
            syncThemeToIframe(isDark);
        };

        // Listen for theme changes
        const handleThemeChange = (event) => {
            const isDark = event.detail?.isDark ?? event.detail?.theme === "dark";
            syncThemeToIframe(isDark);
        };

        // Attach event listeners
        el.addEventListener("load", handleIframeLoad);
        window.addEventListener("theme-changed", handleThemeChange);

        // Cleanup
        cleanup(() => {
            el.removeEventListener("load", handleIframeLoad);
            window.removeEventListener("theme-changed", handleThemeChange);
        });
    });
});

