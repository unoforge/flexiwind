import { Dismissible } from "@flexilla/dismissible";

export function DissmissiblePlugin(Alpine) {
    Alpine.directive("f-dissmissible", (el, {}, { cleanup }) => {
        const dissmissible_ = new Dismissible(el);
        cleanup(() => {
            dissmissible_.cleanup();
        });
    });
}
