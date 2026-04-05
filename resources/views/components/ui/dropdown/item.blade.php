@props(['intent' => null, 'href' => null, 'disabled' => false])
@php
    $itemDanger =
        $intent === 'danger'
            ? 'dropdown-item-danger text-(--dropdown-item-danger-fg) **:text-(--dropdown-item-danger-fg)'
            : '';
    $itemWarning =
        $intent === 'warning'
            ? 'dropdown-item-warning text-(--dropdown-item-warning-fg) **:text-(--dropdown-item-warning-fg)'
            : '';

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
        'cursor-default' => !$href,
        'text-fg-muted' => $intent !== 'danger' && $intent !== 'warning',
        $itemDanger,
        $itemWarning,
        'cursor-not-allowed' => $disabled,
    ]);

    $tag = $href ? 'a' : 'button';
    $attributes =
        $tag === 'button'
            ? ($attributes = $attributes->merge([
                'disabled' => $disabled,
            ]))
            : $attributes->merge([
                'href' => $disabled ? null : $href,
                'aria-disabled' => $disabled ? 'true' : null,
                'tabindex' => $disabled ? '-1' : null,
            ]);
@endphp

<{{ $tag }} {{ $attributes }}>
    {{ $slot }}
    </{{ $tag }}>
