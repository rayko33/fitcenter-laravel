import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/js/app.js',
                    'resources/css/dashboar.css',
                    'resources/css/backgroundlogin.css',
                    'resources/js/calendar.js',
                    'resources/js/CalendarData.js',
                    'resources/css/loader.css',
                    'resources/js/client.js'],
                    
            refresh: true,
        }),
    ],
});
