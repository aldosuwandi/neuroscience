var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        "vendor/bootstrap.min.css",
        "vendor/bootstrap-theme.min.css",
        "vendor/froala_content.min.css",
        "vendor/froala_style.min.css",
        "vendor/app.css"
    ], 'public/css/all.css','public/css');
});
