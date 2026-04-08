<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class SidebarPaginator
{
    protected static ?array $flattened = null;

    protected static ?array $slugIndexMap = null;

    public static function getFlattened(): array
    {
        self::bootIndex();

        return self::$flattened;
    }

    public static function getCurrent(string $slug): ?array
    {
        self::bootIndex();

        $index = self::$slugIndexMap[$slug] ?? null;

        return $index !== null ? self::$flattened[$index] : null;
    }

    public static function getPagger(string $slug): array
    {
        self::bootIndex();

        $index = self::$slugIndexMap[$slug] ?? null;

        if ($index === null) {
            return [
                'prev' => null,
                'next' => null,
                'current' => null,
            ];
        }

        return [
            'prev' => $index > 0 ? self::$flattened[$index - 1] : null,
            'current' => self::$flattened[$index],
            'next' => $index < count(self::$flattened) - 1 ? self::$flattened[$index + 1] : null,
        ];
    }

    public static function getPageData(string $slug): array
    {
        return Cache::memo()->rememberForever(
            'sidebar-paginator:page-data:'.md5($slug.'|'.SidebarData::getSignature()),
            function () use ($slug): array {
                $pager = self::getPagger($slug);
                $current = $pager['current'];

                return [
                    'prev' => $pager['prev'],
                    'next' => $pager['next'],
                    'current' => $current,
                    'title' => $current['title'] ?? '',
                    'description' => $current['seoDescription'] ?? '',
                    'keywords' => $current['keywords'] ?? '',
                    'seo' => self::getSeo($current),
                ];
            },
        );
    }

    public static function getSeo(?array $current): array
    {
        return [
            'ogImage' => [
                'src' => $current['ogImage']['src'] ?? '/cover-flexiwind.webp',
                'alt' => $current['ogImage']['alt'] ?? 'Flexiwind UI Kit',
            ],
            'keywords' => trim(($current['keywords'] ?? '') ? ', '.$current['keywords'] : 'flexiwind, laravel, components, ui'),
            'title' => 'Flexiwind | '.($current['title'] ?? ''),
            'description' => $current['seoDescription'] ?? 'Easily add interactive Components to your App.',
        ];
    }

    protected static function bootIndex(): void
    {
        if (self::$flattened !== null && self::$slugIndexMap !== null) {
            return;
        }

        [
            'flattened' => $flattened,
            'slugIndexMap' => $slugIndexMap,
        ] = Cache::memo()->rememberForever(self::getCacheKey(), function (): array {
            $flattened = [];
            $slugIndexMap = [];

            foreach (SidebarData::items() as $group) {
                foreach ($group['items'] ?? [] as $item) {
                    $flattened[] = [
                        'title' => $item['title'],
                        'slug' => $item['path'],
                        'description' => $item['description'],
                        'keywords' => $item['keywords'],
                        'seoDescription' => $item['seoDescription'],
                        'ogImage' => [
                            'src' => null,
                            'alt' => null,
                        ],
                    ];

                    $slugIndexMap[$item['path']] = count($flattened) - 1;
                }
            }

            return [
                'flattened' => $flattened,
                'slugIndexMap' => $slugIndexMap,
            ];
        });

        self::$flattened = $flattened;
        self::$slugIndexMap = $slugIndexMap;
    }

    protected static function getCacheKey(): string
    {
        return 'sidebar-paginator:index:'.SidebarData::getSignature();
    }
}
