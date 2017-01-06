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

//AdminLTE
mix.styles([
    '../../../node_modules/bootstrap/dist/css/bootstrap.min.css',
    '../../../node_modules/font-awesome/css/font-awesome.min.css',
    '../../../node_modules/admin-lte/dist/css/AdminLTE.min.css',
    '../../../node_modules/admin-lte/dist/css/skins/skin-blue.min.css'
],'public/backend/css/all.min.css');
mix.scripts([
    '../../../node_modules/jquery/dist/jquery.min.js',
    '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
    '../../../node_modules/admin-lte/dist/js/app.min.js'
],'public/backend/js/all.min.js');

//fonts
mix.copy(
    'resources/assets/fonts', 'public/fonts'
);
mix.copy(
    'node_modules/font-awesome/fonts', 'public/fonts'
);
mix.copy(
    'node_modules/font-awesome/fonts', 'public/backend/fonts'
);
});
