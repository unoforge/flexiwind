---
title: "Rich text Pro"
group: "Plugins"
order: 21
tier: "pro"
state: "new"
description: "A rich text editor on Tiptap: tables, tasks, mentions, slash commands, font, size and colour, loaded only where you use it."
seoDescription: "Tiptap rich text editor for Laravel Blade and Livewire with Tailwind CSS: tables, task lists, mentions, slash commands, font and colour pickers, image upload, lazy-loaded bundle."
keywords: "tiptap, tiptap laravel, livewire tiptap, wysiwyg, rich text editor, prosemirror, blade editor, mentions, slash commands"
---

## Demo

Type `/` at the start of a word for a block, `@` to mention someone. Select text for the bubble; click into the table for its tools.

::preview{example="rich-text-pro/demo" inline}

## Installation

```bash
php artisan flexi:add rich-text-pro
```

This adds the Blade parts, the plugin, its Tiptap core and the `@tiptap/*` packages. Register the plugin:

```js
import { RichTextProPlugin } from "./plugins/rich-text-pro";

Alpine.plugin(RichTextProPlugin);
```

`wire:model` receives HTML. Outside Livewire, `name` posts it in a hidden field.

```blade
<x-ui.rich-text-pro wire:model="body" label="Body" />
```

Rich text Pro is its own component, next to the free [Rich text](/components/plugins/rich-text): it shares the look, not the code. Use either, or both in the same app.

## Bundle

Tiptap never enters your main bundle. `rich-text-pro.js` holds the toolbar, panels and uploads; the first time an editor shows on a page, it loads `rich-text-pro/editor.js` and Tiptap with `import()`, in their own file. Tables and mentions load in a second step, only when the editor uses them (`:tables="false"`, no `mentions`).

Measured gzip: about 5 KB in your main bundle, about 130 KB for Tiptap on the first editor, 15 KB more for tables, 2 KB for mentions.

## Clean the HTML on the server

```php
use App\Flexiwind\RichTextPro;

$post->body = RichTextPro::clean($this->body);
```

```blade
{!! \App\Flexiwind\RichTextPro::clean($post->body) !!}
```

It keeps what Tiptap writes: headings, marks, lists and tasks, quotes, code, links, images and captions, tables, mentions, colour, font, size and highlight. Styles are read property by property: a colour must be a colour, a size a size; `url()`, `expression()` and anything else are dropped, with scripts, `on*` attributes and `javascript:` links.

## Composition

The parts are those of Rich text, under `x-ui.rich-text-pro.*`, plus three pickers:

| Part | Role |
| --- | --- |
| `<x-ui.rich-text-pro.toolbar>`, `.group`, `.separator` | The bar and its groups. `position="bottom"`, `sticky`, `stacked`. |
| `<x-ui.rich-text-pro.button command="…">` | One command. |
| `<x-ui.rich-text-pro.blocks>` | The text style menu. |
| `<x-ui.rich-text-pro.font>` | Font family. `fonts` maps a name to a CSS stack. |
| `<x-ui.rich-text-pro.size>` | Text size. `sizes` lists the values. |
| `<x-ui.rich-text-pro.color>` | Text colour and highlight. `colors`, `highlights`. |
| `<x-ui.rich-text-pro.content>` | Where you write. Size it with `class`; `fade` blurs the bottom. |
| `<x-ui.rich-text-pro.bubble>`, `.footer`, `.count` | Selection menu, a row under the text, a counter. |

A CMS field, toolbar detached, with font, size and colour:

::preview{example="rich-text-pro/compose" inline}

Commands on top of Rich text: `task-list`, `highlight`, `table`, `add-row`, `add-column`, `delete-row`, `delete-column`, `header-row`, `merge-cells`, `delete-table`, `mention`.

## Mentions

`mentions` lists the people, as `['id' => 'Name']` or `[['id' => …, 'label' => …, 'description' => …]]`. The search ignores accents and case. With `mention-search`, the typed text goes to a Livewire method that returns the matches:

```blade
<x-ui.rich-text-pro wire:model="reply" mention-search="searchPeople" />
```

```php
public function searchPeople(string $query): array
{
    return User::query()->whereLike('name', "%{$query}%")->limit(8)
        ->get()->map(fn (User $user) => ['id' => $user->id, 'label' => $user->name, 'description' => $user->email])->all();
}
```

A reply box: mentions, tasks, `Ctrl+Enter` sends, 500 characters at most.

::preview{example="rich-text-pro/comment" inline}

## A page that is the document

`variant="ghost"` drops the frame; `/` does the rest.

::preview{example="rich-text-pro/document" inline}

## Images and upload

As with Rich text: `upload` names a `WithFileUploads` property, `store` the method that validates it and returns the image URL. Drop or paste images on the text; each upload shows its progress under the editor. Click an image to align it, write its alt text, add a caption or remove it.

```blade
<x-ui.rich-text-pro wire:model="body" upload="photo" store="storePhoto" max-size="5MB" />
```

## Your own commands

```js
import { RichTextPro } from "./plugins/rich-text-pro";

RichTextPro.command("signature", {
    run: (editor) => editor.chain().focus().insertContent("<p>— Ines, Northlight</p>").run(),
});
```

`run(editor, component, value)` gets the Tiptap editor; an optional `active(editor)` tells when the button is pressed.

## References

| Prop | Description |
| --- | --- |
| `label`, `hint`, `name`, `value`, `placeholder` | Like Rich text. |
| `variant` (default\|inset\|detached\|ghost) | The frame. |
| `toolbar` (minimal\|basic\|full\|none) | The toolbar drawn when the component has no content. Default: `full`. |
| `bubble` (boolean) | Selection menu. Default: true. |
| `slash`, `tables` (boolean) | `/` commands and tables. Default: true. |
| `mentions` (array), `mention-search` (string) | People to mention, or a Livewire method that finds them. |
| `max` (int) | Character limit, enforced while typing. |
| `upload`, `store`, `accept`, `max-size` | Image uploads, like Rich text. |
| `submit-on` (enter\|mod-enter), `disabled`, `invalid`, `texts` | Like Rich text. |

## Accessibility

- The content is a `textbox` with `aria-multiline`, named by its label; each task checkbox is named after its task.
- The toolbar is a `toolbar`; buttons have a name, a tooltip and `aria-pressed`.
- The `/` and `@` lists are `listbox`es: arrows move, Enter or Tab picks, Escape closes.
