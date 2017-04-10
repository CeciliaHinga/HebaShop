var elixir = require('laravel-elixir')

require('laravel-elixir-eslint');

require('./tasks/swPrecache.task.js');
require('./tasks/concatScripts.task.js')
require('laravel-elixir-karma')
require('./tasks/bower.task.js')

if (!elixir.config.production) {
  require('./tasks/phpcs.task.js')
}

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

elixir(function (mix) { 

  var jsOutputFolder = config.js.outputFolder
  var cssOutputFolder = config.css.outputFolder
  var fontsOutputFolder = config.fonts.outputFolder
  var buildPath = config.buildPath

  var assets = [
      'public/js/final.js',
      'public/css/final.css'
    ],
    scripts = [
      './public/js/vendor.js',
      './public/js/app.js',
      './public/dist/js/app.js'
    ],
    styles = [
      './public/css/vendor.css',
      './public/css/mystyles.css'
    ],
    karmaJsDir = [
      jsOutputFolder + '/vendor.js',
      jsOutputFolder + '/app.js',
  ]

    mix
    .bower()
    .concatScripts(scripts, 'final.js')
    .styles(styles, './public/css/final.css')
    .version(assets)
    .swPrecache()
    .browserSync({
      proxy: 'localhost:8000'
    })
    .karma({
      jsDir: karmaJsDir
    })

  mix
    .copy(fontsOutputFolder, buildPath + '/fonts')
})
