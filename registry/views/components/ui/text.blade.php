@props(['intent' => 'muted', 'as' => 'p'])

@php
    $tag = $as;
    $intent = $intent === 'danger' ? 'destructive' : $intent;

@endphp
<{{ $tag }}
    {{ $attributes->class([
        'text-muted-foreground' => $intent == 'muted',
        'text-foreground' => $intent == 'body',
        'text-title-foreground' => $intent == 'title',
        'text-gray-500' => $intent == 'caption',
        'text-primary' => $intent == 'primary',
        'text-secondary' => ($intent == 'secondary'),
        'text-warning' => $intent == 'warning',
        'text-destructive' => $intent == 'destructive',
    ]) }}>
    {{ $slot }}
</{{ $tag }}>
