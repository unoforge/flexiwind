<?php

declare(strict_types=1);

namespace App\Flexiwind;

/**
 * La géométrie des charts Flexiwind, calculée côté serveur.
 *
 * Tout est exprimé en pourcentages de la zone de tracé : les vues posent des
 * <div> en `left/top/width/height: x%` et des tracés SVG dans une viewBox
 * 0 0 100 100 étirée. Aucun JavaScript n'est nécessaire au rendu, et le
 * chart suit la taille de son conteneur sans mesure.
 *
 * Le modèle de données est celui de shadcn : `data` est une liste de lignes
 * (une par catégorie), `config` décrit les séries (libellé, couleur).
 */
class ChartHelper
{
    /** @var array<string, array<string, mixed>> */
    private static array $memo = [];

    /**
     * Prépare un chart : catégories, séries, valeurs et échelle.
     *
     * Mémoïsé pour la requête : la racine et chacun de ses calques
     * (grille, axes, barres…) l'appellent avec les mêmes arguments.
     *
     * @param  iterable<int, array<string, mixed>|object>  $data
     * @param  array<string, array{label?: string, color?: string}>  $config
     * @return array{categories: list<string>, series: list<array{key: string, label: string, color: string}>, values: array<string, list<float|null>>, scale: array{min: float, max: float, step: float, ticks: list<float>}, count: int, stacked: bool, palette: list<array{label: string, color: string}>}
     */
    public static function make(iterable $data, array $config = [], ?string $xKey = null, bool $stacked = false, int|float|string|null $min = null, int|float|string|null $max = null): array
    {
        $rows = [];

        foreach ($data as $row) {
            $rows[] = is_object($row) ? (method_exists($row, 'toArray') ? $row->toArray() : get_object_vars($row)) : (array) $row;
        }

        $key = md5(serialize([$rows, $config, $xKey, $stacked, $min, $max]));

        if (isset(self::$memo[$key])) {
            return self::$memo[$key];
        }

        $xKey = self::categoryKey($rows, $xKey);
        $series = self::series($rows, $config, $xKey);

        $values = [];
        foreach ($series as $item) {
            $values[$item['key']] = array_map(fn (array $row): ?float => self::number($row[$item['key']] ?? null), $rows);
        }

        [$low, $high] = self::extent($values, count($rows), $stacked);

        $chart = [
            'categories' => array_map(fn (array $row): string => (string) ($row[$xKey] ?? ''), $rows),
            'series' => $series,
            'values' => $values,
            'scale' => self::niceScale(
                is_numeric($min) ? (float) $min : $low,
                is_numeric($max) ? (float) $max : $high,
            ),
            'count' => count($rows),
            'stacked' => $stacked,
            // Couleur et libellé par catégorie : pie, donut et radial colorent
            // chaque part, pas chaque série. `config` peut les nommer.
            'palette' => array_map(fn (array $row, int $i): array => [
                'label' => (string) ($config[(string) ($row[$xKey] ?? '')]['label'] ?? ($row[$xKey] ?? '')),
                'color' => self::color($config[(string) ($row[$xKey] ?? '')]['color'] ?? null, $i),
            ], $rows, array_keys($rows)),
        ];

        if (count(self::$memo) > 50) {
            self::$memo = [];
        }

        return self::$memo[$key] = $chart;
    }

    /**
     * Position verticale d'une valeur, en % depuis le haut de la zone.
     *
     * @param  array{min: float, max: float}  $scale
     */
    public static function y(float $value, array $scale): float
    {
        $range = $scale['max'] - $scale['min'];

        return round(100 - (($value - $scale['min']) / ($range ?: 1)) * 100, 3);
    }

    /**
     * Position d'une valeur sur un axe horizontal, en % depuis la gauche.
     *
     * @param  array{min: float, max: float}  $scale
     */
    public static function position(float $value, array $scale): float
    {
        return round(100 - self::y($value, $scale), 3);
    }

