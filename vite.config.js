import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ command }) => {
    const isProduction = command === 'build';

    return {
        plugins: [
            laravel({
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: true,
            }),
        ],
        server: {
            proxy: {
                '/build': {
                    target: isProduction ? 'https://twitter-12ur.onrender.com' : 'http://localhost:3000',
                    changeOrigin: true,
                    ws: true,
                    rewrite: (path) => path.replace(/^\/build/, ''),
                },
            },
        },
    };
});
