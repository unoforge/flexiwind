@props(['value', 'label', 'selected' => false])
<option value="{{ $value }}" @if($selected) selected @endif> {{ $label }}</option>