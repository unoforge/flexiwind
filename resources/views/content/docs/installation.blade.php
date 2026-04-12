@php
    $links = [
        [
            'href' => 'https://tailwindcss.com',
            'title' => 'Tailwindcss',
            'description' => 'Utility-first CSS framework.',
            'icon' => 'simple-icons--tailwindcss',
        ],
        [
            'href' => 'https://laravel.com',
            'title' => 'Laravel',
            'description' => 'PHP web framework.',
            'icon' => 'simple-icons--laravel',
        ],
        [
            'href' => 'https://alpinejs.dev',
            'title' => 'Alpine.js',
            'description' => 'Minimal JS behavior framework. (Optional when not using Livewire)',
            'icon' => 'simple-icons--alpinedotjs',
        ],
    ];
@endphp

<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">
    <x-md.h2>Prerequisites</x-md.h2>
    <x-md.paragraph>
        Flexiwind is built on top of a few tools you'll need to have in place before getting started. If you already have a Laravel project running with Tailwind CSS, you're most of the way there.
    </x-md.paragraph>
    <x-docs.links-grid :links="$links" />

    <x-md.h2>Choose Your Path</x-md.h2>
    <x-md.paragraph>
        Everyone's workflow is different. Choose the approach that fits your project best.
    </x-md.paragraph>

    <x-docs.ui-tabs :values="[
        ['text' => 'Add to existing project', 'value' => 'cli'],
        ['text' => 'Start fresh with a kit', 'value' => 'starter'],
    ]">

        <x-docs.tab-panel value="cli" active>
            <x-docs.steps>
                <x-docs.step>
                    <x-md.h3>Install the CLI</x-md.h3>
                    <x-md.paragraph>
                        Drop the Flexiwind CLI into your existing Laravel project as a dev dependency.
                        This gives you access to all the component management commands.
                    </x-md.paragraph>
                    <livewire:base.terminal code="composer require --dev unoforge/flexiwind-cli" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Initialize your project</x-md.h3>
                    <x-md.paragraph>
                        The init command scaffolds everything you need — configuration files, directory structure, and base styles.
                        It's safe to run on existing projects; it won't overwrite anything you've already set up.
                    </x-md.paragraph>
                    <livewire:base.terminal code="php artisan flexi:init" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Install base utilities</x-md.h3>
                    <x-md.paragraph>
                        Every Flexiwind component relies on shared base utilities for colors, typography, and spacing.
                        Install these first — they're the foundation everything else builds on.
                    </x-md.paragraph>
                    <livewire:base.terminal code="php artisan flexi:add flexiwind-base" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>


        <x-docs.tab-panel value="starter">
            <x-docs.steps>
                <x-docs.step>
                    <x-md.h3>Clone the starter kit</x-md.h3>
                    <x-md.paragraph>
                        Grab the pre-configured starter kit. It comes with Laravel, Tailwind CSS, and Flexiwind
                        already wired up — just add your project name and you're ready to go.
                    </x-md.paragraph>
                    <livewire:base.terminal
                        code="git clone https://github.com/uno-forge-hub/livewire-tail-starter-kit.git project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Enter your project directory</x-md.h3>
                    <x-md.paragraph>Hop into your new project folder to start working.</x-md.paragraph>
                    <livewire:base.terminal code="cd project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Run the setup command</x-md.h3>
                    <x-md.paragraph>
                        One command installs all PHP and Node dependencies, sets up your environment file,
                        and runs the initial database migrations. It's the fastest way to get from zero to coding.
                    </x-md.paragraph>
                    <livewire:base.terminal code="composer setup" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>
    </x-docs.ui-tabs>

    <x-md.h2>Next Steps</x-md.h2>

    <x-md.h3>Start the development server</x-md.h3>
    <x-md.paragraph>
        Fire up the dev server to see your setup in action. This command starts both the Laravel server and the Vite build process.
    </x-md.paragraph>
    <livewire:base.terminal code="composer dev" />

    <x-md.paragraph>
        Open <x-docs.inline-code text="http://localhost:8000" /> in your browser — if everything went smoothly, you'll see your app ready to go.
    </x-md.paragraph>

    <x-md.h3>Add your first components</x-md.h3>
    <x-md.paragraph>
        Now the fun part — start pulling in the components you need. The CLI copies them directly into your project,
        so you can customize every detail. Install one component or several at once:
    </x-md.paragraph>
    <livewire:base.terminal code="php artisan flexi:add button input" />

    {{-- <x-md.paragraph>
        Want to see what's available? Run <x-docs.inline-code text="php artisan flexi:list" /> to browse all components
        with descriptions and previews.
    </x-md.paragraph> --}}

    <x-md.h3>Need help?</x-md.h3>
    <x-md.paragraph>
        Run <x-docs.inline-code text="php artisan flexi:help" /> anytime to see all available commands and options.
    </x-md.paragraph>
</x-layouts.doc-page-wrapper>
