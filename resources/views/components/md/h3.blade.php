@php
    $id = Str::slug($slot);
@endphp

<h3 id="{{ $id }}" {{ $attributes->merge(['class' => 'text-fg-title scroll-mt-26 mt-8 first:mt-0 font-medium']) }}>
    {{ $slot }}
</h3>