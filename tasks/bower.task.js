var gulp = require('gulp')
var mainBowerFiles = require('main-bower-files')
var filter = require('gulp-filter')
var notify = require('gulp-notify')
var cssnano = require('gulp-cssnano')
var uglify = require('gulp-uglify')
var concat_sm = require('gulp-concat-sourcemap')
var concat = require('gulp-concat')
var gulpIf = require('gulp-if')
var Elixir = require('laravel-elixir')
var Task = Elixir.Task

Elixir.extend('bower', function (jsOutputFile, jsOutputFolder, cssOutputFile, cssOutputFolder) {
  var cssFile = cssOutputFile || 'vendor.css'
  var jsFile = jsOutputFile || 'vendor.js'

  if (!Elixir.config.production) {
    concat = concat_sm
  }

  var onError = function (err) {
    notify.onError({
      title: 'Laravel Elixir',
      subtitle: 'Bower Files Compilation Failed!',
      message: 'Error: <%= error.message %>',
      icon: __dirname + '/../node_modules/laravel-elixir/icons/fail.png'
    })(err)
    this.emit('end')
  }

  new Task('bower-js', function () {
    return gulp.src(mainBowerFiles({
      overrides: {
        bootstrap: {
          main: [
            './dist/js/bootstrap.min.js'
          ]
        },
        AdminLTE: {
          main: [
          './plugins/fastclick/fastclick.min.js',
          './dist/js/app.min.js',
          './plugins/sparkline/jquery.sparkline.min.js',
          './plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
          './plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
          './plugins/slimScroll/jquery.slimscroll.min.js',
          './plugins/iCheck/icheck.min.js',
          './plugins/chartjs/Chart.min.js',
          './dist/js/pages/dashboard2.js',
          './dist/js/demo.js'
          ]
        },
        jquery: {
          main: [
            './dist/jquery.js'
          ]
        }
      }
    }))
      .on('error', onError)
      .pipe(filter('**/*.js'))
      .pipe(concat(jsFile, {sourcesContent: true}))
      .pipe(gulpIf(Elixir.config.production, uglify()))
      .pipe(gulp.dest(jsOutputFolder || Elixir.config.js.outputFolder))
      .pipe(notify({
        title: 'Laravel Elixir',
        subtitle: 'Javascript Bower Files Imported!',
        icon: __dirname + '/../node_modules/laravel-elixir/icons/laravel.png',
        message: ' '
      }))
  }).watch('bower.json')

  new Task('bower-css', function () {
    return gulp.src(mainBowerFiles({
      overrides: {
        AdminLTE: {
          main: [
            './dist/css/*.min.css',
            './plugins/jvectormap/jquery-jvectormap-1.2.2.css',
            './dist/css/skins/' + Elixir.config.css.lteSkin,
          ]
        },
        bootstrap: {
          main: [
            './dist/css/bootstrap.min.css',
            './dist/css/bootstrap-theme.min.css'
          ]
        },
        'font-awesome': {
          main: [
            './css/font-awesome.min.css'
          ]
        },
        'bootstrap-social': {
          main: [
            './bootstrap-social.css'
          ]
        },
        'angular-chart.js': {
          'ignore': true
        },
        'angular-datatables': {
          'ignore': true
        },
        'angular-bootstrap': {
          'ignore': true
        }
      }
    }))
      .on('error', onError)
      .pipe(filter('**/*.css'))
      .pipe(concat(cssFile))
      .pipe(gulpIf(config.production, cssnano({safe: true})))
      .pipe(gulp.dest(cssOutputFolder || config.css.outputFolder))
      .pipe(notify({
        title: 'Laravel Elixir',
        subtitle: 'CSS Bower Files Imported!',
        icon: __dirname + '/../node_modules/laravel-elixir/icons/laravel.png',
        message: ' '
      }))
  }).watch('bower.json')

  new Task('bower-fonts', function () {
    return gulp.src(mainBowerFiles({
      overrides: {
        bootstrap: {
          main: [
            './dist/fonts/*.*'
          ]
        },
        'font-awesome': {
          main: [
            './fonts/*.*'
          ]
        }
      }
    }))
      .pipe(filter('**/*.{eot,svg,ttf,woff,woff2}'))
      .pipe(gulp.dest(config.fonts.outputFolder))
  }).watch('bower.json')
})
