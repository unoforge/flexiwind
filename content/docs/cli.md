---
title: "Flexi CLI"
group: "Getting Started"
order: 30
tier: "free"
description: "Command-line tool for managing Flexiwind components and streamlining development workflow."
seoDescription: "Learn how to use Flexi CLI to manage components, list source registries, and install everything from a Flexiwind source."
keywords: "CLI, Command Line, Component Management, Development Tools, Flexi CLI, source index, registries"
---

Flexiwind CLI manages Flexiwind components in your Laravel project: initialize a project, add components from a registry source, list what a source publishes, and build registry packages.

## Installation

```bash
composer require --dev unoforge/flexiwind-cli
```

Or visit the GitHub repository for more installation options:

[Flexiwind CLI](https://github.com/unoforge/flexiwind-cli)

## Available Commands

### Initialize

```bash
php artisan flexi:init
```

Creates `flexiwind.yaml`, base folders, and wires the default `@flexiwind` source.

### Add Components

```bash
php artisan flexi:add [component-name...]
```

Examples:

```bash
php artisan flexi:add button pagination modal
php artisan flexi:add @flexiwind/button
php artisan flexi:add card --namespace=@flexiwind
```

### Themes (Playground)

Every Playground theme is a `registry:style` item named `theme-{slug}` (for example `theme-mono`). Short names from the init prompt also work (`mono` → `theme-mono`).

```bash
# One theme (short or full name)
php artisan flexi:add mono
php artisan flexi:add theme-indigo

# All Playground themes (built-in catalog; works even if index.json is missing remotely)
php artisan flexi:add --themes
php artisan flexi:add theme-*
php artisan flexi:add --all --type=style

# Preview without writing CSS
php artisan flexi:add --themes --dry
```

### Install Everything From a Source

Each published source ships an identifiable catalog file, `index.json`, with `"type": "registry:source"`. The CLI reads it to discover every registry item available at that source.

```bash
# All registries from @flexiwind
php artisan flexi:add @flexiwind/*
php artisan flexi:add --all --namespace=@flexiwind

# Bare namespace also expands to the full source catalog
php artisan flexi:add @flexiwind
```

The source URL in `flexiwind.yaml` usually looks like `…/registries/{name}.json`. The CLI resolves the catalog as `…/registries/index.json`.

### List Registries

```bash
# Configured sources
php artisan flexi:list

# Every item published by a source (from index.json)
php artisan flexi:list @flexiwind
php artisan flexi:list @flexiwind --search=button
php artisan flexi:list @flexiwind --type=registry:component
php artisan flexi:list @flexiwind --type=style
```

### Build (for registry authors)

```bash
php artisan flexi:build --schema=registry.json --output=registries --override
```

Builds each item to `{name}.json` and writes `index.json` (`type: registry:source`) next to them so consumers can list and install the whole source.

## Source Index

`index.json` is the identifiable file that marks a directory (or URL base) as a Flexiwind registry source. Shape:

```json
{
  "$schema": "https://github.com/unoforge/cli/tree/main/packages/core/schema-source.json",
  "name": "flexiwind-ui",
  "type": "registry:source",
  "title": "Flexiwind UI",
  "description": "…",
  "items": [
    {
      "name": "button",
      "type": "registry:component",
      "title": "Button",
      "description": "…",
      "version": "1.0.0"
    }
  ]
}
```

- **Identifying mark:** `"type": "registry:source"`
- **Filename:** `index.json` (constant used by the CLI)
- Do not edit generated `registries/*.json` or `registries/index.json` by hand — rebuild from manifests.

## Features

- **Component management** — add and update components you own in your project
- **Source catalog** — discover and install every item from a source via `index.json`
- **Dependency resolution** — installs registry, Composer, and Node dependencies
- **Version control** — tracks installed component versions in `components.json`
- **Laravel integration** — `php artisan flexi:*` commands

## Development

Flexiwind CLI is actively developed and maintained by us. For bug reports, feature requests, or contributions:

[Flexiwind CLI](https://github.com/unoforge/flexiwind-cli)
