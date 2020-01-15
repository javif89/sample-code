const mix = require('laravel-mix');

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

 mix.browserSync({
     proxy: process.env.APP_URL
 });

mix.js('resources/js/admin.js', 'public/js').version();
mix.js('resources/js/events.js', 'public/js').version();
mix.js('resources/js/axios.js', 'public/js').version();
mix.js('resources/js/website.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/website/custom.sass', 'public/css')
    .options({
        processCssUrls: false
    }).version();

mix.copy('node_modules/jquery-typeahead/dist', 'public/argon/vendor/jquery-typeahead');

mix.webpackConfig({
    externals: function (context, request, callback) {
        if (/xlsx|canvg|pdfmake/.test(request)) {
            return callback(null, "commonjs " + request);
        }
        callback();
    }
})