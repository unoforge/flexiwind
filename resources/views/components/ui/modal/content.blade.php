@props(['size' => 'md', 'class' => '', 'closable' => true, 'noGutter' => false])

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
    {{ $attributes->class([
        'w-full flex flex-col relative bg-bg border border-border shadow-sm rounded-ui overflow-hidden',
        '[--gutter:--spacing(6)] sm:[--gutter:--spacing(8)]' => !$noGutter,
        $size_,
        $class,
    ]) }}>
    {{ $slot }}

    @if ($closable)
        <x-ui.modal.close size="sm" iconOnly variant="none" intent="none"
            class="absolute top-4 right-4 hover:bg-bg-muted rounded-full text-fg z-90">
            <span aria-hidden="true" class="flex iconify ph--x"></span>
        </x-ui.modal.close>
    @endif
</div>
