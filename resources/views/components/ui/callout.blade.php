@props([
    'class' => '',
    'variant' => 'solid',
    'intent' => '',
    'type' => 'default',
    'size' => 'default',
    'title' => null,
    'message' => null,
    'noIcon' => false,
    'iconWrapper' => '',
])

@php
    $callout_types = [
        'default' => 'gray',
        'update' => 'info',
        'note' => 'primary',
        'warning' => 'warning',
        'important' => 'danger',
    ];

    $icons = [
        'default' => 'ph--info',
        'update' => 'ph--none',
        'note' => 'ph--lightbulb-filament',
        'warning' => 'ph--warning',
        'important' => 'ph--smiley-sad',
    ];

    $intent_ = isset($intent) && $intent != '' ? $intent : $callout_types[$type] ?? $callout_types['default'];
    $icon = $icons[$type] ?? $icons['default'];
@endphp

<x-ui.alert :variant="$variant" :intent="$intent_" :size="$size"
    {{ $attributes->class([
        'flex items-start gap-4' => !$noIcon,
        $class,
    ]) }}>
    @if (!$noIcon)
        <span class="w-max {{ $iconWrapper }}">
            <span aria-hidden="true" class="iconify size-6 {{ $icon }}"></span>
        </span>
    @endif

    @if ($title || $message)
        @if (!$noIcon)
            <div class="flex-1 flex flex-col gap-3">
                @if ($title)
                    <x-ui.callout.title text="{{ $title }}" />
                @endif
                @if ($message)
                    <x-ui.callout.description>
                        {{ $message }}
                    </x-ui.callout.description>
                @endif
            </div>
        @else
            {{ $slot }}
        @endif
    @else
        @if (!$noIcon)
            <div class="flex-1 flex flex-col gap-3">
                {{ $slot }}
            </div>
        @else
            {{ $slot }}
        @endif
    @endif
</x-ui.alert>
