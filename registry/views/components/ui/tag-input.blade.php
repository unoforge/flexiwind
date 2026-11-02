{{--
    Un champ qui transforme ce qu'on tape en étiquettes : sujets, e-mails,
    mots-clés. Entrée ou virgule ajoute, Retour arrière retire la dernière,
    un collage « a, b, c » en ajoute trois.

    <x-ui.tag-input wire:model="topics" label="Topics" :max="5" />
    <x-ui.tag-input wire:model="emails" type="email" />
    <x-ui.tag-input wire:model="stack" :suggestions="$known" />
    <x-ui.tag-input wire:model="stack" search="query" :suggestions="$matches" />

    La vérification du navigateur aide la saisie ; celle de Livewire décide.
    Moteur : Alpine.data('fwTagInput'), resources/js/plugins/tags.js.
--}}
@props([
    'label' => null,
    'name' => null,
    'value' => [],
    'placeholder' => 'Add a tag',
    'type' => null,
    'pattern' => null,
    'max' => null,
    'separators' => [','],
    'suggestions' => null,
    'search' => null,
    'debounce' => 300,
    'create' => true,
    'hint' => null,
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'removeLabel' => 'Remove :label',
    'countText' => ':count / :max',
    'createText' => 'Create “:query”',
    'invalidText' => '“:label” is not valid.',
    'maxText' => 'Remove one to add another.',
])

@php
    $model = $attributes->wire('model')->value();
    $id = $attributes->get('id') ?? 'tag-input-'.\Illuminate\Support\Str::slug($name ?? $model ?? 'tags').'-'.substr(md5((string) json_encode([$name, $model, $label])), 0, 6);
    $errorKey = $model ?: ($name ? str_replace(['[]', '[', ']'], ['', '.', ''], $name) : null);
    $isInvalid = $invalid || ($errorKey && isset($errors) && ($errors->has($errorKey) || $errors->has($errorKey.'.*')));
    $initial = \App\Flexiwind\OptionList::selected($name ? old(str_replace(['[]', '[', ']'], ['', '.', ''], $name), $value) : $value);
    $suggestionList = array_column(\App\Flexiwind\OptionList::normalize($suggestions), 'label');
    $hasSuggestions = $suggestions !== null || $search;
    $size = in_array($size, ['sm', 'md', 'lg'], true) ? $size : 'md';
    $tagSize = $size === 'sm' ? 'sm' : 'md';
@endphp

