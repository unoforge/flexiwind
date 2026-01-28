import { copyToClipboard } from "./utils";

export default function copyToClipboardComponent(closestEl = '[data-code-block]', inTabs = false) {
    return {
        copiedState: '',
        handleCopy() {
            let parentEl = this.$el.closest(closestEl);
            if (inTabs) {
                parentEl = parentEl.querySelector(`[data-tab-panel][data-state="active"]`);
            }
            const snippetEl = parentEl?.querySelector('[data-code-snippet] pre');
            if (snippetEl) {
                copyToClipboard({
                    snippet: snippetEl,
                    onCopy: () => {
                        this.copiedState = 'copied';
                    },
                    onCopyCompleted: () => {
                        this.copiedState = '';
                    }
                });
            }
        },
    };
}
