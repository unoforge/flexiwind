## Demo

```html
<x-ui.card>
    <x-ui.card.header>
        <x-ui.card.title>Card Title</x-ui.card.title>
        <x-ui.card.description>Lorem ipsum dolor sit amet consectetur adipisicing elit.</x-ui.card.description>
    </x-ui.card.header>
    <x-ui.card.content>
        <p>Card content goes here.</p>
    </x-ui.card.content>
    <x-ui.card.footer>
        <x-ui.button size="sm">Action</x-ui.button>
    </x-ui.card.footer>
</x-ui.card>
```

## Installation

```shell
php artisan flexi:add card
```

## Public Docs

`https://flexiwind.unoforge.com/components/card`

## API

### Composition

| Component | Description |
| --- | --- |
| x-ui.card | Main card container |
| x-ui.card.header | Header section with flexible layout |
| x-ui.card.content | Main content area |
| x-ui.card.title | Title with heading level and size control |
| x-ui.card.description | Secondary text content |
| x-ui.card.footer | Footer section |

### Card Props

| Prop | Description |
| --- | --- |
| fill (default\|gray) | Background fill style. Default: "default" |
| size (2xs\|xs\|sm\|default\|lg\|none) | Padding size. Default: "default" |
| variant (none\|soft\|solid) | Visual variant. Default: "none" |
| intent (string) | Color intent when variant is not "none". Default: "gray" |
| border (boolean) | Controls border. Default: true |
| shadow (boolean) | Controls shadow. Default: true |
| class (string) | Additional CSS classes |

### Card Header Props

| Prop | Description |
| --- | --- |
| direction (column\|row) | Flex direction. Default: "column" |
| justify (start\|end\|center) | Justify content. Default: "start" |
| flexNone (boolean) | Disables flex layout when true |
| gap (1\|2\|3\|4) | Gap size between items. Default: "2" |

### Card Content Props

| Prop | Description |
| --- | --- |
| gap (1\|2\|3\|4) | Gap size. Default: "3" |

### Card Title Props

| Prop | Description |
| --- | --- |
| level (1\|2\|3\|4) | HTML heading level. Default: "2" |
| size (sm\|md\|lg\|xl) | Text size. Default: "lg" |
| weight (medium\|semibold\|bold) | Font weight. Default: "semibold" |

### Card Description Props

| Prop | Description |
| --- | --- |
| size (sm\|base\|lg) | Text size. Default: "sm" |

## Guidance

- Use card composition subcomponents instead of hand-rolled spacing.
- Override padding with `--card-padding` CSS variable via class.
- Override border radius with `--card-radius` CSS variable via class.

## Avoid

- Do not hand-roll card layouts with raw divs when the card subcomponents cover the need.
- Do not invent card subcomponents beyond the documented set.
