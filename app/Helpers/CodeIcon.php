<?php

namespace App\Helpers;

class CodeIcon
{
    public static function get(string $name): string
    {
        return match ($name) {
            'blade' => 'simple-icons--laravel',
            'php' => 'simple-icons--php',
            'vite' => 'vite.svg',
            'html' => 'simple-icons--html5',
            'js' => 'simple-icons--javascript',
            'ts' => 'simple-icons--typescript',
            'css' => 'simple-icons--css3',
            'laravel' => 'simple-icons--laravel',
            'shell' => 'simple-icons--gnometerminal',
            default => '',
        };
    }

    public static function isFile(string $name): bool
    {
        return str_contains($name, '.');
    }
}
