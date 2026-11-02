---
title: "Link"
group: "Navigation"
order: 60
tier: "free"
description: "Consistent link primitive supporting inline, underlined, and button-like action styles."
seoDescription: "Create styled links and navigation elements with Flexiwind's link component."
keywords: "link, anchor, navigation, href"
---

## Demo

::preview{example="link/demo" inline}

## Installation

```bash
php artisan flexi:add link
```

## Examples

### With icon

::preview{example="link/with-icon" inline}

### As button

::preview{example="link/button" inline}

## API

| Prop | Description |
| --- | --- |
| `href` (string) | Destination URL. Internal links and hashes stay in the same tab. |
| `asButton` (boolean) | Renders the link as a button-styled action while keeping link semantics. |
| `underlined` (boolean) | Applies underline styling. |
| `underlineOffset` (none\|1\|2\|3\|4\|8) | Controls underline offset when underlined. |
| `ariaLabel` (string\|null) | Custom accessible label. Recommended for icon-only links. |
| `disabled` (boolean) | Adds disabled accessibility attributes and removes focusability. |
