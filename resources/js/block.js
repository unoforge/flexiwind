import { $, setAttributes } from "@flexilla/utilities";
import { copyToClipboard } from "./utils";


document.addEventListener("alpine:init", () => {
    Alpine.directive("ui-scrollable", (el, {}, { cleanup }) => {
        const btnScrollToLeft = $("[data-scroll-to-left]", el);
        const btnScrollToRight = $("[data-scroll-to-right]", el);
        const scrollBox = $("[data-scrollable]", el);

        if (!btnScrollToLeft || !btnScrollToRight || !scrollBox) {
            throw new Error("Unable to initialize scrollable container, missing elements");
        }

        const scrollTo = (direction) => {
            const scrollAmount = scrollBox.clientWidth;
            scrollBox.scrollBy({ left: direction === "left" ? -scrollAmount : scrollAmount, behavior: "smooth" });
        };

        const updateScrollButtons = () => {
            const hideLeftBtn = scrollBox.scrollLeft <= 0;
            const hideRightBtn = scrollBox.scrollLeft >= scrollBox.scrollWidth - scrollBox.clientWidth - 1;
            setAttributes(btnScrollToLeft, { "aria-hidden": `${hideLeftBtn}`, "data-state": `${hideLeftBtn ? "invisible" : "visible"}` });
            setAttributes(btnScrollToRight, { "aria-hidden": `${hideRightBtn}`, "data-state": `${hideRightBtn ? "invisible" : "visible"}` });
        };

        const onScrollLeft = () => scrollTo("left");
        const onScrollRight = () => scrollTo("right");

        btnScrollToLeft.addEventListener("click", onScrollLeft);
        btnScrollToRight.addEventListener("click", onScrollRight);
        scrollBox.addEventListener("scroll", updateScrollButtons);
        window.addEventListener("load", updateScrollButtons);
        updateScrollButtons();

        cleanup(() => {
            btnScrollToLeft.removeEventListener("click", onScrollLeft);
            btnScrollToRight.removeEventListener("click", onScrollRight);
            scrollBox.removeEventListener("scroll", updateScrollButtons);
            window.removeEventListener("load", updateScrollButtons);
        });
    });

    Alpine.directive("ui-block", (el, {}, { cleanup }) => {
        const previewBox = $("[data-ui-previewbox]", el);

        cleanup(() => {});
    });

    Alpine.directive("copy-command", (el, {}, { cleanup }) => {
        const copyCommand = () => {
            const command = el.getAttribute("data-command");
            copyToClipboard({
                snippet: command,
                onCopy: () => {
                    el.innerHTML = `
                    <span aria-hidden="true" class="flex iconify ph--circle-notch animate-spin"></span>
                        <span class="text-muted-foreground ml-1">Copying</span>`;
                },
                onCopyCompleted: () => {
                    el.innerHTML =
                        '<span aria-hidden="true" class="flex iconify ph--check mr-1.5"></span><span>Copied</span>';
                    setTimeout(
                        () =>
                            (el.innerHTML = `<span aria-hidden="true" class="flex iconify ph--terminal"></span>
                        <span class="text-muted-foreground ml-1">${command}</span>`),
                        1800,
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
                const iframeDoc =
                    el.contentDocument || el.contentWindow?.document;
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
            const systemPrefersDark = window.matchMedia(
                "(prefers-color-scheme: dark)",
            ).matches;
            const isDark = currentTheme
                ? currentTheme === "dark"
                : systemPrefersDark;
            syncThemeToIframe(isDark);
        };

        // Listen for theme changes
        const handleThemeChange = (event) => {
            const isDark =
                event.detail?.isDark ?? event.detail?.theme === "dark";
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
