@props(['wrapperClass' => '', 'id'])
<li role="presentation" class="{{ $wrapperClass }}">
    <a href="#{{ $id }}" data-tabs-trigger data-target="{{ $id }}"
        {{ $attributes->merge(['class' => 'disabled:cursor-not-allowed disabled:opacity-80']) }}>
        {{ $slot }}
    </a>
</li>