<div data-slot="tag-input" id="{{ $id }}" @if ($isInvalid) data-invalid @endif
    x-data="fwTagInput(@js([
        'value' => $initial,
        'name' => $name,
        'type' => in_array($type, ['email', 'url'], true) ? $type : null,
        'pattern' => $pattern,
        'max' => $max ? (int) $max : null,
        'separators' => array_values((array) $separators),
        'search' => $search,
        'debounce' => (int) $debounce,
        'create' => (bool) $create,
        'disabled' => (bool) $disabled,
        'texts' => ['count' => $countText, 'create' => $createText, 'invalid' => $invalidText, 'remove' => $removeLabel, 'max' => $maxText, 'hint' => $hint],
    ]))"
    x-modelable="value"
    {{ $attributes->except(['id'])->class(['group/tag-input relative flex w-full min-w-0 flex-col gap-2']) }}>
    @if ($label || $max)
        <div class="flex items-center justify-between gap-3">
            @if ($label)
                <x-ui.label for="{{ $id }}-input" :text="$label" />
            @endif
            @if ($max)
                <span class="ms-auto text-xs tabular-nums text-muted-foreground" x-text="countLabel" wire:ignore></span>
            @endif
        </div>
    @endif

    {{-- Le champ : un clic dans la zone donne le focus à l'input. --}}
    <div wire:ignore x-on:click="focusInput($event)"
        @class([
            '[--tag-input-padding:--spacing(1)] flex w-full flex-wrap items-center gap-1 rounded-ui border border-border-input bg-background p-(--tag-input-padding) text-sm',
            'outline outline-transparent outline-offset-0 ring-3 ring-transparent ring-offset-1 ring-offset-transparent transition-all duration-200 ease-linear',
            'focus-within:border-transparent focus-within:outline-(--ui-input-focus-outline) focus-within:ring-(--focus-ring)',
            'group-data-invalid/tag-input:border-(--ui-input-invalid-outline) group-data-invalid/tag-input:ring-(--ui-input-invalid-outline)/20',
            'min-h-8' => $size === 'sm',
            'min-h-9' => $size === 'md',
            'min-h-10' => $size === 'lg',
            'cursor-not-allowed bg-muted opacity-60' => $disabled,
            'cursor-text' => ! $disabled,
        ])>
        <template x-for="(tag, index) in value" :key="tag">
            <span data-slot="tag" :data-invalid="isValid(tag) ? null : ''"
                @class([
                    'group/tag [--tag-radius:calc(var(--radius-ui)-var(--tag-input-padding))] inline-flex max-w-full items-center rounded-(--tag-radius) border border-border bg-muted pe-0.5 font-medium text-title-foreground',
                    'data-invalid:border-destructive/40 data-invalid:bg-destructive/10 data-invalid:text-destructive',
                    'h-5 gap-1 ps-1.5 text-[11.5px]' => $tagSize === 'sm',
                    'h-6 gap-1.5 ps-2 text-xs' => $tagSize === 'md',
                ])>
                <span class="truncate" x-text="tag"></span>
                <button type="button" tabindex="-1" x-on:click.stop="remove(index)" :aria-label="removeLabel(tag)" @if ($disabled) disabled @endif
                    class="flex size-4.5 shrink-0 items-center justify-center rounded-[calc(var(--tag-radius)-var(--spacing)*0.5)] text-muted-foreground transition-colors hover:bg-title-foreground/8 hover:text-title-foreground disabled:pointer-events-none group-data-invalid/tag:text-current">
                    <span aria-hidden="true" class="flex size-3 iconify ph--x-bold"></span>
                </button>
            </span>
        </template>

        <input id="{{ $id }}-input" type="text" autocomplete="off" autocapitalize="off" spellcheck="false"
            x-ref="input" x-model="draft"
            x-on:input="onInput()" x-on:keydown="onKeydown($event)" x-on:paste="onPaste($event)" x-on:blur="onBlur()"
            :placeholder="value.length ? '' : @js($placeholder)" :aria-readonly="full ? 'true' : null"
            :aria-invalid="invalidTags.length ? 'true' : null"
            @if ($hasSuggestions)
                role="combobox" aria-autocomplete="list" aria-controls="{{ $id }}-suggestions"
                :aria-expanded="String(open)" :aria-activedescendant="activeId"
            @endif
            aria-describedby="{{ $id }}-status"
            @if ($disabled) disabled @endif
            @class([
                'h-6 min-w-24 flex-1 border-0 bg-transparent px-1 text-title-foreground outline-none placeholder:text-(--ui-input-place-holder) disabled:cursor-not-allowed',
                'text-[13px]' => $size === 'sm',
            ])>

        @if ($search)
            <span wire:loading.flex wire:target="{{ $search }}" aria-hidden="true" class="hidden items-center pe-1.5 text-muted-foreground">
                <span class="iconify ph--circle-notch-bold size-4 animate-spin"></span>
            </span>
        @endif
    </div>

    @if ($hasSuggestions)
        {{-- Les suggestions : relues à chaque frappe, elles suivent les rendus Livewire. --}}
        <script type="application/json" data-tag-suggestions>@json(array_values($suggestionList))</script>
        {{-- Même mouvement que les panneaux Flexilla (fx-popper-motion) : entrée douce, sortie courte. --}}
        <div wire:ignore x-cloak x-show="open"
            x-transition:enter="transition-[opacity,translate,scale] duration-200 ease-[cubic-bezier(0.16,1,0.3,1)] motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 -translate-y-1.5 scale-96 motion-reduce:translate-y-0 motion-reduce:scale-100"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition-[opacity,translate,scale] duration-100 ease-[cubic-bezier(0.4,0,1,1)]"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-1 scale-96"
            class="origin-top [--dropdown-padding:--spacing(1)] [--dropdown-radius:var(--radius-ui)] absolute inset-x-0 top-full z-40 mt-1.5 rounded-(--dropdown-radius) border border-border bg-background p-(--dropdown-padding) shadow-sm">
            <div id="{{ $id }}-suggestions" role="listbox" aria-label="{{ $label ?? 'Suggestions' }}" class="flex max-h-60 flex-col gap-px overflow-y-auto">
                <template x-for="(option, index) in options" :key="option.key">
                    <div role="option" :id="optionId(index)" :aria-selected="String(index === active)"
                        x-on:mousedown.prevent x-on:click="pick(option)" x-on:mousemove="active = index"
                        class="flex min-h-8 cursor-default items-center gap-2 rounded-[calc(var(--dropdown-radius)-var(--dropdown-padding))] px-2.5 text-sm text-muted-foreground aria-selected:bg-muted aria-selected:text-foreground">
                        <span x-show="option.create" aria-hidden="true" class="flex size-3.5 shrink-0 iconify ph--plus"></span>
                        <span class="truncate"><span x-text="option.before"></span><span class="font-semibold text-title-foreground" x-text="option.match"></span><span x-text="option.after"></span></span>
                    </div>
                </template>
            </div>
        </div>
    @endif

    <p id="{{ $id }}-status" wire:ignore class="flex items-center gap-1.5 text-xs" :class="invalidTags.length ? 'text-destructive' : 'text-muted-foreground'" x-show="statusText" x-text="statusText"
        @if (! $hint) x-cloak @endif>{{ $hint }}</p>

    @if ($name)
        <div wire:ignore hidden>
            <template x-for="(item, index) in value" :key="index">
                <input type="hidden" :name="inputName" :value="item">
            </template>
        </div>
    @endif

    <div class="sr-only" aria-live="polite" x-text="announcement" wire:ignore></div>
</div>
