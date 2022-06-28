const mix = require('laravel-mix');
const MonacoWebpackPlugin = require('monaco-editor-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new MonacoWebpackPlugin({
            languages: ['handlebars', 'html'],
            // features: ['accessibilityHelp', 'anchorSelect', 'bracketMatching', 'caretOperations', 'folding', 'format'],
            // globalAPI: true,
        })
    ]
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/monaco.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
