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
        .webpack('app.js')
        // .scripts('notification.js')
        .webpack('partnerApp.js')
        .webpack('layoutPartner.js')
        .sass('homes/welcome.scss', 'public/css/homes/');
    mix.copy('resources/assets/bowers/wow/dist/wow.min.js', 'public/bowers/wow/wow.min.js');
    mix.copy('resources/assets/plugins/templateEditor', 'public/templateEditor');
       mix.sass('admins/style.scss', 'public/css/admins/style.css')
       .copy('resources/assets/bowers/bootstrap/', 'public/bowers/bootstrap/');
    mix.copy('resources/assets/bowers/font-awesome/css/font-awesome.min.css', 'public/bowers/font-awesome/css/font-awesome.min.css');
    mix.copy('resources/assets/bowers/font-awesome/fonts/', 'public/bowers/font-awesome/fonts/')
        .sass('homes/index.scss', 'public/css/homes/index.css');
    mix.sass('partners/style.scss', 'public/css/partners/style.css');
    mix.sass('homes/myWorld.scss', 'public/css/homes/myWorld.css');
    mix.copy('resources/assets/sass/homes/article', 'public/css/homes/article');
    mix.copy('resources/assets/sass/homes/fonts', 'public/css/homes/fonts');
    mix.webpack('helpers/*.js', 'public/js/helpers/helpers.js');
    mix.webpack('layoutAdmin.js');
});
