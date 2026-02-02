@props(['size' => 'default', 'label' => null, 'labelPlacement' => 'start', 'labelClass' => '', 'class'=>''])


@if ($label)
    @php
        $sizes = [
            'default' => 'divider-custom-1',
            '2' => 'divider-custom-2',
            '3' => 'divider-custom-3',
        ];
        $label_placements = [
            'start' => 'justify-start',
            'middle' => 'justify-center',
            'end' => 'justify-end',
        ];
        $div_size = $sizes[$size] ?? $sizes['default'];
        $label_placement = $label_placements[$labelPlacement] ?? $label_placements['middle'];
        $className = "divider-custom w-full {$div_size} flex items-center {$label_placement} {$class}";
    @endphp
    <div {{ $attributes->merge(['class' => $className]) }}>
        <span class="{{ $labelClass }}">
            {{ $label }}
        </span>
    </div>
@else
    @php
        $sizes = [
            'default' => '',
            '2' => 'border-2',
            '3' => 'border-3',
        ];
        $size = $sizes[$size] ?? $sizes['default'];

        $className = "w-full {$size} {$class}";
    @endphp
    <hr {{ $attributes->merge(['class' => $className]) }}>
@endif
