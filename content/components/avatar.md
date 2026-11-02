---
title: "Avatar"
group: "Data & Feedback"
order: 20
tier: "free"
description: "Visual representation of a user with fallback support for initials."
seoDescription: "Display user avatars and profile images with Flexiwind's avatar component."
keywords: "avatar, profile, user, image"
---

## Demo

::preview{example="avatar/demo" inline}

## Installation

```bash
php artisan flexi:add avatar avatar-placeholder
```

## Placeholder Text

### With text

::preview{example="avatar/placeholder" inline}

### With Icon

::preview{example="avatar/placeholder-with-icon" inline}

## References

### Avatar Component

The main avatar component is used to display user profile images. It supports different sizes and border radius
options.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `size` | string | 'default' | Controls the size of the avatar. Available options:`xs` - Extra small`sm` - Small`default` - Medium (default)`lg` - Large`xl` - Extra large |
| `radius` | string | 'circle' | Controls the border radius of the avatar. Available options:`none` - No border radius`md` - Medium border radius`xl` - Extra large border radius`circle` - Circular (default) |

### Avatar Placeholder Component

The avatar placeholder component is used when no image is available. It can display text or an icon.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `size` | string | 'default' | Controls the size of the avatar placeholder. Available options are the same as the avatar component. |
| `radius` | string | 'circle' | Controls the border radius of the avatar placeholder. Available options are the same as the avatar component. |
| `text` | string\|null | null | The text to display inside the avatar placeholder. If not provided, the slot content will be used. |
| `variant` | string | 'solid' | The visual style variant of the avatar placeholder. Can be one of: 'solid', 'outline', 'ghost', etc. |
| `intent` | string | 'gray' | The color intent of the avatar placeholder. Common intents include 'primary', 'success', 'warning', 'destructive', etc. |
