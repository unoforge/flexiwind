<?php

return [
    'vite-config' => [
        'lang' => 'js',
        'name' => 'vite.config.js',
        'code' => <<<'JS'
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css'],  
            refresh: true,
        }),
    ],
})
JS,
        'lines' => [
            2 => 'added',
            7 => 'added'
        ]
    ]

];
