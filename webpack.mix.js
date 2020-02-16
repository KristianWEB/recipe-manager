const mix = require("laravel-mix");
require("dotenv").config();
require("laravel-mix-tailwind");
require("laravel-mix-purgecss");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css")
    .tailwind("./tailwind.config.js")
    .purgeCss()
    .override(config => {
        // config.module.rules.find(rule =>
        //     rule.test.test(".svg")
        // ).exclude = /\.svg$/;
        // config.module.rules.push({
        //     test: /\.svg$/,
        //     use: [{ loader: "html-loader" }]
        // });
        config.module.rules.push({
        test: /\.vue$/,
        use: [{
            loader: "vue-svg-inline-loader",
            options: { /* ... */ }
        }]
    })
    });

if (mix.inProduction()) {
    mix.version();
}
