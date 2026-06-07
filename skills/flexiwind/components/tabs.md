## Demo

```html
<x-ui.tabs>
    <x-ui.tabs.list>
        <x-ui.tabs.trigger id="tab1">Tab Item 1</x-ui.tabs.trigger>
        <x-ui.tabs.trigger id="tab2">Tab Item 2</x-ui.tabs.trigger>
    </x-ui.tabs.list>
    <x-ui.tabs.panel-wrapper>
        <x-ui.tabs.panel id="tab1" active>
            <h3>Tab 1 Content</h3>
            <p>This is the content for Tab 1.</p>
        </x-ui.tabs.panel>
        <x-ui.tabs.panel id="tab2">
            <h3>Tab 2 Content</h3>
            <p>This is the content for Tab 2.</p>
        </x-ui.tabs.panel>
    </x-ui.tabs.panel-wrapper>
</x-ui.tabs>
```

## Installation

```shell
php artisan flexi:add tabs
```

Requires Flexilla JS: `npm i @flexilla/tabs`

### With Alpine/Livewire

```js
import { TabsPlugin } from "./plugins/tabs";
Alpine.plugin(TabsPlugin);
```

### Without Alpine

```js
import { Tabs } from "@flexilla/tabs";
Tabs.autoInit('[data-app-tabs]');
```

## Public Docs

`https://flexiwind.unoforge.com/components/tabs`

## API

### Subcomponents

| Component | Description |
| --- | --- |
| x-ui.tabs | Tabs container |
| x-ui.tabs.list | Container for tab triggers |
| x-ui.tabs.list-wrapper | Optional wrapper for the tabs list |
| x-ui.tabs.trigger | Clickable tab trigger; `id` must match a panel's `id` |
| x-ui.tabs.panel-wrapper | Optional wrapper for tab panels |
| x-ui.tabs.panel | Content panel; `id` must match a trigger's `id`; use `active` for initial visible panel |

### Events

| Event | Description |
| --- | --- |
| tab:changed | Dispatched when active tab changes. Detail contains the ID of the newly active tab. |

## Guidance

- Each trigger's `id` must match a panel's `id`.
- Add `active` to the panel that should be visible on first render.

## Avoid

- Do not use `x-ui.tabs.content` — the repo uses `panel` and `panel-wrapper`.
- Do not omit matching `id` values between triggers and panels.
