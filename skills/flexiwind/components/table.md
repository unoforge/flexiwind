## Demo

```html
<x-ui.table>
    <x-ui.table.columns>
        <x-ui.table.column>ID</x-ui.table.column>
        <x-ui.table.column>Name</x-ui.table.column>
        <x-ui.table.column>Title</x-ui.table.column>
        <x-ui.table.column>Email</x-ui.table.column>
    </x-ui.table.columns>
    <x-ui.table.rows>
        <x-ui.table.row>
            <x-ui.table.cell>1</x-ui.table.cell>
            <x-ui.table.cell>John Doe</x-ui.table.cell>
            <x-ui.table.cell>Admin</x-ui.table.cell>
            <x-ui.table.cell>johndoe@gmail.com</x-ui.table.cell>
        </x-ui.table.row>
    </x-ui.table.rows>
</x-ui.table>
```

## Installation

```shell
php artisan flexi:add table
```

## Public Docs

`https://flexiwind.unoforge.com/components/table`

## API

| Component | Props | Description |
| --- | --- | --- |
| x-ui.table | wrapper, divider, grid, striped, hoverable | Main table wrapper |
| x-ui.table.columns | wrapper, headerBgStyle, columnDivider | Header wrapper |
| x-ui.table.column | align, whiteSpace, class | Header cell |
| x-ui.table.rows | class | Body wrapper |
| x-ui.table.row | class, striped | Single row |
| x-ui.table.cell | align, whiteSpace, class | Body cell |

## Guidance

- Use `striped` prop on `x-ui.table` for alternating row colors.
- Use `hoverable` prop for row hover effects.
- Prefer table subcomponents over custom `thead/tbody` wrappers.

## Avoid

- Do not invent `x-ui.table.thead` or `x-ui.table.tbody` — use `x-ui.table.columns` and `x-ui.table.rows`.
