@persist('sidebar')
    <x-atoms.scrollable-y class="w-full" wire:navigate:scroll>
        {{ $slot }}
    </x-atoms.scrollable-y>
@endpersist
