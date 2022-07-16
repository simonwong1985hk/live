import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                'app/Actions/**',
                'app/Http/**',
                'app/View/**',
                'resources/views/**',
                'routes/**',
            ],
        }),
    ],
    server: {
        https: true,
        host: 'localhost',
        hmr: {
            host: 'localhost',
        },
    },
});
