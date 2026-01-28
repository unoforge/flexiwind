<?php
namespace App\Support;

use Spatie\ShikiPhp\Shiki;

class ShikiService
{
    private static ?Shiki $instance = null;

    public static function getInstance(string $theme = 'aurora-x'): Shiki
    {
        if (self::$instance === null) {
            self::$instance = new Shiki($theme);
        }
        return self::$instance;
    }
}