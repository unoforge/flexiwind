---
title: "Livewire forms"
group: "Tips & snippets"
order: 10
tier: "pro"
state: "new"
description: "Short answers to the questions every Livewire form raises: when to send, how to show errors, how to reset."
seoDescription: "Livewire form tips with Flexiwind: wire:model modifiers, loading buttons, accessible errors, reset after save, arrays from multi-selects."
keywords: "livewire form tips, wire:model blur live, livewire loading button, livewire validation errors, laravel form snippets"
---

## Send at the right moment

`wire:model` alone sends nothing until an action runs — the right default for a form saved with a button. Add a modifier only when something on the page depends on the field before saving.

```blade
{{-- Saved with the form: nothing sent while typing --}}
<x-ui.input wire:model="name" />

{{-- Checked when leaving the field: an email that must be unique --}}
<x-ui.input wire:model.blur="email" />

{{-- Drives the rest of the page right away: a filter, a country that sets the cities --}}
<x-ui.listbox wire:model.live="country" :options="$countries" />
```

`.live` on a text field sends a request per pause in typing: keep it for search boxes, with `.debounce.300ms`.

## One button, one request

A double click on a slow button saves twice. Disable it while its own action runs, and say what is happening.

```blade
<x-ui.button type="submit" wire:loading.attr="disabled" wire:target="save">
    <span wire:loading.remove wire:target="save">Save</span>
    <span wire:loading wire:target="save">Saving…</span>
</x-ui.button>
```

`wire:target` matters: without it, the button also turns to "Saving…" while an unrelated field validates.

## Errors people can hear

Put the message under its field, mark the field invalid, and tie both together so a screen reader reads the message with the field.

```blade
<x-ui.field label="Email" for="email" :error="$errors->first('email')">
    <x-ui.input id="email" wire:model.blur="email"
        :invalid="$errors->has('email')"
        aria-describedby="{{ $errors->has('email') ? 'email-error' : '' }}" />
</x-ui.field>
```

The listbox and the autocomplete turn `invalid` on by themselves when `$errors` has their field, and pass `aria-*` attributes to their trigger.

## Reset after saving

Clear the form and its old messages once the data is saved, so the next use starts clean.

```php
public function save(): void
{
    $validated = $this->validate();

    Project::create($validated);

    $this->reset('name', 'description');
    $this->resetValidation();
}
```

With a [form object](https://livewire.laravel.com/docs/forms), `$this->form->reset()` clears all its fields at once.

## Several values are an array

A multiple listbox or autocomplete gives Livewire a real array. Validate the array and each item.

```php
/** @var list<string> */
public array $tags = [];

public function save(): void
{
    $this->validate([
        'tags' => ['array', 'max:10'],
        'tags.*' => ['string', 'distinct', Rule::in(Tag::pluck('slug'))],
    ]);
}
```

In a plain form (no Livewire), give the field a `name`: it posts `tags[]`, and Laravel reads `$request->array('tags')`.

## Keep what was typed after a failed submit

Without Livewire, `old()` refills the fields after a redirect with errors. The listbox and the autocomplete read it on their own from their `name`; pass the saved value as the fallback.

```blade
<x-ui.input name="title" :value="old('title', $post->title)" />
<x-ui.listbox name="status" :value="$post->status" :options="$statuses" />
```
