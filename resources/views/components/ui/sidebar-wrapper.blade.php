@props(['overlayBlured'=>true])

<div data-sidebar-overlay
    class="fixed inset-0 z-70 bg-gray-800/40 {{ $overlayBlured ? 'backdrop-blur-sm' : '' }} hidden fx-open:flex lg:fx-open:hidden"></div>
<aside x-data x-sidebar {{ $attributes }}>
    {{ $slot }}
</aside>
