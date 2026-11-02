@props(['id', 'closeHeight' => null])

<div x-f-collapse data-app-collapse id="f_collapse_{{ $id }}"
    @if ($closeHeight && is_numeric($closeHeight)) data-close-height="{{ $closeHeight }}" @endif
    {{ $attributes->class([
        'transition-[height] duration-300 ease-linear overflow-hidden w-full fx-open:h-auto',
    ]) }}>
    {{ $slot }}
</div>
