@props(['dropdownId', 'variant' => 'none', 'disabled' => false])
@php

    $attributes = $attributes->class([
        '[--mr-icon:--spacing(2)]',
        'group relative select-none dropdown-item-base dropdown-item-bg dropdown-item-grid text-left',
        'dropdown-item-slot dropdown-item-icon dropdown-item-label ',
        'dropdown-item-force-color',
        'dropdown-item-danger',
        'cursor-default text-base/6 sm:text-sm/6',
        'cursor-not-allowed' => $disabled,
    ]);

    $attributes = $attributes = $attributes->merge([
        'disabled' => $disabled,
    ]);
@endphp

<button data-dropdown-trigger data-dropdown-id="dropdown-{{ $dropdownId }}" {{ $attributes }}>
    {{ $slot }}
    <span data-slot="chevron" class="flex iconify ph--caret-right absolute right-2 text-xs"></span>
</button>
