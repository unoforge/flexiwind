@props([
    'id' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'size' => 'md',
    'outlined' => false,
    'label' => null,
    'class' => '',
    'bg' => 'default',
    'track' => 'default',
    'knob' => 'white',
    'knobChecked' => null,
])

@php
    $sizes = [
        'xs' => 'switch-xs',
        'sm' => 'switch-sm',
        'md' => 'switch-md',
        'lg' => 'switch-lg',
    ];

    $baseSizes = [
        'xs' => 'switch-base-xs',
        'sm' => 'switch-base-sm',
        'md' => 'switch-base-md',
        'lg' => 'switch-base-lg',
    ];

    $bgMap = [
        'default' => '--switch-bg:var(--color-bg-muted)',
        'muted' => '--switch-bg:var(--color-bg-subtle)',
        'surface' => '--switch-bg:var(--color-bg-surface)',
        'bg' => '--switch-bg:var(--color-bg)',
    ];

    $trackMap = [
        'default' => 'color:var(--color-primary-600)',
        'muted' => 'color:var(--color-bg-muted)',
        'surface' => 'color:var(--color-fg)',
        'neutral' => 'color:var(--color-fg-muted)',
        'title' => 'color:var(--color-fg-title)',
        'transparent' => 'color:transparent',
    ];

    $knobMap = [
        'white' => 'var(--color-white)',
        'bg' => 'var(--color-bg)',
        'muted' => 'var(--color-fg-muted)',
        'neutral' => 'var(--color-fg)',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $baseSizeClass = $baseSizes[$size] ?? $baseSizes['md'];

    $className = "switch switch-base switch-size switch-knob switch-checked switch-base-ring bg-[var(--switch-bg)] {$baseSizeClass} {$sizeClass}";

    if ($outlined) {
        $className .= ' ring ring-border-strong shadow';
    }

    if ($class) {
        $className .= " {$class}";
    }

    $styleParts = [];

    if ($existingStyle = $attributes->get('style')) {
        $styleParts[] = rtrim($existingStyle, ';');
    }

    $styleParts[] = $bgMap[$bg] ?? $bgMap['default'];
    $styleParts[] = $trackMap[$track] ?? $trackMap['default'];

    $knobValue = $knobMap[$knob] ?? "var(--color-{$knob})";
    $styleParts[] = "--knob-bg:{$knobValue}";

    if ($knobChecked) {
        $knobCheckedValue = $knobMap[$knobChecked] ?? "var(--color-{$knobChecked})";
        $styleParts[] = "--knob-bg-checked:{$knobCheckedValue}";
    }

    $style = implode(';', $styleParts);

    $id = $id ?? $name ?? $attributes->get('id', uniqid('switch-'));

    $inputAttributes = $attributes->merge([
        'type' => 'checkbox',
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'checked' => $checked,
        'disabled' => $disabled,
        'class' => $className,
        'style' => $style,
    ]);
@endphp

@if ($label)
    <div class="flex items-center">
        <input {{ $inputAttributes }}>
        <x-ui.label for="{{ $id }}" class="ml-2 mt-0.5 {{ $disabled ? 'opacity-60' : '' }}">
            {{ $label }}
        </x-ui.label>
    </div>
@else
    <input {{ $inputAttributes }}>
@endif
