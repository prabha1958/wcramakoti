const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {

            colors:{
                'theme-l5':'#f6f3fb',
                'theme-l3':'#c4b1e3',
                'theme-l2':'#a789d6',
                'theme-l2':'#a789d6',
                'theme-l1':'#8962c8',
                'w3-theme':'#6d40b7',
                'theme-d1':'#6239a3',
                'theme-d2':'#573391',
                'theme-d3':'#4c2d7f',
                'theme-d4':'#41266d',
                'theme-d5':'#36205b',
                'theme-gr1': 'gradient-to-r from-amber-600 via-indigo-600 to-yellow-700',

            },
            fontFamily: {
                sans: ['Times Roman', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
