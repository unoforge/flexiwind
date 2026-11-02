# Rich text Pro

A rich text editor on Tiptap, part of Flexiwind Pro. It is its own component next to the free [rich-text](./rich-text.md): same look, different code. Use either, or both in the same app. Do not mix their parts: `x-ui.rich-text.*` goes with `x-ui.rich-text`, `x-ui.rich-text-pro.*` with `x-ui.rich-text-pro`.

This file describes the API only. It needs an active Pro subscription to install.

## Installation

- Install from the Pro registry: `php artisan flexi:add @fx/rich-text-pro`.
- It adds the Blade parts, the `RichTextPro` plugin (register it with `Alpine.plugin(RichTextProPlugin)`), the Tiptap core and the `@tiptap/*` packages.
- Tiptap is loaded on demand, only on a page that shows an editor. Tables and mentions load in a second step, only when used.

## Binding and output

- `wire:model` receives HTML. Outside Livewire, `name` posts it in a hidden field.
- Clean the HTML on the server with `App\Flexiwind\RichTextPro::clean()` before storing or rendering it.
- It keeps headings, marks, lists and tasks, quotes, code, links, images and captions, tables, mentions, colour, font, size and highlight. Styles are read property by property; scripts, `on*` attributes, `javascript:` links and unsafe style values are dropped.

## `x-ui.rich-text-pro` props

| Prop | Default | Description |
| ---- | ------- | ----------- |
| `label` | `null` | Label above the editor. |
| `hint` | `null` | Helper text under the editor. |
| `name` | `null` | Field name, when not bound with `wire:model`. |
| `value` | `''` | Initial HTML. |
| `placeholder` | `Write something…` | Text shown while empty. |
| `variant` (default\|inset\|detached\|ghost) | `default` | The frame. `ghost` drops it, for a page that is the document. |
| `toolbar` (minimal\|basic\|full\|none) | `full` | The toolbar drawn when the component has no content of its own. |
| `bubble` (boolean) | `true` | Menu shown on a selection. |
| `slash` (boolean) | `true` | `/` block menu. |
| `tables` (boolean) | `true` | Table support and its tools. |
| `mentions` (array) | `null` | People to mention: `id => name`, or a list of items with `id`, `label` and `description`. Search ignores case and accents. |
| `mention-search` (string) | `null` | Name of a Livewire method that receives the typed text and returns the matches. |
| `max` (int) | `null` | Character limit, enforced while typing. |
| `upload` (string) | `null` | Name of a Livewire `WithFileUploads` property, to enable image drop, paste and browse. |
| `store` (string) | `null` | Livewire method that validates the upload and returns the image URL. |
| `accept` (string) | png, jpeg, webp, gif | Accepted image types. |
| `max-size` (string) | `5MB` | Largest image. |
| `submit-on` (enter\|mod-enter) | `null` | Submits the form with Enter or Ctrl/Cmd+Enter. |
| `disabled`, `invalid` (boolean) | `false` | States. |
| `no-results` (string) | `No results` | Text of the empty `/` and `@` menus. |
| `texts` (array) | `[]` | Overrides for the built-in labels. |

## Parts

Compose them inside `x-ui.rich-text-pro` to replace the default toolbar and content.

| Part | Props | Role |
| ---- | ----- | ---- |
| `x-ui.rich-text-pro.toolbar` | `label` (`Formatting`), `position` (top\|bottom), `sticky` (boolean), `stacked` (boolean) | The toolbar. `stacked` puts groups on separate lines. |
| `x-ui.rich-text-pro.content` | `fade` (boolean) | The editable area. Size it with classes such as `min-h-48`. |
| `x-ui.rich-text-pro.button` | `command`, `icon`, `label`, `shortcut` | One command button. Known commands bring their own icon, label and shortcut. |
| `x-ui.rich-text-pro.group` | none | Groups buttons that go together. |
| `x-ui.rich-text-pro.separator` | none | Vertical rule between groups. |
| `x-ui.rich-text-pro.blocks` | `levels` (paragraph, h1, h2, h3, quote, code-block), `display` (`menu`), `label` (`Text style`) | Block-type picker. |
| `x-ui.rich-text-pro.font` | `fonts` (label => CSS font stack), `label` | Font picker. |
| `x-ui.rich-text-pro.size` | `sizes` (list of CSS sizes), `label`, `default-text` | Text size picker. |
| `x-ui.rich-text-pro.color` | `colors`, `highlights` (lists of hex colours), `label`, `text-label`, `highlight-label`, `reset-text` | Text colour and highlight picker. |
| `x-ui.rich-text-pro.defaults` | `preset` (minimal\|basic\|full), `bubble`, `tables`, `max` | The preset toolbar as one part, to extend rather than rewrite. |
| `x-ui.rich-text-pro.bubble` | none | Selection menu. |
| `x-ui.rich-text-pro.layers` | `no-results` | The `/` and `@` menus. |
| `x-ui.rich-text-pro.count` | none | Word count, or characters over `max` when a limit is set; turns red past the limit. |
| `x-ui.rich-text-pro.footer` | none | Row under the text, for the counter, actions and a send button. |

## Commands for `x-ui.rich-text-pro.button`

- **Marks:** bold, italic, underline, strike, code, subscript, superscript, highlight, clear.
- **Blocks:** paragraph, h1, h2, h3, quote, code-block, bullet-list, ordered-list, task-list, divider.
- **Alignment:** align-left, align-center, align-right.
- **Links and media:** link, unlink, image, mention.
- **History:** undo, redo.
- **Tables:** table, add-row, add-column, delete-row, delete-column, header-row, merge-cells, delete-table.
- A command added in JavaScript with `RichTextPro.command(name, { run, active })` takes `icon` and `label` on its button. `run` receives the Tiptap editor, the component and the value.

## Guidance

- Use `variant="ghost"` for a page that is the document: it drops the frame. `default`, `inset` and `detached` change how the frame, toolbar and footer are drawn around the text.
- Use `toolbar="minimal"` or `basic` for comments and replies; keep `full` for documents.
- Set `max` for any field with a stored length limit, and clean the HTML again on the server.
- For images, give both `upload` and `store`; one without the other does nothing.

## Avoid

- Do not use `x-ui.rich-text.*` parts inside `x-ui.rich-text-pro`, or the reverse.
- Do not store or render the editor HTML without `RichTextPro::clean()`.
- Do not invent command names: use the list above or register your own.
- Do not install it in a project without a Pro subscription.

## Public Docs

`https://flexiwind.unoforge.com/components/plugins/rich-text-pro`
