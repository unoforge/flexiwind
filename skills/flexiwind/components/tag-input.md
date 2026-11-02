## Demo

```html
<x-ui.tag-input label="Topics" name="topics" :value="['laravel', 'livewire', 'tailwind']" :max="5"
    hint="Enter or comma to add. Backspace removes the last one." class="w-full max-w-sm" />
```

## Installation

```bash
php artisan flexi:add tag-input
```

It uses the same plugin as the [tag group](https://flexiwind.unoforge.com/components/tag-group):

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

```html
<x-ui.tag-input label="Invite by email" name="emails" type="email" :max="5" placeholder="name@company.com"
    :value="['alice@acme.dev', 'marc@', 'tom@acme.dev']" class="w-full max-w-sm" />
```

These checks help people type. What reaches Livewire is validated again:

```php
#[Validate(['emails' => 'array|max:5', 'emails.*' => 'email:rfc|max:120'])]
public array $emails = [];
```

## Suggestions

`suggestions` lists known values in the dropdown panel; the typed value can still be created, unless `:create="false"`.

```html
<x-ui.tag-input label="Stack" name="stack" :value="['PHP']" placeholder="Add a technology"
    :suggestions="['Laravel', 'Larastan', 'Livewire', 'Alpine.js', 'Tailwind CSS', 'Pest', 'Inertia', 'Vue', 'React']"
    class="w-full max-w-sm" />
```

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

```html
<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.tag-input label="Small" size="sm" name="small" :value="['alpha', 'beta']" />
    <x-ui.tag-input label="Disabled" name="disabled" :value="['design', 'api']" disabled />
    <x-ui.tag-input label="Reviewers" name="reviewers" :value="['alice', 'marc', 'sarah']" :max="3" />
    <x-ui.tag-input label="Invalid" name="invalid" :value="['seo']" invalid hint="Add at least two keywords." />
</div>
```

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

## Public Docs

`https://flexiwind.unoforge.com/components/tag-input`
