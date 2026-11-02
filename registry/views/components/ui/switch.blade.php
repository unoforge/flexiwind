@props([
    'id' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'size' => 'md',
    'outlined' => false,
    'label' => null,
    'description' => null,
    'reverse' => false,
    'bg' => null,
    'track' => null,
    'knob' => null,
    'knobChecked' => null,
])

@php
    $size = in_array($size, ['xs', 'sm', 'md', 'lg'], true) ? $size : 'md';

    // Les couleurs nommées ; tout autre nom devient var(--color-<nom>) (success, gray-500…).
    $colors = [
        'default' => null,
        'muted' => 'var(--color-muted)',
        'surface' => 'var(--color-card)',
        'bg' => 'var(--color-background)',
        'white' => 'var(--color-white)',
        'neutral' => 'var(--color-foreground)',
        'title' => 'var(--color-title-foreground)',
        'transparent' => 'transparent',
    ];
    $color = fn (?string $name, array $aliases = []) => $name === null || $name === 'default'
        ? null
        : ($aliases[$name] ?? $colors[$name] ?? 'var(--color-'.preg_replace('/[^a-z0-9-]/', '', $name).')');

    $bgColor = $color($bg);
    $trackColor = $color($track, ['muted' => 'var(--color-muted-foreground)', 'neutral' => 'var(--color-muted-foreground)', 'surface' => 'var(--color-foreground)']);
    $knobColor = $color($knob, ['muted' => 'var(--color-muted-foreground)', 'bg' => 'var(--color-background)']);
    $knobCheckedColor = $color($knobChecked, ['muted' => 'var(--color-muted-foreground)', 'bg' => 'var(--color-background)']);

    // Les classes passées gardent la main : un `bg-*`, `text-<couleur>` ou `[--knob-bg:…]`
    // remplace la couleur par défaut correspondante au lieu de lutter avec elle.
    $userClass = (string) $attributes->get('class', '');
    $paintsBg = preg_match('/(^|[\s:!])bg-/', $userClass);
    $paintsTrack = preg_match('/(^|[\s:!])text-(?!(xs|sm|base|lg|[0-9]?xl|left|right|center|justify|start|end|wrap|nowrap|balance|pretty|ellipsis|clip)\b)/', $userClass);
    $paintsKnob = str_contains($userClass, '--knob-bg');

    $style = array_filter([
        $attributes->get('style') ? rtrim($attributes->get('style'), '; ') : null,
        $bgColor ? "--switch-bg:{$bgColor}" : null,
        $trackColor ? "color:{$trackColor}" : null,
        $knobColor ? "--knob-bg:{$knobColor}" : null,
        $knobCheckedColor ? "--knob-bg-checked:{$knobCheckedColor}" : null,
    ]);

    $hasLabel = filled($label) || $slot->isNotEmpty();
    $descriptionId = filled($description)
        ? ($id ?? 'switch-'.substr(md5($name.$label.$description), 0, 8)).'-description'
        : null;

    $input = $attributes->except(['style'])->class([
        'switch shrink-0 before:shadow-xs motion-reduce:transition-none motion-reduce:before:transition-none',
        ['xs' => 'switch-xs', 'sm' => 'switch-sm', 'md' => 'switch-md', 'lg' => 'switch-lg'][$size],
        'bg-(--switch-bg)' => $bgColor,
        'bg-border-strong' => ! $bgColor && ! $paintsBg && ! $outlined,
        'bg-muted ring-1 ring-border-strong' => ! $bgColor && ! $paintsBg && $outlined,
        'ring-1 ring-border-strong' => ($bgColor || $paintsBg) && $outlined,
        'text-primary' => ! $trackColor && ! $paintsTrack,
        '[--knob-bg:var(--color-white)]' => ! $knobColor && ! $paintsKnob,
        // Piste du thème : le bouton coché prend le texte posé sur le primaire (sinon blanc),
        // pour rester visible quand le primaire est clair (thème Mono en sombre).
        '[--knob-bg-checked:var(--switch-knob-checked-color,var(--color-primary-foreground,#fff))]' => ! $knobCheckedColor && ! $paintsKnob && ! $trackColor && ! $paintsTrack,
    ])->merge(array_filter([
        'type' => 'checkbox',
        'role' => 'switch',
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'checked' => $checked,
        'disabled' => $disabled,
        'style' => $style ? implode(';', $style) : null,
        'aria-describedby' => $descriptionId,
    ], fn ($attribute) => $attribute !== null && $attribute !== false));

    // Décale le texte pour que la première ligne tombe au milieu du rail.
    $textOffset = ['xs' => '', 'sm' => 'mt-0.5', 'md' => 'mt-1', 'lg' => 'mt-1.5'][$size];
@endphp

@if ($hasLabel)
    <label @class([
        'group/switch flex items-start gap-3',
        'w-full flex-row-reverse justify-between' => $reverse,
        'inline-flex' => ! $reverse,
        'cursor-not-allowed' => $disabled,
        'cursor-pointer' => ! $disabled,
    ])>
        <input {{ $input }}>
        <span @class(['flex min-w-0 flex-col gap-1', $textOffset, 'opacity-60' => $disabled])>
            <span class="text-sm/5 font-medium text-title-foreground">{{ $slot->isNotEmpty() ? $slot : $label }}</span>
            @if (filled($description))
                <span id="{{ $descriptionId }}" class="text-[13px]/4.5 text-muted-foreground">{{ $description }}</span>
            @endif
        </span>
    </label>
@else
    <input {{ $input }}>
@endif
