<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">

    <x-md.paragraph>
        Flexiwind AI Skills are a collection of markdown guides designed to help AI assistants (Cursor, Cline, Windsurf, GitHub Copilot, and any LLM) generate accurate Flexiwind code — correct component names, props, install commands, and composition patterns.
    </x-md.paragraph>

    <x-md.h2>Installation</x-md.h2>

    <x-md.h3>Via Laravel Boost</x-md.h3>
    <x-md.paragraph>
        If your Laravel project uses Laravel Boost, install the skill directly into any project:
    </x-md.paragraph>
    <livewire:base.terminal code="php artisan boost:add-skill unoforge/flexiwind flexiwind" />

    <x-md.h3>Via npx / Skills CLI</x-md.h3>
    <x-md.paragraph>
        To use the skill in any AI tool:
    </x-md.paragraph>
    <livewire:base.terminal code="npx skills add unoforge/flexiwind --skill flexiwind" />


    <x-md.h2>What's Included</x-md.h2>

    <x-md.paragraph>
        The Flexiwind skill package contains:
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li><strong>SKILL.md</strong> — Main entry point: component map, blocks catalog, theme tokens, CLI reference, composition patterns, and answering guidelines.</x-md.li>
        <x-md.li><strong>Components (40+)</strong> — One file per component (button, input, modal, card, table, etc.), each with demo code, install command, props, styling, guidance, and common mistakes to avoid.</x-md.li>
        <x-md.li><strong>References:</strong> best-practices.md, things-to-avoid.md, styling-principles.md, theme.md, colors.md, button-utilities.md, components.md, composables.md, accessibility.md, performance.md.</x-md.li>
    </x-md.ul>

    <x-md.h2>Using with AI Tools</x-md.h2>

    <x-md.h3>Cursor</x-md.h3>
    <x-md.paragraph>
        Add the <x-docs.inline-code no-wrap text="skills/flexiwind/" /> directory to your Cursor project context, or reference it in your Cursor rules file. The AI will use the component reference and best-practices files to generate correct code.
    </x-md.paragraph>

    <x-md.h3>Cline / Roo Code</x-md.h3>
    <x-md.paragraph>
        These tools automatically detect skills installed via <x-docs.inline-code no-wrap text="npx skills add" />. No additional configuration needed.
    </x-md.paragraph>

    <x-md.h3>GitHub Copilot / ChatGPT / Claude</x-md.h3>
    <x-md.paragraph>
        Paste the relevant component file or reference as context when asking for Flexiwind code. The accurate, friction-based examples in each skill file help prevent hallucinated APIs.
    </x-md.paragraph>

    <x-md.h2>Quick Start for AI</x-md.h2>
    <x-md.paragraph>
        When asking an AI assistant to write Flexiwind code, include this instruction:
    </x-md.paragraph>
    <livewire:base.terminal code="Use the Flexiwind skill files in skills/flexiwind/ for accurate component names, install commands, and prop references. Never invent x-ui.* components or props." />

    <x-md.h2>Source</x-md.h2>
    <x-md.paragraph>
        The Flexiwind skills repository is open source. Contributions, bug reports, and feature requests are welcome:
    </x-md.paragraph>
    <x-md.paragraph>
        <x-docs.link href="https://github.com/unoforge/flexiwind/tree/main/skills/flexiwind">
            github.com/unoforge/flexiwind -- skills/flexiwind/
        </x-docs.link>
    </x-md.paragraph>

</x-layouts.doc-page-wrapper>
