---
title: "Aspect Ratio"
group: "Layout & Structure"
order: 30
tier: "free"
description: "Utility component to maintain specific dimensions for images or videos."
seoDescription: "Maintain consistent image and video aspect ratios with Flexiwind's component."
keywords: "aspect ratio, video, image, responsive box"
---

## Demo

::preview{example="aspect/demo" inline}

## Installation

```bash
php artisan flexi:add aspect
```

## Examples

### Square

::preview{example="aspect/square" inline}

### Video

::preview{example="aspect/demo" inline}

### Standard TV

::preview{example="aspect/standard-tv" inline}

### 35mm film

::preview{example="aspect/mm-film" inline}

### Ultra wide

::preview{example="aspect/ultra-wide" inline}

## References

### Props

The aspect ratio component accepts the following props. The `aspect` prop is required.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `aspect` | string | 'video' | The container ratio. Predefined values include `video`, `square`, `35mm-film`, `standard-tv`, and `ultrawide`. |
| `class` | string | '' | Additional classes for the ratio container. |
