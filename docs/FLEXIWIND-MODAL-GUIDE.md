# Flexiwind Modal — AI Integration Guide

A comprehensive reference for implementing Flexiwind modal components with Laravel Livewire and Blade. Based on patterns extracted from the `livewire-starter` codebase.

---

## Table of Contents

1. [Architecture Overview](#1-architecture-overview)
2. [Component Reference](#2-component-reference)
3. [Installation & Setup](#3-installation--setup)
4. [Basic Modal Patterns](#4-basic-modal-patterns)
   - [4.1 Static Content Modal (Blade Only)](#41-static-content-modal-blade-only)
   - [4.2 Form Modal with Livewire](#42-form-modal-with-livewire)
   - [4.3 Confirmation Modal](#43-confirmation-modal)
   - [4.4 Type-to-Confirm Destructive Modal](#44-type-to-confirm-destructive-modal)
5. [Dynamic Per-Item Modals](#5-dynamic-per-item-modals)
   - [5.1 The Key Prop Pattern](#51-the-key-prop-pattern)
   - [5.2 Dynamic Modal ID Construction](#52-dynamic-modal-id-construction)
6. [Events](#6-events)
   - [6.1 Closing a Modal Programmatically](#61-closing-a-modal-programmatically)
   - [6.2 Dispatching Notifications](#62-dispatching-notifications)
   - [6.3 Cross-Component Communication](#63-cross-component-communication)
   - [6.4 JavaScript Custom Events](#64-javascript-custom-events)
7. [Component Props Reference](#7-component-props-reference)
8. [Common Mistakes](#8-common-mistakes)

---

## 1. Architecture Overview

Flexiwind modals have **three layers**:

| Layer | Technology | File |
|-------|-----------|------|
| **DOM** | Native `<dialog>` element | `resources/views/components/ui/modal.blade.php` |
| **JavaScript** | `@flexilla/modal` via Alpine.js plugin | `resources/js/plugins/modal.js` |
| **Blade** | Component tree (`x-ui.modal.*`) | `resources/views/components/ui/modal/` |

The Alpine plugin (`x-f-modal` directive) initializes each `<dialog>` and exposes:
- `Alpine.store('modals')[id]` — modal instance store
- `document` event listeners for `modal:${id}:open` / `modal:${id}:close` — DOM events (used by Livewire dispatch)
- `$modal(id)` Alpine magic method for direct JS access

---

## 2. Component Reference

```
x-ui.modal                         <dialog> root, must have :id
  └── x-ui.modal.content           container (sizing, animation, optional dismiss X)
        ├── x-ui.modal.header
        │     ├── x-ui.modal.title       <h2>
        │     └── x-ui.modal.description <p>
        ├── x-ui.modal.body             main content area
        └── x-ui.modal.footer           actions area (justify: start|end|between|center)
              └── x-ui.modal.close       button that closes modal (inherits button props)

x-ui.modal.trigger                <button> that opens a modal by modal-id
```

**All sub-components except `trigger` render inside `x-ui.modal`.**

---

## 3. Installation & Setup

```bash
php artisan flexi:add modal
npm i @flexilla/modal
```

Then register the Alpine plugin in your JS entry point:

```js
// resources/js/app.js or resources/js/flexilla.js
import { ModalPlugin } from '@flexilla/modal'
Alpine.plugin(ModalPlugin)
```

---

## 4. Basic Modal Patterns

### 4.1 Static Content Modal (Blade Only)

Simplest case — no Livewire, just a static modal:

```blade
<x-ui.modal id="hello">
    <x-ui.modal.content size="sm">
        <x-ui.modal.header>
            <x-ui.modal.title>Hello</x-ui.modal.title>
            <x-ui.modal.description>Welcome</x-ui.modal.description>
        </x-ui.modal.header>
        <x-ui.modal.body>
            <p>Some content here.</p>
        </x-ui.modal.body>
        <x-ui.modal.footer justify="end">
            <x-ui.modal.close>Close</x-ui.modal.close>
        </x-ui.modal.footer>
    </x-ui.modal.content>
</x-ui.modal>
```

Trigger:

```blade
<x-ui.modal.trigger modal-id="hello">Open modal</x-ui.modal.trigger>
```

**Rules:**
- `x-ui.modal.trigger` renders as `<button>` — do NOT nest another `<x-ui.button>` or `<button>` inside it. Pass button props (`variant`, `intent`, `size`) directly on the trigger.
- `x-ui.modal.close` also wraps `<x-ui.button>` — pass text directly, do NOT nest a button inside.

### 4.2 Form Modal with Livewire

Uses an **anonymous Livewire component** (PHP class + Blade in same file, `⚡` prefix). Place the `<form>` inside `<x-ui.modal.content>`, wrapping header/body/footer.

```blade
<?php

use Livewire\Component;

new class extends Component {
    public string $email = '';

    public function submit(): void
    {
        $this->validate(['email' => 'required|email']);

        // ... perform action ...

        $this->reset('email');

        $this->dispatch('modal:my-form:close');
        $this->dispatch('notify', message: 'Done.', type: 'success');
        $this->redirectRoute('some.route', navigate: true);
    }
}; ?>

<x-ui.modal id="my-form">
    <x-ui.modal.content>
        <form wire:submit.prevent="submit" class="flex flex-col flex-1">
            <x-ui.modal.header>
                <x-ui.modal.title>Form title</x-ui.modal.title>
                <x-ui.modal.description>Form description</x-ui.modal.description>
            </x-ui.modal.header>

            <x-ui.modal.body class="space-y-4">
                <x-ui.input wire:model="email" type="email" label="Email" required />
            </x-ui.modal.body>

            <x-ui.modal.footer justify="end" class="border-t border-input">
                <x-ui.modal.close>Cancel</x-ui.modal.close>
                <x-ui.button type="submit">Submit</x-ui.button>
            </x-ui.modal.footer>
        </form>
    </x-ui.modal.content>
</x-ui.modal>
```

**Key points:**
- `wire:submit.prevent` on the `<form>` — do NOT use `wire:submit` without `prevent`.
- Form wraps header, body, and footer to be a single flex column.
- On success: `$this->dispatch('modal:{id}:close')` closes the modal.
- Always pair close with either `$this->redirectRoute(...)` or `$this->dispatch('notify', ...)`.

### 4.3 Confirmation Modal

Simple yes/no confirmation, no form fields in body:

```blade
<?php
new class extends Component {
    public function confirm(): void
    {
        Gate::authorize('someAbility', $this->someModel);

        // perform action

        $this->dispatch('modal:confirm-action:close');
        $this->dispatch('notify', message: 'Done.', type: 'success');
        $this->redirectRoute('some.route', navigate: true);
    }
}; ?>

<x-ui.modal id="confirm-action">
    <x-ui.modal.content size="sm">
        <form wire:submit="confirm" class="flex-1 flex flex-col">
            <x-ui.modal.header class="bg-muted/60">
                <x-ui.modal.title>Are you sure?</x-ui.modal.title>
                <x-ui.modal.description>
                    This action cannot be undone.
                </x-ui.modal.description>
            </x-ui.modal.header>
            <x-ui.modal.footer justify="end">
                <x-ui.modal.close>Cancel</x-ui.modal.close>
                <x-ui.button intent="destructive" type="submit">Confirm</x-ui.button>
            </x-ui.modal.footer>
        </form>
    </x-ui.modal.content>
</x-ui.modal>
```

- Notice `wire:submit` (without `prevent`) is also valid when inside `<form>`. Both `wire:submit` and `wire:submit.prevent` work.
- The `<form>` can wrap only header+footer if there is no body content.

### 4.4 Type-to-Confirm Destructive Modal

Requires the user to type a specific value (e.g. the team name) to confirm:

```blade
<?php
new class extends Component {
    public string $confirmText = '';

    public function delete(): void
    {
        Gate::authorize('delete', $this->resource);

        $validated = $this->validate(['confirmText' => 'required|string']);

        if ($validated['confirmText'] !== $this->expectedValue) {
            $this->addError('confirmText', 'Value does not match.');
            return;
        }

        // perform destructive action

        $this->dispatch('modal:delete:close');
        $this->dispatch('notify', message: 'Deleted.', type: 'success');
        $this->redirectRoute('some.route', navigate: true);
    }
}; ?>

<x-ui.modal id="delete">
    <x-ui.modal.content size="sm">
        <form wire:submit.prevent="delete" class="flex flex-col flex-1">
            <x-ui.modal.header>
                <x-ui.modal.title>Are you sure?</x-ui.modal.title>
                <x-ui.modal.description>
                    Type "{{ $expectedValue }}" to confirm.
                </x-ui.modal.description>
            </x-ui.modal.header>

            <x-ui.modal.body class="space-y-4 !py-4">
                <x-ui.input wire:model="confirmText" :label="'Type \"'.$expectedValue.'\" to confirm'" required />
            </x-ui.modal.body>

            <x-ui.modal.footer justify="end" class="border-t border-input">
                <x-ui.modal.close>Cancel</x-ui.modal.close>
                <x-ui.button intent="destructive" type="submit">Delete</x-ui.button>
            </x-ui.modal.footer>
        </form>
    </x-ui.modal.content>
</x-ui.modal>
```

---

## 5. Dynamic Per-Item Modals

When you need a separate modal instance for each item in a list (e.g., each team member gets their own "remove" modal).

### 5.1 The Key Prop Pattern

Always pass **two** unique identifiers:

| Prop | Purpose |
|------|---------|
| `:key` | Ensures Livewire creates a **separate component instance** per item |
| `:modal-name` (or `modal-id`) | Ensures each `<dialog>` has a **unique DOM id** |

```blade
@foreach ($items as $item)
    {{-- trigger --}}
    <x-ui.modal.trigger modal-id="delete-{{ $item->id }}">
        Delete
    </x-ui.modal.trigger>

    {{-- modal instance --}}
    <livewire:some.delete-modal
        :item="$item"
        :modal-name="'delete-'.$item->id"
        :key="'delete-modal-'.$item->id"
    />
@endforeach
```

### 5.2 Dynamic Modal ID Construction

The Livewire component must construct its modal ID from the passed data:

```php
new class extends Component {
    public string $modalName = 'delete';

    public function mount(
        SomeModel $item,
        ?string $modalName = null,
    ): void {
        $this->item = $item;
        // Use the passed modalName, or derive one from the item
        $this->modalName = $modalName ?? ('delete-' . $item->getKey());
    }

    public function delete(): void
    {
        // ...
        $this->dispatch('modal:' . $this->modalName . ':close');
    }
};
```

Then in the Blade template:

```blade
<x-ui.modal :id="$modalName">
    {{-- ... --}}
</x-ui.modal>
```

---

## 6. Events

### 6.1 Closing a Modal Programmatically

Call these from your Livewire PHP action **after a successful operation**:

```php
// Static modal ID
$this->dispatch('modal:invite-member:close');

// Dynamic modal ID
$this->dispatch('modal:' . $this->modalName . ':close');

// Alternative (older) style
$this->dispatch('close-modal', name: $this->modalName);
```

### 6.2 Dispatching Notifications

```php
$this->dispatch('notify', message: 'Operation completed.', type: 'success');
$this->dispatch('notify', message: 'Something went wrong.', type: 'error');
```

### 6.3 Cross-Component Communication

Trigger → Modal (from parent page, trigger a modal's method):

```blade
<button wire:click="$dispatch('open-setup-flow')">
    Start Setup
</button>
```

```php
// In the modal component
#[On('open-setup-flow')]
public function handleSetupFlow(): void
{
    $this->startSetup();
}
```

Modal → Parent (notify parent after modal action completes):

```php
// In modal
$this->dispatch('item-deleted', itemId: $this->item->id);
```

```php
// In parent page
#[On('item-deleted')]
public function handleItemDeleted(array $params): void
{
    $this->refreshList();
}
```

### 6.4 JavaScript Custom Events

The Flexilla plugin listens for these DOM events (useful for non-Livewire JS):

```js
document.dispatchEvent(new CustomEvent('modal:my-id:open'));
document.dispatchEvent(new CustomEvent('modal:my-id:close'));
```

---

## 7. Component Props Reference

### `x-ui.modal`

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | *required* | Unique modal ID, used for triggering and events |
| `overlayBlured` | bool | `true` | Blurs the background behind the overlay |
| `closable` | bool | `true` | Whether clicking overlay closes modal |
| `staticBackdrop` | string | `''` | Set truthy to prevent close on overlay click |
| `scrollableBody` | bool | `false` | Allow body scroll while modal is open |

### `x-ui.modal.content`

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | `'md'` | `xs`, `sm`, `md`, `lg`, `xl`, `2xl`, `3xl`, `4xl`, `full` |
| `closable` | bool | `true` | Show/hide the absolute positioned X close button |
| `gutter` | bool | `true` | Apply padding gutters |
| `animation` | bool | `true` | Enable enter/exit animations |
| `enterAnimation` | string | `'modal-animation-in .4s linear'` | |
| `exitAnimation` | string | `'modal-animation-out .1s linear'` | |

### `x-ui.modal.header`

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string|null | `null` | Shorthand title (uses `$title` slot if not set) |
| `description` | string|null | `null` | Shorthand description (uses `$descriptionSlot` if not set) |
| `paddingNone` | bool | `false` | Remove header padding |

### `x-ui.modal.footer`

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `justify` | string | `'start'` | `start`, `end`, `between`, `center` |

### `x-ui.modal.trigger`

Inherits all `x-ui.button` props: `size`, `variant`, `intent`, `radius`, `iconOnly`.

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `modalId` | string | *required* | The `id` of the modal to open |

### `x-ui.modal.close`

Inherits all `x-ui.button` props: `size`, `variant`, `intent`.

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | `'sm'` | |
| `variant` | string | `'outline'` | |
| `intent` | string | `'gray'` | |

---

## 8. Common Mistakes

### Button-in-Trigger (❌ WRONG)

```blade
<x-ui.modal.trigger modal-id="edit">
    <x-ui.button>Open</x-ui.button>     {{-- BAD: button inside button --}}
</x-ui.modal.trigger>
```

✅ **Correct:** Pass props directly to trigger (it renders as `<button>`):

```blade
<x-ui.modal.trigger modal-id="edit" variant="solid" intent="primary">
    Open
</x-ui.modal.trigger>
```

### Button-in-Close (❌ WRONG)

```blade
<x-ui.modal.close>
    <x-ui.button>Cancel</x-ui.button>   {{-- BAD: button inside button --}}
</x-ui.modal.close>
```

✅ **Correct:** Pass text directly:

```blade
<x-ui.modal.close>Cancel</x-ui.modal.close>
```

### Missing `:key` for Duplicate Modals (❌ WRONG)

```blade
@foreach ($items as $item)
    <livewire:some.delete-modal :model="$item" />
@endforeach
```

✅ **Correct:** Always add a unique `:key`:

```blade
@foreach ($items as $item)
    <livewire:some.delete-modal
        :model="$item"
        :key="'delete-'.$item->id"
    />
@endforeach
```

### Forgetting to Close the Modal (❌ WRONG)

After a successful action, the modal stays open if you don't dispatch the close event:

```php
public function submit(): void
{
    // ... validation, database work ...
    // Missing: $this->dispatch('modal:my-form:close');
    $this->redirectRoute('some.route');
}
```

✅ **Correct:**

```php
public function submit(): void
{
    // ... action ...
    $this->dispatch('modal:my-form:close');
    $this->dispatch('notify', message: 'Done.', type: 'success');
    $this->redirectRoute('some.route', navigate: true);
}
```

### Using `wire:submit` Without Form (❌ WRONG)

`wire:submit.prevent` only works on `<form>` elements. Do not put it on `<div>`.

---

## Quick Reference Card

| Goal | Pattern |
|------|---------|
| Open modal from button | `<x-ui.modal.trigger modal-id="foo">` |
| Open modal from any element | Add `data-modal-id="foo" data-modal-trigger` attributes |
| Close from server | `$this->dispatch('modal:foo:close')` |
| Close from JS | `document.dispatchEvent(new CustomEvent('modal:foo:close'))` |
| Close from Alpine | `$modal('foo').hideModal()` |
| Form inside modal | `<form wire:submit.prevent="method">` wrapping header/body/footer |
| Flash notification | `$this->dispatch('notify', message: '...', type: 'success')` |
| Per-item modals | Pass `:key` + unique `modal-name` |
| Prevent overlay close | Add `staticBackdrop` to `x-ui.modal` |
| No close button | `closable="false"` on `x-ui.modal.content` |
