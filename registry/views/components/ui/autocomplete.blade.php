{{--
    Autocomplete : on tape, la liste se resserre, on choisit. Le déclencheur
    est l'input, le panneau et les options sont ceux du listbox, composables
    de la même façon. Moteur : @flexilla/autocomplete, piloté par
    resources/js/plugins/listbox.js.

    Composition libre :
    <x-ui.autocomplete wire:model="owners" multiple>
        <x-ui.autocomplete.input placeholder="Search owners" />
        <x-ui.listbox.value mode="chips">…modèle d'une puce…</x-ui.listbox.value>
        <x-ui.listbox.content>
            <x-ui.listbox.list>
                <x-ui.listbox.item value="alice">…</x-ui.listbox.item>
            </x-ui.listbox.list>
            <x-ui.listbox.empty />
        </x-ui.listbox.content>
    </x-ui.autocomplete>

    Liste connue :
    <x-ui.autocomplete wire:model.live="city" :options="$cities" />

    Recherche Livewire : `search` nomme la propriété qui reçoit le texte.
    Le serveur filtre, renvoie les options, le panneau se met à jour sans
    perdre le focus.
    <x-ui.autocomplete wire:model="customerId" search="query" :options="$this->customers" />
--}}
@props([
    'name' => null,
    'value' => null,
    'options' => null,
    'selectedOptions' => null,
    'optionValue' => 'value',
    'optionLabel' => 'label',
    'optionDescription' => 'description',
    'optionIcon' => 'icon',
    'optionAvatar' => 'avatar',
    'optionDisabled' => 'disabled',
    'optionGroup' => 'group',
    'multiple' => false,
    'search' => null,
    'minChars' => null,
    'debounce' => 300,
    'placeholder' => 'Type to filter',
    'emptyText' => 'No results found for “:query”',
    'minCharsText' => 'Type at least :count characters.',
    'startText' => 'Type to search.',
    'display' => 'chips',
    'maxChips' => null,
    'countText' => ':count selected',
    'removeLabel' => 'Remove :label',
    'clearText' => 'Clear all',
    'clearLabel' => 'Clear',
    'label' => null,
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'placement' => 'bottom-start',
])

@php
    $model = $attributes->wire('model')->value();
    // Stable d'un rendu Livewire à l'autre, distinct entre deux champs de la page.
    // En recherche serveur, les options changent à chaque frappe : elles n'entrent pas dans l'id.
    $id = $attributes->get('id') ?? 'autocomplete-'.\Illuminate\Support\Str::slug($name ?? $model ?? 'field').'-'.substr(md5((string) json_encode([$name, $model, $label, $placeholder, $search ?: ($options instanceof \Illuminate\Contracts\Support\Arrayable ? $options->toArray() : $options), $search ? '' : (string) $slot])), 0, 6);
    $errorKey = $model ?: ($name ? str_replace(['[]', '[', ']'], ['', '.', ''], $name) : null);
    $isInvalid = $invalid || ($errorKey && isset($errors) && $errors->has($errorKey));
    $display = in_array($display, ['chips', 'list'], true) ? $display : 'chips';
    // La recherche serveur attend au moins un caractère ; une liste connue s'ouvre tout de suite.
    $minChars = (int) ($minChars ?? ($search ? 1 : 0));

    $items = \App\Flexiwind\OptionList::normalize($options, [
        'value' => $optionValue, 'label' => $optionLabel, 'description' => $optionDescription,
        'icon' => $optionIcon, 'avatar' => $optionAvatar, 'disabled' => $optionDisabled, 'group' => $optionGroup,
    ]);

    // Les options déjà choisies, hors des résultats : elles nomment la sélection
    // sans apparaître dans la liste (recherche serveur, valeur de départ).
    $known = \App\Flexiwind\OptionList::normalize($selectedOptions, [
        'value' => $optionValue, 'label' => $optionLabel, 'description' => $optionDescription,
        'icon' => $optionIcon, 'avatar' => $optionAvatar, 'disabled' => $optionDisabled, 'group' => $optionGroup,
    ]);

    $initial = \App\Flexiwind\OptionList::selected($name ? old(str_replace(['[]', '[', ']'], ['', '.', ''], $name), $value) : $value);
    // Avec un panneau dans le contenu, la composition est la vôtre.
    $composed = str_contains((string) $slot, 'data-select-content');
@endphp

{{-- data-fx-teleport-root : le panneau reste ici, à portée de Livewire. --}}
<div data-slot="autocomplete" data-listbox-id="{{ $id }}" data-fx-teleport-root @if ($isInvalid) data-invalid @endif
    x-data="fwListbox(@js([
        'kind' => 'autocomplete',
        'multiple' => (bool) $multiple,
        'value' => $multiple ? $initial : ($initial[0] ?? null),
        'name' => $name,
        'search' => $search,
        'minChars' => $minChars,
        'debounce' => (int) $debounce,
        'minCharsText' => $minCharsText,
        'startText' => $startText,
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
        <x-ui.autocomplete.input :placeholder="$placeholder" :size="$size" :disabled="$disabled" :search="$search" :clear-label="$clearLabel"
            :attributes="$attributes->whereStartsWith('aria-')->merge($isInvalid ? ['aria-invalid' => 'true'] : [])" />

        @if ($multiple && $display === 'list')
            <div class="flex flex-col gap-1.5" x-cloak x-show="hasValue">
                <div class="flex items-center justify-between px-0.5 text-xs font-medium text-muted-foreground">
                    <x-ui.listbox.value mode="count" placeholder="" :count-text="$countText" class="flex-none" />
                    <x-ui.listbox.clear>{{ $clearText }}</x-ui.listbox.clear>
                </div>
                <x-ui.listbox.value mode="list" placeholder="" :remove-label="$removeLabel" />
            </div>
        @elseif ($multiple)
            <div class="flex flex-wrap items-center gap-1.5">
                <x-ui.listbox.value mode="chips" placeholder="" :max="$maxChips" :remove-label="$removeLabel" class="contents" />
                <x-ui.listbox.clear class="ms-1">{{ $clearText }}</x-ui.listbox.clear>
            </div>
        @endif

        <x-ui.listbox.content :placement="$placement">
            <x-ui.listbox.list :search="$search">
                @if ($items !== [])
                    <x-ui.listbox.items :options="$items" />
                @endif
                {{ $slot }}
            </x-ui.listbox.list>
            <x-ui.listbox.empty :empty-text="$emptyText">{{ $empty ?? '' }}</x-ui.listbox.empty>
        </x-ui.listbox.content>
    @endif

    @if ($known !== [])
        <div hidden data-listbox-known wire:key="autocomplete-known">
            <x-ui.listbox.items :options="$known" />
        </div>
    @endif

    <x-ui.listbox.inputs :name="$name" />
</div>
