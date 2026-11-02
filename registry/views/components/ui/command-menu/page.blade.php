{{--
    Une page du menu, ouverte par un élément `page="<name>"`. Son libellé
    s'affiche dans le champ ; Retour arrière dans un champ vide revient.
--}}
@props(['name', 'label' => null])

<div data-command-page="{{ $name }}" data-label="{{ $label ?? $name }}" hidden {{ $attributes->class(['contents']) }}>
    {{ $slot }}
</div>
