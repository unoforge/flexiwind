@php
    $cities = ['Paris', 'Lyon', 'Marseille', 'Bordeaux', 'Lille', 'Nantes'];
@endphp

<div class="grid w-full max-w-3xl gap-6 sm:grid-cols-3">
    <x-ui.listbox name="cities" :value="['Paris', 'Lyon', 'Lille', 'Nantes']" label="Compact" multiple display="compact" :options="$cities" />
    <x-ui.listbox name="permissions" :value="['Paris', 'Lyon', 'Bordeaux']" label="Count" multiple display="count" count-text=":count cities" :options="$cities" />
    <x-ui.listbox name="tags" :value="['Paris', 'Lyon', 'Marseille', 'Lille']" label="Chips, up to 2" multiple max-chips="2" :options="$cities" placeholder="Select cities" />
</div>
