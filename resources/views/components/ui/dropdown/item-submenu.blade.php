@props(['dropdownId', 'variant' => 'none', 'disabled' => false, 'danger' => false])
@php

    $itemClassDefault = $danger ? 'dropdown-item-bg-danger' : 'dropdown-item-bg';
    $className = ' ';

    $attributes = $attributes->class([
        '[--mr-icon:--spacing(1.5)]',
        'group relative select-none dropdown-item-base dropdown-item-variants dropdown-item-grid text-left',
        'dropdown-item-slot dropdown-item-label ',
        'dropdown-item-force-color',
        'dropdown-item-danger',
        'cursor-default text-base/6 sm:text-sm/6',
        $itemClassDefault,
        'cursor-not-allowed' => $disabled,
    ]);

    $attributes = $attributes->merge([
        'disabled' => $disabled,
    ]);
@endphp

<button data-dropdown-trigger data-dropdown-id="dropdown-{{ $dropdownId }}" {{ $attributes }}>
    {{ $slot }}
    <span data-slot="chevron" class="flex iconify ph--caret-right absolute right-2 text-xs"></span>
</button>
