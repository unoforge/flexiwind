---
title: "Introduction"
group: "Getting Started"
order: 10
tier: "free"
description: "Comprehensive overview of Flexiwind Laravel, a modern Blade and Livewire UI toolkit."
seoDescription: "Learn how to get started with Flexiwind Laravel, a modern collection of Laravel Blade and Livewire UI components built with TailwindCSS."
keywords: "Laravel UI, Blade Components, Livewire UI, Tailwind CSS v4, Flexiwind Intro"
---

:::raw
@php
        $image_cover = [
            "src" => '/illustrations/blocks-dark.webp',
            "alt" => "cover dark"
        ];
    @endphp
:::

:::raw
<x-md.image-block src="/illustrations/blocks-light.webp" :dark="$image_cover" alt="Flexiwind Cover Image" />
:::

## Overview

**Re-usable Laravel UI components built with Tailwind v4.**

**Flexiwind** brings the proven design system philosophy
of open-source UI (like shadcn ui) components into the Laravel
ecosystem—empowering developers with full **code ownership**, **transparency**, and
**flexibility**.

This is what Flexiwind aims to solve. It is built around the following principles:

- **Code Ownership** : Every component is yours to customize. There’s no abstraction layer or
  hidden implementation—just clean, Tailwind-powered Blade components that you can modify freely to suit your
  application.
- **Transparency** : All code is open and visible. You’ll know exactly how each component works,
  making debugging, education, and adaptation straightforward.
- **Laravel-Focused** : Built specifically for Laravel (Blade, Tailwind, and related tooling),
  Flexiwind Laravel integrates seamlessly into your Laravel workflow—no abstractions, just Laravel-native
  flexibility.

## Quick start

:::raw
<x-docs.links-grid :links="[
        [
            'href' => '/docs/installation',
            'title' => 'Installation',
            'description' => 'Step-by-step guide to install and setup Flexiwind',
            'icon' => 'ph--compass',
        ],
        [
            'href' => '/components',
            'title' => 'Components',
            'description' => 'Browse our pre-built components library',
            'icon' => 'ph--cube',
        ],
    ]" />
:::

## Authors

- [Johnkat MJ](https://x.com/johnkat_Mj)

## Credits

- [Livewire](https://livewire.laravel.com/) (We couldn't create this if
  it was not for
  Livewire)
- [shadcn/ui](https://x.com/shadcn) (Registries and CLI)
- [Tailus Themer by Méschac Irung](https://x.com/MeschacIrung) (Thanks
  to Themer we've got Nice Buttons
  with all beautiful variants)
- [Intent UI by Irsyad A. Panjaitan](https://x.com/irsyad)
