{{--
    Une palette ⌘K : chercher, ouvrir une page, lancer une action.

    <x-ui.command-menu shortcut="mod+k">
        <x-slot:trigger><x-ui.command-menu.trigger /></x-slot:trigger>
        <x-ui.command-menu.group heading="Suggestions">
            <x-ui.command-menu.item href="/docs" icon="ph--book-open">Search docs</x-ui.command-menu.item>
            <x-ui.command-menu.item wire:click="createProject" icon="ph--folder-plus" shortcut="mod+n">Create project</x-ui.command-menu.item>
            <x-ui.command-menu.item page="theme" icon="ph--palette">Change theme…</x-ui.command-menu.item>
        </x-ui.command-menu.group>
        <x-ui.command-menu.page name="theme" label="Theme">…</x-ui.command-menu.page>
    </x-ui.command-menu>

    Le champ garde le focus (combobox + aria-activedescendant), les flèches
    déplacent la sélection, Entrée active l'élément. Avec `search`, le texte
    va aussi à une propriété Livewire ; un groupe `:filter="false"` affiche
    ses résultats tels que le serveur les renvoie.
    Moteur : Alpine.data('fwCommandMenu'), resources/js/plugins/command-menu.js.
--}}
@props([
    'label' => 'Command menu',
    'placeholder' => 'Search or run a command…',
    'shortcut' => 'mod+k',
    'search' => null,
    'debounce' => 250,
    'emptyText' => 'No results for “:query”.',
    'footer' => true,
    'texts' => [],
])

@php
    $id = $attributes->get('id') ?? 'command-menu-'.substr(md5((string) json_encode([$label, $placeholder, $search])), 0, 6);
    $hasEmpty = str_contains((string) $slot, 'data-command-empty');
    $texts = $texts + ['navigate' => 'Navigate', 'open' => 'Open', 'back' => 'Back', 'close' => 'Close'];
    [$emptyBefore, $emptyAfter] = array_pad(explode(':query', e($emptyText), 2), 2, '');
@endphp

<div data-slot="command-menu" id="{{ $id }}"
    x-data="fwCommandMenu(@js(['shortcut' => $shortcut, 'search' => $search, 'debounce' => (int) $debounce]))"
    {{ $attributes->except(['id'])->class(['contents']) }}>
    {{ $trigger ?? '' }}

    <dialog x-ref="dialog" wire:ignore.self aria-label="{{ $label }}"
        x-on:close="onClose()" x-on:cancel.prevent="close()" x-on:click="if ($event.target === $el) close()"
        class="[--command-radius:calc(var(--radius-ui)*1.5)] [--command-padding:--spacing(1.5)] fixed inset-x-0 top-[12vh] mx-auto mt-0 w-[calc(100vw-2rem)] max-w-xl overflow-visible bg-transparent p-0 text-foreground backdrop:bg-gray-950/40 backdrop:backdrop-blur-xs dark:backdrop:bg-black/60">
        <div class="flex max-h-[min(34rem,76vh)] flex-col overflow-hidden rounded-(--command-radius) border border-border bg-background shadow-xl">
            <div class="flex h-13 shrink-0 items-center gap-2.5 border-b border-border px-3.5 text-muted-foreground">
                <span aria-hidden="true" class="flex size-4.5 shrink-0 iconify ph--magnifying-glass"></span>
                <span x-show="page" x-cloak x-text="pageLabel" class="inline-flex h-6 shrink-0 items-center rounded-[calc(var(--command-radius)-var(--command-padding))] bg-muted px-2 text-xs font-medium text-title-foreground"></span>
                <input type="text" x-ref="input" x-model="query" autofocus autocomplete="off" autocapitalize="off" spellcheck="false"
                    role="combobox" aria-autocomplete="list" aria-expanded="true" aria-controls="{{ $id }}-list" :aria-activedescendant="activeId"
                    placeholder="{{ $placeholder }}" aria-label="{{ $placeholder }}"
                    x-on:input="onInput()" x-on:keydown="onKeydown($event)"
                    class="h-full min-w-0 flex-1 border-0 bg-transparent text-[15px] text-title-foreground outline-none placeholder:text-(--ui-input-place-holder)">
                @if ($search)
                    <span x-show="loading" x-cloak role="status" aria-label="Searching" class="flex">
                        <span aria-hidden="true" class="flex size-4 iconify ph--circle-notch-bold animate-spin"></span>
                    </span>
                @endif
                <kbd class="hidden h-5 items-center rounded-[calc(var(--command-radius)-var(--command-padding))] border border-border px-1.5 text-[11px] font-medium text-muted-foreground sm:inline-flex">Esc</kbd>
            </div>

            <div id="{{ $id }}-list" x-ref="list" role="listbox" aria-label="{{ $label }}"
                class="flex min-h-0 flex-col gap-px overflow-y-auto overscroll-contain p-(--command-padding)">
                {{ $slot }}
                @unless ($hasEmpty)
                    <div data-command-empty hidden class="px-4 pt-6 pb-5 text-center text-sm text-muted-foreground">{!! $emptyBefore !!}<span data-command-query></span>{!! $emptyAfter !!}</div>
                @endunless
            </div>

            @if ($footer)
                <div aria-hidden="true" class="hidden h-10 shrink-0 items-center gap-4 border-t border-border px-3.5 text-xs text-muted-foreground sm:flex *:[kbd]:inline-flex *:[kbd]:h-5 *:[kbd]:min-w-5 *:[kbd]:items-center *:[kbd]:justify-center *:[kbd]:rounded-[calc(var(--command-radius)-var(--command-padding))] *:[kbd]:border *:[kbd]:border-border *:[kbd]:px-1 *:[kbd]:text-[11px]">
                    <span class="inline-flex items-center gap-1.5"><kbd>↑</kbd><kbd>↓</kbd> {{ $texts['navigate'] }}</span>
                    <span class="inline-flex items-center gap-1.5"><kbd>↵</kbd> {{ $texts['open'] }}</span>
                    <span x-show="page" x-cloak class="inline-flex items-center gap-1.5"><kbd>⌫</kbd> {{ $texts['back'] }}</span>
                    <span class="inline-flex items-center gap-1.5"><kbd>Esc</kbd> {{ $texts['close'] }}</span>
                </div>
            @endif
        </div>
    </dialog>
</div>
