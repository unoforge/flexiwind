<?php

return [
    'app-css-file' => [
        'lang' => 'css',
        'name' => 'app.css',
        'code' => <<<'CSS'
@import url(./all-themes.css);
@import "tailwindcss";
@reference "./flexiwind.css";
@reference "./button-styles.css";
@reference "./ui-utilities.css";


@custom-variant dark (&:is(.dark *));
:root{
    --primary: var(--color-primary-600);
    --secondary: var(--color-secondary-600);
    --accent: var(--color-accent-600);
    --info: var(--color-info-600);
    --warning: var(--color-warning-600);
    --danger: var(--color-danger-600);
    --success: var(--color-success-600);


    /* background colors  */
    --bg: var(--color-white); 
    --bg-subtle: var(--color-gray-50); 
    --bg-surface: var(--color-gray-100); 
    --bg-muted: var(--color-gray-200); 
    --bg-surface-elevated: var(--color-gray-300); 


    /* foreground colors  */
    --fg: var(--color-gray-700); 
    --fg-muted: var(--color-gray-600); 
    --fg-subtitle: var(--color-gray-800); 
    --fg-title: var(--color-gray-900); 


    /* border colors  */
    --border: var(--color-gray-200); 
    --border-subtle: var(--color-gray-100); 
    --border-strong: var(--color-gray-300); 
    --border-amphasis: var(--color-gray-400); 
    --border-input: var(--color-gray-200);
}
.dark{
    --primary: var(--color-primary-500);
    --secondary: var(--color-secondary-500);
    --accent: var(--color-accent-500);
    --info: var(--color-info-500);
    --warning: var(--color-warning-500);
    --danger: var(--color-danger-500);
    --success: var(--color-success-500);


    /* background colors  */
    --bg: var(--color-gray-950); 
    --bg-subtle: var(--color-900); 
    --bg-surface: var(--color-950); 
    --bg-muted: var(--color-800); 
    --bg-surface-elevated: var(--color-700); 


    /* foreground colors  */
    --fg: var(--color-gray-300); 
    --fg-muted: var(--color-gray-400); 
    --fg-subtitle: var(--color-gray-100); 
    --fg-title: var(--color-white); 


    /* border colors  */
    --border: var(--color-gray-900); 
    --border-subtle: var(--color-gray-950); 
    --border-strong: var(--color-gray-800); 
    --border-amphasis: var(--color-gray-700); 
    --border-input: var(--color-gray-900);


    /* card  */
    --card: var(--color-gray-950); 
    --card-gray: var(--color-gray-900); 


    /* popover : For Dropdowns & popovers  */
    --popover: var(--color-gray-950); 
    --popover-gray: var(--color-gray-900);
}

@theme inline {
    --color-primary: var(--primary);
    --color-secondary: var(--secondary);
    --color-accent: var(--accent);
    --color-info: var(--info);
    --color-warning: var(--warning);
    --color-danger: var(--danger);
    --color-success: var(--success);


    /* background colors  */
    --color-bg: var(--bg); 
    --color-bg-subtle: var(--bg-subtle); 
    --color-bg-surface: var(--bg-surface); 
    --color-bg-muted: var(--bg-muted); 
    --color-bg-surface-elevated: var(--bg-surface-elevated); 


    /* foreground colors  */
    --color-fg: var(--fg); 
    --color-fg-muted: var(--fg-muted); 
    --color-fg-subtitle: var(--fg-subtitle); 
    --color-fg-title: var(--fg-title); 


    /* border colors  */
    --color-border: var(--border); 
    --color-border-subtle: var(--border-subtle); 
    --color-border-strong: var(--border-strong); 
    --color-border-amphasis: var(--border-amphasis); 
    --color-border-input: var(--border-input);


    /* card  */
    --color-card: var(--card-bg); 
    --color-card-gray: var(--card-gray); 


    /* popover : For Dropdowns & popovers  */
    --color-popover: var(--popover-bg); 
    --color-popover-gray: var(--popover-gray);



    /* define primary colors */
    --color-primary-50: hsl(252, 100%, 97%);
    --color-primary-100: hsl(252, 100%, 94%);
    --color-primary-200: hsl(251, 98%, 89%);
    --color-primary-300: hsl(249, 95%, 82%);
    --color-primary-400: hsl(247, 90%, 74%);
    --color-primary-500: hsl(245, 86%, 67%);
    --color-primary-600: hsl(243, 75%, 59%);
    --color-primary-700: hsl(244, 57%, 51%);
    --color-primary-800: hsl(245, 54%, 41%);
    --color-primary-900: hsl(245, 47%, 35%);
    --color-primary-950: hsl(246, 47%, 20%);

    --color-secondary-50: hsl(183, 100%, 96%);
    --color-secondary-100: hsl(185, 96%, 90%);
    --color-secondary-200: hsl(186, 93%, 82%);
    --color-secondary-300: hsl(187, 92%, 69%);
    --color-secondary-400: hsl(188, 86%, 53%);
    --color-secondary-500: hsl(187, 97%, 43%);
    --color-secondary-600: hsl(187, 92%, 36%);
    --color-secondary-700: hsl(188, 78%, 31%);
    --color-secondary-800: hsl(201, 90%, 27%);
    --color-secondary-900: hsl(190, 56%, 24%);
    --color-secondary-950: hsl(192, 79%, 15%);

    /* other colors if needed */
}  
CSS
    ],
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
