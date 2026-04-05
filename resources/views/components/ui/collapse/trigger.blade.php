@props([
    'target',
    'withIndicator' => true,
    'indicatorType' => 'icon',
    'indicatorIcon' => 'ph--caret-down',
    'indicatorClass' => '',
])

<button data-collapse-trigger data-target="f_collapse_{{ $target }}"
    {{ $attributes->class(['flex items-center']) }}>
    {{ $slot }}
    @if ($withIndicator)
        <x-ui.collapse.indicator :type="$indicatorType" :icon="$indicatorIcon" :indicator-class="$indicatorClass" />
    @endif
</button>
