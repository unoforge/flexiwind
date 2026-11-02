{{--
    Un groupe d'étiquettes. Trois usages :
      - affichées : <x-ui.tag-group label="Labels">…</x-ui.tag-group> ;
      - à retirer : `removable`, la valeur est la liste de celles qui restent ;
      - à choisir : `selectable` (un seul) ou `selectable multiple`.

    Les étiquettes se composent avec <x-ui.tag>, ou viennent d'`options`.
    wire:model reçoit une chaîne, ou un tableau avec `multiple` ou `removable`.
    Moteur : Alpine.data('fwTagGroup'), resources/js/plugins/tags.js.
--}}
@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'options' => null,
    'optionValue' => 'value',
    'optionLabel' => 'label',
    'selectable' => false,
    'multiple' => false,
    'removable' => false,
    'variant' => 'soft',
    'size' => 'md',
    'removeLabel' => 'Remove :label',
    'disabled' => false,
])

@php
    $model = $attributes->wire('model')->value();
    $id = $attributes->get('id') ?? 'tag-group-'.\Illuminate\Support\Str::slug($name ?? $model ?? 'tags').'-'.substr(md5((string) json_encode([$name, $model, $label])), 0, 6);
    $items = \App\Flexiwind\OptionList::normalize($options, ['value' => $optionValue, 'label' => $optionLabel]);
    $initial = $value === null ? null : \App\Flexiwind\OptionList::selected($value);
    $list = $removable || $multiple;
@endphp

<div data-slot="tag-group" id="{{ $id }}"
    x-data="fwTagGroup(@js([
        'value' => $initial === null ? null : ($list ? $initial : ($initial[0] ?? null)),
        'multiple' => (bool) $multiple,
        'selectable' => (bool) $selectable,
        'removable' => (bool) $removable,
        'name' => $name,
    ]))"
    x-modelable="value"
    x-on:tag-remove="fwTagRemove($event.detail.value, $event.target)"
    x-on:keydown="onKeydown($event)"
    {{ $attributes->except(['id'])->class(['flex flex-col gap-2.5']) }}>
    @if ($label)
        <span id="{{ $id }}-label" class="text-sm font-medium text-title-foreground">{{ $label }}</span>
    @endif

    <div role="group" @if ($label) aria-labelledby="{{ $id }}-label" @endif class="flex flex-wrap items-center gap-1.5">
        @foreach ($items as $item)
            <x-ui.tag :value="$item['value']" :label="$item['label']" :disabled="$disabled || $item['disabled']" />
        @endforeach
        {{ $slot }}
    </div>

    @if ($name)
        <div wire:ignore hidden>
            <template x-for="(item, index) in formValues" :key="index">
                <input type="hidden" :name="inputName" :value="item">
            </template>
        </div>
    @endif
</div>
