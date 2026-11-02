## Demo

```html
<x-ui.rich-text label="Release notes" name="notes" class="w-full max-w-xl"
    value="<h2>Version 2.4</h2><p>Three new components and <strong>one breaking change</strong>. Rename the prop before you upgrade:</p><ul><li>Rich text, free and Pro</li><li>Tag input with suggestions</li></ul>" />
```

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

The plugin has no dependency and adds about 5 KB (gzip) to your bundle. For tables, mentions or font and colour pickers, [Rich text Pro](https://flexiwind.unoforge.com/components/plugins/rich-text-pro) is built on Tiptap and loads it only on the pages that use it.

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

```html
<x-ui.rich-text toolbar="full" bubble :max="600" class="w-full max-w-2xl"
    value="<h2>The Quiet Harbour</h2><p>Select a few words: a bubble shows the marks. Type <code>##</code> and a space at the start of a line for a heading, <code>-</code> for a list, <code>&gt;</code> for a quote.</p>" />
```

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

```html
<x-ui.rich-text class="w-full max-w-2xl"
    value="<p>A library of <strong>Blade and Livewire components</strong> on Tailwind CSS. Here is a button:</p><pre><code>&lt;x-ui.button variant=&quot;outline&quot;&gt;Cancel&lt;/x-ui.button&gt;</code></pre>">
    <x-ui.rich-text.toolbar stacked>
        <x-ui.rich-text.group>
            <x-ui.rich-text.button command="bold" />
            <x-ui.rich-text.button command="italic" />
            <x-ui.rich-text.button command="underline" />
            <x-ui.rich-text.button command="strike" />
            <x-ui.rich-text.button command="code" />
            <x-ui.rich-text.button command="link" />
            <x-ui.rich-text.button command="unlink" />
            <x-ui.rich-text.button command="clear" />
            <x-ui.rich-text.separator />
            <x-ui.rich-text.button command="align-left" />
            <x-ui.rich-text.button command="align-center" />
            <x-ui.rich-text.button command="align-right" />
        </x-ui.rich-text.group>
        <x-ui.rich-text.group>
            <x-ui.rich-text.blocks />
            <x-ui.rich-text.separator />
            <x-ui.rich-text.button command="image" />
            <x-ui.rich-text.button command="bullet-list" />
            <x-ui.rich-text.button command="ordered-list" />
            <x-ui.rich-text.button command="quote" />
            <x-ui.rich-text.button command="divider" />
        </x-ui.rich-text.group>
    </x-ui.rich-text.toolbar>
    <x-ui.rich-text.content class="min-h-40" />
</x-ui.rich-text>
```

## Variants

`variant` changes the frame, and each part follows.

`inset`: the content sits inset in a soft frame, with `fade` at the bottom.

```html
<x-ui.rich-text variant="inset" bubble class="w-full max-w-xl"
    value="<p>At the heart of each chapter in <em>The Quiet Harbour</em> is the keeper’s log: a time, a light, a ship. Duarte uses the log the way a crime writer uses an alibi, and the gaps start to matter.</p><p>The town around him is drawn in a few strokes. A priest, a widow, a harbour master who knows more than he says.</p><p>Each chapter is one night, one log entry, one more reason to doubt what the keeper saw.</p>">
    <x-ui.rich-text.toolbar>
        <x-ui.rich-text.blocks :levels="['paragraph', 'h2', 'h3']" />
        <x-ui.rich-text.separator />
        <x-ui.rich-text.button command="bold" />
        <x-ui.rich-text.button command="italic" />
        <x-ui.rich-text.button command="underline" />
        <x-ui.rich-text.separator />
        <x-ui.rich-text.button command="bullet-list" />
        <x-ui.rich-text.button command="link" />
    </x-ui.rich-text.toolbar>
    <x-ui.rich-text.content fade class="h-48" />
    <x-ui.rich-text.bubble />
</x-ui.rich-text>
```

`detached`: the toolbar floats above the field.

```html
<x-ui.rich-text variant="detached" class="w-full max-w-xl"
    value="<p><em>The Quiet Harbour</em> follows a lighthouse keeper on the Portuguese coast through the winter of 1953.</p>">
    <x-ui.rich-text.toolbar>
        <x-ui.rich-text.button command="bold" />
        <x-ui.rich-text.button command="italic" />
        <x-ui.rich-text.button command="underline" />
        <x-ui.rich-text.separator />
        <x-ui.rich-text.button command="align-left" />
        <x-ui.rich-text.button command="align-center" />
        <x-ui.rich-text.button command="bullet-list" />
        <x-ui.rich-text.separator />
        <x-ui.rich-text.button command="link" />
        <x-ui.rich-text.button command="image" />
    </x-ui.rich-text.toolbar>
    <x-ui.rich-text.content class="h-44" />
</x-ui.rich-text>
```

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

```html
<div class="grid w-full max-w-xl gap-6">
    <x-ui.rich-text label="Invalid" invalid toolbar="minimal" hint="Write at least one sentence." />
    <x-ui.rich-text label="Disabled" disabled toolbar="minimal" value="<p>This text cannot be edited.</p>" />
</div>
```

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

## Public Docs

`https://flexiwind.unoforge.com/components/plugins/rich-text`
