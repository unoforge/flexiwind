---
title: "Kbd"
group: "Data & Feedback"
order: 90
tier: "free"
description: "Shortcut keycap component for displaying keyboard commands and key combinations."
seoDescription: "Display keyboard shortcuts and commands with Flexiwind's kbd component."
keywords: "keyboard, kbd, shortcut, command"
---

## Demo

::preview{example="kbd/demo" inline}

## Installation

```bash
php artisan flexi:add kbd
```

## With Icon or Symbol

::preview{example="kbd/icon" inline}

## Grouped

::preview{example="kbd/grouped" inline}

## Usage Notes

- Use short, recognizable labels like `Ctrl`, `Cmd`, or `Enter`.
- Keep grouped shortcuts consistent in order (modifier keys first).
- Pair shortcuts with actionable UI labels for discoverability.

## API

| Prop | Description |
| --- | --- |
| `variant` (solid\|soft\|subtle\|outline\|default) | Controls visual style. |
| `intent` (string) | Semantic color intent for the selected variant. |
| `size` (none\|xs\|sm\|default\|lg) | Changes keycap size and typography. |
| `radius` (string) | Rounded style token passed to the component. |
