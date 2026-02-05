@php
    $id = Str::slug($slot);
@endphp

<h2 id="{{ $id }}" {{ $attributes->merge(['class' => 'text-fg-title scroll-mt-26 first:mt-0 mt-12 text-lg font-medium']) }}>
    {{ $slot }}
</h2>