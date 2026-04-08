@php
    $bottomFeatures = [
        [
            'name' => 'code-own',
            'icon' => 'ph--hand-arrow-down',
            'subtitle' => 'Own Your Code.',
            'title' => 'Generate clean Blade and Livewire code directly inside your project.',
        ],
        [
            'name' => 'blade-livewire',
            'icon' => 'ph--stack-simple',
            'subtitle' => 'Native Blade + Livewire.',
            'title' => 'Built specifically for the TALL ecosystem — no adapters, no hacks.',
        ],
        [
            'name' => 'cli-ai',
            'icon' => 'ph--terminal',
            'subtitle' => 'CLI-Driven. AI-Ready.',
            'title' => 'Install fast. Automate workflows. Build with modern AI tooling in mind.',
        ],
    ];
@endphp

<section class="">
    <div class="mx-auto w-full lg:max-w-300 border-x border-border-strong/70 pt-20 border-dashed">
        <x-atoms.site-section-header subtitle="Designed for Artisans"
            title="Everything You Need to Build Modern Laravel Apps"
            description="Flexiwind gives you the right level of abstraction — from foundational primitives to full production-ready blocks — while keeping you in control of your code.">

        </x-atoms.site-section-header>
        <div class="h-4 linear-gradient-pattern border-y border-dashed border-border-strong/70 mt-16"></div>
        <div class="grid sm:grid-cols-2 divide-border-strong/70 divide-dashed">
            <div class="border-b sm:border-r p-3.5 sm:p-5 lg:p-6.5">
                <span class="flex items-center text-sm text-fg-muted">
                    <span aria-hidden="true" class="iconify ph--cube mr-2"></span>
                    Ready Primitives
                </span>
                <h2 class="font-semibold text-fg-title text-xl md:text-2xl mt-4">
                    Production-ready primitives you can extend, customize, and compose without friction.
                </h2>
                <div class="mt-5 aspect-video bg-bg-surface rounded-ui pointer-events-none">
                    <img src="/illustrations/components-light.webp" class="w-full h-full object-cover dark:hidden"
                        alt="Illustration components light" width="1280" height="720" loading="lazy"
                        decoding="async" fetchpriority="low">
                    <img src="/illustrations/components-dark.webp" class="w-full h-full object-cover not-dark:hidden"
                        alt="Illustration components dark" width="1280" height="720" loading="lazy"
                        decoding="async" fetchpriority="low">
                </div>
            </div>
            <div class="border-b p-3.5 sm:p-5 lg:p-6.5">
                <span class="flex items-center text-sm text-fg-muted">
                    <span aria-hidden="true" class="iconify ph--wall mr-2"></span>
                    Smart Blocks
                </span>
                <h2 class="font-semibold text-fg-title text-xl md:text-2xl mt-4">
                    Skip repetitive layout work. Drop in production-ready blocks and focus on business logic.
                </h2>
                <div class="mt-5 aspect-video bg-bg-surface rounded-ui pointer-events-none">
                    <img src="/illustrations/blocks-light.webp" class="w-full h-full object-cover dark:hidden"
                        alt="Illustration blocks light" width="1477" height="831" loading="lazy"
                        decoding="async" fetchpriority="low">
                    <img src="/illustrations/blocks-dark.webp" class="w-full h-full object-cover not-dark:hidden"
                        alt="Illustration blocks dark" width="1477" height="831" loading="lazy"
                        decoding="async" fetchpriority="low">
                </div>
            </div>
            <div class="sm:col-span-full grid sm:grid-cols-2 md:grid-cols-3 divide-border-strong/70 divide-dashed">
                @foreach ($bottomFeatures as $feature)
                    <div
                        class="border-b md:border-b-0 md:border-r md:last:border-r-0 last:borderb-0 px-3.5 py-4 sm:px-5 sm:py-6 grid">
                        <span class="flex items-center text-sm text-fg-muted">
                            <span aria-hidden="true" class="iconify {{ $feature['icon'] }} mr-2"></span>
                            {{ $feature['subtitle'] }}
                        </span>
                        <h2 class="font-semibold text-xl text-fg-title mt-4 mb-5">
                            {{ $feature['title'] }}
                        </h2>
                        @if ($feature['name'] == 'code-own')
                            <div class="rounded-ui bg-bg-surface mt-auto h-52 relative">
                                <span aria-hidden="true"
                                    class="absolute inset-x-3 md:inset-x-6 h-px bg-linear-to-r from-border-strong/40 via-border-strong/60 to-border top-5"></span>
                                <span aria-hidden="true"
                                    class="absolute inset-x-3 md:inset-x-6 h-px bg-linear-to-r from-border-strong/40 via-border-strong/60 to-border bottom-5"></span>
                                <span aria-hidden="true"
                                    class="absolute inset-y-3 w-px bg-linear-to-t from-border via-border-strong/60 to-border-strong/30 left-8 md:left-16"></span>
                                <span aria-hidden="true"
                                    class="absolute inset-y-3 w-px bg-linear-to-t from-border via-border-strong/60 to-border-strong/30 right-8 md:right-16"></span>
                                <div
                                    class="flex items-center justify-center relative size-full px-8 lg:px-16.5 py-5 sm:py-14 overflow-hidden">
                                    <x-atoms.illustration-code-own />
                                </div>
                            </div>
                        @elseif ($feature['name'] == 'blade-livewire')
                            <div aria-hidden="true"
                                class="rounded-ui bg-bg-surface mt-auto h-52 px-10 py-10 flex items-center justify-center relative">
                                <span class="inset-1 absolute text-border ui-grid ui-striper-overlay-mask rotate-180 [--unify-ui-grid-width:--spacing(4)] [--unify-ui-grid-height:--spacing(4)] not-dark:opacity-50"></span>
                                <span class="absolute top-1/2 left-1/2 -translate-1/2 w-7 h-15 bg-linear-to-t from-fg-muted via-fg-title to-fg rounded-full blur-lg dark:blur-2xl not-dark:opacity-35"></span>
                                <div class="grid grid-cols-3 w-full relative">
                                    <div class="flex items-center gap-0.5">
                                        <span class="size-10 rounded-ui bg-bg border border-border d-flex-place-center">
                                            <span class="flex iconify simple-icons--tailwindcss text-primary"></span>
                                        </span>
                                        <span
                                            class="h-px flex items-center justify-end flex-1 bg-linear-to-l from-border-strong relative">
                                            <span class="size-2 border border-border-strong bg-bg rounded-full"></span>
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <span
                                            class="h-px flex items-center flex-1 bg-linear-to-r from-border-strong relative">
                                            <span class="size-2 border border-border-strong bg-bg rounded-full"></span>
                                        </span>
                                        <span class="size-10 rounded-ui bg-bg border border-border d-flex-place-center">
                                            <span
                                                class="flex iconify simple-icons--laravel text-red-600 dark:text-red-500"></span>
                                        </span>
                                        <span
                                            class="h-px flex justify-end items-center flex-1 bg-linear-to-l from-border-strong relative">
                                            <span class="size-2 border border-border-strong bg-bg rounded-full"></span>
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-0.5">
                                        <span
                                            class="h-px flex items-center flex-1 bg-linear-to-r from-border-strong relative">
                                            <span class="size-2 border border-border-strong bg-bg rounded-full"></span>
                                        </span>
                                        <span class="size-10 rounded-ui bg-bg border border-border d-flex-place-center">
                                            <span
                                                class="flex iconify simple-icons--livewire text-pink-600 dark:text-pink-500"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="rounded-ui bg-bg-surface mt-auto h-52 flex d-flex-place-center relative">
                                <span aria-hidden="true"
                                    class="absolute inset-x-3 md:inset-x-6 h-px bg-linear-to-r from-border-strong/40 via-border-strong/60 to-border top-5"></span>
                                <span aria-hidden="true"
                                    class="absolute inset-x-3 md:inset-x-6 h-px bg-linear-to-r from-border-strong/40 via-border-strong/60 to-border bottom-5"></span>
                                <span aria-hidden="true"
                                    class="absolute inset-y-3 w-px bg-linear-to-t from-border via-border-strong/60 to-border-strong/30 left-8 md:left-16"></span>
                                <span aria-hidden="true"
                                    class="absolute inset-y-3 w-px bg-linear-to-t from-border via-border-strong/60 to-border-strong/30 right-8 md:right-16"></span>
                                <x-atoms.illustration-ai-cli />
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="h-4 linear-gradient-pattern border-y border-dashed border-border-strong/70"></div>
    </div>
</section>
