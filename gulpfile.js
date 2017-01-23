const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

    // Merge all Student CSS files in one file.
    mix.less([
        './resources/assets/plugins/bootstrap-3.3.7/less/bootstrap.less',
        './resources/assets/plugins/font-awesome-4.7.0/less/font-awesome.less',
        './resources/assets/plugins/ionicons-2.0.1/less/ionicons.less',
        './resources/assets/plugins/iCheck/square/blue.css',
        './resources/assets/plugins/select2-4.0.3/dist/css/select2.min.css',
        './resources/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css',

        './resources/assets/less/app.less',

    ], './public/css/app.css');

    // Copy fonts to public.
    mix.copy('./resources/assets/plugins/bootstrap-3.3.7/dist/fonts', './public/fonts');
    mix.copy('./resources/assets/plugins/font-awesome-4.7.0/fonts', './public/fonts');
    mix.copy('./resources/assets/plugins/ionicons-2.0.1/fonts', './public/fonts');


    // Merge all APP JS files in one file.
    mix.webpack([
        './resources/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',

        './resources/assets/plugins/select2-4.0.3/dist/js/select2.full.min.js',

        'teacher.js',

    ], './public/js/teacher.js');


    // Merge all APP JS files in one file.
    mix.webpack([
        'teacher.js',

    ], './public/js/student.js');

    // Merge all APP JS files in one file.
    mix.webpack([
        'app.js',

    ], './public/js/app.js');
});