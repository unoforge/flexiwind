@props(['wrapperClass' => '', 'id', 'isDisabled' => false, 'unStyled' => false])
<li role="presentation" class="{{ $wrapperClass }}">
    <button data-tabs-trigger data-target="{{ $id }}" @if ($isDisabled) disabled @endif
        {{ $attributes->class([
            'disabled:cursor-not-allowed disabled:opacity-80',
            'flex items-center pb-2.5 border-b-3 border-transparent fx-active:text-fg-title fx-active:border-fg-title' => !$unStyled,
        ]) }}>
        {{ $slot }}
    </button>
</li>
