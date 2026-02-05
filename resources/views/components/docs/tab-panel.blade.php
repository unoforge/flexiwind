@props([
    'value',
    'active' => false,
    'noBorder' => false,
    'bgNone' => '',
    'class' => '',
    'showWithGrid'=>false
])

<section
    data-tab-panel
    aria-labelledby="{{ $value }}"
    role="tabpanel"
    id="{{ $value }}"
    tabindex="0"
    aria-hidden="{{ $active ? 'false' : 'true' }}"
    data-state="{{ $active ? 'active' : 'inactive' }}"
    class="hidden {{ $showWithGrid ? 'fx-active:grid' :'fx-active:flex flex-col' }} active:outline-gray-800/50 focus:outline-gray-800/50 w-full {{ $class }}"
>
    {{ $slot }}
</section>