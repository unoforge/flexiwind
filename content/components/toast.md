---
title: "Toast"
group: "Data & Feedback"
order: 60
tier: "free"
state: "new"
description: "Short messages that confirm, warn or report progress without stopping anyone."
seoDescription: "Toast notifications for Laravel Blade and Livewire with Tailwind CSS: dispatch from PHP, flash after a redirect, or call from Alpine."
keywords: "toast, notification, snackbar, sonner, livewire toast, flash message"
---

## Demo

::preview{example="toast/demo"}

## Installation

```bash
php artisan flexi:add toast
```

This adds `<x-ui.toaster>` and the plugin `resources/js/plugins/toast.js`, built on [Flexilla Toast](https://flexilla.unoforge.com/docs/components/toast). Register the plugin once:

```js
import { ToastPlugin } from "./plugins/toast";

Alpine.plugin(ToastPlugin);
```

Then put the toaster once in your layout, before `@livewireScripts`:

```blade
<x-ui.toaster position="bottom-right" close-button />
```

Toasts take your theme: the install adds `--fx-toast-*` variables that point at your tokens — background, text, border, radius, font and status colors — so light and dark follow without code.

## From Livewire

Dispatch a `toast` event with a `type` and a `message`:

:::raw
<x-docs.preview-ui>
    <livewire:toast-demo />
</x-docs.preview-ui>
:::

```php
$this->dispatch('toast', type: 'success', message: 'Profile saved', description: 'Your changes are live.');
```

An action button dispatches a Livewire event back, so the component decides what it does:

```php
$this->dispatch('toast', message: 'Project archived', action: ['label' => 'Undo', 'event' => 'project-restored']);

#[On('project-restored')]
public function restore(): void { /* … */ }
```

## After a redirect

Flash a `toast` in the session; the toaster shows it on the next page:

```php
return redirect()->route('invoices.index')
    ->with('toast', ['type' => 'success', 'message' => 'Invoice sent']);
```

Several at once: `->with('toast', [[…], […]])`.

## From Alpine

`$toast` is Flexilla's `toast` function:

::preview{example="toast/action"}

```blade
<button x-on:click="$toast.success('Link copied')">Copy</button>
```

`$toast.promise()` shows a loading toast that becomes a success or an error, and `$toast.dismiss()` closes them all. Outside Alpine, the same function is `window.toast`.

## Types and options

| Key | Description |
| --- | --- |
| `type` | `message`, `success`, `error`, `warning`, `info` or `loading`. Default: `message`. |
| `message` | The title. |
| `description` | Second line, muted. |
| `duration` | Milliseconds before it closes. `0` keeps it open. |
| `id` | Reusing an id replaces that toast: handy to turn a loading toast into a result. |
| `position` | Overrides the toaster's position for this toast. |
| `action` | `['label' => …, 'event' => …, 'params' => […]]`: a button that dispatches a Livewire event. |

## References

### Toaster props

| Prop | Description |
| --- | --- |
| `position` (string) | `top-left`, `top-center`, `top-right`, `bottom-left`, `bottom-center`, `bottom-right`. Default: `bottom-right`. |
| `duration` (int) | Default duration in milliseconds. Default: 3000. |
| `visible` (int) | Toasts shown at once. Default: 3. |
| `close-button` (boolean) | A close button on every toast. |
| `rich-colors` (boolean) | Tint the whole toast with its status color. |
| `expand` (boolean) | Keep the stack spread instead of piled up. |
| `close-label` (string) | Accessible name of the close button. |

## Accessibility

- Toasts are announced by screen readers: errors right away, the others at the next pause.
- Hovering the stack or moving keyboard focus into it pauses every timer.
- Actions and close buttons are real buttons.
- Messages are written as text, never as HTML: a message that comes from your users is safe to show.
