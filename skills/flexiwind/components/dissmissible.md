## Demo

```html
<x-ui.dissmissible>
    Successfully uploaded!
</x-ui.dissmissible>
```

## Installation

```shell
php artisan flexi:add dissmissible
```

Requires Flexilla JS: `npm i @flexilla/dissmissible`

```js
import { DissmissiblePlugin } from "./plugins/dissmissible";
Alpine.plugin(DissmissiblePlugin);
```

## Public Docs

`https://flexiwind.unoforge.com/components/dissmissible`

## API

| Prop | Description |
| --- | --- |
| action (string) | What happens when dismissed. Default: 'remove-from-dom' |
| closable (boolean) | Show close button. Default: true |

## Composition

| Component | Description |
| --- | --- |
| x-ui.dissmissible | Main container |
| x-ui.dissmissible.close | Close button (auto-included when closable is true) |

## Guidance

- Use for dismissible alerts, notifications, and temporary messages.
- Content goes in the default slot.
- The component name and CLI slug use double-s (`dissmissible`) — this is intentional.

## Avoid

- Do not spell it `dismissible` (single-s) in the install command or Blade tag — it will not resolve.
