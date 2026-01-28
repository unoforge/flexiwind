<?php

return [
    'add-accordion-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Accordion } from "@flexilla/accordion"

// init accordion for all Element with data-app-accordion attribute
Accordion.autoInit('[data-app-accordion]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-accordion-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineAccordion from "@flexilla/alpine-accordion"

Alpine.plugin(AlpineAccordion)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-modal-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Modal } from "@flexilla/modal"

// init Modal for all Element with data-app-modal attribute
Modal.autoInit('[data-app-modal]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-modal-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineModal from "@flexilla/alpine-modal"

Alpine.plugin(AlpineModal)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-tabs-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Tabs } from "@flexilla/tabs"

// init Tabs for all Element with data-app-tabs attribute
Tabs.autoInit('[data-app-tabs]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-tabs-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineTabs from "@flexilla/alpine-tabs"

Alpine.plugin(AlpineTabs)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-auto-resize-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { AutoResizeTextArea } from "@flexilla/autoresize-area"

// init Auto resize area for all Element with data-app-auto-resize attribute
AutoResizeTextArea.autoInit('[data-app-auto-resize]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-auto-resize-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineAutoResize from "@flexilla/alpine-autoresize-area"

Alpine.plugin(AlpineAutoResize)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-dropdown-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Dropdown } from "@flexilla/dropdown"

// init Auto resize area for all Element with data-app-dropdown attribute
Dropdown.autoInit('[data-app-dropdown]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-dropdown-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineDropdown from "@flexilla/alpine-dropdown"

Alpine.plugin(AlpineDropdown)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-popover-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Popover } from "@flexilla/popover"

// init popover for all Element with data-app-popover attribute
Popover.autoInit('[data-app-popover]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-popover-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpinePopover from "@flexilla/alpine-dpopover"

Alpine.plugin(AlpinePopover)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-tooltip-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Tooltip } from "@flexilla/tooltip"

// init tooltip for all Element with data-app-tooltip attribute
Tooltip.autoInit('[data-app-tooltip]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-tooltip-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineTooltip from "@flexilla/alpine-tooltip"

Alpine.plugin(AlpineTooltip)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],




    'add-otp-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { PinInput} from "@flexilla/pin-input"

// init Pin Input for all Element with data-app-otp attribute
PinInput.autoInit('[data-app-otp]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-otp-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpinePinInput from "@flexilla/alpine-pin-input"

Alpine.plugin(AlpinePinInput)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],




    'add-offcanvas-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Offcanvas } from "@flexilla/offcanvas"

// init Modal for all Element with data-app-modal attribute
Offcanvas.autoInit('[data-app-offcanvas]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-offcanvas-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineOffcanvas from "@flexilla/alpine-offcanvas"

Alpine.plugin(AlpineOffcanvas)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

];
