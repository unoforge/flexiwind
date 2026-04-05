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