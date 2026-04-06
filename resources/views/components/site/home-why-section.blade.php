@php
    $items = [
        [
            'title' => 'Composable by default',
            'icon' => 'ph--puzzle-piece-duotone',
            'description' => 'Use Blade + Livewire primitives that stay easy to adapt.',
        ],
        [
            'title' => 'Token-driven theming',
            'icon' => 'ph--paint-brush-duotone',
            'description' => 'One semantic token layer controls colors, borders, and UI states.',
        ],
        [
            'title' => 'Practical docs',
            'icon' => 'ph--tray-duotone',
            'description' => 'Implementation-focused guides with examples and API references.',
        ],
    ];
@endphp


<section class="pt-4 relative">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
      
        <div class="flex justify-between size-full max-w-300 mx-auto relative">
            <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
            <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
             <div class="absolute h-3 top-0 inset-0 bg-linear-to-b from-bg"></div>
        </div>  
       
    </div>
    <div
        class="w-full mx-auto md:max-w-300 relative grid gap-x-4 gap-y-6 sm:grid-cols-2 md:grid-cols-3 lg:gap-x-12 py-6 px-3.5 sm:px-10 md:px-16 lg:px-24">
        <span aria-hidden="true" class="absolute -inset-x-1 bg-border-strong/60 flex justify-between items-center h-px">
            <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
            <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
        </span>
        <span aria-hidden="true" class="absolute bottom-0 -inset-x-1 bg-border-strong/60 flex justify-between items-center h-px">
            <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
            <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
        </span>
        @foreach ($items as $item)
            <div class="flex flex-col items-start">
                <div class="h-7 px-5 flex items-center rounded-ui bg-primary text-white w-max">
                    <span aria-hidden class="iconify {{ $item['icon'] }} size-4"></span>
                </div>
                <h2 class="font-semibold text-fg-title mt-3 text-sm">
                    {{ $item['title'] }}
                </h2>
                <p class="text-sm text-fg-muted mt-1">
                    {{ $item['description'] }}
                </p>
            </div>
        @endforeach
    </div>
</section>
