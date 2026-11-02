<?php

use Illuminate\Support\Str;
use Livewire\Component;

/*
 * Démo de la doc : le menu cherche des clients sur le serveur. `query`
 * reçoit ce que la personne tape, borné et traité comme du texte.
 */
new class extends Component
{
    private const CUSTOMERS = [
        'Sarah Chen' => 'sarah@northwind.io',
        'Sara Martin' => 'sara.m@lumen.dev',
        'Jonas Weber' => 'jonas@northwind.io',
        'Amara Diallo' => 'amara@sahel.dev',
        'Brenda Stone' => 'brenda@stone.co',
        'Carlos Mendes' => 'carlos@mendes.pt',
        'Diane Kabila' => 'diane@kin.africa',
        'Grace Mutombo' => 'grace@mutombo.cd',
    ];

    public string $query = '';

    public function updatedQuery(): void
    {
        $this->query = Str::limit(trim($this->query), 80, '');
    }

    public function with(): array
    {
        $query = Str::lower($this->query);

        if ($query !== '') {
            usleep(250_000);
        }

        return [
            'customers' => $query === '' ? [] : collect(self::CUSTOMERS)
                ->filter(fn (string $email, string $name): bool => str_contains(Str::lower($name.' '.$email), $query))
                ->take(5)
                ->map(fn (string $email, string $name): array => ['id' => Str::slug($name), 'name' => $name, 'email' => $email])
                ->values()
                ->all(),
        ];
    }
};
?>

<div>
    <x-ui.command-menu search="query" shortcut="" placeholder="Search customers or commands…" id="command-menu-customers">
        <x-slot:trigger>
            <x-ui.command-menu.trigger shortcut="" placeholder="Search customers…" />
        </x-slot:trigger>

        <x-ui.command-menu.group heading="Customers" :filter="false">
            @foreach ($customers as $customer)
                <x-ui.command-menu.item icon="ph--user" :description="$customer['email']" wire:key="customer-{{ $customer['id'] }}"
                    x-on:click="$toast(@js('Opening '.$customer['name']))">{{ $customer['name'] }}</x-ui.command-menu.item>
            @endforeach
        </x-ui.command-menu.group>

        <x-ui.command-menu.group heading="Commands">
            <x-ui.command-menu.item icon="ph--user-plus" x-on:click="$toast('New customer')">New customer</x-ui.command-menu.item>
            <x-ui.command-menu.item icon="ph--export" x-on:click="$toast('Export started')">Export customers</x-ui.command-menu.item>
        </x-ui.command-menu.group>
    </x-ui.command-menu>
</div>
