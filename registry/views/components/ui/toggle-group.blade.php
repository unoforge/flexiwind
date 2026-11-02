{{--
    Des boutons à presser qui vont ensemble.
      - `type="single"` (défaut) : une valeur, comme des boutons radio ;
        `required` empêche de la retirer ;
      - `type="multiple"` : un tableau, chaque bouton est indépendant.

    <x-ui.toggle-group wire:model.live="align" label="Alignment">
        <x-ui.toggle-group.item value="left" aria-label="Align left">…</x-ui.toggle-group.item>
    </x-ui.toggle-group>

    Variantes : `ghost` (barre d'outils), `outline` (boutons accolés),
    `segmented` (rail et curseur, comme des onglets). Une tabulation entre
    dans le groupe, les flèches se déplacent dedans.
    Moteur : Alpine.data('fwToggleGroup'), resources/js/plugins/toggle-group.js.
--}}
@props([
    'type' => 'single',
    'value' => null,
    'name' => null,
    'label' => null,
    'options' => null,
    'optionValue' => 'value',
    'optionLabel' => 'label',
    'optionIcon' => 'icon',
    'variant' => 'ghost',
    'size' => 'md',
    'orientation' => 'horizontal',
    'required' => false,
    'disabled' => false,
])

@php
    $type = $type === 'multiple' ? 'multiple' : 'single';
    $variant = in_array($variant, ['ghost', 'outline', 'segmented'], true) ? $variant : 'ghost';
    $vertical = $orientation === 'vertical';
    $initial = \App\Flexiwind\OptionList::selected($value);
    $items = \App\Flexiwind\OptionList::normalize($options, ['value' => $optionValue, 'label' => $optionLabel, 'icon' => $optionIcon]);
@endphp

<div data-slot="toggle-group" role="{{ $type === 'single' ? 'radiogroup' : 'group' }}"
    @if ($label) aria-label="{{ $label }}" @endif
    @if ($vertical) aria-orientation="vertical" @endif
    @if ($disabled) aria-disabled="true" @endif
    x-data="fwToggleGroup(@js([
        'multiple' => $type === 'multiple',
        'value' => $type === 'multiple' ? $initial : ($initial[0] ?? null),
        'required' => (bool) $required,
        'name' => $name,
    ]))"
    x-modelable="value"
    x-on:keydown="onKeydown($event)"
    {{ $attributes->class([
        '[--toggle-group-padding:--spacing(0.75)] isolate inline-flex',
        'flex-col items-stretch' => $vertical,
        'items-center' => ! $vertical,
        'gap-0.5 rounded-ui border border-border bg-background p-(--toggle-group-padding) shadow-xs' => $variant === 'ghost',
        'gap-0.5 rounded-ui bg-muted p-(--toggle-group-padding)' => $variant === 'segmented',
    ]) }}>
    @foreach ($items as $item)
        <x-ui.toggle-group.item :value="$item['value']" :disabled="$item['disabled']" :aria-label="$item['icon'] && $item['label'] === $item['value'] ? $item['label'] : null">
            @if ($item['icon'])
                <x-ui.icon :name="$item['icon']" />
            @endif
            @unless ($item['icon'] && $item['label'] === $item['value'])
                <span>{{ $item['label'] }}</span>
            @endunless
        </x-ui.toggle-group.item>
    @endforeach
    {{ $slot }}

    @if ($name)
        <div wire:ignore hidden>
            <template x-for="(item, index) in formValues" :key="index">
                <input type="hidden" :name="inputName" :value="item">
            </template>
        </div>
    @endif
</div>
