@props([
    'description' => null,
    'ogImage' => null,
])

@include('layouts.app', [
    'description' => $description,
    'ogImage' => $ogImage,
    'slot' => $slot,
])
