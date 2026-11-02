{{--
    Un exemple affiché dans sa propre page : une iframe pleine largeur à la
    hauteur demandée, un squelette pendant le chargement et un lien pour
    l'ouvrir en grand. L'exemple s'adapte seul à la largeur disponible.
    Même origine que la doc : la page suit le thème du site.
--}}
@props(['src', 'height' => 560, 'title' => 'Preview'])

<div data-gen-ignore x-data="{ loading: true }" {{ $attributes->class(['relative w-full bg-background']) }}>
    <div x-show="loading" class="absolute inset-0 animate-pulse bg-muted/60"></div>
    <iframe src="{{ $src }}" title="{{ $title }} preview" loading="lazy" x-on:load="loading = false"
        x-bind:class="loading && 'invisible'"
        class="block w-full border-0" style="height: {{ (int) $height }}px"></iframe>
    <a href="{{ $src }}" target="_blank" rel="noopener"
        class="absolute end-2 bottom-2 inline-flex items-center gap-1.5 rounded-ui border border-border bg-background/90 px-2 py-1 text-xs text-muted-foreground backdrop-blur-sm hover:text-foreground">
        <span aria-hidden="true" class="flex size-3.5 iconify ph--arrow-square-out"></span>
        Open
    </a>
</div>
