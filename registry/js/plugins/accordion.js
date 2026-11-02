import {Accordion as FlexillaAccordion} from "@flexilla/accordion"

export function AccordionPlugin(Alpine) {
    Alpine.directive("accordion", (el, {}, {cleanup}) => {
        const accordion = new FlexillaAccordion(el)
        cleanup(()=>{
            accordion.cleanup()
        })
    });
}
