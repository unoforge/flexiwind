{{--
    Une option. Écrivez son contenu comme vous voulez :

    <x-ui.listbox.item value="alice" data-initials="AJ">
        <x-ui.listbox.avatar src="…" />
        <x-ui.listbox.label>Alice Johnson</x-ui.listbox.label>
        <x-ui.listbox.description>alice@example.com</x-ui.listbox.description>
    </x-ui.listbox.item>

    Un simple texte devient le libellé. `label` fixe le texte utilisé par la
    recherche et l'affichage de la valeur ; sinon c'est celui de
    <x-ui.listbox.label>, ou tout le texte de l'option. Les attributs data-*
    sont lus par les modèles de <x-ui.listbox.value> (data-bind="initials").
--}}
@props(['value', 'label' => null, 'disabled' => false, 'check' => true])

@php
    $html = (string) $slot;
    $hasLabel = str_contains($html, 'data-slot="label"');
    $isText = ! str_contains($html, '<');

    if ($label === null && $hasLabel && preg_match('/data-slot="label"[^>]*>(.*?)<\/span>/s', $html, $match)) {
        $label = $match[1];
    }

    $text = trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($label ?? $html), ENT_QUOTES)));
@endphp

<div data-select-item="{{ $value }}" data-label="{{ $text }}"
    @if ($disabled) data-disabled aria-disabled="true" @endif
    {{ $attributes->class([
        'dropdown-item-base dropdown-item-base-vars',
        'min-w-0 [--mr-icon:--spacing(2.5)] sm:[--mr-icon:--spacing(2)]',
        'not-has-[[slot=description]]:items-center',
        'group relative cursor-default select-none dropdown-item-radius rounded-dropdown-item text-left',
        'text-base/6 sm:text-sm/6 text-muted-foreground forced-colors:text-[CanvasText]',
        'dropdown-item-grid dropdown-item-icon dropdown-item-keyboard dropdown-item-description dropdown-item-has-description',
        'dropdown-item-label dropdown-item-avatar dropdown-item-force-color dropdown-item-hover dropdown-item-disabled',
        'dropdown-item-selected dropdown-item-selected-icon dropdown-item-selected-avatar-icon dropdown-item-selected-avatar',
        // L'option surlignée au clavier par Flexilla.
        'data-select-highlighted:bg-(--dropdown-item-hover-and-select) data-select-highlighted:text-(--dropdown-item-hover-and-select-fg)',
        'data-disabled:opacity-50',
    ]) }}>
    @if ($check)
        <span aria-hidden="true" data-slot="check-indicator"
            class="mr-1.5 -ml-0.5 flex h-lh shrink-0 text-xs text-foreground iconify ph--check-bold invisible group-aria-selected:visible
                group-has-data-[slot=icon]:absolute group-has-data-[slot=icon]:top-1/2 group-has-data-[slot=icon]:right-2.5 group-has-data-[slot=icon]:mr-0 group-has-data-[slot=icon]:-translate-y-1/2
                group-has-data-[slot=avatar]:absolute group-has-data-[slot=avatar]:top-1/2 group-has-data-[slot=avatar]:right-2.5 group-has-data-[slot=avatar]:mr-0 group-has-data-[slot=avatar]:-translate-y-1/2"></span>
    @endif
    @if ($isText)
        <x-ui.listbox.label>{{ $slot }}</x-ui.listbox.label>
    @elseif ($hasLabel || str_contains($html, 'data-slot="'))
        {{ $slot }}
    @else
        {{-- Du HTML libre : il prend la colonne du libellé. --}}
        <span class="col-start-2 min-w-0">{{ $slot }}</span>
    @endif
</div>
