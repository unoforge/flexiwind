## Demo

```html
<x-ui.listbox name="framework" value="laravel" label="Framework" placeholder="Pick a framework" class="max-w-xs">
    <x-ui.listbox.item value="astro">Astro</x-ui.listbox.item>
    <x-ui.listbox.item value="laravel">Laravel</x-ui.listbox.item>
    <x-ui.listbox.item value="livewire">Livewire</x-ui.listbox.item>
    <x-ui.listbox.item value="vue">Vue</x-ui.listbox.item>
    <x-ui.listbox.item value="svelte" disabled>Svelte</x-ui.listbox.item>
</x-ui.listbox>
```

## Installation

```bash
php artisan flexi:add listbox
```

This adds the Blade views under `resources/views/components/ui/listbox`, the `App\Flexiwind\OptionList` helper and the plugin `resources/js/plugins/listbox.js`, which drives [Flexilla Select](https://flexilla.unoforge.com/docs/components/select). Register it once:

```js
import { ListboxPlugin } from "./plugins/listbox";

Alpine.plugin(ListboxPlugin);
```

The trigger is the input and the panel is the dropdown: same heights, borders and focus ring as `x-ui.input`, same items as `x-ui.dropdown`. A theme that restyles one restyles the others. For a plain native control, [Select](https://flexiwind.unoforge.com/components/select) is still there.

## Composition

Every piece is a component you can place, restyle or replace. Without them, `<x-ui.listbox>` builds a standard field from its props; bring your own `<x-ui.listbox.content>` and the composition is yours:

```blade
<x-ui.listbox wire:model.live="owner">
    <x-ui.label>Owner</x-ui.label>

    <x-ui.listbox.trigger>
        <x-ui.listbox.value placeholder="Choose an owner">
            {{-- The template of the selected value: Flexilla bindings --}}
            <span data-bind="initials" data-bind-style="badge"></span>
            <span data-bind="label"></span>
        </x-ui.listbox.value>
    </x-ui.listbox.trigger>

    <x-ui.listbox.content>
        <x-ui.listbox.search placeholder="Search team members" />
        <x-ui.listbox.list>
            <x-ui.listbox.item value="alice" data-initials="AJ" data-badge="background-color:#fde68a">
                <x-ui.listbox.avatar>AJ</x-ui.listbox.avatar>
                <x-ui.listbox.label>Alice Johnson</x-ui.listbox.label>
                <x-ui.listbox.description>alice@example.com</x-ui.listbox.description>
            </x-ui.listbox.item>
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No one named “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.listbox>
```

```html
@php
    $owners = [
        ['id' => 'alice', 'name' => 'Alice Johnson', 'email' => 'alice@flexiwind.dev', 'initials' => 'AJ', 'badge' => 'background-color:#fde68a;color:#78350f'],
        ['id' => 'marc', 'name' => 'Marc Dupont', 'email' => 'marc@flexiwind.dev', 'initials' => 'MD', 'badge' => 'background-color:#bae6fd;color:#0c4a6e'],
        ['id' => 'nina', 'name' => 'Nina Lopez', 'email' => 'nina@flexiwind.dev', 'initials' => 'NL', 'badge' => 'background-color:#bbf7d0;color:#14532d'],
    ];
@endphp

<x-ui.listbox name="owner" class="max-w-xs">
    <div class="flex items-center justify-between">
        <x-ui.label>Owner</x-ui.label>
        <x-ui.listbox.clear>Clear</x-ui.listbox.clear>
    </div>

    <x-ui.listbox.trigger>
        <x-ui.listbox.value>
            <span class="flex min-w-0 items-center gap-2">
                <span class="inline-flex size-5 shrink-0 items-center justify-center rounded-full text-[9px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
                <span class="truncate" data-bind="label"></span>
            </span>
            <x-slot:placeholder>Choose an owner</x-slot:placeholder>
        </x-ui.listbox.value>
    </x-ui.listbox.trigger>

    <x-ui.listbox.content>
        <x-ui.listbox.search placeholder="Search team members" />
        <x-ui.listbox.list>
            @foreach ($owners as $owner)
                <x-ui.listbox.item :value="$owner['id']" :data-initials="$owner['initials']" :data-badge="$owner['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$owner['badge']">{{ $owner['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label class="font-medium">{{ $owner['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $owner['email'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No team member found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.listbox>
```

`<x-ui.listbox.value>` shows the selection wherever you put it — in the trigger, under it, in a sentence. Its content is the template of one value, with the bindings of Flexilla:

| Binding | Fills |
| --- | --- |
| `data-bind="label"` | Text from the option: `label`, `value`, or any `data-*` of the item (`data-initials` → `data-bind="initials"`). |
| `data-bind-src`, `data-bind-alt`, `data-bind-title`, `data-bind-href` | That attribute. URLs other than `http(s)`, `/`, `#`, `mailto:` and `tel:` are dropped; an image without a source is hidden. |
| `data-bind-style` | The `style` attribute. `url()`, `expression()` and `@import` are dropped. |
| `data-select-remove` | A button that removes this value. |

Values are written as text, never as HTML.

## Chips of your own

With `multiple`, a `chips` value repeats its template for each value. Put it anywhere — here under the trigger, with a clear button:

```html
@php
    $reviewers = [
        ['id' => 'brenda', 'name' => 'Brenda Stone', 'role' => 'Product designer', 'initials' => 'BS', 'badge' => 'background-color:#fecdd3;color:#881337'],
        ['id' => 'david', 'name' => 'David Kim', 'role' => 'Frontend engineer', 'initials' => 'DK', 'badge' => 'background-color:#ddd6fe;color:#4c1d95'],
        ['id' => 'sarah', 'name' => 'Sarah Chen', 'role' => 'Documentation lead', 'initials' => 'SC', 'badge' => 'background-color:#bae6fd;color:#155e75'],
        ['id' => 'tom', 'name' => 'Tom Rivera', 'role' => 'Backend engineer', 'initials' => 'TR', 'badge' => 'background-color:#fed7aa;color:#7c2d12'],
    ];
@endphp

<x-ui.listbox name="reviewers" :value="['brenda', 'sarah']" multiple class="max-w-xs">
    <x-ui.label>Reviewers</x-ui.label>

    <x-ui.listbox.trigger>
        <span class="flex-1 truncate text-muted-foreground">Assign reviewers</span>
    </x-ui.listbox.trigger>

    <div class="flex flex-wrap items-center gap-1.5">
        <x-ui.listbox.value mode="chips" class="contents">
            <span class="inline-flex h-7 items-center gap-1.5 rounded-full bg-muted ps-1 pe-1 text-[13px] text-foreground">
                <span class="inline-flex size-5 items-center justify-center rounded-full text-[9px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
                <span data-bind="label"></span>
                <button type="button" data-select-remove class="flex size-5 items-center justify-center rounded-full text-muted-foreground hover:bg-background hover:text-foreground">
                    <span aria-hidden="true" class="iconify ph--x-bold size-3"></span>
                </button>
            </span>
            <x-slot:placeholder class="text-sm">No reviewer selected</x-slot:placeholder>
        </x-ui.listbox.value>
        <x-ui.listbox.clear class="ms-1" />
    </div>

    <x-ui.listbox.content>
        <x-ui.listbox.search placeholder="Filter reviewers" />
        <x-ui.listbox.list>
            @foreach ($reviewers as $reviewer)
                <x-ui.listbox.item :value="$reviewer['id']" :data-initials="$reviewer['initials']" :data-badge="$reviewer['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$reviewer['badge']">{{ $reviewer['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label>{{ $reviewer['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $reviewer['role'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No reviewer found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.listbox>
```

## A value template

A colored dot from the option's data, in the trigger and in the list:

```html
@php
    $statuses = [
        'todo' => ['Todo', 'background-color: var(--color-muted-foreground)'],
        'progress' => ['In progress', 'background-color: var(--color-warning)'],
        'review' => ['In review', 'background-color: var(--color-info)'],
        'done' => ['Done', 'background-color: var(--color-success)'],
    ];
@endphp

<x-ui.listbox name="status" value="progress" class="max-w-60">
    <x-ui.label>Status</x-ui.label>

    <x-ui.listbox.trigger size="sm">
        <x-ui.listbox.value placeholder="Set a status">
            <span class="flex items-center gap-2">
                <span class="size-2 shrink-0 rounded-full" data-bind-style="dot"></span>
                <span data-bind="label"></span>
            </span>
        </x-ui.listbox.value>
    </x-ui.listbox.trigger>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            @foreach ($statuses as $value => [$label, $dot])
                <x-ui.listbox.item :value="$value" :data-dot="$dot">
                    <x-ui.listbox.avatar size="xs" class="size-2! bg-transparent" :style="$dot" />
                    <x-ui.listbox.label>{{ $label }}</x-ui.listbox.label>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
    </x-ui.listbox.content>
</x-ui.listbox>
```

## Search, icons and descriptions

`searchable` adds a filter field at the top of the panel. Items are composed of an icon, an avatar, a label and a description; with an icon or an avatar, the check moves to the right edge.

```html
<x-ui.listbox name="package" value="livewire" label="Package" searchable search-placeholder="Search packages" class="max-w-xs">
    <x-ui.listbox.item value="livewire">
        <x-ui.listbox.icon name="ph--lightning" />
        <x-ui.listbox.label>Livewire</x-ui.listbox.label>
        <x-ui.listbox.description>Full-stack components</x-ui.listbox.description>
    </x-ui.listbox.item>
    <x-ui.listbox.item value="lighthouse">
        <x-ui.listbox.icon name="ph--graph" />
        <x-ui.listbox.label>Lighthouse</x-ui.listbox.label>
        <x-ui.listbox.description>GraphQL server</x-ui.listbox.description>
    </x-ui.listbox.item>
    <x-ui.listbox.item value="media-library">
        <x-ui.listbox.icon name="ph--image" />
        <x-ui.listbox.label>Media Library</x-ui.listbox.label>
        <x-ui.listbox.description>Files attached to models</x-ui.listbox.description>
    </x-ui.listbox.item>
    <x-ui.listbox.item value="horizon">
        <x-ui.listbox.icon name="ph--queue" />
        <x-ui.listbox.label>Horizon</x-ui.listbox.label>
        <x-ui.listbox.description>Queue dashboard</x-ui.listbox.description>
    </x-ui.listbox.item>
</x-ui.listbox>
```

## Groups and avatars

Pass rows with `:options` and name the keys to read. `option-group` sorts options under group headers; a disabled option stays in place.

```html
@php
    $people = [
        ['id' => 'alice', 'name' => 'Alice Johnson', 'team' => 'Design', 'photo' => 'https://i.pravatar.cc/80?u=alice-johnson'],
        ['id' => 'brenda', 'name' => 'Brenda Stone', 'team' => 'Design', 'photo' => 'https://i.pravatar.cc/80?u=brenda-stone'],
        ['id' => 'marc', 'name' => 'Marc Dupont', 'team' => 'Engineering', 'photo' => 'https://i.pravatar.cc/80?u=marc-dupont'],
        ['id' => 'sarah', 'name' => 'Sarah Chen', 'team' => 'Engineering', 'photo' => 'https://i.pravatar.cc/80?u=sarah-chen'],
        ['id' => 'tom', 'name' => 'Tom Rivera', 'team' => 'Engineering', 'photo' => 'https://i.pravatar.cc/80?u=tom-rivera', 'away' => true],
    ];
@endphp

<x-ui.listbox name="assignee" value="sarah" label="Assignee" class="max-w-xs"
    :options="$people" option-value="id" option-label="name" option-group="team" option-avatar="photo" option-disabled="away" />
```

`options` takes a list of values, a `value => label` array, a list of rows or objects, Eloquent models, a Collection or an enum. The keys default to `value`, `label`, `description`, `icon`, `avatar`, `disabled` and `group`.

## Several values

Add `multiple`. The panel stays open while picking and the selection shows as chips under the trigger, each with its own remove button.

```html
@php
    $people = collect([
        ['id' => 'alice', 'name' => 'Alice Johnson'],
        ['id' => 'brenda', 'name' => 'Brenda Stone'],
        ['id' => 'marc', 'name' => 'Marc Dupont'],
        ['id' => 'sarah', 'name' => 'Sarah Chen'],
        ['id' => 'tom', 'name' => 'Tom Rivera'],
    ])->map(fn (array $person): array => $person + ['photo' => 'https://i.pravatar.cc/80?u='.$person['id']]);
@endphp

<x-ui.listbox name="reviewers" :value="['alice', 'marc']" label="Reviewers" placeholder="Select reviewers" multiple searchable
    :options="$people" option-value="id" option-label="name" option-avatar="photo" class="max-w-xs" />
```

## Summaries

With `display`, the trigger summarizes the selection instead: `compact` lists the first names, `count` says how many. `max-chips` folds the chips past a number into +N.

```html
@php
    $cities = ['Paris', 'Lyon', 'Marseille', 'Bordeaux', 'Lille', 'Nantes'];
@endphp

<div class="grid w-full max-w-3xl gap-6 sm:grid-cols-3">
    <x-ui.listbox name="cities" :value="['Paris', 'Lyon', 'Lille', 'Nantes']" label="Compact" multiple display="compact" :options="$cities" />
    <x-ui.listbox name="permissions" :value="['Paris', 'Lyon', 'Bordeaux']" label="Count" multiple display="count" count-text=":count cities" :options="$cities" />
    <x-ui.listbox name="tags" :value="['Paris', 'Lyon', 'Marseille', 'Lille']" label="Chips, up to 2" multiple max-chips="2" :options="$cities" placeholder="Select cities" />
</div>
```

The same summaries are value modes when you compose, with your own texts:

```html
@php
    $people = ['john' => 'John', 'virgil' => 'Virgil', 'jacques' => 'Jacques', 'enot' => 'Enot', 'jade' => 'Jade'];
@endphp

<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.listbox name="team" :value="['john', 'jade']" multiple>
        <x-ui.label>Team</x-ui.label>
        <x-ui.listbox.trigger>
            <x-ui.listbox.value mode="count" count-text=":count people on the team" placeholder="Nobody yet" />
        </x-ui.listbox.trigger>
        <x-ui.listbox.content>
            <x-ui.listbox.list>
                @foreach ($people as $value => $name)
                    <x-ui.listbox.item :value="$value">{{ $name }}</x-ui.listbox.item>
                @endforeach
            </x-ui.listbox.list>
        </x-ui.listbox.content>
    </x-ui.listbox>

    <x-ui.listbox name="guests" :value="['john', 'virgil', 'jacques', 'enot']" multiple>
        <x-ui.label>Guests</x-ui.label>
        <x-ui.listbox.trigger>
            <x-ui.listbox.value mode="compact" limit="2" compact-text=":labels and :count other guests" placeholder="No guest yet" />
        </x-ui.listbox.trigger>
        <x-ui.listbox.content>
            <x-ui.listbox.list>
                @foreach ($people as $value => $name)
                    <x-ui.listbox.item :value="$value">{{ $name }}</x-ui.listbox.item>
                @endforeach
            </x-ui.listbox.list>
        </x-ui.listbox.content>
    </x-ui.listbox>
</div>
```

## States

```html
<div class="grid w-full max-w-3xl gap-6 sm:grid-cols-3">
    <x-ui.listbox name="region" value="eu" label="Disabled" disabled :options="['eu' => 'Europe (Paris)', 'us' => 'United States']" />
    <div class="flex flex-col gap-2">
        <x-ui.listbox name="plan" label="Invalid" invalid placeholder="Choose a plan" :options="['starter' => 'Starter', 'team' => 'Team']" aria-describedby="plan-error" />
        <p id="plan-error" class="text-sm text-destructive">Choose a plan to continue.</p>
    </div>
    <div class="flex flex-col gap-3">
        <x-ui.listbox name="size-sm" size="sm" placeholder="Small" :options="['a' => 'Small']" />
        <x-ui.listbox name="size-md" placeholder="Medium" :options="['a' => 'Medium']" />
        <x-ui.listbox name="size-lg" size="lg" placeholder="Large" :options="['a' => 'Large']" />
    </div>
</div>
```

`invalid` also turns on by itself when the field has a validation error. `aria-*` attributes go to the trigger, so tie the message with `aria-describedby`.

## Livewire

`wire:model` receives a string, or a real array with `multiple` — `['alice', 'marc']`, never a comma string:

```html
<x-docs.preview-ui>
    <livewire:listbox-demo />
</x-docs.preview-ui>
```

```blade
<x-ui.listbox wire:model.live="reviewers" multiple searchable
    :options="$people" option-value="id" option-label="name" />
```

The listbox keeps its panel out of Livewire's updates. When the options depend on another field, give it a `wire:key` that changes with them so it is rebuilt:

```blade
<x-ui.listbox wire:model="city" :options="$cities" wire:key="cities-{{ $country }}" />
```

In a plain form, `name` posts one hidden field per value: `reviewers[]`.

## Keyboard

| Key | Action |
| --- | --- |
| Arrow down, Arrow up | Open the panel, move between options |
| Enter, Space | Open the panel, pick the highlighted option |
| Escape | Close the panel |

## References

### Listbox props

| Prop | Description |
| --- | --- |
| `name` (string) | Posts the value; `name[]` fields with `multiple`. |
| `value` (string\|array) | Starting value outside Livewire. `old()` wins after a failed validation. |
| `options` (array\|Collection) | Options to render, before the items of the slot. |
| `option-value`, `option-label`, `option-description`, `option-icon`, `option-avatar`, `option-disabled`, `option-group` (string) | Keys to read in each row. |
| `multiple` (boolean) | Several values. |
| `searchable` (boolean) | Filter field at the top of the panel. |
| `display` (chips\|count\|compact) | How several values show. Default: `chips`. |
| `max-chips` (int) | Chips shown before +N. |
| `placeholder`, `search-placeholder`, `empty-text`, `count-text`, `compact-text`, `remove-label`, `clear-text` (string) | Texts. `:query`, `:count`, `:labels` and `:label` are replaced. |
| `label` (string) | Label above the trigger. |
| `size` (sm\|md\|lg) | Same heights as the input. Default: `md`. |
| `disabled`, `invalid` (boolean) | States. |
| `placement` (string) | Panel placement. Default: `bottom-start`. |

Slot `empty` replaces the text shown when a search finds nothing. With a `<x-ui.listbox.content>` in the slot, these props only set the value, the name and the states: the composition is yours.

### Parts

| Component | Role and props |
| --- | --- |
| `x-ui.listbox.trigger` | The button. `size` (sm\|md\|lg), `disabled`, `chevron` (boolean). Empty, it shows a value. |
| `x-ui.listbox.value` | The selection. `mode` (single\|chips\|list\|count\|compact), `placeholder` (text or `<x-slot:placeholder>`), `max` (chips before +N), `count-text`, `compact-text`, `limit`, `remove-label`. Its content is the template of one value. |
| `x-ui.listbox.clear` | A button that empties the selection, hidden while there is nothing to clear. |
| `x-ui.listbox.content` | The panel. `placement`. |
| `x-ui.listbox.search` | The filter field. `placeholder`. |
| `x-ui.listbox.list` | The scrolling grid of items and groups. |
| `x-ui.listbox.item` | An option. `value`, `label` (text for search and values, defaults to its label part or its text), `disabled`, `check` (boolean). Its `data-*` attributes feed the value template. |
| `x-ui.listbox.label`, `x-ui.listbox.description` | The two lines of an item. |
| `x-ui.listbox.icon` | `name` (Iconify class) or your SVG. |
| `x-ui.listbox.avatar` | `src` for an image, or content such as initials. `size` (xs\|sm\|md\|lg). |
| `x-ui.listbox.group` | `label`. Hidden when a search empties it. |
| `x-ui.listbox.header`, `x-ui.listbox.separator` | Free heading and divider inside the list. |
| `x-ui.listbox.empty` | Shown when a search finds nothing. `x-ui.listbox.query` repeats the text typed. |

## Accessibility

- The trigger is a button with `aria-haspopup="listbox"`, `aria-expanded` and `aria-controls`; the panel is a `listbox`, `aria-multiselectable` with `multiple`.
- Options are `option` elements with `aria-selected`; a disabled one has `aria-disabled`.
- Chip remove buttons are named after their option: "Remove Alice Johnson".
- Labels are written as text, never as HTML.

## Public Docs

`https://flexiwind.unoforge.com/components/listbox`
