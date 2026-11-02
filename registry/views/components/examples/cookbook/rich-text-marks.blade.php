{{--
    Les marques étendues, pour un texte scientifique ou juridique : indice,
    exposant, code en ligne, et un bouton qui efface toute la mise en forme.
    Save changes est l'action principale, Reset reste discret.
--}}
<div class="flex w-full max-w-xl flex-col gap-2.5">
    <div class="flex items-center justify-between gap-3">
        <span class="flex flex-col">
            <span class="text-[15px] font-semibold text-title-foreground">Harbour notes</span>
            <span class="text-xs text-muted-foreground">Subscript, superscript and inline code are on in this toolbar.</span>
        </span>
        <x-ui.badge size="sm" variant="soft" intent="gray">Draft</x-ui.badge>
    </div>
    <x-ui.rich-text
        value="<p>Water is H<sub>2</sub>O, and the harbour basin covers about 4.2 km<sup>2</sup>.</p><p><strong>Tide tables</strong> list the height above chart datum.</p>">
        <x-ui.rich-text.toolbar>
            <x-ui.rich-text.button command="bold" />
            <x-ui.rich-text.button command="italic" />
            <x-ui.rich-text.button command="underline" />
            <x-ui.rich-text.button command="strike" />
            <x-ui.rich-text.separator />
            <x-ui.rich-text.button command="subscript" />
            <x-ui.rich-text.button command="superscript" />
            <x-ui.rich-text.button command="code" />
            <x-ui.rich-text.separator />
            <x-ui.rich-text.button command="clear" />
        </x-ui.rich-text.toolbar>
        <x-ui.rich-text.content class="min-h-28" />
    </x-ui.rich-text>
    <div class="flex justify-end gap-2">
        <x-ui.button type="button" size="sm" variant="ghost" intent="gray">Reset</x-ui.button>
        <x-ui.button type="button" size="sm">Save changes</x-ui.button>
    </div>
</div>
