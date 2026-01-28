<?php

namespace App\Support;

use Illuminate\Support\Facades\File;

class DocsCode
{
    protected static ?array $cache = null;
    public static function all(): array
    {
        if (self::$cache !== null) return self::$cache;

        $path = app_path('Support/DocsCode');
        $files = File::allFiles($path);

        $all = [];

        foreach ($files as $file) {
            $data = require $file->getRealPath();

            if (!is_array($data)) continue;

            $all = array_merge($all, $data);
        }

        return self::$cache = $all;
    }
    public static function get(string $key): ?array
    {
        return self::all()[$key] ?? null;
    }
}
