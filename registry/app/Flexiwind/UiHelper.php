<?php

declare(strict_types=1);

namespace App\Flexiwind;

/**
 * Matrice variant × intent des composants d'interface (badge, alert, kbd,
 * card, avatar-placeholder, accordion).
 *
 * Même règle que ButtonHelper : elle doit refléter exactement
 * resources/css/flexiwind/intents.css. `solid` porte la palette complète,
 * `soft`, `outline` et `subtle` portent le noyau.
 */
class UiHelper
{
    protected static array $variants = [
        'none' => [],
        'solid' => [
            'base' => 'ui-solid',
            'intents' => [
                'primary' => 'ui-solid-primary',
                'secondary' => 'ui-solid-secondary',
                'accent' => 'ui-solid-accent',
                'success' => 'ui-solid-success',
                'destructive' => 'ui-solid-destructive',
                'warning' => 'ui-solid-warning',
                'info' => 'ui-solid-info',
                'gray' => 'ui-solid-gray',
                'neutral' => 'ui-solid-neutral',
            ],
        ],
        'soft' => [
            'base' => 'ui-soft',
            'intents' => [
                'primary' => 'ui-soft-primary',
                'destructive' => 'ui-soft-destructive',
                'success' => 'ui-soft-success',
                'warning' => 'ui-soft-warning',
                'info' => 'ui-soft-info',
                'gray' => 'ui-soft-gray',
            ],
        ],
        'subtle' => [
            'base' => 'ui-subtle',
            'intents' => [
                'primary' => 'ui-subtle-primary',
                'destructive' => 'ui-subtle-destructive',
                'success' => 'ui-subtle-success',
                'warning' => 'ui-subtle-warning',
                'info' => 'ui-subtle-info',
                'gray' => 'ui-subtle-gray',
            ],
        ],
        'outline' => [
            'base' => 'ui-outline',
            'intents' => [
                'primary' => 'ui-outline-primary',
                'destructive' => 'ui-outline-destructive',
                'success' => 'ui-outline-success',
                'warning' => 'ui-outline-warning',
                'info' => 'ui-outline-info',
                'gray' => 'ui-outline-gray',
            ],
        ],
    ];

    public static function getVariants(): array
    {
        return self::$variants;
    }

    public static function getClasses(string $variant = 'solid', ?string $intent = 'gray'): string
    {
        $intent = self::normalizeIntent($intent);

        $variantConfig = self::$variants[$variant] ?? [];
        $base = $variantConfig['base'] ?? '';
        $intentClass = $variantConfig['intents'][$intent] ?? '';

        return trim("$base $intentClass");
    }

    public static function normalizeIntent(?string $intent): ?string
    {
        return $intent === 'danger' ? 'destructive' : $intent;
    }
}