    /**
     * Position horizontale d'une catégorie, en %.
     *
     * `band` : au centre d'une bande (barres). `point` : d'un bord à l'autre
     * (lignes seules), comme la plupart des charts de tendance.
     */
    public static function x(int $index, int $count, string $layout = 'band'): float
    {
        if ($layout === 'point') {
            return $count <= 1 ? 50.0 : round($index / ($count - 1) * 100, 3);
        }

        return round(($index + 0.5) / max(1, $count) * 100, 3);
    }

    /**
     * La tranche horizontale qui appartient à une catégorie : zone de survol
     * de l'infobulle.
     *
     * @return array{left: float, width: float}
     */
    public static function slot(int $index, int $count, string $layout = 'band'): array
    {
        if ($layout === 'point' && $count > 1) {
            $width = 100 / ($count - 1);
            $left = max(0.0, self::x($index, $count, 'point') - $width / 2);
            $right = min(100.0, self::x($index, $count, 'point') + $width / 2);

            return ['left' => round($left, 3), 'width' => round($right - $left, 3)];
        }

        $width = 100 / max(1, $count);

        return ['left' => round($index * $width, 3), 'width' => round($width, 3)];
    }

    /**
     * Rectangles des barres, groupées ou empilées, valeurs négatives comprises.
     *
     * @param  array<string, mixed>  $chart  le résultat de make()
     * @param  float  $gap  part de chaque bande laissée vide entre deux catégories (0 à 0.9)
     * @return list<array{key: string, index: int, value: float, color: string, left: float, width: float, top: float, height: float, end: 'top'|'bottom'|'left'|'right'|null}>
     */
    public static function bars(array $chart, float $gap = 0.3, bool $horizontal = false): array
    {
        $count = $chart['count'];
        $series = $chart['series'];
        $scale = $chart['scale'];
        $band = 100 / max(1, $count);
        $group = $band * (1 - min(0.9, max(0.0, $gap)));
        $bars = [];

        for ($i = 0; $i < $count; $i++) {
            $groupLeft = $i * $band + ($band - $group) / 2;
            $positive = 0.0;
            $negative = 0.0;
            $lastUp = null;
            $lastDown = null;

            foreach ($series as $s => $item) {
                $value = $chart['values'][$item['key']][$i];

                if ($value === null) {
                    continue;
                }

                if ($chart['stacked']) {
                    $from = $value >= 0 ? $positive : $negative;
                    $to = $from + $value;
                    $value >= 0 ? $positive = $to : $negative = $to;
                    $left = $groupLeft;
                    $width = $group;
                } else {
                    $from = 0.0;
                    $to = $value;
                    $width = $group / count($series);
                    $left = $groupLeft + $s * $width;
                    // Un filet entre deux barres d'un même groupe.
                    $inset = min($width * 0.08, 0.6);
                    $left += $inset / 2;
                    $width -= $inset;
                }

                $top = self::y(max($from, $to), $scale);
                $bottom = self::y(min($from, $to), $scale);

                $bars[] = [
                    'key' => $item['key'],
                    'index' => $i,
                    'value' => $value,
                    'color' => $item['color'],
                    'left' => round($left, 3),
                    'width' => round($width, 3),
                    'top' => $top,
                    'height' => round(max(0.0, $bottom - $top), 3),
                    'end' => $chart['stacked'] ? null : ($value >= 0 ? 'top' : 'bottom'),
                ];

                if ($chart['stacked']) {
                    $value >= 0 ? $lastUp = array_key_last($bars) : $lastDown = array_key_last($bars);
                }
            }

            // Empilé : seul le segment extérieur de chaque pile est arrondi.
            if ($lastUp !== null) {
                $bars[$lastUp]['end'] = 'top';
            }
            if ($lastDown !== null) {
                $bars[$lastDown]['end'] = 'bottom';
            }
        }

        if (! $horizontal) {
            return $bars;
        }

        // Barres horizontales : la catégorie descend, la valeur va vers la
        // droite. On transpose le résultat vertical plutôt que de le recalculer.
        return array_map(fn (array $bar): array => array_merge($bar, [
            'left' => round(100 - $bar['top'] - $bar['height'], 3),
            'width' => $bar['height'],
            'top' => $bar['left'],
            'height' => $bar['width'],
            'end' => match ($bar['end']) {
                'top' => 'right',
                'bottom' => 'left',
                default => null,
            },
        ]), $bars);
    }

