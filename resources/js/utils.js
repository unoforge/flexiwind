export const copyToClipboard = ({
    snippet,
    onCopy,
    onCopyCompleted,
    timeout = 1000,
}) => {
    if (snippet instanceof HTMLElement || typeof snippet === "string") {
        let valueToCopy = "";
        let timer = null;

        const startTimeout = (callback) => {
            timer = setTimeout(() => {
                callback();
            }, timeout);
        };

        const cancelTimeout = () => {
            if (timer) clearTimeout(timer);
        };

        valueToCopy = typeof snippet === "string" ? snippet : snippet.innerText;

        onCopy && onCopy();
        navigator.clipboard.writeText(valueToCopy).then(() => {
            if (onCopyCompleted) {
                startTimeout(() => {
                    onCopyCompleted();
                    cancelTimeout();
                });
            }
        });
    }
};

export const disableTransitionsTemporarily = (callback) => {
    // 1. Determine which document to use (main document or iframe document)
    const targetDoc = document;

    // 2. Create a style element to inject CSS
    const css = targetDoc.createElement("style");
    css.appendChild(
        targetDoc.createTextNode("* { transition: none !important; }")
    );
    targetDoc.head.appendChild(css);

    // 3. Execute the theme change callback
    if (typeof callback === "function") {
        callback();
    }

    // 4. Force a browser repaint (reflow)
    // Accessing any computed style property forces the browser to evaluate and paint the CSS changes
    const computedStyle = window.getComputedStyle(css);
    computedStyle.opacity;

    // 5. Remove the style element to re-enable transitions
    targetDoc.head.removeChild(css);
};
