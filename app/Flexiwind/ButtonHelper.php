<?php

declare(strict_types=1);

namespace App\Flexiwind;

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
            ],
        ],
        'soft' => [
            'base' => 'btn-soft',
            'intents' => [
                'primary' => 'btn-soft-primary',
                'destructive' => 'btn-soft-destructive',
                'success' => 'btn-soft-success',
                'gray' => 'btn-soft-gray',
            ],
        ],
        'outline' => [
            'base' => 'btn-outline',
            'intents' => [
                'gray' => 'btn-outline-gray',
            ],
        ],
        'ghost' => [
            'base' => 'btn-ghost',
            'intents' => [
                'gray' => 'btn-ghost-gray',
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
