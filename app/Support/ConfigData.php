<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class ConfigData
{
    public static function blocks(): array
    {
        return Cache::memo()->rememberForever(self::blocksCacheKey(), fn (): array => config('blocks', []));
    }

    public static function registry(): array
    {
        return Cache::memo()->rememberForever(self::registryCacheKey(), fn (): array => config('registry', []));
    }

    protected static function blocksCacheKey(): string
    {
        return 'config-data:blocks:'.md5(serialize(config('blocks', [])));
    }

    protected static function registryCacheKey(): string
    {
        return 'config-data:registry:'.md5(serialize(config('registry', [])));
    }
}
