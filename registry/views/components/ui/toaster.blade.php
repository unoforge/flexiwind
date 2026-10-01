{{--
    Toaster : à poser une fois dans le layout. Il règle @flexilla/toast
    (resources/js/plugins/toast.js) et affiche les toasts laissés en session
    par une redirection :

    return redirect()->route('invoices.index')->with('toast', ['type' => 'success', 'message' => 'Invoice sent']);

    Plusieurs à la fois : `->with('toast', [[…], […]])`.
--}}
@props([
    'position' => 'bottom-right',
    'duration' => null,
    'visible' => null,
    'closeButton' => false,
    'richColors' => false,
    'expand' => false,
    'closeLabel' => 'Close notification',
])

@php
    $positions = ['top-left', 'top-center', 'top-right', 'bottom-left', 'bottom-center', 'bottom-right'];
@endphp

<div hidden data-fw-toaster
    data-position="{{ in_array($position, $positions, true) ? $position : 'bottom-right' }}"
    @if ($duration !== null) data-duration="{{ (int) $duration }}" @endif
    @if ($visible !== null) data-visible="{{ (int) $visible }}" @endif
    @if ($closeButton) data-close-button @endif
    @if ($richColors) data-rich-colors @endif
    @if ($expand) data-expand @endif
    data-close-label="{{ $closeLabel }}"></div>

@if (session()->has('toast'))
    {{-- @json échappe <, >, & et les guillemets : le contenu ne peut pas fermer la balise. --}}
    <script type="application/json" data-fw-toast>@json(session('toast'))</script>
@endif
