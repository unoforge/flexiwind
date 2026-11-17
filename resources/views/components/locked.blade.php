@props([
    'example' => '',
    'label' => 'Pro component',
    // 'card'  : bloc autonome, quand rien n'est affichable.
    // 'panel' : remplit le panneau de code, la preview reste visible à côté.
    'variant' => 'card',
])

@php
    $upgradeUrl = (string) config('flexiwind-docs.upgrade_url', '/pricing');
    $templatesUrl = (string) config('flexiwind-docs.templates_url', '/templates');

    // Decoy lines — never the real source. Colors mimic the code panel theme.
    $decoy = [
        ['c' => 'text-indigo-300/90', 't' => '<x-ui.card'],
        ['c' => 'text-code-muted', 't' => '  class="flex flex-col gap-4 p-5"'],
        ['c' => 'text-fuchsia-300/80', 't' => '>'],
        ['c' => 'text-sky-300/80', 't' => '  <x-ui.heading'],
        ['c' => 'text-code-muted', 't' => '    size="sm"'],
        ['c' => 'text-fuchsia-300/80', 't' => '  >'],
        ['c' => 'text-code-foreground/70', 't' => '    Revenue this month'],
        ['c' => 'text-sky-300/80', 't' => '  </x-ui.heading>'],
        ['c' => 'text-sky-300/80', 't' => '  <x-ui.text'],
        ['c' => 'text-code-muted', 't' => '    class="text-muted-foreground"'],
        ['c' => 'text-fuchsia-300/80', 't' => '  >'],
        ['c' => 'text-code-foreground/60', 't' => '    Compared to last period'],
        ['c' => 'text-sky-300/80', 't' => '  </x-ui.text>'],
        ['c' => 'text-sky-300/80', 't' => '  <div'],
        ['c' => 'text-code-muted', 't' => '    class="mt-auto flex items-end justify-between"'],
        ['c' => 'text-fuchsia-300/80', 't' => '  >'],
        ['c' => 'text-code-foreground/80', 't' => '    <span class="text-2xl font-medium">€36,400</span>'],
        ['c' => 'text-sky-300/80', 't' => '    <x-ui.badge'],
        ['c' => 'text-code-muted', 't' => '      intent="success"'],
        ['c' => 'text-fuchsia-300/80', 't' => '    >+12%</x-ui.badge>'],
        ['c' => 'text-sky-300/80', 't' => '  </div>'],
        ['c' => 'text-indigo-300/90', 't' => '</x-ui.card>'],
        ['c' => 'text-code-muted', 't' => ''],
        ['c' => 'text-indigo-300/90', 't' => '@'.'php'],
        ['c' => 'text-code-foreground/55', 't' => '  $delta = $current - $previous;'],
        ['c' => 'text-indigo-300/90', 't' => '@'.'endphp'],
    ];
@endphp

