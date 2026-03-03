@php
    $bottomFeatures = [
        [
            'name' => 'code-own',
            'icon' => 'ph--hand-arrow-down',
            'subtitle' => 'Own Your Code.',
            'title' => 'Generate clean Blade and Livewire code directly inside your project.',
            'illustration' => '/images/illustrations/code-ownership.png',
        ],
        [
            'name' => 'blade-livewire',
            'icon' => 'ph--stack-simple',
            'subtitle' => 'Native Blade + Livewire.',
            'title' => 'Built specifically for the TALL ecosystem — no adapters, no hacks.',
            'illustration' => '/images/illustrations/blade-livewire.png',
        ],
        [
            'name' => 'cli-ai',
            'icon' => 'ph--terminal',
            'subtitle' => 'CLI-Driven. AI-Ready.',
            'title' => 'Install fast. Automate workflows. Build with modern AI tooling in mind.',
            'illustration' => '/images/illustrations/cli-ai.png',
        ],
    ];
@endphp

<section class="border-t border-dashed border-border-strong/70">
    <div class="mx-auto w-full lg:max-w-300 border-x border-border-strong/70 pt-20 border-dashed border-t relative">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 flex noise-subtle opacity-60 dark:opacity-50"></div>

        <div class="px-3.5 sm:px-8 md:px-16 lg:px-8 xl:px-0 mx-auto w-full max-w-3xl lg:max-w-5xl flex flex-col">
            <h2 class="font-bold text-3xl md:text-4xl/tight max-w-2xl text-balance text-transparent bg-clip-text bg-linear-to-br from-fg-title to-fg-muted/60 dark:via-fg">
                Stop rebuilding UI. Start shipping Laravel apps faster.
            </h2>
            <p class="text-fg-muted max-w-md text-sm mt-6.5">
                Prebuilt TALL Stack components and blocks designed for speed, structure, and complete code ownership.
            </p>
            <div class="flex flex-wrap gap-3 mt-9 ">
                <x-ui.button href="/blocks" wire:navigate size="sm" class="sm:btn-md">
                    <span aria-hidden="true" class="iconify ph--cube-duotone opacity-80 mr-2 size-3.5"></span>
                    Request block
                </x-ui.button>
                <x-ui.button href="https://johnkat-mj.mychariow.shop/prd_jue7tw" variant="outline" size="sm" class="sm:btn-md">
                    <span aria-hidden="true" class="iconify ph--heart-duotone opacity-80 mr-2 size-3.5"></span>
                    Support us
                </x-ui.button>
            </div>
        </div>
        <div class="h-4 linear-gradient-pattern border-y border-dashed border-border-strong/70 mt-20"></div>
    </div>
</section>
