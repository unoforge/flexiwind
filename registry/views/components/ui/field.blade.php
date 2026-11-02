@props([
    'label' => null,
    'for' => null,
    'hint' => null,
    'error' => null,
    'required' => false,
    'labelClass' => '',
    'class' => '',
])

<div {{ $attributes->merge(['class' => "flex flex-col space-y-2 {$class}"]) }}>
    @if ($label)
        <x-ui.label for="{{ $for }}" class="{{ $labelClass }}">
            {{ $label }}
            @if ($required)
                <span class="text-destructive ms-0.5">*</span>
            @endif
        </x-ui.label>
    @endif

    {{ $slot }}

    @if ($hint && !$error)
        <p class="text-xs text-muted-foreground">{{ $hint }}</p>
    @endif

    @if ($error && is_string($error))
        <p class="text-xs text-destructive">{{ $error }}</p>
    @endif
</div>
