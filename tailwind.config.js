const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/@protonemedia/inertiajs-tables-laravel-query-builder/**/*.{js,vue}',
    ],
    darkMode: "class",
    theme: {
        extend: {
            width: {
                sidebar: "350px",
                search: "400px",
            },
            rotate: {
                137: "137deg",
            },
            backgroundColor: {
                packed: "#EEF6FF",
                // packed: "#f2f2f2", you can use this color if you like
            },
            colors: {
                primary: "#4F46E5",
            },
            fontFamily: {
                sans: ['Barlow Condensed', ...defaultTheme.fontFamily.sans],
                lexend:['Lexend', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
