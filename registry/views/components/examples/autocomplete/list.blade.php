@php
    $people = collect(['Alice Johnson', 'Brenda Stone', 'Marc Dupont', 'Sarah Chen', 'Tom Rivera'])
        ->map(fn (string $name): array => [
            'id' => \Illuminate\Support\Str::slug($name),
            'name' => $name,
            'email' => \Illuminate\Support\Str::of($name)->before(' ')->lower().'@lumen.studio',
            'photo' => 'https://i.pravatar.cc/80?u='.\Illuminate\Support\Str::slug($name),
        ]);
@endphp

<x-ui.autocomplete name="invite" :value="['alice-johnson', 'marc-dupont']" label="Invite people" placeholder="Name or email"
    multiple display="list" count-text=":count people" remove-label="Remove :label" class="max-w-sm"
    :options="$people" option-value="id" option-label="name" option-description="email" option-avatar="photo" />
