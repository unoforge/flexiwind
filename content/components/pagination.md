---
title: "Pagination"
group: "Navigation"
order: 50
tier: "free"
description: "Controls for navigating through split datasets or multiple pages."
seoDescription: "Implement page navigation with Flexiwind's pagination component."
keywords: "pagination, pages, tables, navigation"
---

## Demo

::preview{example="pagination/basic"}

## Installation

```bash
php artisan flexi:add pagination
```

## Composition

The pagination component is built using a composition of smaller components:

- `x-ui.pagination` - Main navigation container
- `x-ui.pagination.content` - Flex container for items with
  spacing
- `x-ui.pagination.item` - Individual item wrapper (li
  element)
- `x-ui.pagination.link` - Clickable page links with active
  states
- `x-ui.pagination.ellipsis` - Ellipsis for omitted pages

This composition approach allows you to build custom pagination layouts while maintaining consistent styling and
behavior.

## Examples

### Working with icons

::preview{example="pagination/control-icon"}

## Component API

### Pagination

Main container for pagination navigation.

| Prop | Description |
| --- | --- |
| `class` | Additional CSS classes (optional) |

### PaginationContent

Container for pagination items with proper spacing.

| Prop | Description |
| --- | --- |
| `class` | Additional CSS classes (optional) |

### PaginationItem

Individual pagination item wrapper. All standard HTML li attributes are supported.

### PaginationLink

Individual page number link with active state support.

| Prop | Description |
| --- | --- |
| `isActive` | Whether the link is the current page (default: false) |
| `size` | Size variant: 'xs', 'sm', 'md', 'lg', 'xl' (default: 'sm') |
| `isIconOnly` | Whether the link contains only an icon (default: false) |
| `href` | URL for the link (default: '#') |
| `variant` | Button variant (auto-set based on isActive) |

### PaginationEllipsis

Ellipsis indicator for omitted pages.

| Prop | Description |
| --- | --- |
| `class` | Additional CSS classes (optional) |

## Customization

The pagination links use CSS utilities that can be easily customized through CSS variables. For advanced look
and feel customization, you can override these utilities:

```css title="pagination-utilities"
@utility btn-pagination-link-variables {
  --ring-background-color: var(--btn-pagination-link-ring-color, transparent);
  --link-bg: var(--btn-pagination-link-bg, transparent);
  --link-text-color: var(--btn-pagination-link-text-color, var(--color-muted-foreground));
  --link-hover-bg: var(--btn-pagination-link-hover-bg, --alpha(var(--color-muted)/60%));
}

@utility btn-pagination-active {
  --ring-background-color: var(--btn-pagination-active-link-ring-color, var(--color-border));
  --link-bg: var(--btn-pagination-active-link-bg, transparent);
  --link-text-color: var(--btn-pagination-active-link-text-color, var(--color-foreground));
  --link-hover-bg: var(--btn-pagination-active-link-hover-bg, --alpha(var(--color-muted)/80%));
}
```

Simply override the CSS variables in your theme to customize colors, backgrounds, and hover states:

```css title="pagination-custom-theme"
/* Custom pagination theme */
:root {
  /* Regular pagination links */
  --btn-pagination-link-ring-color: var(--color-border);
  --btn-pagination-link-bg: var(--color-card);
  --btn-pagination-link-text-color: var(--color-foreground);
  --btn-pagination-link-hover-bg: var(--color-muted);
  
  /* Active pagination links */
  --btn-pagination-active-link-ring-color: var(--color-primary);
  --btn-pagination-active-link-bg: var(--color-primary);
  --btn-pagination-active-link-text-color: var(--color-primary);
  --btn-pagination-active-link-hover-bg: var(--color-primary);
}
```
