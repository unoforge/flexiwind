## Demo

```html
<x-ui.aspect aspect="video">
    <img src="/images/img2.webp" class="w-full h-full object-cover rounded-lg" alt="description" loading="lazy">
</x-ui.aspect>
```

## Installation

```shell
php artisan flexi:add aspect
```

## Public Docs

`https://flexiwind.unoforge.com/components/aspect-ratio`

> Note: The docs page is `/components/aspect-ratio`, the install slug is `aspect`, and the Blade primitive is `x-ui.aspect`.

## API

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| aspect | string | 'video' | Aspect ratio. Predefined: `video`, `square`, `35mm-film`, `standard-tv`, `ultrawide` |
| class | string | '' | Additional CSS classes |

## Predefined aspect ratios

- `video` - 16:9
- `square` - 1:1
- `35mm-film` - 3:2
- `standard-tv` - 4:3
- `ultrawide` - 21:9

## Guidance

- The docs page is `/components/aspect-ratio`, the install command is `php artisan flexi:add aspect`, the Blade primitive is `x-ui.aspect`.
- Do NOT use `x-ui.aspect-ratio`.

## Avoid

- Do not use `x-ui.aspect-ratio` — the correct primitive is `x-ui.aspect`.
