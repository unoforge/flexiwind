@props([
    'id',
    'position' => 'right',
    'class' => '',
    'isFloated' => true,
    'staticBackdrop' => '',
    'backdropBlured' => true,
    'scrollableBody' => false,
    'size' => 'md',
    'closable'=>true
])

@php
    $positions = [
        'left' => '-translate-x-full top-0 fx-open:translate-x-0 left-0',
        'right' => 'translate-x-full top-0 fx-open:translate-x-0 justify-end right-0',
        'top' => '-translate-y-full fx-open:translate-y-0 top-0',
        'bottom' => 'translate-y-full fx-open:translate-y-0 bottom-0',
    ];

    $sizes = [
        'sm' => 'fx-slide-x:max-w-72 fx-slide-y:max-h-72',
        'md' => 'fx-slide-x:max-w-96 fx-slide-y:max-h-96',
        'lg' => 'fx-slide-x:max-w-128 fx-slide-y:max-h-128',
        'xl' => 'fx-slide-x:max-w-160 fx-slide-y:max-h-160',
        '2xl' => 'fx-slide-x:max-w-160 fx-slide-y:max-h-160',
        '3xl' => 'fx-slide-x:max-w-[600px] fx-slide-y:max-h-[600px]',
    ];

    $position_axes = [
        'left' => 'x',
        'right' => 'x',
        'top' => 'y',
        'bottom' => 'y',
    ];

    $u_position = $positions[$position] ?? $positions['right'];
    $pos_ax = $position_axes[$position] ?? $position_axes['right'];
    $size_class = $sizes[$size] ?? $sizes['md'];

    $backdrop_blur = $backdropBlured ? 'backdrop-blur-sm' : '';
@endphp

<div x-data x-offcanvas data-slideover data-offcanvas-backdrop="fixed inset-0 bg-bg/50 z-60 {{ $backdrop_blur }}" data-ax="{{ $pos_ax }}"
    id="{{ $id }}" aria-labelledby="{{ $id }}"
    @if ($staticBackdrop) data-static-backdrop @endif
    @if ($scrollableBody) data-allow-body-scroll @endif
    {{ $attributes->class([
        'fixed w-screen h-dvh ease-linear duration-200 z-110 flex',
        'opacity-0 fx-open:opacity-100',
        'transition-[transform_opacity] duration-300 ease-linear',
        $size_class,
        $u_position,
        'p-2 *:rounded-lg' => $isFloated,
        $class,
    ]) }}>
    {{ $slot }}

    @if ($closable)
    <x-ui.slideover.close size="sm" iconOnly variant="none" intent="none"
            class="absolute top-4 right-4 hover:bg-bg-muted rounded-full text-fg">
        <span aria-hidden="true" class="flex iconify ph--x"></span>
    </x-ui.slideover.close>
    @endif
</div>
