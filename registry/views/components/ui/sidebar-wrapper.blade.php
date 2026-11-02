@props(['overlayBlured' => true, 'withoutOverlay' => false])

@if (!$withoutOverlay)
    <x-ui.sidebar-overlay :blured="$overlayBlured" />
@endif

<aside x-data x-sidebar {{ $attributes }}>
    {{ $slot }}
</aside>
