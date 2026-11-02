---
title: "Tag input"
group: "Actions & Inputs"
order: 55
tier: "free"
state: "new"
description: "Type free values that become tags: topics, emails, keywords."
seoDescription: "Tag input for Laravel Blade and Livewire with Tailwind CSS: comma or Enter to add, paste lists, email validation, suggestions, Livewire search."
keywords: "tag input, tags input, chips input, multiple emails input, keywords input, livewire tag input"
---

## Demo

::preview{example="tag-input/demo" inline}

## Installation

```bash
php artisan flexi:add tag-input
```

It uses the same plugin as the [tag group](/components/tag-group):

```js
import { TagsPlugin } from "./plugins/tags";

Alpine.plugin(TagsPlugin);
```

Enter or a comma adds what was typed; a paste of `a, b, c` adds three tags; Backspace in an empty field removes the last one. Duplicates are ignored. `wire:model` receives an array.

```blade
<x-ui.tag-input wire:model="topics" label="Topics" :max="5" />
```

## Validation

`type="email"`, `type="url"` or a `pattern` check each tag as it is added; `max` caps the count. A bad tag turns red and the message under the field names it.

::preview{example="tag-input/validation" inline}

These checks help people type. What reaches Livewire is validated again:

```php
#[Validate(['emails' => 'array|max:5', 'emails.*' => 'email:rfc|max:120'])]
public array $emails = [];
```

## Suggestions

`suggestions` lists known values in the dropdown panel; the typed value can still be created, unless `:create="false"`.

::preview{example="tag-input/suggestions" inline}

With `search`, typed text also goes to a Livewire property: return the matches as `suggestions` and the panel updates.

```blade
<x-ui.tag-input wire:model="skills" search="query" :suggestions="$matches" />
```

```php
public string $query = '';

public function with(): array
{
    return [
        'matches' => $this->query === '' ? [] : Skill::query()->whereLike('name', '%'.$this->query.'%')->limit(8)->pluck('name'),
    ];
}
```

## States

::preview{example="tag-input/states" inline}

## References

| Prop | Description |
| --- | --- |
| `label`, `hint` (string) | Label above, help text below. |
| `name` (string) | One hidden `name[]` field per tag. |
| `value` (array) | Starting tags, outside Livewire. |
| `placeholder` (string) | Shown while there is no tag. |
| `type` (email\|url), `pattern` (regex) | Rule checked for each tag. |
| `max` (int) | Maximum number of tags; a counter shows next to the label. |
| `separators` (array) | Characters that add a tag. Default: `[',']`. |
| `suggestions` (array) | Values offered in the panel. |
| `search` (string), `debounce` (int) | Livewire property that receives the typed text. |
| `create` (boolean) | Allow values outside `suggestions`. Default: true. |
| `size` (sm\|md\|lg), `disabled`, `invalid` | Like the input. |
| `remove-label`, `count-text`, `create-text`, `invalid-text`, `max-text` | Texts. `:label`, `:count`, `:max`, `:query` are replaced. |

## Accessibility

- With suggestions the field is a `combobox` pointing at its `listbox`; arrows move, Enter picks.
- Enter never submits the surrounding form.
- Added and removed tags are announced; remove buttons are named after their tag.
- Typed values are written as text, never as HTML.
