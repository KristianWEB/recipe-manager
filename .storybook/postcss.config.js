const tailwindcss = require("tailwindcss");

module.exports = {
    plugins: [
        require("postcss-import")(),
        tailwindcss("../tailwind.config.js"), // this refers to your tailwind config
        require("autoprefixer")
    ]
};
