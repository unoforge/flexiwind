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
