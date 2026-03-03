@php
    $id = Str::slug($slot);
@endphp

<h4 id="{{ $id }}" {{ $attributes->merge(['class' => 'text-fg-subtitle scroll-mt-26 mt-6 first:mt-0 font-medium']) }}>
    {{ $slot }}
</h4>