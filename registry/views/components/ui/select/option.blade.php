@props(['value', 'label' => null, 'selected' => false])

{{-- `label` est optionnel : <x-ui.select.option>Texte</x-ui.select.option> est
     la forme naturelle, et c'est celle qu'utilisent les previews. --}}
<option value="{{ $value }}" @if ($selected) selected @endif>{{ $label ?? $slot }}</option>
