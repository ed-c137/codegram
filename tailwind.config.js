module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
        minWidth: {
            10: "10rem"
        },
        flex: {
            "2": "2 1 0%"
        }
    },
    variants: {
        extend: {}
    },
    plugins: []
};
