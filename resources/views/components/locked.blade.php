@props([
    'example' => '',
    'label' => 'Pro component',
    // 'card'  : bloc autonome, quand rien n'est affichable.
    // 'panel' : remplit le panneau de code, la preview reste visible à côté.
    'variant' => 'card',
])

@php
    $upgradeUrl = (string) config('flexiwind-docs.upgrade_url', '/pricing');
@endphp

@if ($variant === 'panel')
    {{-- Le rendu est visible, seule la source est réservée. --}}
    <div
        data-gen-ignore
        class="flex w-full flex-col items-center justify-center gap-3 px-6 py-12 text-center"
    >
        <span aria-hidden="true" class="iconify ph--lock-key text-2xl text-muted-foreground"></span>

        <div class="grid gap-1">
            <p class="text-sm font-medium text-title-foreground">Source reserved for Pro</p>
            <p class="max-w-sm text-sm text-muted-foreground">
                You can try it above. Unlock the code to copy it into your project.
            </p>
        </div>

        <x-ui.button :href="$upgradeUrl" size="sm" variant="solid">
            Unlock with Pro
            <span aria-hidden="true" class="iconify ph--arrow-right ml-1.5 text-sm"></span>
        </x-ui.button>
    </div>
@else
    {{--
        Rendu du site free quand l'artefact n'est même pas sur le disque. Le
        contenu de la page reste lisible et indexable ; aucun fichier pro n'est
        nécessaire pour produire ce rendu.
    --}}
    <div
        data-gen-ignore
        class="relative my-5 first:mt-0 grid overflow-hidden rounded-ui border border-border-input bg-background"
    >
        <div aria-hidden="true" class="pointer-events-none select-none p-4 md:p-10">
            <div class="grid gap-3 opacity-40 blur-[3px]">
                <div class="h-9 w-48 rounded-ui bg-muted"></div>
                <div class="h-9 w-72 rounded-ui bg-muted"></div>
                <div class="h-9 w-36 rounded-ui bg-muted"></div>
            </div>
        </div>

        <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 bg-background/70 px-6 text-center backdrop-blur-[2px]">
            <span aria-hidden="true" class="iconify ph--lock-key text-2xl text-muted-foreground"></span>

            <div class="grid gap-1">
                <p class="text-sm font-medium text-title-foreground">{{ $label }}</p>
                <p class="max-w-sm text-sm text-muted-foreground">
                    The preview and source for <code class="inline-code inline">{{ $example }}</code>
                    are part of Flexiwind Pro.
                </p>
            </div>

            <x-ui.button :href="$upgradeUrl" size="sm" variant="solid">
                Unlock with Pro
                <span aria-hidden="true" class="iconify ph--arrow-right ml-1.5 text-sm"></span>
            </x-ui.button>
        </div>
    </div>
@endif
