<?php
namespace App\Support;

class UrlHelper
{
    public static function splitSlug(string $value): array
    {
        return str_contains($value, '/') ? explode('/', $value) : [$value];
    }
}
