@props([
    'title' => null,
    'description' => null,
    'class' => '',
    'titleClass' => '',
    'descriptionClass' => '',
])

@php
    $title_class = $titleClass;
    $description_class = $descriptionClass;
    $className = '';
@endphp


<div data-slot="sheet-header"
    {{ $attributes->class([
        'relative flex items-start gap-3.5 relative',
        'space-y-1 p-(--gutter) pb-[calc(var(--gutter)---spacing(3))',
        $class,
    ]) }}>
    @if (isset($title) || isset($titleSlot))
        <div class="flex-1 space-y-1 pr-14">
            <x-ui.slideover.title class="{{ $title_class }}">
                @if (isset($title))
                    {{ $title }}
                @else
                    {{ $titleSlot }}
                @endif
            </x-ui.sliderover.title>
            @if (isset($description) || isset($descriptionSlot))
                <x-ui.slideover.description class="{{ $description_class }}">
                    @if (isset($description))
                        {{ $description }}
                    @else
                        {{ $descriptionSlot }}
                    @endif
                </x-ui.slideover.description>
            @endif
        </div>
    @else
        {{ $slot }}
    @endif
</div>
