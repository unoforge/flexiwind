@php
    $people = collect([
        ['id' => 'alice', 'name' => 'Alice Johnson'],
        ['id' => 'brenda', 'name' => 'Brenda Stone'],
        ['id' => 'marc', 'name' => 'Marc Dupont'],
        ['id' => 'sarah', 'name' => 'Sarah Chen'],
        ['id' => 'tom', 'name' => 'Tom Rivera'],
    ])->map(fn (array $person): array => $person + ['photo' => 'https://i.pravatar.cc/80?u='.$person['id']]);
@endphp

<x-ui.listbox name="reviewers" :value="['alice', 'marc']" label="Reviewers" placeholder="Select reviewers" multiple searchable
    :options="$people" option-value="id" option-label="name" option-avatar="photo" class="max-w-xs" />
