const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');

mix.styles([
    '../../../node_modules/bootstrap/dist/css/bootstrap.css',
    '../../../node_modules/font-awesome/css/font-awesome.css',
    '../../../bower_components/metisMenu/dist/metisMenu.css',
    '../../../bower_components/sb-admin-2/css/sb-admin-2.css'
],'public/css/backend.css');

mix.scripts([
    '../../../node_modules/jquery/dist/jquery.js',
    '../../../node_modules/bootstrap/dist/js/bootstrap.js',
    '../../../bower_components/metisMenu/dist/metisMenu.js',
    '../../../bower_components/sb-admin-2/js/sb-admin-2.js'
],'public/js/backend.js');

mix.copy(
    'resources/assets/fonts', 'public/fonts'
);

mix.copy(
    'node_modules/font-awesome/fonts', 'public/fonts'
);
});
