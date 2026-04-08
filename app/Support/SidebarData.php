<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class SidebarData
{
    public static function items(): array
    {
        return Cache::memo()->rememberForever(self::getCacheKey(), fn (): array => config('sidebar', []));
    }

    public static function groups(): array
    {
        return [
            [
                'name' => 'home',
                'title' => 'Home',
                'path' => '/',
                'icon' => 'ph--house',
                'noWire' => false,
                'hidden' => true,
            ],
            [
                'name' => 'getting-started',
                'title' => 'Getting Started',
                'path' => '/docs',
                'icon' => 'ph--sparkle',
                'noWire' => false,
            ],
            [
                'name' => 'components',
                'title' => 'Components',
                'path' => '/components',
                'icon' => 'ph--diamonds-four',
                'noWire' => false,
            ],
            [
                'name' => 'blocks',
                'title' => 'Blocks',
                'path' => '/blocks',
                'icon' => 'ph--cube',
                'noWire' => true,
            ],
            [
                'name' => 'templates',
                'title' => 'Templates',
                'path' => '/templates',
                'icon' => 'ph--airplay',
                'noWire' => true,
            ],
        ];
    }

    public static function getSignature(): string
    {
        return md5(serialize(config('sidebar', [])));
    }

    protected static function getCacheKey(): string
    {
        return 'sidebar-data:items:'.self::getSignature();
    }
}
