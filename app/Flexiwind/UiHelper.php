<?php

namespace App\Flexiwind;

class UiHelper
{
    protected static array $variants = [
        'none' => [],
        'solid' => [
            'base' => 'ui-solid',
            'intent' => [
                'primary' => 'ui-solid-primary',
                'secondary' => 'ui-solid-secondary',
                'success' => 'ui-solid-success',
                'danger' => 'ui-solid-danger',
                'warning' => 'ui-solid-warning',
                'info' => 'ui-solid-info',
                'gray' => 'ui-solid-gray',
                'neutral'=>'ui-solid-neutral'
            ],
        ],
        'soft' => [
            'base' => 'ui-soft',
            'intent' => [
                'primary' => 'ui-soft-primary',
                'secondary' => 'ui-soft-secondary',
                'accent'=>'ui-soft-accent',
                'success' => 'ui-soft-success',
                'danger' => 'ui-soft-danger',
                'warning' => 'ui-soft-warning',
                'info' => 'ui-soft-info',
                'gray' => 'ui-soft-gray',
                'neutral' => 'ui-soft-neutral'
            ],
        ],
        'subtle' => [
            'base' => 'ui-subtle',
            'intent' => [
                'primary' => 'ui-subtle-primary',
                'secondary' => 'ui-subtle-secondary',
                'success' => 'ui-subtle-success',
                'danger' => 'ui-subtle-danger',
                'accent'=>'ui-subtle-accent',
                'warning' => 'ui-subtle-warning',
                'info' => 'ui-subtle-info',
                'gray' => 'ui-subtle-gray',
                'neutral' => 'ui-subtle-neutral'
            ],
        ],
        'outline' => [
            'base' => 'ui-outline',
            'intent' => [
                'primary' => 'ui-outline-primary',
                'secondary' => 'ui-outline-secondary',
                'success' => 'ui-outline-success',
                'danger' => 'ui-outline-danger',
                'warning' => 'ui-outline-warning',
                'info' => 'ui-outline-info',
                'gray' => 'ui-outline-gray',
                'neutral' => 'ui-outline-neutral'
            ],
        ],
    ];


    public static function getVariants()
    {
        return self::$variants;
    }

    public static function getClasses(string $variant = 'solid', ?string $intent = 'gray'): string
    {
        $variantConfig = self::$variants[$variant] ?? [];
        $base = $variantConfig['base'] ?? '';
        $intentClass = $variantConfig['intent'][$intent] ?? '';
        return trim("$base $intentClass");
    }
}
