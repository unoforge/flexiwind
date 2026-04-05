<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">

    <x-md.paragraph>
        Flexiwind CLI is a powerful command-line tool developed by us to help you manage Flexiwind components and streamline your development workflow.
    </x-md.paragraph>

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="composer require --dev unoforge/flexiwind-cli" />

    <x-md.paragraph>
        Or visit the GitHub repository for more installation options:
    </x-md.paragraph>
    <x-docs.link href="https://github.com/unoforge/flexiwind-cli">
        Flexiwind CLI
    </x-docs.link>

    <x-md.h2>Available Commands</x-md.h2>

    <x-md.h3>Add Components</x-md.h3>
    <x-md.paragraph>
        Add Flexiwind components to your project:
    </x-md.paragraph>
    <livewire:base.terminal code="php artisan flexi:add [component-name]" />

    <x-md.h3>
        Examples:
    </x-md.h3>
    <livewire:base.terminal code="php artisan flexi:add button pagination modal" />





    <x-md.h2>Features</x-md.h2>
    <x-md.ul>
        <x-md.li><strong>Component Management:</strong> Easily add, update, and manage Flexiwind components</x-md.li>
        <x-md.li><strong>Dependency Resolution:</strong> Automatically handles component dependencies</x-md.li>
        <x-md.li><strong>Version Control:</strong> Track and manage component versions</x-md.li>
        <x-md.li><strong>Interactive Interface:</strong> User-friendly command-line interface</x-md.li>
        <x-md.li><strong>Integration:</strong> Seamless integration with Laravel projects</x-md.li>
    </x-md.ul>

    <x-md.h3>Development</x-md.h3>
    <x-md.paragraph>
        Flexiwind CLI is actively developed and maintained by us. The CLI tool is designed to complement the Flexiwind component library and provide a smooth development experience.
    </x-md.paragraph>

    <x-md.paragraph>
        For bug reports, feature requests, or contributions, please visit the GitHub repository:
    </x-md.paragraph>
    <x-docs.link href="https://github.com/unoforge/flexiwind-cli">
        Flexiwind CLI
    </x-docs.link>
</x-layouts.doc-page-wrapper>
