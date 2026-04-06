@php
    $services = [
        [
            'title' => 'UI system architecture',
            'description' => 'Design scalable design-token and component foundations for consistent product delivery.',
            'icon' => 'ph--squares-four',
        ],
        [
            'title' => 'Product interface implementation',
            'description' => 'Build production-ready pages, flows, and states with Blade, Livewire, and Tailwind.',
            'icon' => 'ph--code',
        ],
        [
            'title' => 'Delivery acceleration',
            'description' => 'Refactor and structure frontend codebases so teams move faster with less regression risk.',
            'icon' => 'ph--rocket-launch',
        ],
    ];
@endphp

<section class="">
    <div class="mx-auto w-full lg:max-w-300 border-x border-border-strong/70 border-dashed pt-20">
        <x-atoms.site-section-header subtitle="More than components"
            title="Our services"
            description="UnoForge supports product teams end-to-end, from design system strategy to implementation and optimization.">
        </x-atoms.site-section-header>

        <div class="px-4 sm:px-6 lg:px-8 mt-14 pb-16">
            <div class="grid md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-border-strong/70 divide-dashed border border-border-strong/70 border-dashed">
                @foreach ($services as $service)
                    <article class="p-4 sm:p-5">
                        <span class="h-7 px-5 flex items-center rounded-ui bg-primary text-white w-max">
                            <span aria-hidden class="iconify {{ $service['icon'] }} size-4"></span>
                        </span>
                        <h3 class="font-semibold text-fg-title text-lg mt-4">
                            {{ $service['title'] }}
                        </h3>
                        <p class="text-sm text-fg-muted mt-2">
                            {{ $service['description'] }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="h-4 linear-gradient-pattern border-y border-dashed border-border-strong/70"></div>
    </div>
</section>