    /**
     * Tracé SVG d'une série dans une viewBox 0 0 100 100.
     *
     * Une valeur manquante coupe la ligne. `smooth` utilise une interpolation
     * monotone : la courbe ne dépasse jamais les points, pas de faux pic.
     *
     * @param  array<string, mixed>  $chart
     */
    public static function path(array $chart, string $key, string $layout = 'point', bool $smooth = true, bool $area = false): string
    {
        $segments = [];
        $current = [];

        foreach ($chart['values'][$key] ?? [] as $i => $value) {
            if ($value === null) {
                $current !== [] && $segments[] = $current;
                $current = [];

                continue;
            }

            $current[] = [self::x($i, $chart['count'], $layout), self::y($value, $chart['scale'])];
        }

        $current !== [] && $segments[] = $current;

        $baseline = self::y(max($chart['scale']['min'], min(0.0, $chart['scale']['max'])), $chart['scale']);
        $d = '';

        foreach ($segments as $points) {
            $line = $smooth && count($points) > 2 ? self::monotone($points) : self::polyline($points);

            if ($area) {
                $first = $points[0];
                $last = $points[array_key_last($points)];
                $d .= 'M'.$first[0].','.$baseline.'L'.$first[0].','.$first[1].substr($line, strpos($line, ' ') ?: strlen($line)).'L'.$last[0].','.$baseline.'Z';
            } else {
                $d .= $line;
            }
        }

        return $d;
    }

    /**
     * Graduations « rondes » : 0, 50, 100… plutôt que 0, 76.3, 152.5.
     *
     * @return array{min: float, max: float, step: float, ticks: list<float>}
     */
    public static function niceScale(float $min, float $max, int $maxTicks = 5): array
    {
        if ($min === $max) {
            $max = $min === 0.0 ? 1.0 : $max + abs($max) * 0.5;
        }

        $range = self::niceNumber($max - $min, false);
        $step = self::niceNumber($range / max(1, $maxTicks - 1), true);
        $niceMin = floor($min / $step) * $step;
        $niceMax = ceil($max / $step) * $step;

        $ticks = [];
        for ($value = $niceMin; $value <= $niceMax + $step / 2; $value += $step) {
            $ticks[] = round($value, 10) + 0.0;
        }

        return ['min' => $niceMin, 'max' => $niceMax, 'step' => $step, 'ticks' => $ticks];
    }

    /**
     * Parts d'un pie ou d'un donut, sur la première série (ou `$key`).
     *
     * Les valeurs nulles, négatives ou absentes n'ont pas de part. La
     * géométrie vit dans une viewBox -1 -1 2 2 : rayon 1, centre 0,0.
     *
     * @param  array<string, mixed>  $chart
     * @param  float  $inner  rayon intérieur, de 0 (pie) à 0.9 (anneau fin)
     * @return list<array{index: int, label: string, color: string, value: float, percent: float, path: string}>
     */
    public static function slices(array $chart, ?string $key = null, float $inner = 0.0): array
    {
        $key ??= $chart['series'][0]['key'] ?? null;
        $values = $key === null ? [] : $chart['values'][$key];
        $total = array_sum(array_filter($values, fn (?float $v): bool => $v !== null && $v > 0));

        if ($total <= 0) {
            return [];
        }

        $inner = min(0.9, max(0.0, $inner));
        $angle = 0.0;
        $slices = [];

        foreach ($values as $i => $value) {
            if ($value === null || $value <= 0) {
                continue;
            }

            $sweep = $value / $total * 360;
            $slices[] = [
                'index' => $i,
                'label' => $chart['palette'][$i]['label'],
                'color' => $chart['palette'][$i]['color'],
                'value' => $value,
                'percent' => round($value / $total * 100, 1),
                'path' => self::arc($angle, $angle + $sweep, 1.0, $inner),
            ];
            $angle += $sweep;
        }

        return $slices;
    }

