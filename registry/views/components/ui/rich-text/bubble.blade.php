{{--
    Le menu qui suit la sélection. Sans contenu : gras, italique, souligné, lien.

    <x-ui.rich-text.bubble>
        <x-ui.rich-text.button command="bold" />
        <x-ui.rich-text.button command="h2" />
    </x-ui.rich-text.bubble>
--}}
<div data-slot="rich-text-bubble" data-rt-bubble role="toolbar" aria-label="Selection"
    x-cloak x-show="bubble.open"
    x-transition:enter="transition-[opacity,translate] duration-150 ease-out" x-transition:enter-start="opacity-0 translate-y-1"
    x-bind:style="{ left: bubble.x + 'px', top: bubble.y + 'px' }"
    {{ $attributes->class(['absolute z-30 flex items-center gap-0.5 rounded-ui border border-border bg-background p-1 shadow-sm']) }}>
    @if (trim((string) $slot) !== '')
        {{ $slot }}
    @else
        <x-ui.rich-text.button command="bold" />
        <x-ui.rich-text.button command="italic" />
        <x-ui.rich-text.button command="underline" />
        <x-ui.rich-text.separator />
        <x-ui.rich-text.button command="link" />
    @endif
</div>
