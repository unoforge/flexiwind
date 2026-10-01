@php
    $people = [
        ['id' => 'alice', 'name' => 'Alice Johnson', 'team' => 'Design', 'photo' => 'https://i.pravatar.cc/80?u=alice-johnson'],
        ['id' => 'brenda', 'name' => 'Brenda Stone', 'team' => 'Design', 'photo' => 'https://i.pravatar.cc/80?u=brenda-stone'],
        ['id' => 'marc', 'name' => 'Marc Dupont', 'team' => 'Engineering', 'photo' => 'https://i.pravatar.cc/80?u=marc-dupont'],
        ['id' => 'sarah', 'name' => 'Sarah Chen', 'team' => 'Engineering', 'photo' => 'https://i.pravatar.cc/80?u=sarah-chen'],
        ['id' => 'tom', 'name' => 'Tom Rivera', 'team' => 'Engineering', 'photo' => 'https://i.pravatar.cc/80?u=tom-rivera', 'away' => true],
    ];
@endphp

<x-ui.listbox name="assignee" value="sarah" label="Assignee" class="max-w-xs"
    :options="$people" option-value="id" option-label="name" option-group="team" option-avatar="photo" option-disabled="away" />
