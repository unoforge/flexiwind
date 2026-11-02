@props(['text' => null, 'class' => '', 'size' => 'sm'])
<p
    {{ $attributes->class([
        'text-pretty',
        'text-sm' => $size == 'sm',
        'text-base' => $size == 'base',
        'text-lg' => $size == 'lg',
        $class,
    ]) }}>
    @if ($text)
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</p>
