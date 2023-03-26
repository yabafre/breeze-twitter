import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command }) => {
    const isProduction = command === 'build';
    const base = isProduction ? 'https://twitter-12ur.onrender.com/' : '/';

    return {
        base,
        plugins: [
            laravel({
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: true,
            }),
        ],
    };
});
