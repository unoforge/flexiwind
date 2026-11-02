{{-- Une rangée sous le texte : compteur, actions, bouton d'envoi. --}}
<div data-slot="rich-text-footer"
    {{ $attributes->class([
        'flex min-w-0 items-center gap-2 px-3 py-2',
        'group-data-[variant=default]/rich-text:border-t group-data-[variant=default]/rich-text:border-border-input',
        'group-data-[variant=inset]/rich-text:px-1 group-data-[variant=inset]/rich-text:pb-0.5 group-data-[variant=inset]/rich-text:pt-2',
        'group-data-[variant=detached]/rich-text:px-0 group-data-[variant=ghost]/rich-text:px-0',
    ]) }}>
    {{ $slot }}
</div>
