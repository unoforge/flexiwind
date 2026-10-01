---
title: "Heading"
group: "Typography"
order: 30
tier: "free"
description: "Structured heading levels (H1-H5) with consistent sizing and semantic hierarchy."
seoDescription: "Create consistent headings with Flexiwind's heading component."
keywords: "heading, h1, h2, h3, h4, h5, title"
---

## Demo

::preview{example="heading/demo" inline}

## Installation

```bash
php artisan flexi:add heading
```

## Usage

The Heading component provides semantic heading levels (H1-H5) with consistent sizing. Use the `level` prop to set the heading level, and `intent` for color styling.

## Examples

### Levels

::preview{example="heading/levels" inline}

### Intents

::preview{example="heading/intents" inline}

## API

| Prop | Description |
| --- | --- |
| `level` (1\|2\|3\|4\|5) | Heading level determining the HTML tag (h1-h5) and size. |
| `intent` (title\|body\|muted\|primary\|secondary\|destructive\|warning) | Semantic color intent for the heading. |
