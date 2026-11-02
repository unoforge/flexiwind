@props(['dropdownId', 'variant' => 'none', 'disabled' => false])
@php


    $attributes = $attributes->class([
        'dropdown-item-base',
        'dropdown-item-base-vars',
        'min-w-0 [--mr-icon:--spacing(2.5)] sm:[--mr-icon:--spacing(2)]',
        'not-has-[[slot=description]]:items-center',
        'group relative cursor-default select-none dropdown-item-radius rounded-dropdown-item text-left',
        'text-base/6 sm:text-sm/6 forced-colors:text-[CanvasText]',
        'ease-linear duration-200',
        'dropdown-item-grid',
        'dropdown-item-icon',
        'dropdown-item-keyboard',
        'dropdown-item-description',
        'dropdown-item-has-description',
        'dropdown-item-label',
        'dropdown-item-avatar',
        'dropdown-item-force-color',
        'dropdown-item-hover',
        'dropdown-item-disabled',
        'dropdown-item-selected',
        'dropdown-item-selected-icon',
        'dropdown-item-selected-avatar-icon',
        'dropdown-item-selected-avatar',
        'ease-linear duration-200',
        'text-muted-foreground',
        'cursor-not-allowed' => $disabled,
    ]);

    $attributes = $attributes->merge([
        'disabled' => $disabled,
    ]);
@endphp

<button data-dropdown-trigger data-dropdown-id="dropdown-{{ $dropdownId }}" {{ $attributes }}>
    {{ $slot }}
    <x-ui.icon name="ph--caret-right" icon-slot="chevron" data-slot="chevron" class="absolute right-2 text-xs" />
</button>
