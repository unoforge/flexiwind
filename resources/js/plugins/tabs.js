import { Tabs as FlexillaTabs } from "@flexilla/tabs";

export function TabsPlugin(Alpine) {
    Alpine.directive("f-tabs", (el, {}, { cleanup }) => {
        const tabs_ = new FlexillaTabs(el);
        cleanup(() => {
            tabs_.cleanup();
        });
    });
}