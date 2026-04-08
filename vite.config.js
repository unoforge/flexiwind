import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/site-font.css',
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/search.js',
                'resources/js/site-ui.js',
                'resources/css/docs.css',
                'resources/js/flexilla.js',
                'resources/js/docs.js',
                'resources/js/block.js',
                'resources/js/sidebar-plugin.js',
                'resources/css/code-theme.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
