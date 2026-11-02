@php
    $people = ['john' => 'John', 'virgil' => 'Virgil', 'jacques' => 'Jacques', 'enot' => 'Enot', 'jade' => 'Jade'];
@endphp

<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.listbox name="team" :value="['john', 'jade']" multiple>
        <x-ui.label>Team</x-ui.label>
        <x-ui.listbox.trigger>
            <x-ui.listbox.value mode="count" count-text=":count people on the team" placeholder="Nobody yet" />
        </x-ui.listbox.trigger>
        <x-ui.listbox.content>
            <x-ui.listbox.list>
                @foreach ($people as $value => $name)
                    <x-ui.listbox.item :value="$value">{{ $name }}</x-ui.listbox.item>
                @endforeach
            </x-ui.listbox.list>
        </x-ui.listbox.content>
    </x-ui.listbox>

    <x-ui.listbox name="guests" :value="['john', 'virgil', 'jacques', 'enot']" multiple>
        <x-ui.label>Guests</x-ui.label>
        <x-ui.listbox.trigger>
            <x-ui.listbox.value mode="compact" limit="2" compact-text=":labels and :count other guests" placeholder="No guest yet" />
        </x-ui.listbox.trigger>
        <x-ui.listbox.content>
            <x-ui.listbox.list>
                @foreach ($people as $value => $name)
                    <x-ui.listbox.item :value="$value">{{ $name }}</x-ui.listbox.item>
                @endforeach
            </x-ui.listbox.list>
        </x-ui.listbox.content>
    </x-ui.listbox>
</div>
