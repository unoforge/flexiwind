<?php

namespace Flexiwind\Docs;

/**
 * Construit la navigation à partir du front matter, à la forme exacte de
 * config('sidebar') du site hôte.
 *
 * Il n'y a donc plus de fichier de navigation à tenir à jour en parallèle du
 * contenu : ajouter une page, c'est ajouter un .md. Et comme la sidebar, le
 * paginateur prev/next et le SEO lisent tous config('sidebar'), tout reste
 * cohérent par construction.
 */
final class Navigation
{
    public function __construct(private readonly DocsIndex $index) {}

    /**
     * Les groupes d'une section : une section autonome (`cookbook`), ou la
     * navigation commune de /docs et /components quand `$section` est null.
     *
     * @return array<int, array{label: string, items: array<int, array<string, mixed>>}>
     */
    public function groups(?string $section = null): array
    {
        $allowed = (array) config('flexiwind-docs.nav_tiers', ['free', 'pro']);
        $standalone = array_keys(self::standaloneSections());
        $order = $section === null
            ? (array) config('flexiwind-docs.groups', [])
            : (array) (self::standaloneSections()[$section]['groups'] ?? []);
        $grouped = [];

        foreach ($this->index->pages() as $page) {
            if (! in_array($page->tier()->value, $allowed, true)) {
                continue;
            }

            // Chaque page n'apparaît que dans la navigation de sa section.
            $inStandalone = in_array($page->section(), $standalone, true);

            if ($section === null ? $inStandalone : $page->section() !== $section) {
                continue;
            }

            $grouped[$page->group()][] = $page;
        }

        uksort($grouped, function (string $a, string $b) use ($order): int {
            $indexA = array_search($a, $order, true);
            $indexB = array_search($b, $order, true);

            // Un groupe absent de la config passe à la fin, par ordre alphabétique.
            return [$indexA === false ? PHP_INT_MAX : $indexA, $a]
                <=> [$indexB === false ? PHP_INT_MAX : $indexB, $b];
        });

        $groups = [];

        foreach ($grouped as $label => $pages) {
            usort($pages, fn (DocPage $a, DocPage $b): int => [$a->order(), $a->title()] <=> [$b->order(), $b->title()]);

            $groups[] = [
                'label' => $label,
                'items' => array_map(fn (DocPage $page): array => $page->toSidebarItem(), $pages),
            ];
        }

        return $groups;
    }

    /**
     * La section autonome d'une URL (`/cookbook/modal-forms` -> cookbook),
     * ou null pour la navigation commune.
     */
    public function sectionOf(string $url): ?string
    {
        $first = strtok(trim($url, '/'), '/') ?: '';

        return array_key_exists($first, self::standaloneSections()) ? $first : null;
    }

    /** Le layout Livewire d'une URL : celui de sa section autonome, sinon celui des docs. */
    public function layoutFor(string $url): string
    {
        $section = $this->sectionOf($url);

        return (string) ($section !== null
            ? (self::standaloneSections()[$section]['layout'] ?? config('flexiwind-docs.layout', 'layouts::docs'))
            : config('flexiwind-docs.layout', 'layouts::docs'));
    }

    /** @return array{prev: ?array<string, mixed>, next: ?array<string, mixed>} */
    public function neighbours(string $url): array
    {
        // Précédent et suivant restent dans la section de la page.
        $flat = $this->flattened($this->sectionOf($url));
        $position = null;

        foreach ($flat as $index => $item) {
            if ($item['path'] === $url) {
                $position = $index;
                break;
            }
        }

        if ($position === null) {
            return ['prev' => null, 'next' => null];
        }

        return [
            'prev' => $flat[$position - 1] ?? null,
            'next' => $flat[$position + 1] ?? null,
        ];
    }

    /** @return array<string, array{layout?: string, groups?: list<string>}> */
    private static function standaloneSections(): array
    {
        return (array) config('flexiwind-docs.standalone_sections', []);
    }

    /** L'ordre de lecture à plat, celui que suit la pagination prev/next. */
    public function flattened(?string $section = null): array
    {
        $flat = [];

        foreach ($this->groups($section) as $group) {
            foreach ($group['items'] as $item) {
                if (! empty($item['hideInSidebar'])) {
                    continue;
                }

                $flat[] = $item;
            }
        }

        return $flat;
    }
}