    /**
     * Anneaux concentriques d'un chart radial : une catégorie par anneau,
     * de l'extérieur vers l'intérieur. `percent` sert au stroke-dasharray.
     *
     * @param  array<string, mixed>  $chart
     * @return list<array{index: int, label: string, color: string, value: float, percent: float, radius: float}>
     */
    public static function rings(array $chart, float $max = 100, float $thickness = 0.14, float $gap = 0.05, ?string $key = null): array
    {
        $key ??= $chart['series'][0]['key'] ?? null;
        $rings = [];
        $radius = 1 - $thickness / 2;

        foreach ($key === null ? [] : $chart['values'][$key] as $i => $value) {
            if ($radius <= $thickness / 2) {
                break;
            }

            $rings[] = [
                'index' => $i,
                'label' => $chart['palette'][$i]['label'],
                'color' => $chart['palette'][$i]['color'],
                'value' => (float) $value,
                'percent' => round(min(100, max(0, (float) $value / ($max ?: 1) * 100)), 3),
                'radius' => round($radius, 4),
            ];
            $radius -= $thickness + $gap;
        }

        return $rings;
    }

    /**
     * Géométrie d'une sparkline dans une viewBox 0 0 100 100.
     *
     * Une ligne suit la tendance : l'échelle va du minimum au maximum des
     * données. Des barres partent de zéro, sinon elles mentiraient.
     *
     * @param  iterable<int, mixed>  $values
     * @return array{line: string, area: string, bars: list<array{left: float, width: float, top: float, height: float, value: float}>, last: array{x: float, y: float}|null}
     */
    public static function sparkline(iterable $values, string $type = 'line'): array
    {
        $numbers = [];
        foreach ($values as $value) {
            $numbers[] = self::number($value);
        }

        $present = array_values(array_filter($numbers, fn (?float $v): bool => $v !== null));

        if ($present === []) {
            return ['line' => '', 'area' => '', 'bars' => [], 'last' => null];
        }

        $low = min($present);
        $high = max($present);

        if ($type === 'bar') {
            $low = min(0.0, $low);
            $high = max(0.0, $high);
        }

        if ($low === $high) {
            $low -= 1;
            $high += 1;
        }

        $scale = ['min' => $low, 'max' => $high];
        $count = count($numbers);
        $chart = [
            'values' => ['v' => $numbers],
            'count' => $count,
            'scale' => $scale,
            'series' => [['key' => 'v', 'label' => '', 'color' => '']],
            'stacked' => false,
        ];

        $bars = [];
        if ($type === 'bar') {
            foreach (self::bars($chart, 0.25) as $bar) {
                $bars[] = array_intersect_key($bar, array_flip(['left', 'width', 'top', 'height', 'value']));
            }
        }

        $lastIndex = array_key_last(array_filter($numbers, fn (?float $v): bool => $v !== null));

        return [
            'line' => self::path($chart, 'v', 'point', true),
            'area' => self::path($chart, 'v', 'point', true, true),
            'bars' => $bars,
            'last' => $lastIndex === null ? null : [
                'x' => self::x($lastIndex, $count, 'point'),
                'y' => self::y($numbers[$lastIndex], $scale),
            ],
        ];
    }

    /**
     * Mise en forme d'une valeur pour les axes et l'infobulle.
     *
     * `compact` : 1.2k, 3.4M. `number` : 1,234.5. `percent` : 12%.
     */
    public static function format(int|float|null $value, string $format = 'compact', string $prefix = '', string $suffix = ''): string
    {
        if ($value === null) {
            return '—';
        }

        // Le signe passe devant le préfixe : -€2k, pas €-2k.
        $sign = $value < 0 ? '-' : '';
        $value = abs($value);

        $formatted = match ($format) {
            'number' => self::trim(number_format($value, 2, '.', ',')),
            'percent' => self::trim(number_format($value, 1, '.', ',')).'%',
            default => self::compact($value),
        };

        return $sign.$prefix.$formatted.$suffix;
    }

