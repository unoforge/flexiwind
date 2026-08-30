## Demo

```html
<div class="flex flex-wrap items-center gap-2">
    <x-ui.avatar src="/defaultavatar.webp" size="xs" alt="avatar xs" />
    <x-ui.avatar src="/defaultavatar.webp" size="sm" alt="avatar sm" />
    <x-ui.avatar src="/defaultavatar.webp" size="md" alt="avatar md" />
    <x-ui.avatar src="/defaultavatar.webp" size="lg" alt="avatar lg" />
    <x-ui.avatar src="/defaultavatar.webp" size="xl" alt="avatar xl" />
</div>
```

## Installation

```shell
php artisan flexi:add avatar avatar-placeholder
```

## Public Docs

`https://flexiwind.unoforge.com/components/avatar`

## API

### Avatar

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| size | string | 'default' | xs, sm, default, lg, xl |
| radius | string | 'circle' | none, md, xl, circle |

### Avatar Placeholder

```html
<x-ui.avatar-placeholder size="md" variant="subtle" intent="primary" text="JK" />
<x-ui.avatar-placeholder size="md" variant="subtle" intent="gray">
    <x-ui.icon name="ph--user" />
</x-ui.avatar-placeholder>
```

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| size | string | 'default' | xs, sm, default, lg, xl |
| radius | string | 'circle' | none, md, xl, circle |
| text | string\|null | null | Text initials to display |
| variant | string | 'solid' | Visual style variant |
| intent | string | 'gray' | Color intent |

## Guidance

- Use `x-ui.avatar` for image-based avatars.
- Use `x-ui.avatar-placeholder` for initials or icon-based avatars.
- Always provide `alt` text on `x-ui.avatar` for accessibility.

## Avoid

- Do not invent `x-ui.avatar.placeholder` — the correct primitive is `x-ui.avatar-placeholder` (separate component).
