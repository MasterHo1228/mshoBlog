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
    '../../../node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    '../../../node_modules/admin-lte/dist/css/AdminLTE.min.css',
    '../../../node_modules/admin-lte/dist/css/skins/skin-blue.min.css'
],'public/backend/css/all.min.css');
mix.scripts([
    '../../../node_modules/jquery/dist/jquery.min.js',
    '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
    '../../../node_modules/datatables.net/js/jquery.dataTables.js',
    '../../../node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
    '../../../node_modules/icheck/icheck.min.js',
    '../../../node_modules/admin-lte/dist/js/app.min.js'
],'public/backend/js/all.min.js');
mix.copy(
    'node_modules/icheck/skins', 'public/backend/skins'
);
mix.copy(
    'node_modules/datatables-bootstrap3-plugin/media/css/datatables-bootstrap3.css', 'public/backend/css'
);
mix.copy(
    'node_modules/datatables/media/js/jquery.dataTables.min.js', 'public/backend/js'
);
mix.copy(
    'node_modules/datatables-bootstrap3-plugin/media/js/datatables-bootstrap3.js', 'public/backend/js'
);

//fonts
mix.copy(
    'resources/assets/fonts', 'public/fonts'
);
mix.copy(
    'node_modules/bootstrap/fonts', 'public/backend/fonts'
);
mix.copy(
    'node_modules/font-awesome/fonts', 'public/fonts'
);
mix.copy(
    'node_modules/font-awesome/fonts', 'public/backend/fonts'
);
});
