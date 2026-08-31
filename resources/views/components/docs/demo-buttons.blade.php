@props(['variant' => 'solid'])
<div class="flex flex-wrap items-center gap-2.5 justify-center">
    @php
        $intents = match($variant) {
            'solid' => ['primary', 'secondary', 'accent', 'success', 'destructive', 'neutral'],
            'soft' => ['primary', 'destructive', 'success', 'gray'],
            'outline' => ['gray'],
            'ghost' => ['gray', 'success'],
            default => ['primary'],
        };
    @endphp
    @foreach ($intents as $intent)
        <x-ui.button :variant="$variant" :intent="$intent">
            {{ ucfirst($intent) }}
        </x-ui.button>
    @endforeach
</div>
