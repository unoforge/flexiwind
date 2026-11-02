@props(['action' => 'remove-from-dom', 'closable' => true, 'absolute' => false])

<div x-f-dissmissible data-action="{{ $action }}" {{ $attributes->class(['', 'relative' => !$absolute]) }}>
    {{ $slot }}
    @if ($closable)
        <x-ui.dissmissible.close variant="ghost" size="sm" icon-only class="absolute top-2 right-2">
            <x-ui.icon name="ph--x" />
        </x-ui.dissmissible.close>
    @endif
</div>
