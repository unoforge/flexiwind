---
title: "Overview"
group: "Getting Started"
order: 10
tier: "pro"
state: "new"
description: "Real product features built with Flexiwind, Livewire and Laravel, and short answers to the questions they raise."
seoDescription: "Flexiwind cookbook: complete Livewire recipes for real features, and tips and snippets for forms, modals and feedback."
keywords: "flexiwind cookbook, livewire recipes, laravel ui patterns, livewire examples, blade snippets"
---

The documentation tells you what each component does. The cookbook shows them working together on features you actually ship: editing a row, deleting safely, linking two fields, searching thousands of users.

## Recipes

Each recipe is a complete feature. It starts with a demo you can use, then gives the whole Livewire component — with Eloquent, authorization and validation — and explains why it is written that way.

:::raw
<x-docs.links-grid :links="[
        [
            'href' => '/cookbook/recipes/edit-in-a-modal',
            'title' => 'Edit a row in a modal',
            'description' => 'A table, an Edit button per row, a modal form that validates, saves and confirms.',
            'icon' => 'ph--pencil-simple',
        ],
        [
            'href' => '/cookbook/recipes/delete-with-undo',
            'title' => 'Delete, then undo',
            'description' => 'One clear confirmation, then Undo in a toast, backed by soft deletes.',
            'icon' => 'ph--arrow-counter-clockwise',
        ],
        [
            'href' => '/cookbook/recipes/country-then-city',
            'title' => 'Country, then city',
            'description' => 'Two linked listboxes, and a server that refuses a city from another country.',
            'icon' => 'ph--map-pin',
        ],
        [
            'href' => '/cookbook/recipes/assign-with-search',
            'title' => 'Assign people with a search',
            'description' => 'Search a large team on the server as you type and pick several people.',
            'icon' => 'ph--users-three',
        ],
    ]" />
:::

## Tips and snippets

Short answers: one problem, the snippet that solves it, and why.

:::raw
<x-docs.links-grid :links="[
        [
            'href' => '/cookbook/tips/livewire-forms',
            'title' => 'Livewire forms',
            'description' => 'When to send, loading buttons, errors people can hear, reset after saving.',
            'icon' => 'ph--textbox',
        ],
        [
            'href' => '/cookbook/tips/modals-and-feedback',
            'title' => 'Modals and feedback',
            'description' => 'Open modals from PHP, toasts after actions and redirects, undo, long actions.',
            'icon' => 'ph--bell-ringing',
        ],
    ]" />
:::

## How recipes are written

- **A demo first.** Every recipe runs on this page; try it before reading the code.
- **The real thing in the code.** Demos keep their data in memory; the code shows the same component with Eloquent, ready to adapt.
- **Security is part of the recipe.** Locked properties, scoped queries, policies and validation are in the code, not left as an exercise.
- **Built from free components.** Table, modal, listbox, autocomplete, toast: everything used here is in Flexiwind.
