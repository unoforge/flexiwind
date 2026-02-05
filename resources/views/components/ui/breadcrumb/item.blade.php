@props([
    'wrapper' => '',
    'href' => null,
    'active' => false,
    'activeClass' => 'text-fg-title font-medium',
    'class' => '',
    'separator' => 'ph--caret-right',
    'separatorNotIcon' => false,
    'separatorIconColor' => false,
    'spacing' => '1.5',
    'text' => null,
])

@php
    $spacings = [
        'none' => '',
        '0' => 'gap-0',
        '0.5' => 'gap-0.5',
        '1' => 'gap-1',
        '1.5' => 'gap-1.5',
        '2' => 'gap-2',
        '3' => 'gap-3',
    ];
    $spacing_ = $spacings[$spacing] ?? $spacings['1.5'];
@endphp
<li class="flex items-center {{ $spacing_ }} ">
    @if ($href && !$active)
        <a href="{{ $href }}"
            {{ $attributes->class(['flex items-center ease-linear hover:text-fg-subtitle', $class]) }}>
            @if ($text)
                {{ $text }}
            @else
                {{ $slot }}
            @endif
        </a>
    @else
        <span aria-current="page" class="flex items-center {{ $active ? $activeClass : '' }}">
            @if ($text)
                {{ $text }}
            @else
                {{ $slot }}
            @endif
        </span>
    @endif

    @unless ($active)
        @if ($separatorNotIcon)
            <x-ui.breadcrumb.separator :not-icon="true">
                {!! $separator !!}
            </x-ui.breadcrumb.separator>
        @else
            <x-ui.breadcrumb.separator :icon-color="$separatorIconColor" :separator="$separator" />
        @endif
    @endunless
</li>
