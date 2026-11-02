@props([
    'example' => '',
    'tier' => 'free',
    'inline' => false,
    'iframe' => false,
    'height' => 560,
])

@php
    use Flexiwind\Docs\ArtifactRegistry;
    use Flexiwind\Docs\Contracts\CodeHighlighter;
    use Flexiwind\Docs\Tier;

    $required = Tier::tryFrom($tier) ?? Tier::Free;
    $artifact = app(ArtifactRegistry::class)->example($example, $required);
    $currentTier = Tier::current();

    // Deux situations distinctes :
    //  - l'artefact est là mais hors palier : on MONTRE la preview et on
    //    verrouille seulement la source ;
    //  - il est absent du disque (site free) : rien à montrer, bloc entier.
    $sourceLocked = $artifact->isLocked();
    $nothingToShow = $artifact->isMissing() && ! $currentTier->grants($required);

    $code = $artifact->isFound() ? app(CodeHighlighter::class)->highlight($artifact->code(), 'blade') : '';

    // `iframe` : l'exemple est rendu seul, dans sa propre page, affichée pleine largeur.
    $route = (string) config('flexiwind-docs.example_preview_route');
    $frameUrl = $iframe && $route !== '' && \Illuminate\Support\Facades\Route::has($route)
        ? route($route, ['example' => trim(str_replace('.', '/', $example), '/')])
        : null;
    $frameHeight = max(200, min(1600, (int) $height));
@endphp

@if ($nothingToShow)
    <x-fw-docs::locked :example="$example" />
@elseif ($artifact->isMissing())
    <x-fw-docs::missing :example="$example" />
@elseif ($inline)
    {{--
        La carte extérieure ne porte que la gouttière (--card-padding) : c'est
        le wrapper de preview qui porte le padding, sinon il s'applique aussi
        au bloc de code. Même composition que x-docs.component-prev.
    --}}
    <div
        class="my-5 first:mt-0 grid w-full gap-1 rounded-ui border border-gray-200 dark:border-gray-800/60 bg-background"
    >
        @if ($frameUrl)
            <x-fw-docs::frame :src="$frameUrl" :height="$frameHeight" :title="$example" class="rounded-t-ui" />
        @else
            <div
                data-gen-ignore
                class="flex items-center justify-center min-h-max p-4"
            >
                <x-dynamic-component :component="$artifact->component" />
            </div>
        @endif

        @if ($sourceLocked)
            <x-fw-docs::locked variant="panel" :example="$example" />
        @else
            <x-docs.code-view-box class="rounded-b-ui bg-(--astro-code-color-background)">
                {!! $code !!}
            </x-docs.code-view-box>
        @endif
    </div>
@else
    <x-docs.docs-tab
        :values="[
            ['text' => 'Preview', 'icon' => 'ph--eye s', 'value' => 'Preview'],
            ['text' => 'Code', 'icon' => 'ph--code', 'value' => 'Code'],
        ]"
        triggersClass="relative flex gap-1 items-center disabled:cursor-not-allowed disabled:opacity-80 fx-active:text-title-foreground outline-none focus:outline-0 focus:outline-transparent focus-visible:outline focus-visible:outline-primary px-2.5 py-1 rounded-ui fx-active:bg-white fx-active:dark:bg-gray-800 ring-1 ring-transparent fx-active:ring-gray-200 fx-active:dark:ring-gray-700/60 fx-active:shadow"
        tabListContainer="w-full flex justify-between items-center gap-2 h-max pb-0.5 pt-px px-3.5 relative"
        tabList="flex items-center gap-0.5 text-sm text-muted-foreground"
        docPanelClass="pt-2.5"
        iconClass="opacity-80 size-3"
    >
        <x-docs.tab-panel
            value="Preview"
            class="bg-background border border-border-input rounded-ui items-center justify-center min-h-60 lg:min-h-80 {{ $frameUrl ? 'overflow-hidden' : '' }}"
            active
        >
            @if ($frameUrl)
                <x-fw-docs::frame :src="$frameUrl" :height="$frameHeight" :title="$example" />
            @else
                <div data-gen-ignore class="size-full flex items-center justify-center p-4 md:p-10">
                    <x-dynamic-component :component="$artifact->component" />
                </div>
            @endif
        </x-docs.tab-panel>
        <x-docs.tab-panel
            value="Code"
            show-with-grid
            class="overflow-hidden border border-gray-200 dark:border-gray-800/60 bg-gray-800 dark:bg-gray-900/50 grid text-gray-300 rounded-ui"
        >
            @if ($sourceLocked)
                <x-fw-docs::locked variant="panel" :example="$example" />
            @else
                <x-docs.code-view-box>{!! $code !!}</x-docs.code-view-box>
            @endif
        </x-docs.tab-panel>
    </x-docs.docs-tab>
@endif
