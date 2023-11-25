/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.svelte",
    ],
    theme: {
        fontFamily: {
            sans: ["Red Hat Display", "Public Sans", "Arial", "sans-serif"],
        },
        extend: {
            colors: {
                "custom-pink": " #FBEEFF",
                "custom-light-pink": "#99879D",
            },
            backgroundColor: {
                "custom-pink": " #FBEEFF",
                "custom-purple": "#9378FF",
                "custom-light-pink": "#FAF9FE",
                "custom-gray": "#EBEBEB",
            },
            borderRadius: {
                "custom-rounded": "60px",
            },
            borderWidth: {
                1: "1px",
            },
        },
    },
    plugins: [],
};
