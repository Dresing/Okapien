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
    mix.scripts([
        'main.js',
        'notifications.js',
        'modals/error.js',
        'ajax/post.js',
        'ajax/infiniteScroll.js',
        'ajax/get.js',
        'security/filters.js',
    ]);
    mix.less('app.less');
    mix.less('admin-lte/AdminLTE.less');
    mix.less('admin-lte/skins/skin-blue.less');
    mix.less('bootstrap/bootstrap.less');
});
