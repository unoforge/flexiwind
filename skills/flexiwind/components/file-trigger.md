## Demo

```html
<x-ui.file-trigger name="invoice" accept=".pdf,application/pdf" max-size="10MB" class="w-full max-w-sm">
    <div class="flex items-center gap-3">
        <x-ui.button variant="outline" size="sm" class="gap-2"><x-ui.icon name="ph--upload-simple" /> Upload file</x-ui.button>
        <span class="text-xs text-muted-foreground">PDF, up to 10 MB</span>
    </div>
</x-ui.file-trigger>
```

## Installation

```bash
php artisan flexi:add file-trigger
```

```js
import { FilesPlugin } from "./plugins/files";

Alpine.plugin(FilesPlugin);
```

Wrap any button: a click opens the file picker. The picked file shows under it with its size and a remove button.

```blade
<x-ui.file-trigger wire:model="invoice" accept=".pdf" max-size="10MB">
    <x-ui.button variant="outline">Upload file</x-ui.button>
</x-ui.file-trigger>
```

## Dropzone

A larger target for drag and drop. A click, Enter or Space opens the picker too.

```html
<x-ui.dropzone name="attachments" multiple accept="image/png,image/jpeg,.pdf" max-size="10MB" :max-files="5"
    hint="PNG, JPG or PDF · up to 10 MB each" class="w-full max-w-md" />
```

`size="sm"` keeps it on one line:

```html
<x-ui.dropzone name="logo" size="sm" accept="image/*" max-size="2MB" title="Drop a logo or :browse"
    hint="An image, 2 MB max." class="w-full max-w-sm" />
```

## With Livewire

`wire:model` uploads with progress. Each new pick replaces the previous one, like a native file input; removing a file removes its upload.

```html
<x-docs.preview-ui>
    <livewire:dropzone-demo />
</x-docs.preview-ui>
```

```php
use Livewire\WithFileUploads;

use WithFileUploads;

#[Validate(['attachments' => 'array|max:5', 'attachments.*' => 'file|mimes:png,jpg,pdf|max:10240'])]
public array $attachments = [];

public function save(): void
{
    $this->validate();

    foreach ($this->attachments as $file) {
        $file->store('attachments');
    }
}
```

## Checked twice

The browser checks `accept`, `max-size` and `max-files` before anything leaves: a rejected file says why and is never sent. Those checks only help people. What arrives on the server can be forged, so Livewire validates again with `mimes` and `max`, and `store()` gives each file a random name: the name people chose is shown, never used as a path.

## References

### File trigger and dropzone props

| Prop | Description |
| --- | --- |
| `name` (string) | Field name for plain forms (`name[]` with `multiple`). |
| `accept` (string) | Extensions and types: `.pdf,image/*`. |
| `multiple` (boolean) | Several files. |
| `max-size` (int\|string) | `10MB`, `500KB`, or kilobytes as in Laravel's `max`. |
| `max-files` (int) | Files kept from one pick. |
| `show-files` (boolean) | Show the list of picked files. Default: true. |
| `disabled` (boolean) | |
| `remove-label` (string) | Name of remove buttons. Default: `Remove :name`. |
| `texts` (array) | Overrides of `type`, `size`, `count`, `uploading`, `done`, `error`, `ready`. |

The file trigger also takes `directory` and `capture`. The dropzone also takes `label`, `hint`, `title` (`:browse` marks the link), `browse-text`, `over-text`, `size` (sm\|md) and `invalid`; it shows the Livewire error of its field.

## Accessibility

- The trigger is your button; the zone is focusable and opens the picker with Enter or Space.
- Progress bars carry their file name; rejections are written next to the file.
- File names are written as text, never as HTML.

## Public Docs

`https://flexiwind.unoforge.com/components/file-trigger`