@if ($variant === 'panel')
    {{-- Le rendu est visible, seule la source est réservée. --}}
    <div
        data-gen-ignore
        {{ $attributes->class('relative size-full min-h-80 overflow-hidden bg-code') }}
    >
        {{-- Fake code under glass — not the real source. --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 select-none overflow-hidden p-5 sm:p-8">
            <pre class="font-mono text-[12px] leading-5 sm:text-[13px] sm:leading-6"><code class="block space-y-0.5 blur-[9px] saturate-150">@foreach ($decoy as $line)
<span @class([$line['c'], 'block min-h-5'])>@if ($line['t'] !== ''){{ $line['t'] }}@else&nbsp;@endif</span>
@endforeach</code></pre>
            <div class="absolute inset-0 bg-gradient-to-b from-code/15 via-code/55 to-code/85"></div>
        </div>

        <div class="relative z-10 flex h-full min-h-80 flex-col items-center justify-center gap-6 px-6 py-14 text-center">
            <div class="relative">
                <span class="flex size-14 items-center justify-center rounded-full bg-white/8 ring-1 ring-white/12 shadow-[0_0_0_10px_rgba(255,255,255,0.03)]">
                    <span aria-hidden="true" class="iconify ph--code text-2xl text-code-foreground"></span>
                </span>
                <span class="absolute -top-0.5 -right-0.5 flex size-6 items-center justify-center rounded-full bg-indigo-600 text-white ring-2 ring-code shadow-md shadow-indigo-600/30">
                    <span aria-hidden="true" class="iconify ph--lock-simple-fill text-[11px]"></span>
                </span>
            </div>

            <div class="grid max-w-sm gap-1.5">
                <p class="text-xl font-semibold tracking-tight text-code-foreground sm:text-2xl">
                    Source reserved for <span class="text-indigo-300">Pro</span>
                </p>
                <p class="text-sm text-code-muted">
                    You can try it above. Unlock the code — or skip the blank page with a
                    full Laravel app template built from the same components.
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-2.5">
                <x-ui.button
                    :href="$upgradeUrl"
                    size="sm"
                    variant="solid"
                    class="rounded-full border-transparent bg-indigo-600 px-5 text-white shadow-lg shadow-indigo-600/35 hover:bg-indigo-500 hover:text-white"
                >
                    Unlock with Pro
                </x-ui.button>
                <x-ui.button :href="$templatesUrl" size="sm" variant="outline" intent="gray" class="rounded-full border-white/12 bg-white/4 text-code-foreground/80 hover:bg-white/8 hover:text-code-foreground">
                    Browse templates
                </x-ui.button>
            </div>
        </div>
    </div>
@else
    {{--
        Rendu du site free quand l'artefact n'est même pas sur le disque. Le
        contenu de la page reste lisible et indexable ; aucun fichier pro n'est
        nécessaire pour produire ce rendu.
    --}}
    <div
        data-gen-ignore
        {{ $attributes->class('relative my-5 first:mt-0 grid min-h-56 overflow-hidden rounded-ui border border-border-input bg-code') }}
    >
        <div aria-hidden="true" class="pointer-events-none select-none overflow-hidden p-5 md:p-8">
            <pre class="font-mono text-[12px] leading-5"><code class="block space-y-0.5 opacity-90 blur-[8px] saturate-150">@foreach (array_slice($decoy, 0, 14) as $line)
<span @class([$line['c'], 'block min-h-5'])>@if ($line['t'] !== ''){{ $line['t'] }}@else&nbsp;@endif</span>
@endforeach</code></pre>
        </div>

        <div class="absolute inset-0 flex flex-col items-center justify-center gap-5 bg-code/60 px-6 text-center backdrop-blur-[4px]">
            <div class="relative">
                <span class="flex size-12 items-center justify-center rounded-full bg-white/8 ring-1 ring-white/12">
                    <span aria-hidden="true" class="iconify ph--code text-xl text-code-foreground"></span>
                </span>
                <span class="absolute -top-0.5 -right-0.5 flex size-5.5 items-center justify-center rounded-full bg-indigo-600 text-white ring-2 ring-code shadow-sm shadow-indigo-600/30">
                    <span aria-hidden="true" class="iconify ph--lock-simple-fill text-[10px]"></span>
                </span>
            </div>

            <div class="grid gap-1">
                <p class="text-sm font-medium text-code-foreground">{{ $label }}</p>
                <p class="max-w-sm text-sm text-code-muted">
                    <code class="rounded bg-white/8 px-1 py-px font-mono text-[12px] text-indigo-300">{{ $example }}</code>
                    is part of Flexiwind Pro — along with full app templates
                    (billing, CRM) you can drop into a client project.
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-2">
                <x-ui.button
                    :href="$upgradeUrl"
                    size="sm"
                    variant="solid"
                    class="rounded-full border-transparent bg-indigo-600 px-5 text-white shadow-lg shadow-indigo-600/35 hover:bg-indigo-500 hover:text-white"
                >
                    Unlock with Pro
                </x-ui.button>
                <x-ui.button :href="$templatesUrl" size="sm" variant="outline" intent="gray" class="rounded-full border-white/12 bg-white/4 text-code-foreground/80 hover:bg-white/8 hover:text-code-foreground">
                    Browse templates
                </x-ui.button>
            </div>
        </div>
    </div>
@endif
