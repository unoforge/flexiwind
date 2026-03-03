@props(['wrapper' => '', 'class' => '','noDivider'=>false])

@php
    $wrapper_class = "relative overflow-x-auto w-full {$wrapper}";
    $className = "w-full {$class} [--column-px:--spacing(5)] [--column-py:--spacing(2.5)] ";
    $className .= $noDivider ? '' : 'divide-y divide-border-strong';
@endphp
<div class="{{ $wrapper_class }}">
    <table {{ $attributes->merge(['class' => $className]) }}>
        {{ $slot }}
    </table>
</div>