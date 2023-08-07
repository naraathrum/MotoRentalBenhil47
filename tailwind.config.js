// const defaultTheme = require('tailwindcss/defaultTheme');

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//         './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
//         './vendor/laravel/jetstream/**/*.blade.php',
//         './storage/framework/views/*.php',
//         './resources/views/**/*.blade.php',
//     ],

//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ['Nunito', ...defaultTheme.fontFamily.sans],
//             },
//         },
//     },

//     plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
// };

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
        container: {
			center: true,
			padding: {
				DEFAULT: "1rem",
				lg: "75px",
				xl: "100px",
			},
		},
        extend: {
            colors: {
				primary: "#F2AD5F",
				secondary: "#9D9DBC",
				dark: "#0D0C41",
				grey: "#D8D8E4",
				darkGrey: "#F5F6F6",
				subtlePars: "#B0AED6",
                navbar: "#384E8E",
                lalala: "#E9DDD2",
                nanana: "#874732",
                dadada: "#F2A962"
			},
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
			    poppins: "Poppins, sans-serif",
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
