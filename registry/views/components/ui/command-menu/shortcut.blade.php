{{--
    Des touches : `mod+k` s'affiche Ctrl K, et ⌘ K sur un Mac.
--}}
@props(['keys'])

@php
    $names = ['mod' => 'Ctrl', 'ctrl' => 'Ctrl', 'shift' => '⇧', 'alt' => 'Alt', 'enter' => '↵', 'backspace' => '⌫', 'up' => '↑', 'down' => '↓', 'esc' => 'Esc'];
@endphp

<span data-slot="shortcut" {{ $attributes->class(['flex items-center gap-0.5']) }}>
    @foreach (explode('+', strtolower((string) $keys)) as $key)
        <kbd @if (in_array($key, ['mod', 'alt'], true)) data-key="{{ $key }}" @endif
            class="inline-flex h-5 min-w-5 items-center justify-center rounded-[calc(var(--radius-ui)-var(--spacing))] border border-border bg-background px-1 font-sans text-[11px] font-medium text-muted-foreground">{{ $names[$key] ?? strtoupper($key) }}</kbd>
    @endforeach
</span>
