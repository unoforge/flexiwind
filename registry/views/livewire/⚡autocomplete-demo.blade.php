<?php

use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

/*
 * Démo de la doc : recherche côté serveur. `query` reçoit ce que la
 * personne tape, le serveur filtre et renvoie au plus six clients.
 * La saisie est bornée et traitée comme du texte, jamais comme un motif.
 */
new class extends Component
{
    private const CUSTOMERS = [
        'Jonas Weber' => 'jonas@northwind.io',
        'Joanna Lee' => 'joanna@lumen.studio',
        'John Okafor' => 'john.okafor@kivu.cd',
        'Josephine Mbuyi' => 'josephine@lualaba.cd',
        'Amara Diallo' => 'amara@sahel.dev',
        'Brenda Stone' => 'brenda@stone.co',
        'Carlos Mendes' => 'carlos@mendes.pt',
        'Diane Kabila' => 'diane@kin.africa',
        'Elias Novak' => 'elias@novak.cz',
        'Fatou Ndiaye' => 'fatou@teranga.sn',
        'Grace Mutombo' => 'grace@mutombo.cd',
        'Hiro Tanaka' => 'hiro@tanaka.jp',
    ];

    public string $query = '';

    #[Validate('nullable|string|max:80')]
    public ?string $customer = null;

    public function updatedQuery(): void
    {
        $this->query = Str::limit(trim($this->query), 80, '');
    }

    public function with(): array
    {
        $query = Str::lower($this->query);

        // Un vrai serveur prendrait un peu de temps : on le montre.
        if ($query !== '') {
            usleep(250_000);
        }

        return [
            'customers' => $query === '' ? [] : collect(self::CUSTOMERS)
                ->filter(fn (string $email, string $name): bool => str_contains(Str::lower($name.' '.$email), $query))
                ->take(6)
                ->map(fn (string $email, string $name): array => [
                    'id' => Str::slug($name),
                    'name' => $name,
                    'email' => $email,
                    'photo' => 'https://i.pravatar.cc/80?u='.Str::slug($name),
                ])
                ->values()
                ->all(),
        ];
    }
};
?>

<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.autocomplete wire:model.live="customer" search="query" label="Customer" placeholder="Search a customer"
        :options="$customers" option-value="id" option-label="name" option-description="email" option-avatar="photo" />

    <div class="flex flex-col gap-2">
        <span class="text-sm font-medium text-muted-foreground">Livewire receives</span>
        <pre class="overflow-x-auto rounded-ui border border-border bg-muted/50 p-3 font-mono text-[13px] text-foreground">{{ json_encode(['query' => $query, 'customer' => $customer]) }}</pre>
    </div>
</div>