    /**
     * N'accepte qu'une valeur de couleur CSS : pas de `;`, de `:` ni de
     * `url(`. La couleur finit dans un attribut style, elle ne doit pas
     * pouvoir y glisser une autre déclaration.
     */
    public static function color(mixed $value, int $index): string
    {
        $fallback = 'var(--chart-'.(($index % 5) + 1).')';

        if (! is_string($value) || $value === '' || strlen($value) > 120) {
            return $fallback;
        }

        return preg_match('/^[#a-zA-Z0-9\s%(),.\/-]+$/', $value) === 1 && ! str_contains(strtolower($value), 'url') ? $value : $fallback;
    }

    /**
     * @param  list<array<string, mixed>>  $rows
     */
    private static function categoryKey(array $rows, ?string $xKey): string
    {
        if ($xKey !== null && $xKey !== '') {
            return $xKey;
        }

        $first = $rows[0] ?? [];

        foreach ($first as $key => $value) {
            if (! is_numeric($value)) {
                return (string) $key;
            }
        }

        return (string) (array_key_first($first) ?? '');
    }

    /**
     * Les séries dans l'ordre de `config`, sinon toutes les colonnes numériques.
     *
     * @param  list<array<string, mixed>>  $rows
     * @param  array<string, mixed>  $config
     * @return list<array{key: string, label: string, color: string}>
     */
    private static function series(array $rows, array $config, string $xKey): array
    {
        // Une clé de config n'est une série que si elle existe comme colonne
        // numérique. Pour un pie, `config` nomme les catégories, pas les séries.
        $keys = array_values(array_filter(
            array_map('strval', array_keys($config)),
            fn (string $key): bool => $key !== $xKey && array_filter($rows, fn (array $row): bool => is_numeric($row[$key] ?? null)) !== [],
        ));

        if ($keys === []) {
            foreach ($rows[0] ?? [] as $key => $value) {
                if ((string) $key !== $xKey && is_numeric($value)) {
                    $keys[] = (string) $key;
                }
            }
        }

        return array_map(fn (string $key, int $index): array => [
            'key' => $key,
            'label' => (string) ($config[$key]['label'] ?? ucfirst(str_replace(['_', '-'], ' ', $key))),
            'color' => self::color($config[$key]['color'] ?? null, $index),
        ], $keys, array_keys($keys));
    }

    /**
     * Bornes des données, zéro toujours inclus : une barre part de zéro.
     *
     * @param  array<string, list<float|null>>  $values
     * @return array{0: float, 1: float}
     */
    private static function extent(array $values, int $count, bool $stacked): array
    {
        $low = 0.0;
        $high = 0.0;

        for ($i = 0; $i < $count; $i++) {
            $up = 0.0;
            $down = 0.0;

            foreach ($values as $list) {
                $value = $list[$i];

                if ($value === null) {
                    continue;
                }

                if ($stacked) {
                    $value >= 0 ? $up += $value : $down += $value;
                } else {
                    $high = max($high, $value);
                    $low = min($low, $value);
                }
            }

            if ($stacked) {
                $high = max($high, $up);
                $low = min($low, $down);
            }
        }

        return [$low, $high];
    }

    private static function number(mixed $value): ?float
    {
        return is_numeric($value) ? (float) $value : null;
    }

    private static function niceNumber(float $range, bool $round): float
    {
        if ($range <= 0) {
            return 1.0;
        }

        $exponent = floor(log10($range));
        $fraction = $range / 10 ** $exponent;

        $nice = $round
            ? match (true) {
                $fraction < 1.5 => 1, $fraction < 3 => 2, $fraction < 7 => 5, default => 10
            }
        : match (true) {
            $fraction <= 1 => 1, $fraction <= 2 => 2, $fraction <= 5 => 5, default => 10
        };

        return $nice * 10 ** $exponent;
    }

