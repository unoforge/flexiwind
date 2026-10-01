---
title: "Alert"
group: "Data & Feedback"
order: 40
tier: "free"
description: "Inline notification for conveying success, error, or warning messages."
seoDescription: "Implement user notifications with Flexiwind's alert component."
keywords: "alert, notice, feedback, message"
---

## Demo

::preview{example="alert/default"}

## Installation

```bash
php artisan flexi:add alert
```

## Examples

### With Title

::preview{example="alert/with-title"}

### Variants

::preview{example="alert/variants"}

## References

### Props

The alert component accepts the following props. All props are optional.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `variant` | string | 'solid' | The visual style variant of the alert. Can be 'solid', 'soft', 'outline', 'subtle', or 'link' |
| `intent` | string | 'gray' | The color intent of the alert. Common intents include 'primary', 'success', 'warning', 'destructive', and 'gray' |
| `size` | string | 'default' | Size of the alert. Can be 'xs', 'sm', 'default', or 'lg' |
| `radius` | string | 'md' | Border radius of the alert. Common values include 'none', 'sm', 'md', 'lg', 'full' |
| `class` | string | '' | Additional CSS classes to apply to the alert |
