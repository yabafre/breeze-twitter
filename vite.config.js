import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    base: process.env.NODE_ENV === 'production' ? 'https://twitter-12ur.onrender.com/' : '/',
    server: {
        host: '0.0.0.0',
        port: 3000,
        strictPort: true,
        https: true,
    },
});
