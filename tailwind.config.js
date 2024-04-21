import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            backgroundColor: {
                'amber':'#ffc727',
                'newBlue':'#111B47',
                'newGreen':'#458046',
                'whiteBlue':'#E7ECFF',
            },
            textColor: {
                'amber':'#ffc727',
                'textNewBlue':'#091133',
            },
            
            fontFamily: {
                sans: ['poppins', ...defaultTheme.fontFamily.sans],
            },
            borderColor: {
                'amber':'#ffc727',
                'newBlue':'#111B47',
            },
            width: {
                '29':'35.77%',
                'standard':'90%'
            },
        },
    },

    plugins: [forms],
};
