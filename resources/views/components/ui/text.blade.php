@props(['intent' => 'muted', 'as' => 'p'])

@php
    $tag = $as;

@endphp
<{{ $tag }}
    {{ $attributes->class([
        'text-fg-muted' => $intent == 'muted',
        'text-fg' => $intent == 'body',
        'text-fg-title' => $intent == 'title',
        'text-gray-500' => $intent == 'caption',
        'text-primary' => $intent == 'primary',
        'text-secondary' => ($intent == 'secondary'),
        'text-warning' => $intent == 'warning',
        'text-danger' => $intent == 'danger',
    ]) }}>
    {{ $slot }}
</{{ $tag }}>
