@props(['id', 'class' => '', 'showAsGrid' => false, 'active' => false])

@php
    $active_class = $showAsGrid ? 'fx-active:grid' : 'fx-active:flex';
    $className = "hidden {$active_class} ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 {$class}";
@endphp

<section role="tabpanel" data-tab-panel aria-hidden="{{ $active ? 'false' : 'true' }}"
    data-state="{{ $active ? 'active' : 'inactive' }}" tabindex="0"
    {{ $attributes->merge([
        'class' => $className,
        'id' => $id,
    ]) }}>
    {{ $slot }}
</section>
