---
title: "Installation"
group: "Getting Started"
order: 20
tier: "free"
description: "Guide on installing Flexiwind via Composer and configuring Tailwind CSS."
seoDescription: "Step-by-step guide on how to install and set up Flexiwind in your Laravel project."
keywords: "Installation, Composer, Laravel Setup, Tailwind Config, UI Package"
---

:::raw
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
:::

## Prerequisites

Flexiwind is built on top of a few tools you'll need to have in place before getting started. If you already have a Laravel project running with Tailwind CSS, you're most of the way there.

:::raw
<x-docs.links-grid :links="$links" />
:::

## Choose Your Path

Everyone's workflow is different. Choose the approach that fits your project best.

:::raw
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
                    <x-base.terminal code="composer require --dev unoforge/flexiwind-cli" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Initialize your project</x-md.h3>
                    <x-md.paragraph>
                        The init command scaffolds everything you need — configuration files, directory structure, and base styles.
                        It's safe to run on existing projects; it won't overwrite anything you've already set up.
                    </x-md.paragraph>
                    <x-base.terminal code="php artisan flexi:init" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Install base utilities</x-md.h3>
                    <x-md.paragraph>
                        Every Flexiwind component relies on shared base utilities for colors, typography, and spacing.
                        Install these first — they're the foundation everything else builds on.
                    </x-md.paragraph>
                    <x-base.terminal code="php artisan flexi:add flexiwind-base" />
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
                    <x-base.terminal
                        code="git clone https://github.com/uno-forge-hub/livewire-tail-starter-kit.git project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Enter your project directory</x-md.h3>
                    <x-md.paragraph>Hop into your new project folder to start working.</x-md.paragraph>
                    <x-base.terminal code="cd project-name" />
                </x-docs.step>

                <x-docs.step>
                    <x-md.h3>Run the setup command</x-md.h3>
                    <x-md.paragraph>
                        One command installs all PHP and Node dependencies, sets up your environment file,
                        and runs the initial database migrations. It's the fastest way to get from zero to coding.
                    </x-md.paragraph>
                    <x-base.terminal code="composer setup" />
                </x-docs.step>
            </x-docs.steps>
        </x-docs.tab-panel>
    </x-docs.ui-tabs>
:::

## Next Steps

### Start the development server

Fire up the dev server to see your setup in action. This command starts both the Laravel server and the Vite build process.

```bash
composer dev
```

Open `http://localhost:8000` in your browser — if everything went smoothly, you'll see your app ready to go.

### Add your first components

Now the fun part — start pulling in the components you need. The CLI copies them directly into your project,
so you can customize every detail. Install one component or several at once:

```bash
php artisan flexi:add button input
```

Want to see what's available? Browse the source catalog (from `index.json`):

```bash
php artisan flexi:list @flexiwind
```

Install everything published by a source:

```bash
php artisan flexi:add @flexiwind/*
```

### Need help?

Run `php artisan flexi:help` anytime to see all available commands and options.
See also the [Flexi CLI](/docs/cli) page for source indexes and bulk install.

### Teach your AI agent

Install the [AI Skills](/docs/skills) so Cursor, Claude Code, and similar tools
use real Flexiwind components instead of inventing markup:

```bash
php artisan boost:add-skill unoforge/flexiwind --skill flexiwind
```

### When free is not enough

The open-source kit ships screens. Pro unlocks the rest of the blocks, the
advanced components, and **full Laravel app templates** (billing, CRM) built
with the same design system — so you stop assembling every dashboard from
scratch. Browse [Templates](/templates) or continue below to wire the Pro
registry.

## Flexiwind Pro

Pro adds premium components, blocks and full app templates on top of the
open-source foundation. They install exactly like the free ones — the only
difference is the `@fx/` prefix, which tells the CLI to fetch them from your
licensed registry instead of the public one.

You need a [Flexiwind Pro](/pricing) license, and Flexiwind already set up in
the project.

::::steps
:::step
### Declare Pro registry

Open `flexiwind.yaml` at the root of your project and add the source:

```yaml title="flexiwind.yaml" lines="2:added,3:added,4:added,5:added"
registries:
  '@fx':
    url: https://flexiwind.unoforge.com/api/v1/pro/{name}
    headers:
      Authorization: "Bearer ${FLEXIWIND_TOKEN}"
```
:::

:::step
### Store your token

Generate a token from [your account](/account/tokens) — it is shown once, so
copy it right away. Put it in `.env`, never in `flexiwind.yaml`, which is
committed:

```bash
FLEXIWIND_TOKEN=your-token-here
```

The variable name is yours to choose, as long as it matches the one referenced
in `flexiwind.yaml`. The token is only read when you install something from
`@fx`.

Tokens never expire — you revoke them from your account when a machine or a
contract ends. What decides access is the subscription behind the token, checked
on every install: if it lapses, or if the seat is freed on a team plan, the token
stops working the same minute.
:::

:::step
### Install a premium component, block, or start from a template

```bash
php artisan flexi:add @fx/select
```

Blocks work the same way:

```bash
php artisan flexi:add @fx/sidebar05
```

Prefer a whole app? Open [Templates](/templates) — Ledger, Sales CRM and more
are included with Pro and land in your repo as plain Laravel code.

Premium components compose the free primitives — the CLI pulls `button`, `input`
and the rest from the public registry if your project doesn't have them yet.
:::
::::
