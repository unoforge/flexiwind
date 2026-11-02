## Demo

```html
@php
    $cities = [
        ['name' => 'Paris', 'country' => 'France'],
        ['name' => 'Parma', 'country' => 'Italy'],
        ['name' => 'Pamplona', 'country' => 'Spain'],
        ['name' => 'Lyon', 'country' => 'France'],
        ['name' => 'Lisbon', 'country' => 'Portugal'],
        ['name' => 'London', 'country' => 'United Kingdom'],
        ['name' => 'Kinshasa', 'country' => 'DR Congo'],
        ['name' => 'Kigali', 'country' => 'Rwanda'],
        ['name' => 'Montréal', 'country' => 'Canada'],
        ['name' => 'Madrid', 'country' => 'Spain'],
    ];
@endphp

<x-ui.autocomplete name="city" label="City" class="max-w-xs"
    :options="$cities" option-value="name" option-label="name" option-description="country" />
```

## Installation

```bash
php artisan flexi:add autocomplete
```

It installs the [Listbox](https://flexiwind.unoforge.com/components/listbox) too: both share the panel, the options and the plugin `resources/js/plugins/listbox.js`, which drives [Flexilla Autocomplete](https://flexilla.unoforge.com/docs/components/autocomplete). Register it once:

```js
import { ListboxPlugin } from "./plugins/listbox";

Alpine.plugin(ListboxPlugin);
```

Use the autocomplete when the list is too long to scroll — cities, customers, products — and the [Listbox](https://flexiwind.unoforge.com/components/listbox) when people can see every option at once.

## Composition

The autocomplete is built from the same parts as the [listbox](https://flexiwind.unoforge.com/components/listbox#composition): swap the trigger for `<x-ui.autocomplete.input>` and compose the rest.

```html
@php
    $owners = [
        ['id' => 'brenda', 'name' => 'Brenda Stone', 'role' => 'Product designer', 'initials' => 'BS', 'badge' => 'background-color:#fecdd3;color:#881337'],
        ['id' => 'david', 'name' => 'David Kim', 'role' => 'Frontend engineer', 'initials' => 'DK', 'badge' => 'background-color:#ddd6fe;color:#4c1d95'],
        ['id' => 'nina', 'name' => 'Nina Lopez', 'role' => 'Data analyst', 'initials' => 'NL', 'badge' => 'background-color:#bbf7d0;color:#14532d'],
    ];
@endphp

<x-ui.autocomplete name="owner" class="max-w-xs">
    <x-ui.label>Pick an owner</x-ui.label>
    <x-ui.autocomplete.input placeholder="Search owners" />

    <x-ui.listbox.value mode="single" class="flex-none">
        <span class="inline-flex items-center gap-2 rounded-lg bg-muted py-1 ps-1 pe-2.5 text-sm text-foreground">
            <span class="inline-flex size-6 items-center justify-center rounded-full text-[10px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
            <span data-bind="label"></span>
        </span>
        <x-slot:placeholder class="text-sm">No owner selected</x-slot:placeholder>
    </x-ui.listbox.value>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            @foreach ($owners as $owner)
                <x-ui.listbox.item :value="$owner['id']" :data-initials="$owner['initials']" :data-badge="$owner['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$owner['badge']">{{ $owner['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label class="font-medium">{{ $owner['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $owner['role'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No owner found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.autocomplete>
```

```blade
<x-ui.autocomplete wire:model="owner">
    <x-ui.autocomplete.input placeholder="Search owners" />

    <x-ui.listbox.value mode="single">
        <span data-bind="initials" data-bind-style="badge"></span>
        <span data-bind="label"></span>
    </x-ui.listbox.value>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            <x-ui.listbox.item value="brenda" data-initials="BS">…</x-ui.listbox.item>
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No owner found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.autocomplete>
```

Rich tags for several people, with a clear button next to the label:

```html
@php
    $members = [
        ['id' => 'alice', 'name' => 'Alice Johnson', 'email' => 'alice@flexiwind.dev', 'initials' => 'AJ', 'badge' => 'background-color:#fde68a;color:#78350f'],
        ['id' => 'marc', 'name' => 'Marc Dupont', 'email' => 'marc@flexiwind.dev', 'initials' => 'MD', 'badge' => 'background-color:#bae6fd;color:#0c4a6e'],
        ['id' => 'nina', 'name' => 'Nina Lopez', 'email' => 'nina@flexiwind.dev', 'initials' => 'NL', 'badge' => 'background-color:#bbf7d0;color:#14532d'],
        ['id' => 'sarah', 'name' => 'Sarah Chen', 'email' => 'sarah@flexiwind.dev', 'initials' => 'SC', 'badge' => 'background-color:#bae6fd;color:#155e75'],
    ];
@endphp

<x-ui.autocomplete name="assignees" :value="['alice', 'nina']" multiple class="max-w-sm">
    <div class="flex items-center justify-between">
        <x-ui.label>Assign team members</x-ui.label>
        <x-ui.listbox.clear />
    </div>
    <x-ui.autocomplete.input placeholder="Type a name or email" />

    <x-ui.listbox.value mode="chips">
        <span class="inline-flex h-7 items-center gap-1.5 rounded-full bg-muted ps-1 pe-1 text-[13px] text-foreground">
            <span class="inline-flex size-5 items-center justify-center rounded-full text-[9px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
            <span data-bind="label"></span>
            <button type="button" data-select-remove class="flex size-5 items-center justify-center rounded-full text-muted-foreground hover:bg-background hover:text-foreground">
                <span aria-hidden="true" class="iconify ph--x-bold size-3"></span>
            </button>
        </span>
        <x-slot:placeholder class="text-sm">No one selected</x-slot:placeholder>
    </x-ui.listbox.value>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            @foreach ($members as $member)
                <x-ui.listbox.item :value="$member['id']" :data-initials="$member['initials']" :data-badge="$member['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$member['badge']">{{ $member['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label>{{ $member['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $member['email'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No team member found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.autocomplete>
```

## Several values

Add `multiple`. The input stays a search field and picks land as chips under it.

```html
<x-ui.autocomplete name="skills" :value="['laravel', 'tailwind']" label="Skills" multiple class="max-w-xs" :options="[
    'laravel' => 'Laravel',
    'livewire' => 'Livewire',
    'tailwind' => 'Tailwind CSS',
    'alpine' => 'Alpine.js',
    'php' => 'PHP',
    'postgres' => 'PostgreSQL',
    'redis' => 'Redis',
    'vue' => 'Vue',
]" />
```

With `display="list"`, the selection becomes a list with room for a second line:

```html
@php
    $people = collect(['Alice Johnson', 'Brenda Stone', 'Marc Dupont', 'Sarah Chen', 'Tom Rivera'])
        ->map(fn (string $name): array => [
            'id' => \Illuminate\Support\Str::slug($name),
            'name' => $name,
            'email' => \Illuminate\Support\Str::of($name)->before(' ')->lower().'@lumen.studio',
            'photo' => 'https://i.pravatar.cc/80?u='.\Illuminate\Support\Str::slug($name),
        ]);
@endphp

<x-ui.autocomplete name="invite" :value="['alice-johnson', 'marc-dupont']" label="Invite people" placeholder="Name or email"
    multiple display="list" count-text=":count people" remove-label="Remove :label" class="max-w-sm"
    :options="$people" option-value="id" option-label="name" option-description="email" option-avatar="photo" />
```

## Search with Livewire

Name a Livewire property with `search`: it receives what people type, after `debounce` milliseconds (300 by default) and once they typed `min-chars` characters (1 by default). Filter on the server and pass the results as `options`. The panel updates in place: the input keeps its focus and its text, a spinner shows while Livewire works, and a picked value keeps its label when it leaves the results.

```html
<x-docs.preview-ui>
    <livewire:autocomplete-demo />
</x-docs.preview-ui>
```

```blade
<x-ui.autocomplete wire:model.live="customer" search="query"
    :options="$customers" option-value="id" option-label="name" option-description="email" />
```

```php
public string $query = '';

public ?string $customer = null;

public function with(): array
{
    return [
        'customers' => $this->query === '' ? [] : Customer::query()
            ->whereLike('name', '%'.$this->query.'%')
            ->limit(6)
            ->get(['id', 'name', 'email']),
    ];
}
```

`whereLike` binds the text as a parameter: what people type is never part of the SQL.

## Your own empty state

The `empty` slot replaces the text shown when nothing matches. `<span data-select-empty-query></span>` repeats the query.

```blade
<x-ui.autocomplete wire:model="customer" search="query" :options="$customers">
    <x-slot:empty>
        No customer named “<span data-select-empty-query></span>”.
        <a href="{{ route('customers.create') }}" class="text-primary underline">Add one</a>
    </x-slot:empty>
</x-ui.autocomplete>
```

## States

```html
<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.autocomplete name="warehouse" value="gombe" label="Disabled" disabled :options="['gombe' => 'Kinshasa · Gombe', 'limete' => 'Kinshasa · Limete']" />
    <div class="flex flex-col gap-2">
        <x-ui.autocomplete name="airport" label="Invalid" invalid aria-describedby="airport-error" :options="['cdg' => 'Paris (CDG)', 'ory' => 'Paris (ORY)']" />
        <p id="airport-error" class="text-sm text-destructive">Pick an airport from the list.</p>
    </div>
</div>
```

## Keyboard

| Key | Action |
| --- | --- |
| Typing | Opens the panel and filters |
| Arrow down, Arrow up | Move between options |
| Enter | Pick the highlighted option |
| Escape | Close the panel |

## References

### Autocomplete props

| Prop | Description |
| --- | --- |
| `name`, `value` | As on the listbox. |
| `options`, `option-*` | As on the listbox. |
| `multiple` (boolean) | Several values. |
| `display` (chips\|list) | How several values show. Default: `chips`. |
| `max-chips` (int) | Chips shown before +N. |
| `search` (string) | Livewire property that receives the typed text. |
| `selected-options` (array\|Collection) | Options already picked, outside of the results: they name the selection without showing up in the list. Same keys as `options`. |
| `min-chars` (int) | Characters before a search. Default: 1 with `search`, 0 otherwise. |
| `debounce` (int) | Milliseconds between two searches. Default: 300. |
| `placeholder`, `empty-text`, `min-chars-text`, `start-text`, `count-text`, `remove-label`, `clear-text`, `clear-label` (string) | Texts. `:query`, `:count` and `:label` are replaced. |
| `label`, `size`, `disabled`, `invalid`, `placement` | As on the listbox. |

Items and the other parts are the [listbox parts](https://flexiwind.unoforge.com/components/listbox#parts). `x-ui.autocomplete.input` takes `placeholder`, `clearable` (boolean, default true) and `clear-label`.

## Accessibility

- The input is a `combobox` with `aria-autocomplete="list"`, `aria-expanded` and `aria-controls` pointing at its `listbox`.
- Enter picks an option without submitting the surrounding form.
- Chip and list remove buttons are named after their option.
- Labels are written as text, never as HTML.

## Public Docs

`https://flexiwind.unoforge.com/components/autocomplete`
