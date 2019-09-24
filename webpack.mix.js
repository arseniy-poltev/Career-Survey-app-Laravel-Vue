let mix = require('laravel-mix');

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

mix.js('resources/assets/js/dashboard/dashboard.js', 'public/js/dashboard/dashboard.js').version()
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/survey.scss', 'public/css')
    .sass('resources/assets/sass/surveys/done.scss', 'public/css/surveys');
