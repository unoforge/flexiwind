@props(['danger' => false, 'href' => null, 'disabled' => false])
@php
    $itemClassDefault = $danger ? 'dropdown-item-bg-danger' : 'dropdown-item-bg';
    $className = ' ';

    $attributes = $attributes->class([
        '[--mr-icon:--spacing(2)]',
        'group relative select-none dropdown-item-base dropdown-item-grid text-left',
        'dropdown-item-slot dropdown-item-icon dropdown-item-label ',
        'dropdown-item-force-color',
        'dropdown-item-danger',
        'cursor-default text-base/6 sm:text-sm/6',
        $itemClassDefault,
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
