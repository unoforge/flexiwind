@props([
    'label' => 'Pro',
])

{{--
    Marque un artefact réservé à Pro. Vit dans le docs-kit public parce que
    le site free doit pouvoir le poser lui aussi : il liste les blocks pro,
    il ne les sert pas.
--}}
<span
    aria-label="{{ $label }} — Flexiwind Pro"
    {{ $attributes->class([
        'inline-flex items-center gap-1 rounded-md px-1.5 py-px text-[11px] font-medium leading-5',
        'ui-subtle ui-subtle-primary',
    ]) }}
>
    <span aria-hidden="true" class="flex iconify ph--lightning-fill text-[10px]"></span>
    {{ $label }}
</span>
