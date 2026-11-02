@php
    $cities = [
        ['name' => 'Paris', 'country' => 'France'],
        ['name' => 'Parma', 'country' => 'Italy'],
        ['name' => 'Pamplona', 'country' => 'Spain'],
        ['name' => 'Lyon', 'country' => 'France'],
        ['name' => 'Lisbon', 'country' => 'Portugal'],
        ['name' => 'London', 'country' => 'United Kingdom'],
        ['name' => 'Kinshasa', 'country' => 'DR Congo'],
        ['name' => 'Kigali', 'country' => 'Rwanda'],
        ['name' => 'Montréal', 'country' => 'Canada'],
        ['name' => 'Madrid', 'country' => 'Spain'],
    ];
@endphp

<x-ui.autocomplete name="city" label="City" class="max-w-xs"
    :options="$cities" option-value="name" option-label="name" option-description="country" />
