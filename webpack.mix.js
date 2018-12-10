let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
   // .sass('resources/assets/sass/app.scss', 'public/css');
   mix.copy([
   			'node_modules/font-awesome/css/*.css',
			'node_modules/simple-line-icons/css/simple-line-icons.css',
			'resources/assets/css/*.css'
   			], 'public/css')
   .copy([
   			'node_modules/font-awesome/fonts/*',
			'node_modules/simple-line-icons/fonts/*'
   			], 'public/fonts')
   .js([
   			'resources/assets/js/app.js'
   			], 'public/js')
   .copy([
   			'resources/assets/js/views/*.js'
   			], 'public/js/views')
   .copy([
   			'resources/assets/img/favicon.png',
   			'resources/assets/img/logo.png',
   			'resources/assets/img/logo-symbol.png'
   			], 'public/img')
   .copy([
   			'resources/assets/img/avatars/*'
   			], 'public/img/avatars')
   .copy([
   			'resources/assets/img/flags/*'
   			], 'public/img/flags')
   .copy([
   			'node_modules/jquery/dist/jq*',
			'node_modules/popper.js/dist/umd/po*.js',
			'node_modules/bootstrap/dist/js/boo*.js',
			'node_modules/pace/pace.js',
			'node_modules/pace-progress/pac*.js',
			'node_modules/chart.js/dist/Ch*.js',
			// 'resources/assets/js/app.js',
   			// 'resources/assets/js/views/*.js'
   			], 'public/js/vendor')
   // .sass('resources/assets/sass/app.scss', 'public/css');
	.sass('resources/assets/sass/_custom.scss', 'public/css/app.css');