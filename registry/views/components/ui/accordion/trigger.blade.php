@props(['class'=>''])
<button data-accordion-trigger aria-label="toggle button"
    class="w-full flex justify-between items-center {{ $class }}">
    {{ $slot }}
</button>
