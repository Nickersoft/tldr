var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('semantic/dist/semantic.css', 'resources/assets/css')
    mix.sass('custom.scss', 'resources/assets/css');
    mix.styles([
        'semantic.css',
        'custom.css'
    ]);
});