    private static function compact(float $value): string
    {
        $abs = abs($value);

        [$divisor, $unit] = match (true) {
            $abs >= 1e9 => [1e9, 'B'],
            $abs >= 1e6 => [1e6, 'M'],
            $abs >= 1e3 => [1e3, 'k'],
            default => [1, ''],
        };

        return self::trim(number_format($value / $divisor, $unit === '' ? 2 : 1, '.', ',')).$unit;
    }

    private static function trim(string $number): string
    {
        return str_contains($number, '.') ? rtrim(rtrim($number, '0'), '.') : $number;
    }

    /**
     * Secteur (ou secteur d'anneau) entre deux angles, en degrés depuis
     * midi, dans le sens des aiguilles d'une montre.
     */
    private static function arc(float $start, float $end, float $radius, float $inner): string
    {
        // Un cercle complet ne se dessine pas en un seul arc : on le coupe en deux.
        if ($end - $start >= 359.999) {
            return self::arc($start, $start + 180, $radius, $inner).self::arc($start + 180, $end - 0.001, $radius, $inner);
        }

        $point = fn (float $angle, float $r): string => round($r * sin(deg2rad($angle)), 5).','.round(-$r * cos(deg2rad($angle)), 5);
        $large = $end - $start > 180 ? 1 : 0;

        $d = 'M'.$point($start, $radius).' A'.$radius.','.$radius.' 0 '.$large.' 1 '.$point($end, $radius);

        return $inner > 0
            ? $d.' L'.$point($end, $inner).' A'.$inner.','.$inner.' 0 '.$large.' 0 '.$point($start, $inner).' Z'
            : $d.' L0,0 Z';
    }

    /** @param  list<array{0: float, 1: float}>  $points */
    private static function polyline(array $points): string
    {
        $d = 'M'.$points[0][0].','.$points[0][1];

        foreach (array_slice($points, 1) as [$x, $y]) {
            $d .= ' L'.$x.','.$y;
        }

        return $d;
    }

    /**
     * Interpolation monotone de Fritsch–Carlson, en courbes de Bézier.
     *
     * @param  list<array{0: float, 1: float}>  $points
     */
    private static function monotone(array $points): string
    {
        $n = count($points);
        $slopes = [];
        $tangents = [];

        for ($i = 0; $i < $n - 1; $i++) {
            $dx = $points[$i + 1][0] - $points[$i][0];
            $slopes[$i] = $dx == 0 ? 0.0 : ($points[$i + 1][1] - $points[$i][1]) / $dx;
        }

        $tangents[0] = $slopes[0];
        $tangents[$n - 1] = $slopes[$n - 2];

        for ($i = 1; $i < $n - 1; $i++) {
            $tangents[$i] = $slopes[$i - 1] * $slopes[$i] <= 0 ? 0.0 : ($slopes[$i - 1] + $slopes[$i]) / 2;
        }

        for ($i = 0; $i < $n - 1; $i++) {
            if ($slopes[$i] == 0) {
                $tangents[$i] = $tangents[$i + 1] = 0.0;

                continue;
            }

            $a = $tangents[$i] / $slopes[$i];
            $b = $tangents[$i + 1] / $slopes[$i];
            $h = $a * $a + $b * $b;

            if ($h > 9) {
                $t = 3 / sqrt($h);
                $tangents[$i] = $t * $a * $slopes[$i];
                $tangents[$i + 1] = $t * $b * $slopes[$i];
            }
        }

        $d = 'M'.$points[0][0].','.$points[0][1];

        for ($i = 0; $i < $n - 1; $i++) {
            [$x0, $y0] = $points[$i];
            [$x1, $y1] = $points[$i + 1];
            $dx = ($x1 - $x0) / 3;

            $d .= ' C'.round($x0 + $dx, 3).','.round($y0 + $tangents[$i] * $dx, 3)
                .' '.round($x1 - $dx, 3).','.round($y1 - $tangents[$i + 1] * $dx, 3)
                .' '.$x1.','.$y1;
        }

        return $d;
    }
}
