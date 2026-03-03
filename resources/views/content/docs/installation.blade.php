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
        Before you begin, make sure you have:
    </x-md.paragraph>
    <x-docs.links-grid :links="$links" />

    <x-md.h2>Installation</x-md.h2>

    <x-docs.ui-tabs :values="[
        ['text' => 'Using flexi-cli', 'value' => 'cli'],
        ['text' => 'Using a Starter', 'value' => 'starter'],
        ['text' => 'Manual Installation', 'value' => 'manual'],
    ]">

        <x-docs.tab-panel value="cli" active>
            <x-docs.steps>
                <x-docs.step>
                    <x-md.h3>Install flexi-cli</x-md.h3>
                    <x-md.paragraph>Make sure to have a laravel project setup</x-md.paragraph>
                    <livewire:base.terminal code="composer require --dev unoforge/flexiwind-cli" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Initialize Flexiwind</x-md.h3>
                    <livewire:base.terminal code="php artisan flexi:init" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Adding component</x-md.h3>
                    <x-md.paragraph>Use the following command to add a component:</x-md.paragraph>
                    <livewire:base.terminal code="flexi-cli add component" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>


        <x-docs.tab-panel value="starter">
            <x-docs.steps>
                <x-docs.step>
                    <x-md.h3> Create a new project using a starter kit</x-md.h3>
                    <x-md.paragraph>Use the following command to create a new project with our starter
                        kit:</x-md.paragraph>
                    <livewire:base.terminal
                        code="laravel new project-name --using=uno-forge-hub/livewire-tail-starter-kit" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3> Navigate to project directory</x-md.h3>
                    <livewire:base.terminal code="cd project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3> Install dependencies</x-md.h3>
                    <livewire:base.terminal code="composer install && npm install" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Setup environment</x-md.h3>
                    <livewire:base.terminal code="cp .env.example .env && php artisan key:generate" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3> Run migration</x-md.h3>
                    <livewire:base.terminal code="php artisan migrate" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>


        <x-docs.tab-panel value="manual">
            <x-docs.steps>
                <x-docs.step>
                    <x-md.h3>1. Create a new Laravel project</x-md.h3>
                    <x-md.paragraph>Create a new Laravel project using laravel Installer:</x-md.paragraph>
                        <livewire:base.terminal code="laravel new project-name -n" />
                        <x-md.paragraph>After installation navigate to project directory:</x-md.paragraph>
                        <livewire:base.terminal code="cd project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>2. Install flexi-cli</x-md.h3>
                    <x-md.paragraph>Install the CLI package:</x-md.paragraph>
                    <livewire:base.terminal code="composer require unoforge/flexiwind-cli --dev" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>3. Initialize the CLI</x-md.h3>
                    <x-md.paragraph>Run the initialization command:</x-md.paragraph>
                    <livewire:base.terminal code="php artisan flexi:init" />
                    <x-md.paragraph>Follow the prompts to complete the setup. Know more about <x-docs.link
                            href="https://github.com/unoforge/flexiwind-cli">flexiwind-cli</x-docs.link></x-md.paragraph>
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>
    </x-docs.ui-tabs>

    <x-md.h2>Next Steps</x-md.h2>
    <x-md.paragraph>
        After installation, you can start the development server:
    </x-md.paragraph>
    <livewire:base.terminal code="composer dev" />
    <x-md.paragraph>
        Then visit <x-docs.inline-code text="http://localhost:8000" /> in your browser to see your new application.
    </x-md.paragraph>
    <x-md.paragraph>
        You can now start adding and using our components. Just use the CLI to add components:
    </x-md.paragraph>
    <livewire:base.terminal code="php artisan flexi:add button input" />
</x-layouts.doc-page-wrapper>
