---
title: "Rich text"
group: "Plugins"
order: 20
tier: "free"
state: "new"
description: "A rich text editor with no dependency: marks, headings, lists, links, images and uploads, composed part by part."
seoDescription: "Rich text editor for Laravel Blade and Livewire with Tailwind CSS: no dependency, composable toolbar, bubble menu, Markdown shortcuts, image upload, HTML cleaned on the server."
keywords: "rich text editor, wysiwyg, laravel wysiwyg, livewire rich text, blade editor, html editor, contenteditable"
---

## Demo

::preview{example="rich-text/demo" inline}

## Installation

```bash
php artisan flexi:add rich-text
```

Register the plugin:

```js
import { RichTextPlugin } from "./plugins/rich-text";

Alpine.plugin(RichTextPlugin);
```

`wire:model` receives HTML. Outside Livewire, `name` posts it in a hidden field.

```blade
<x-ui.rich-text wire:model="body" label="Body" />
```

The plugin has no dependency and adds about 5 KB (gzip) to your bundle. For tables, mentions or font and colour pickers, [Rich text Pro](/components/plugins/rich-text-pro) is built on Tiptap and loads it only on the pages that use it.

## Clean the HTML on the server

The editor keeps a short list of tags and attributes, in the browser. A request can still be forged, so clean the HTML again before you store it, and before you show HTML that came from elsewhere:

```php
use App\Flexiwind\RichText;

$post->body = RichText::clean($this->body);
```

```blade
{!! \App\Flexiwind\RichText::clean($post->body) !!}
```

Kept: paragraphs, headings 1 to 3, bold, italic, underline, strikethrough, sub and superscript, inline code and code blocks, quotes, lists, dividers, links (`http`, `https`, `mailto`, relative) and images (`http`, `https`, relative). Everything else is dropped: scripts, styles, `on*` attributes, `javascript:` and `data:` addresses, iframes. `RichText::text()` returns the plain text, for an excerpt or a word count.

## Toolbars

Without content, the component draws its own toolbar. `toolbar` picks one: `minimal`, `basic` (default), `full`, or `none`. `bubble` adds the menu that follows the selection; `max` adds a character counter.

::preview{example="rich-text/full" inline}

## Composition

Every part is a component. Bring your own toolbar, in the order you want:

| Part | Role |
| --- | --- |
| `<x-ui.rich-text.toolbar>` | The bar. `position="bottom"`, `sticky`, `stacked` (one row per group). |
| `<x-ui.rich-text.group>` | Buttons that go together. |
| `<x-ui.rich-text.separator>` | A line between groups. |
| `<x-ui.rich-text.button command="…">` | One command. `icon` and `label` override the defaults. |
| `<x-ui.rich-text.blocks>` | The text style menu. `levels`, `display="buttons"`. |
| `<x-ui.rich-text.content>` | Where you write. Size it with `class`; `fade` blurs the bottom. |
| `<x-ui.rich-text.bubble>` | The menu on the selection. Your buttons, or bold, italic, underline, link. |
| `<x-ui.rich-text.footer>`, `<x-ui.rich-text.count>` | A row under the text, a word or character counter. |

Two rows, marks above and blocks below:

::preview{example="rich-text/rows" inline}

## Variants

`variant` changes the frame, and each part follows.

`inset`: the content sits inset in a soft frame, with `fade` at the bottom.

::preview{example="rich-text/inset" inline}

`detached`: the toolbar floats above the field.

::preview{example="rich-text/detached" inline}

## Markdown shortcuts

At the start of a line, followed by a space: `#`, `##`, `###` for headings, `>` for a quote, `-` or `*` for a list, `1.` for a numbered list, ` ``` ` for a code block. `:markdown="false"` turns them off.

| Shortcut | Command |
| --- | --- |
| `Ctrl+B`, `Ctrl+I`, `Ctrl+U` | Bold, italic, underline |
| `Ctrl+Shift+X` | Strikethrough |
| `Ctrl+E` | Inline code |
| `Ctrl+K` | Link |
| `Ctrl+Z`, `Ctrl+Shift+Z` | Undo, redo |

## Your own commands

```js
import { RichText } from "./plugins/rich-text";

RichText.command("signature", {
    run: (editor) => editor.insertHtml("<p>— Ines, Northlight</p>"),
});
```

```blade
<x-ui.rich-text.button command="signature" icon="ph--signature" label="Insert signature" />
```

`run(editor)` acts; an optional `active(editor)` tells when the button is pressed. `editor.exec()`, `editor.insertHtml()`, `editor.setBlock()` and `editor.closest()` are there to help. Inserted HTML goes through the same cleaning.

## States

::preview{example="rich-text/states" inline}

## References

| Prop | Description |
| --- | --- |
| `label`, `hint` (string) | Label above, help text below. |
| `name` (string), `value` (string) | Hidden field and starting HTML, outside Livewire. |
| `placeholder` (string) | Shown while the text is empty. |
| `variant` (default\|inset\|detached\|ghost) | The frame. |
| `toolbar` (minimal\|basic\|full\|none) | The toolbar drawn when the component has no content. |
| `bubble`, `count` (boolean), `max` (int) | Selection menu, word counter, character limit. |
| `upload`, `store` (string) | Livewire property and method for image uploads. |
| `accept` (string), `max-size` (string) | Image types and size checked before sending. Default: PNG, JPG, WebP, GIF, 5MB. |
| `markdown` (boolean) | Markdown shortcuts. Default: true. |
| `submit-on` (enter\|mod-enter) | Submit the surrounding form from the keyboard. |
| `disabled`, `invalid` | Like the input. |
| `texts` (array) | Every text of the panels and messages. |

More compositions (a document page, a reply box, extended marks, images uploaded with Livewire) are in the [Pro examples](/examples).

The editor sends `rich-text:change` with `{ value }` on each change.

## Accessibility

- The content is a `textbox` with `aria-multiline`, named by its label.
- The toolbar is a `toolbar`; each button has a name, a tooltip with its shortcut, and `aria-pressed` for its state.
- Uploads, errors and removed images are announced.
- `Escape` closes the panels and the bubble.
