import { CustomRange as CustomRangeIndicator } from "@flexilla/custom-range";

export function RangeIndicatorPlugin(Alpine) {
    Alpine.directive("range-indicator", (el, {}, { cleanup }) => {
        const range_indicator_ = new CustomRangeIndicator(el);
        cleanup(() => {
            range_indicator_.cleanup()
        });
    });
}