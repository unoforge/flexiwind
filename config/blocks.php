<?php

return [
    'login-form' => [
        'key' => 'login-form',
        'category' => 'application',
        'title' => 'Login',
        'description' => 'User login form components with various layouts and styles',
        'blocks' => [
            'login01' => [
                'name' => 'login01',
                'preview' => '/preview-ui/auth/login01'
            ],
            'login02' => [
                'name' => 'login02',
                'preview' => '/preview-ui/auth/login02'
            ],
            'login03' => [
                'name' => 'login03',
                'preview' => '/preview-ui/auth/login03'
            ]
        ],
    ],
    'signup-form' => [
        'key' => 'signup-form',
        'category' => 'application',
        'title' => 'Signup',
        'description' => 'User registration and signup form components',
        'blocks' => [
            'signup01' => [
                'name' => 'signup01',
                'preview' => '/preview-ui/auth/signup01',
            ],
        ],
    ],
    'auth-form' => [
        'key' => 'auth-form',
        'category' => 'application',
        'title' => 'Auth',
        'description' => 'Authentication components including password reset, confirmation, and OTP forms',
        'blocks' => [
            'otp01' => [
                'name' => 'otp01',
                'preview' => '/preview-ui/auth/otp01',
            ]
        ],
    ],
    'sidebar' => [
        'key' => 'sidebar',
        'category' => 'application',
        'title' => 'Sidebar',
        'description' => 'Navigation sidebar components with different layouts and styles',
        'blocks' => [
            'sidebar01' => [
                'name' => 'sidebar01',
                'preview' => '/preview-ui/sidebar/01',
            ]
        ],
    ],

    'dash-card' => [
        'key' => 'dash-card',
        'category' => 'application',
        'title' => 'Dash Stats',
        'description' => 'Navigation sidebar components with different layouts and styles',
        'blocks' => [
            'kpi01' => [
                'name' => 'kpi01',
                'preview' => '/preview-ui/dash-card/kpi01',
            ],
            'activity01' => [
                'name' => 'activity01',
                'preview' => '/preview-ui/dash-card/activity01',
            ]
        ],
    ],
];
