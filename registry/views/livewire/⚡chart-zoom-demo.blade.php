<?php

use Carbon\CarbonImmutable;
use Livewire\Attributes\Locked;
use Livewire\Component;

/*
 * Démo de la doc : glisser sur le chart pour zoomer sur une période.
 *
 * Le chart émet `chart-range` avec les indices de la sélection dans ce qu'il
 * affiche. Le composant les traduit en fenêtre sur toute la série et
 * recalcule le chart côté serveur : l'échelle suit le zoom.
 */
new class extends Component
{
    private const DAYS = 90;

    /** Fenêtre affichée, en indices sur toute la série. Modifiable seulement par zoom() et reset(). */
    #[Locked]
    public int $from = 0;

    #[Locked]
    public int $to = self::DAYS - 1;

    public function zoom(mixed $start = null, mixed $end = null): void
    {
        if ($start === null || $end === null) {
            $this->reset('from', 'to');

            return;
        }

        // Les indices viennent du navigateur : entiers, dans la fenêtre, au moins deux jours.
        if (! is_int($start) || ! is_int($end) || $start < 0 || $end <= $start || $end > $this->to - $this->from) {
            return;
        }

        [$this->from, $this->to] = [$this->from + $start, $this->from + $end];
    }

    public function resetZoom(): void
    {
        $this->reset('from', 'to');
    }

    /** @return list<array{day: string, revenue: int, orders: int}> */
    private function series(): array
    {
        $start = CarbonImmutable::create(2026, 7, 1);

        return array_map(fn (int $i): array => [
            'day' => $start->addDays($i)->format('M j'),
            'revenue' => (int) round(4200 + $i * 38 + sin($i / 4) * 900 + ($i % 7 === 5 ? -1400 : 0)),
            'orders' => (int) round(48 + $i * 0.4 + cos($i / 5) * 9),
        ], range(0, self::DAYS - 1));
    }

    public function with(): array
    {
        $visible = array_slice($this->series(), $this->from, $this->to - $this->from + 1);

        return [
            'days' => $visible,
            'total' => array_sum(array_column($visible, 'revenue')),
            'isZoomed' => $this->from !== 0 || $this->to !== self::DAYS - 1,
        ];
    }
};
?>

<div class="w-full max-w-2xl rounded-xl border border-border bg-background p-5">
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="font-medium text-foreground">Daily revenue</p>
            <p class="text-sm text-muted-foreground">
                {{ $days[0]['day'] }} – {{ $days[array_key_last($days)]['day'] }} ·
                <span class="font-medium text-foreground tabular-nums">€{{ number_format($total) }}</span>
            </p>
        </div>
        @if ($isZoomed)
            <x-ui.button wire:click="resetZoom" variant="outline" intent="gray" size="sm">Reset</x-ui.button>
        @else
            <p class="text-xs text-muted-foreground">Drag across the chart to zoom</p>
        @endif
    </div>

    <x-ui.chart type="area" brush :data="$days" index="day" prefix="€" label="Daily revenue" class="mt-5 h-64"
        wire:chart-range="zoom($event.detail.start, $event.detail.end)"
        :config="['revenue' => ['label' => 'Revenue', 'color' => 'var(--chart-1)']]" />
</div>
