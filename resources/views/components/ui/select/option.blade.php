@props(['value', 'label', 'selected' => false])
<option value="{{ $value }}" {{ $selected ? 'selected' : '' }}"> {{ $label }}</option>