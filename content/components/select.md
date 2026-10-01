---
title: "Select"
group: "Actions & Inputs"
order: 50
tier: "free"
description: "Customizable dropdown for single or multiple selection options."
seoDescription: "Create dropdown selection menus with Flexiwind's select component."
keywords: "select, dropdown, options, picker"
---

## Demo

::preview{example="select/demo" inline}

For a select you can style — search, icons, avatars, groups or several values — use the [Listbox](/components/listbox), or the [Autocomplete](/components/autocomplete) when people should type first.

## Installation

```bash
php artisan flexi:add select
```

## With label

::preview{example="select/with-label" inline}

## With Icon

::preview{example="select/with-icon"}

## Icon Indicator

::preview{example="select/icon-indicator" inline}

## References

### Composition

| Prop | Description |
| --- | --- |
| `x-ui.select` | The main select component |
| `x-ui.input.group` | A container wrapper for select groups that provides consistent styling and layout |
| `x-ui.input.leading` | A leading element container for selects, typically used for icons or text that appears before the select content. Can be positioned absolutely or inline. |
| `x-ui.input.trailing` | A trailing element container for selects, typically used for icons or text that appears after the select content. Can be positioned absolutely or inline. |

### Select Props

To configure the select component you can use the following props.
All props are optional.

| Prop | Description |
| --- | --- |
| `size` (string) | The size of the select. Options: "sm", "md", "lg", "none". Default: "md" |
| `disabled` (boolean) | Whether the select is disabled. Default: false |
| `readonly` (boolean) | Whether the select is readonly. Default: false |
| `label` (string) | The label text for the select. Default: null |
| `variant` (string) | The variant of the select. Options: "default", "ghost", "flush", "unstyled". Default: "default" |
| `labelPosition` (top\|inline) | Position of the label relative to the select. Options: "top", "inline". Default: "top" |
| `labelClass` (string) | Additional CSS classes for the label. Default: '' |
| `indicator` (boolean) | Controls the dropdown indicator visibility. Default: true |
| `class` (string) | Additional CSS classes for the select. Default: '' |

### Group Props

The select component uses the same input group component. See [input component references](/components/input) for group props.
