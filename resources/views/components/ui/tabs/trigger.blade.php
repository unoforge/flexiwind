@props(['wrapperClass' => '', 'id', 'isDisabled' => false])
<li role="presentation"
    class="{{ $wrapperClass }}">
    <button data-tabs-trigger data-target="{{ $id }}" @if ($isDisabled) disabled @endif
        {{ $attributes->merge(['class' => 'disabled:cursor-not-allowed disabled:opacity-80']) }}>
        {{ $slot }}
    </button>
</li>
