<?php

declare(strict_types=1);

namespace App\Flexiwind;

/**
 * Matrice variant × intent du bouton.
 *
 * Elle doit refléter EXACTEMENT les utilities définies dans
 * resources/css/flexiwind/intents.css — « Reduced matrix, only officially
 * supported combinations ». Déclarer ici un intent sans utility produit une
 * classe qui n'existe pas : le bouton retombe silencieusement sur l'intent
 * par défaut du variant.
 */
class ButtonHelper
{
    protected static array $variants = [
        'solid' => [
            'base' => 'btn-solid',
            'intents' => [
                'primary' => 'btn-solid-primary',
                'secondary' => 'btn-solid-secondary',
                'accent' => 'btn-solid-accent',
                'neutral' => 'btn-solid-neutral',
                'destructive' => 'btn-solid-destructive',
                'success' => 'btn-solid-success',
                'warning' => 'btn-solid-warning',
                'info' => 'btn-solid-info',
            ],
        ],
        'soft' => [
            'base' => 'btn-soft',
            'intents' => [
                'primary' => 'btn-soft-primary',
                'destructive' => 'btn-soft-destructive',
                'success' => 'btn-soft-success',
                'warning' => 'btn-soft-warning',
                'info' => 'btn-soft-info',
                'gray' => 'btn-soft-gray',
            ],
        ],
        'outline' => [
            'base' => 'btn-outline',
            'intents' => [
                'gray' => 'btn-outline-gray',
                'primary' => 'btn-outline-primary',
                'destructive' => 'btn-outline-destructive',
                'success' => 'btn-outline-success',
                'warning' => 'btn-outline-warning',
                'info' => 'btn-outline-info',
            ],
        ],
        'ghost' => [
            'base' => 'btn-ghost',
            'intents' => [
                'gray' => 'btn-ghost-gray',
                'destructive' => 'btn-ghost-destructive',
                'success' => 'btn-ghost-success',
            ],
        ],
        'none' => [],
    ];

    public static function getVariants(): array
    {
        return self::$variants;
    }

    public static function normalizeIntent(?string $intent): ?string
    {
        return $intent === 'danger' ? 'destructive' : $intent;
    }
}
