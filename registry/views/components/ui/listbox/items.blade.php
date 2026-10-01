{{-- Les options passées en tableau ou en Collection, composées avec les mêmes pièces. --}}
@props(['options' => []])

@foreach (\App\Flexiwind\OptionList::groups($options) as $group)
    @if ($group['label'] !== null)
        <x-ui.listbox.group :label="$group['label']">
            @foreach ($group['options'] as $option)
                @include('components.ui.listbox.partials.item', ['option' => $option])
            @endforeach
        </x-ui.listbox.group>
    @else
        @foreach ($group['options'] as $option)
            @include('components.ui.listbox.partials.item', ['option' => $option])
        @endforeach
    @endif
@endforeach
