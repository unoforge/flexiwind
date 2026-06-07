## Demo

```html
<div class="w-full max-w-xl flex items-start gap-x-4">
    <x-ui.skeleton class="size-14"/>
    <div class="flex-1 space-y-3">
        <x-ui.skeleton class="w-4/5 h-7"/>
        <x-ui.skeleton class="w-9/12 h-4"/>
        <x-ui.skeleton class="w-3/6 h-4"/>
    </div>
</div>
```

## Installation

```shell
php artisan flexi:add skeleton
```

## Public Docs

`https://flexiwind.unoforge.com/components/skeleton`

## API

| Prop | Description |
| --- | --- |
| radius (circle\|ui) | Border radius. Default: circle |
| bgNone (boolean) | Removes default background color |

## Guidance

- Skeleton is a pure CSS placeholder -- no JS required.
- Use for loading placeholders; combine with CSS sizing classes (w-, h-).
- Use `radius="ui"` to match card/input border radius.

## Avoid

- Do not use skeleton for interactive areas — it is a visual placeholder only.
- Do not nest skeletons inside each other unnecessarily.
