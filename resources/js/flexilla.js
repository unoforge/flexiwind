import { AccordionPlugin } from "./plugins/accordion";
import { DropdownPlugin } from "./plugins/dropdown";
import { ModalPlugin } from "./plugins/modal";
import { TabsPlugin } from "./plugins/tabs";
import { RangeIndicatorPlugin } from "./plugins/range-indicator";
import { OffcanvasPlugin } from "./plugins/offcanvas";
import { AutoResizeAreaPlugin } from "./plugins/auto-resize-area";
import { PopoverPlugin } from "./plugins/popover";
import { TooltipPlugin } from "./plugins/tooltip";
import { PinInputPlugin } from "./plugins/pin-input";
import { NavbarPlugin } from "./plugins/nav-bar";
import "./sidebar-plugin";
import { CollapsePlugin } from "./plugins/collapse";

Alpine.plugin(AccordionPlugin);
Alpine.plugin(ModalPlugin);
Alpine.plugin(CollapsePlugin)
Alpine.plugin(DropdownPlugin);
Alpine.plugin(TabsPlugin);
Alpine.plugin(RangeIndicatorPlugin);
Alpine.plugin(AutoResizeAreaPlugin);
Alpine.plugin(OffcanvasPlugin);
Alpine.plugin(PopoverPlugin);
Alpine.plugin(TooltipPlugin);
Alpine.plugin(PinInputPlugin);
Alpine.plugin(NavbarPlugin);
