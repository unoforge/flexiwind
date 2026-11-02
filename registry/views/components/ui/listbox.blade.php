{{--
    Listbox : un select stylable et composable. Moteur : @flexilla/select,
    piloté par resources/js/plugins/listbox.js.

    Raccourci, avec des props :
    <x-ui.listbox wire:model.live="framework" :options="$frameworks" searchable />

    Composition libre, pièce par pièce :
    <x-ui.listbox wire:model.live="owner">
        <x-ui.listbox.trigger>
            <x-ui.listbox.value placeholder="Choose an owner">
                <span data-bind="initials"></span> <span data-bind="label"></span>
            </x-ui.listbox.value>
        </x-ui.listbox.trigger>
        <x-ui.listbox.content>
            <x-ui.listbox.search />
            <x-ui.listbox.list>
                <x-ui.listbox.item value="alice" data-initials="AJ">…</x-ui.listbox.item>
            </x-ui.listbox.list>
            <x-ui.listbox.empty />
        </x-ui.listbox.content>
    </x-ui.listbox>

    La valeur vit dans Alpine (x-modelable) : wire:model reçoit une chaîne,
    ou un tableau avec `multiple`. Ce que Flexilla modifie est ignoré par
    Livewire ; si les options changent côté serveur, donnez au listbox un
    wire:key qui en dépend.
--}}
@props([
    'name' => null,
    'value' => null,
    'options' => null,
    'optionValue' => 'value',
    'optionLabel' => 'label',
    'optionDescription' => 'description',
    'optionIcon' => 'icon',
    'optionAvatar' => 'avatar',
    'optionDisabled' => 'disabled',
    'optionGroup' => 'group',
    'multiple' => false,
    'searchable' => false,
    'placeholder' => 'Select an option',
    'searchPlaceholder' => 'Search…',
    'emptyText' => 'No results found for “:query”',
    'display' => 'chips',
    'maxChips' => null,
    'countText' => ':count selected',
    'compactText' => ':labels and :count more',
    'removeLabel' => 'Remove :label',
    'clearText' => 'Clear all',
    'label' => null,
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'placement' => 'bottom-start',
])

@php
    $model = $attributes->wire('model')->value();
    // Stable d'un rendu Livewire à l'autre, distinct entre deux champs de la page.
    $id = $attributes->get('id') ?? 'listbox-'.\Illuminate\Support\Str::slug($name ?? $model ?? 'field').'-'.substr(md5((string) json_encode([$name, $model, $label, $placeholder, $options instanceof \Illuminate\Contracts\Support\Arrayable ? $options->toArray() : $options, (string) $slot])), 0, 6);
    $errorKey = $model ?: ($name ? str_replace(['[]', '[', ']'], ['', '.', ''], $name) : null);
    $isInvalid = $invalid || ($errorKey && isset($errors) && $errors->has($errorKey));
    $display = in_array($display, ['chips', 'count', 'compact'], true) ? $display : 'chips';

    $items = \App\Flexiwind\OptionList::normalize($options, [
        'value' => $optionValue, 'label' => $optionLabel, 'description' => $optionDescription,
        'icon' => $optionIcon, 'avatar' => $optionAvatar, 'disabled' => $optionDisabled, 'group' => $optionGroup,
    ]);

    // Hors Livewire, la valeur de départ vient de `value` ou de old().
    $initial = \App\Flexiwind\OptionList::selected($name ? old(str_replace(['[]', '[', ']'], ['', '.', ''], $name), $value) : $value);

    // Avec un panneau dans le contenu, la composition est la vôtre.
    $composed = str_contains((string) $slot, 'data-select-content');
@endphp

<div data-slot="listbox" data-listbox-id="{{ $id }}" @if ($isInvalid) data-invalid @endif
    x-data="fwListbox(@js([
        'kind' => 'select',
        'multiple' => (bool) $multiple,
        'value' => $multiple ? $initial : ($initial[0] ?? null),
        'name' => $name,
        'disabled' => (bool) $disabled,
    ]))"
    x-modelable="value"
    {{ $attributes->except(['id'])->whereDoesntStartWith('aria-')->class(['group/listbox flex w-full min-w-0 flex-col gap-2']) }}>

    @if ($label)
        <x-ui.label :text="$label" data-listbox-label wire:ignore.self />
    @endif

    @if ($composed)
        {{ $slot }}
    @else
        <x-ui.listbox.trigger :size="$size" :disabled="$disabled" :attributes="$attributes->whereStartsWith('aria-')->merge($isInvalid ? ['aria-invalid' => 'true'] : [])">
            @if ($multiple && $display === 'chips')
                <span class="truncate text-muted-foreground">{{ $placeholder }}</span>
            @else
                <x-ui.listbox.value :mode="$multiple ? $display : 'single'" :placeholder="$placeholder" :count-text="$countText" :compact-text="$compactText" />
            @endif
        </x-ui.listbox.trigger>

        @if ($multiple && $display === 'chips')
            <div class="flex flex-wrap items-center gap-1.5">
                <x-ui.listbox.value mode="chips" placeholder="" :max="$maxChips" :remove-label="$removeLabel" class="contents" />
                <x-ui.listbox.clear class="ms-1">{{ $clearText }}</x-ui.listbox.clear>
            </div>
        @endif

        <x-ui.listbox.content :placement="$placement">
            @if ($searchable)
                <x-ui.listbox.search :placeholder="$searchPlaceholder" />
            @endif
            <x-ui.listbox.list>
                @if ($items !== [])
                    <x-ui.listbox.items :options="$items" />
                @endif
                {{ $slot }}
            </x-ui.listbox.list>
            <x-ui.listbox.empty :empty-text="$emptyText">{{ $empty ?? '' }}</x-ui.listbox.empty>
        </x-ui.listbox.content>
    @endif

    <x-ui.listbox.inputs :name="$name" />
</div>
