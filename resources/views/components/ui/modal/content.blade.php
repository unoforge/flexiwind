@props([
    'size' => 'md',
    'class' => '',
    'closable' => true,
    'gutter' => true,
    'enterAnimation' => 'modal-animation-in .4s linear',
    'exitAnimation' => 'modal-animation-out .1s linear',
    'animation' => true,
])

@php
    $sizes = [
        'xs' => 'sm:max-w-sm',
        'sm' => 'sm:max-w-md',
        'md' => 'sm:max-w-lg',
        'lg' => 'sm:max-w-xl',
        'xl' => 'sm:max-w-2xl',
        '2xl' => 'sm:max-w-3xl',
        '3xl' => 'sm:max-w-4xl',
        '4xl' => 'sm:max-w-5xl',
        'full' => 'max-w-full',
    ];

    $size_ = $sizes[$size] ?? $sizes['lg'];

@endphp

<div data-modal-content wire:ignore.self
    @if ($animation) data-enter-animation="{{ $enterAnimation }}" data-exit-animation="{{ $exitAnimation }}" @endif
    {{ $attributes->class([
        'w-full flex flex-col relative bg-background  border border-border shadow-sm rounded-ui overflow-hidden',
        '[--gutter:--spacing(6)] sm:[--gutter:--spacing(8)]' => $gutter,
        'animated-modal-content ease-linear transition-all' => $animation,
        $size_,
        $class,
    ]) }}>
    {{ $slot }}

    @if ($closable)
        <x-ui.modal.close size="sm" iconOnly variant="none" intent="none"
            class="absolute top-4 right-4 hover:bg-muted rounded-full text-foreground z-90">
            <x-ui.icon name="ph--x" class="flex" />
        </x-ui.modal.close>
    @endif
</div>
