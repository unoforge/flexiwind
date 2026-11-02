{{--
    Le menu « Format » : paragraphe, titres, citation, bloc de code.
    `display="buttons"` les met côte à côte au lieu d'un menu.

    <x-ui.rich-text.blocks />
    <x-ui.rich-text.blocks :levels="['paragraph', 'h2', 'h3']" display="buttons" />
--}}
@props([
    'levels' => ['paragraph', 'h1', 'h2', 'h3', 'quote', 'code-block'],
    'display' => 'menu',
    'label' => 'Text style',
])

@php
    $items = [
        'paragraph' => ['p', 'Paragraph', 'text-sm'],
        'h1' => ['h1', 'Heading 1', 'text-lg font-semibold'],
        'h2' => ['h2', 'Heading 2', 'text-base font-semibold'],
        'h3' => ['h3', 'Heading 3', 'text-sm font-semibold'],
        'quote' => ['blockquote', 'Quote', 'text-sm italic'],
        'code-block' => ['pre', 'Code block', 'font-mono text-xs'],
    ];
    $levels = array_values(array_filter((array) $levels, fn ($level) => isset($items[$level])));
    $names = collect($levels)->mapWithKeys(fn ($level) => [$items[$level][0] => $items[$level][1]])->all();
@endphp

@if ($display === 'buttons')
    <x-ui.rich-text.group {{ $attributes }}>
        @foreach ($levels as $level)
            <x-ui.rich-text.button :command="$level" />
        @endforeach
    </x-ui.rich-text.group>
@else
    <div data-slot="rich-text-blocks" x-data="{ open: false, active: 0 }" x-on:click.outside="open = false" x-on:keydown.escape.stop="open = false; $refs.trigger.focus()"
        {{ $attributes->class(['relative']) }}>
        <button type="button" x-ref="trigger" aria-haspopup="listbox" :aria-expanded="String(open)" aria-label="{{ $label }}"
            x-on:mousedown.prevent x-on:click="save(); open = ! open"
            class="inline-flex h-8 min-w-30 items-center justify-between gap-2 rounded-[calc(var(--radius-ui)-var(--spacing))] px-2.5 text-sm font-medium text-title-foreground transition-colors hover:bg-muted aria-expanded:bg-muted">
            <span x-text="@js($names)[block] ?? @js($names['p'] ?? 'Paragraph')">{{ $names['p'] ?? 'Paragraph' }}</span>
            <span aria-hidden="true" class="iconify ph--caret-down size-3.5 text-muted-foreground"></span>
        </button>
        <div x-cloak x-show="open" role="listbox" aria-label="{{ $label }}"
            x-transition:enter="transition-[opacity,translate] duration-150 ease-out" x-transition:enter-start="opacity-0 -translate-y-1"
            class="absolute start-0 top-full z-40 mt-1.5 flex w-48 flex-col gap-px rounded-ui border border-border bg-background p-1 shadow-sm">
            @foreach ($levels as $level)
                @php([$tag, $text, $style] = $items[$level])
                <button type="button" role="option" x-on:mousedown.prevent x-on:click="open = false; restore(); run(@js($level))"
                    :aria-selected="String(block === @js($tag))"
                    class="flex min-h-8 items-center justify-between gap-2 rounded-[calc(var(--radius-ui)-var(--spacing))] px-2.5 text-start text-title-foreground hover:bg-muted aria-selected:bg-muted {{ $style }}">
                    {{ $text }}
                    <span aria-hidden="true" x-show="block === @js($tag)" class="iconify ph--check size-3.5 text-muted-foreground"></span>
                </button>
            @endforeach
        </div>
    </div>
@endif
