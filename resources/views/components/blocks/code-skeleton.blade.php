@props([
    'class' => '',
    'lines' => 8,
])
<div
    {{ $attributes->merge(['class' => "rounded-global border border border-border-strong/30 bg-(--astro-code-color-background) p-4 font-mono text-sm w-full flex flex-col space-y-2 $class"]) }}>

    @for ($i = 0; $i < $lines; $i++)
        <div class="flex items-center space-x-2">
            {{-- Code content with varying widths --}}
            @php
                $width = rand(20, 80); // random width between 20% and 80%
                $delay = $i * 100; // staggered animation delay
            @endphp

            <x-ui.skeleton no-bg class="h-4 bg-gray-800 dark:bg-gray-900" style="width: {{ $width }}%; animation-delay: {{ $delay }}ms" />
        </div>
    @endfor
</div>
