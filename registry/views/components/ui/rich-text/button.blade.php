{{--
    Un bouton de commande. Les commandes connues ont leur icône et leur
    libellé ; une commande ajoutée avec RichText.command() prend `icon` et `label`.

    <x-ui.rich-text.button command="bold" />
    <x-ui.rich-text.button command="h2" icon="ph--text-h-two-bold" />
    <x-ui.rich-text.button command="timestamp" icon="ph--clock" label="Insert time" />
--}}
@props([
    'command',
    'icon' => null,
    'label' => null,
    'shortcut' => null,
])

@php
    $mod = 'Ctrl';
    $known = [
        'bold' => ['ph--text-b', 'Bold', "$mod+B"],
        'italic' => ['ph--text-italic', 'Italic', "$mod+I"],
        'underline' => ['ph--text-underline', 'Underline', "$mod+U"],
        'strike' => ['ph--text-strikethrough', 'Strikethrough', "$mod+Shift+X"],
        'code' => ['ph--code', 'Inline code', "$mod+E"],
        'subscript' => ['ph--text-subscript', 'Subscript', null],
        'superscript' => ['ph--text-superscript', 'Superscript', null],
        'clear' => ['ph--eraser', 'Clear formatting', null],
        'paragraph' => ['ph--paragraph', 'Paragraph', null],
        'h1' => ['ph--text-h-one', 'Heading 1', '#'],
        'h2' => ['ph--text-h-two', 'Heading 2', '##'],
        'h3' => ['ph--text-h-three', 'Heading 3', '###'],
        'quote' => ['ph--quotes', 'Quote', '>'],
        'code-block' => ['ph--code-block', 'Code block', '```'],
        'bullet-list' => ['ph--list-bullets', 'Bulleted list', '-'],
        'ordered-list' => ['ph--list-numbers', 'Numbered list', '1.'],
        'divider' => ['ph--minus', 'Divider', null],
        'align-left' => ['ph--text-align-left', 'Align left', null],
        'align-center' => ['ph--text-align-center', 'Align center', null],
        'align-right' => ['ph--text-align-right', 'Align right', null],
        'link' => ['ph--link', 'Link', "$mod+K"],
        'unlink' => ['ph--link-break', 'Remove link', null],
        'image' => ['ph--image', 'Image', null],
        'undo' => ['ph--arrow-u-up-left', 'Undo', "$mod+Z"],
        'redo' => ['ph--arrow-u-up-right', 'Redo', "$mod+Shift+Z"],
    ];
    [$knownIcon, $knownLabel, $knownShortcut] = $known[$command] ?? [null, \Illuminate\Support\Str::headline($command), null];
    $icon ??= $knownIcon;
    $label ??= $knownLabel;
    $shortcut ??= $knownShortcut;
    $title = $shortcut ? "$label ($shortcut)" : $label;
@endphp

<button type="button" data-slot="rich-text-button" data-command="{{ $command }}"
    aria-label="{{ $label }}" title="{{ $title }}"
    x-on:mousedown.prevent x-on:click="run(@js($command), $event)" x-bind:aria-pressed="String(isActive(@js($command)))"
    {{ $attributes->class([
        'inline-flex h-8 min-w-8 shrink-0 items-center justify-center gap-1.5 rounded-[calc(var(--radius-ui)-var(--spacing))] px-1.5 text-sm text-muted-foreground transition-colors duration-150',
        'outline-2 -outline-offset-2 outline-transparent focus-visible:outline-(--ui-input-focus-outline)',
        'hover:bg-muted hover:text-title-foreground aria-pressed:bg-muted aria-pressed:text-title-foreground',
        'disabled:pointer-events-none disabled:opacity-50',
    ]) }}>
    @if ($icon)
        <span aria-hidden="true" class="iconify {{ $icon }} size-4.5 shrink-0"></span>
    @endif
    {{ $slot }}
</button>
