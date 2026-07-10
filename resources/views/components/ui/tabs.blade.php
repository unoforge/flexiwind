@props(['orientation' => 'vertical'])

<div x-data x-f-tabs data-app-tabs role="tablist" {{ $attributes->class([
    'flex flex-col' => $orientation === "vertical",
    'flex flex-row' => $orientation === "horizontal"
]) }}>
    {{ $slot }}
</div>