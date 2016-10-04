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
    mix.sass('app.scss');

    mix.styles([
    	'../../../public/css/bootstrap.css',
    	'../../../public/css/animate.css',
    	'../../../public/css/font-awesome.css',
    	'../../../public/css/nexus.css',
    	'../../../public/css/custom.css',
    	'../../../public/css/master.css',
    	'../../../public/css/welcome-2.css'
    ]);

    mix.scripts([
    	'../../../public/js/jquery.min.js',
    	'../../../public/js/bootstrap.min.js',
    	'../../../public/js/scripts.js',
    	'../../../public/js/jquery.isotope.js',
    	'../../../public/js/jquery.slicknav.js',
    	'../../../public/js/jquery.visible.js',
    	'../../../public/js/slimbox2.js',
    	'../../../public/js/modernizr.custom.js',
        '../../../public/js/master.js'
    ]);
});
