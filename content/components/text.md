---
title: "Text"
group: "Typography"
order: 20
tier: "free"
description: "Semantic text component with intent-based styling for body, muted, title, and accent colors."
seoDescription: "Style text consistently with Flexiwind's text component."
keywords: "text, typography, paragraph, muted text"
---

## Demo

::preview{example="text/demo" inline}

## Installation

```bash
php artisan flexi:add text
```

## Usage

The Text component provides semantic text styling with intent-based coloring. Use the `intent` prop to apply different text colors, and `as` to change the HTML tag.

## Examples

### Intents

::preview{example="text/intents" inline}

## API

| Prop | Description |
| --- | --- |
| `intent` (muted\|body\|title\|caption\|primary\|secondary\|warning\|destructive) | Semantic color intent for the text. |
| `as` (string) | HTML tag to render (default: p). |
