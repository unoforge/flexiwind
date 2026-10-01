---
title: "Input"
group: "Actions & Inputs"
order: 30
tier: "free"
description: "Enhanced text input field with support for icons and validation."
seoDescription: "Build form inputs with various styles using Flexiwind's input component."
keywords: "input, form field, text input, validation"
---

## Demo

::preview{example="input/demo" inline}

## Installation

```bash
php artisan flexi:add input
```

## With label

::preview{example="input/with-label" inline}

## Input Groups

Input groups allow you to compose inputs with leading or trailing elements
such as icons, prefixes, suffixes, or actions.

When using `x-ui.input.group`,
the input itself must be rendered in **variant mode**.

- Always set `variant` to `unstyled` for the input
- Never pass `label` to the input
- Styling and layout are handled by the group container

### Leading

::preview{example="input/leading"}

### Trailing

Trailing elements are commonly used for icons, units, or contextual hints.
Use `x-ui.input.trailing` for this purpose.

::preview{example="input/trailing"}

In some cases, the trailing/leading element can be visually separated
and styled as part of the control. As you can see in given examples.

## Summary

- Use the `label` prop for simple inputs
- Use `x-ui.label` for custom layouts
- Use `x-ui.input.group` for composed inputs
- Always use `variant` inside groups
- Never mix labels with grouped inputs

## References

### Composition

| Prop | Description |
| --- | --- |
| `x-ui.input` | The main input component |
| `x-ui.input.group` | A container wrapper for input groups that provides consistent styling and layout |
| `x-ui.input.leading` | A leading element container for inputs, typically used for icons or text that appears before the input content. Can be positioned absolutely or inline. |
| `x-ui.input.trailing` | A trailing element container for inputs, typically used for icons or text that appears after the input content. Can be positioned absolutely or inline. |

### Input Props

To configure the input component you can use the following props.
All props are optional.

| Prop | Description |
| --- | --- |
| `type` (string) | The input type. Default: "text" |
| `size` (string) | The size of the input. Options: "sm", "md", "lg", "none". Default: "md" |
| `invalid` (boolean) | Whether the input is invalid or not for visual, default : false. |
| `disabled` (boolean) | Whether the input is disabled. Default: false |
| `readonly` (boolean) | Whether the input is readonly. Default: false |
| `label` (string) | The label text for the input. Default: null |
| `variant` (string) | The variant of the input. Options: "default", "ghost", "flush", "unstyled". Default: "default" |
| `labelPosition` (top\|inline) | Position of the label relative to the input. Options: "top", "inline". Default: "top" |
| `labelClass` (string) | Additional CSS classes for the label. Default: '' |

### Group Props

| Prop | Description |
| --- | --- |
| `size` (string) | The size of the group. Options: "sm", "md", "lg", "xl", "none". Default: "md" |
| `variant` (string) | The variant of the group. Options: "default", "ghost", "flush", "unstyled". Default: "default" |

### Leading/Trailing Props

| Prop | Description |
| --- | --- |
| `absolute` (boolean) | Whether the element should be positioned absolutely within the input. Default: false |
| `class` (string) | Additional CSS classes for the element. Default: '' |
| `clickable` (boolean) | Whether the element should be clickable. Default: false |
