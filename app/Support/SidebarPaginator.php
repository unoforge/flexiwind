<?php

namespace App\Support;

class SidebarPaginator
{
    public static function getFlattened(): array
    {
        return collect(config('sidebar'))
            ->flatMap(function ($group) {
                return collect($group['items'])
                    ->filter(fn($item) => empty($item['hideInSidebar']))
                    ->map(fn($item) => [
                        'title' => $item['title'],
                        'slug' => $item['path'],
                        'description' => $item['description'],
                        'keywords' => $item['keywords'],
                        'seoDescription' => $item['seoDescription'],
                        'ogImage' => [
                            'src' => null,
                            'alt' => null,
                        ],
                    ]);
            })
            ->values()
            ->all();
    }

    public static function getCurrent(string $slug): ?array
    {
        $items = self::getFlattened();
        $index = collect($items)->search(fn($item) => $item['slug'] === $slug);

        return $index !== false ? $items[$index] : null;
    }


    public static function getPagger(string $slug): array
    {
        $items = self::getFlattened();
        $index = collect($items)->search(fn($item) => $item['slug'] === $slug);

        if ($index === false) {
            return [
                'prev' => null,
                'next' => null,
                'current' => null,
            ];
        }

        return [
            'prev' => $index > 0 ? $items[$index - 1] : null,
            'current' => $items[$index],
            'next' => $index < count($items) - 1 ? $items[$index + 1] : null,
        ];
    }
}
