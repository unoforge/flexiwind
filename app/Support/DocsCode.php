<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class DocsCode
{
    protected static ?array $cache = null;

    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        return self::$cache = Cache::memo()->rememberForever(self::getCacheKey(), function (): array {
            $path = app_path('Support/DocsCode');

            if (! File::exists($path)) {
                return [];
            }

            $all = [];

            foreach (File::allFiles($path) as $file) {
                $data = require $file->getRealPath();

                if (! is_array($data)) {
                    continue;
                }

                $all = array_merge($all, $data);
            }

            return $all;
        });
    }

    public static function get(string $key): ?array
    {
        return self::all()[$key] ?? null;
    }

    protected static function getCacheKey(): string
    {
        $path = app_path('Support/DocsCode');

        if (! File::exists($path)) {
            return 'docs-code:all:missing';
        }

        $signature = collect(File::allFiles($path))
            ->map(fn ($file): string => $file->getRealPath().'|'.$file->getMTime())
            ->implode('|');

        return 'docs-code:all:'.md5($signature);
    }
}
