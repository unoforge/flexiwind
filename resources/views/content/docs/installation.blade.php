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
                    <x-md.paragraph>Inside your existing Laravel project, pull in the CLI as a dev dependency.</x-md.paragraph>
                    <livewire:base.terminal code="composer require --dev unoforge/flexiwind-cli" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Initialize Flexiwind</x-md.h3>
                    <x-md.paragraph>Run the init command to scaffold the necessary config and files into your project.</x-md.paragraph>
                    <livewire:base.terminal code="php artisan flexi:init" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Add the base utilities</x-md.h3>
                    <x-md.paragraph>Install the Flexiwind base utilities — these are the foundation that all components build on.</x-md.paragraph>
                    <livewire:base.terminal code="php artisan flexi:add flexiwind-base" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>


        <x-docs.tab-panel value="starter">
            <x-docs.steps>
                <x-docs.step>
                    <x-md.h3>Create a new project</x-md.h3>
                    <x-md.paragraph>Spin up a fresh Laravel project using the Flexiwind starter kit. This gives you a fully configured setup out of the box.</x-md.paragraph>
                    <livewire:base.terminal
                        code="laravel new project-name --using=uno-forge-hub/livewire-tail-starter-kit" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Navigate to your project</x-md.h3>
                    <livewire:base.terminal code="cd project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Install dependencies</x-md.h3>
                    <x-md.paragraph>Install both PHP and Node dependencies.</x-md.paragraph>
                    <livewire:base.terminal code="composer install && npm install" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Set up your environment</x-md.h3>
                    <x-md.paragraph>Copy the example env file and generate your application key.</x-md.paragraph>
                    <livewire:base.terminal code="cp .env.example .env && php artisan key:generate" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Run migrations</x-md.h3>
                    <x-md.paragraph>Set up your database tables.</x-md.paragraph>
                    <livewire:base.terminal code="php artisan migrate" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>


        <x-docs.tab-panel value="manual">
            <x-docs.steps>
                <x-docs.step>
                    <x-md.h3>1. Create a new Laravel project</x-md.h3>
                    <x-md.paragraph>Start with a fresh Laravel install using the Laravel installer.</x-md.paragraph>
                    <livewire:base.terminal code="laravel new project-name -n" />
                    <x-md.paragraph>Then move into your new project directory.</x-md.paragraph>
                    <livewire:base.terminal code="cd project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>2. Install flexi-cli</x-md.h3>
                    <x-md.paragraph>Add the CLI as a dev dependency — it's what powers all the <x-docs.inline-code text="flexi:*" /> commands.</x-md.paragraph>
                    <livewire:base.terminal code="composer require unoforge/flexiwind-cli --dev" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>3. Initialize the CLI</x-md.h3>
                    <x-md.paragraph>Run the init command and follow the prompts to complete the setup.</x-md.paragraph>
                    <livewire:base.terminal code="php artisan flexi:init" />
                    <x-md.paragraph>Want to learn more? Check out the <x-docs.link
                            href="https://github.com/unoforge/flexiwind-cli">flexiwind-cli docs</x-docs.link> on GitHub.</x-md.paragraph>
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>4. Add the base utilities</x-md.h3>
                    <x-md.paragraph>Install the Flexiwind base utilities — these are required before adding any components.</x-md.paragraph>
                    <livewire:base.terminal code="php artisan flexi:add flexiwind-base" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>
    </x-docs.ui-tabs>

    <x-md.h2>Next Steps</x-md.h2>
    <x-md.paragraph>
        Start the development server and you're good to go.
    </x-md.paragraph>
    <livewire:base.terminal code="composer dev" />
    <x-md.paragraph>
        Open <x-docs.inline-code text="http://localhost:8000" /> in your browser and you should see your app running.
    </x-md.paragraph>
    <x-md.paragraph>
        From here, you can start pulling in components one by one using the CLI. Just pass the component names you want:
    </x-md.paragraph>
    <livewire:base.terminal code="php artisan flexi:add button input" />
</x-layouts.doc-page-wrapper>
