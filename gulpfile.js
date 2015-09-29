var gulp = require('gulp');
var bower = require('gulp-bower');
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

gulp.task('clean',function(){
  return del(['build']);
});

gulp.task('bower', function(){
  return bower();
});

var paths = {
  'jquery' : 'vendor/jquery/dist',
  'bootstrap' : 'vendor/bootstrap/dist',
  'bootstrap_material_design' : 'vendor/bootstrap-material-design/dist',
  'dropzone' : 'vendor/dropzone/dist'
};

// Compile Without Source Maps
elixir.config.sourcemaps = false;

elixir(function(mix) {
  // Run bower install
  mix.task('bower');

  // Copy fonts straight to public
  mix.copy('resources/' + paths.bootstrap + '/fonts/bootstrap/**','public/fonts');
  mix.copy('resources/' + paths.bootstrap_material_design + '/fonts/**','public/fonts');

  // Copy images straight to public

  // Merge Site scripts
  mix.scripts([
    '../../' + paths.jquery + '/jquery.js',
    '../../' + paths.bootstrap + '/js/bootstrap.js',
    '../../' + paths.bootstrap_material_design + '/js/material.js',
    '../../' + paths.bootstrap_material_design + '/js/ripples.js',
    '../../' + paths.dropzone + '/dropzone.js',
  ], 'public/js/site.js');

  // Merge Site css
  mix.styles([
    '../../' + paths.bootstrap + '/css/bootstrap.css',
    '../../' + paths.bootstrap_material_design + '/css/material.css',
    '../../' + paths.bootstrap_material_design + '/css/ripples.css',
    '../../' + paths.bootstrap_material_design + '/css/roboto.css',
    '../../' + paths.dropzone + '/dropzone.css'
  ], 'public/css/site.css');

  // version
  mix.version(["public/css/site.css","public/js/site.js"]);
});
