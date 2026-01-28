<?php

namespace App\Flexiwind;

class ButtonHelper
{
    protected static array $variants = [
        'solid' => [
            'base' => 'btn-solid',
            'intents' => [
                'primary' => 'btn-solid-primary text-white',
                'secondary' => 'btn-solid-secondary text-white',
                'accent' => 'btn-solid-accent text-white',
                'success' => 'btn-solid-success text-white',
                'danger' => 'btn-solid-danger text-white',
                'info' => 'btn-solid-info text-white',
                'warning' => 'btn-solid-warning text-white',
                'neutral'=>'btn-solid-neutral text-bg',
                'gray'=>'btn-solid-gray text-white',
                'white'=>'btn-solid-white border border-border text-fg'
            ],
        ],
        'soft' => [
            'base' => 'btn-soft',
            'intents' => [
                'primary' => 'btn-soft-primary',
                'secondary' => 'btn-soft-secondary',
                'accent' => 'btn-soft-accent',
                'danger' => 'btn-soft-danger',
                'success' => 'btn-soft-success',
                'info' => 'btn-soft-info',
                'warning' => 'btn-soft-warning',
                'gray' => 'btn-soft-gray',
                'neutral' => 'btn-soft-neutral',
            ],
        ],
        'outline' => [
            'base' => 'btn-outline',
            'intents' => [
                'primary' => 'btn-outline-primary',
                'secondary' => 'btn-outline-secondary',
                'accent' => 'btn-outline-accent',
                'danger' => 'btn-outline-danger',
                'info'=>'btn-outline-info',
                'warning'=>'btn-outline-warning',
                'success' => 'btn-outline-success',
                'gray' => 'btn-outline-gray',
                'neutral'=>'btn-outline-neutral'
            ],
        ],
        'ghost' => [
            'base' => 'btn-ghost',
            'intents' => [
                'primary' => 'btn-ghost-primary',
                'secondary' => 'btn-ghost-secondary',
                'accent' => 'btn-ghost-accent',
                'danger' => 'btn-ghost-danger',
                'success' => 'btn-ghost-success',
                'info' => 'btn-ghost-info',
                'warning' => 'btn-ghost-warning',
                'gray' => 'btn-ghost-gray',
                'neutral' => 'btn-ghost-neutral',
            ],
        ],
        'flexi' => [
            'base' => 'btn-flexi',
            'intents' => [
                'primary' => 'btn-flexi-primary text-white',
                'secondary' => 'btn-flexi-secondary text-white',
                'accent' => 'btn-flexi-accent text-white',
                'danger' => 'btn-flexi-danger text-white',
                'success' => 'btn-flexi-success text-white',
                'info' => 'btn-flexi-info text-white',
                'warning' => 'btn-flexi-warning text-white',
                'gray' => 'btn-flexi-gray text-white',
                'neutral' => 'btn-flexi-neutral text-bg',
                'white'=>'btn-flexi-white text-fg hover:text-fg-title'
            ],
        ],
        'none' => [
        ],
    ];

    public static function getVariants()
    {
        return self::$variants;
    }
}