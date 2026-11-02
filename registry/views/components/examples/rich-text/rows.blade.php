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
