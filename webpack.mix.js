let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

// mix.js('src/app.js', 'dist/')
//    .sass('src/app.scss', 'dist/');

// Full API
// mix.js(src, output);
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.less(src, output);
// mix.combine(files, destination);
// mix.copy(from, to);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

//backend
mix.combine([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    'node_modules/selectize/dist/css/selectize.bootstrap3.css',
    'node_modules/admin-lte/dist/css/AdminLTE.min.css',
    'node_modules/admin-lte/dist/css/skins/skin-blue.min.css'
], 'public/backend/css/all.css');

mix.js('resources/assets/backend/js/all.js', 'public/backend/js/all.js');

mix.copy(
    'node_modules/icheck/skins', 'public/backend/skins'
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