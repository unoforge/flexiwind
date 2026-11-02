---
title: "Table"
group: "Data & Feedback"
order: 10
tier: "free"
description: "Data-rich table component with header, row, and cell styling."
seoDescription: "Display tabular data with Flexiwind's table component."
keywords: "table, datatable, rows, grid data"
---

## Demo

::preview{example="table/demo"}

## Installation

```bash
php artisan flexi:add table
```

## API

| Prop | Description |
| --- | --- |
| `x-ui.table` | Main table wrapper. Supports `wrapper`, `divider`, `grid`, `striped`, and `hoverable`. |
| `x-ui.table.columns` | Header wrapper. Supports `wrapper`, `headerBgStyle`, and `columnDivider`. |
| `x-ui.table.column` | Header cell with `align`, `whiteSpace`, and `class` props. |
| `x-ui.table.rows` | Body wrapper. Supports `class`. |
| `x-ui.table.row` | Single row supporting `class`, and `striped`. |
| `x-ui.table.cell` | Body cell with `align`, `whiteSpace`, and `class` props. |

## Examples

### Striped

::preview{example="table/striped"}

### Hoverable

::preview{example="table/hoverable"}

### Striped + Hoverable

::preview{example="table/hoverable-striped"}

### Custom Example

::preview{example="table/custom-1"}
