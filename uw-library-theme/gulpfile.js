// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    newer = require('gulp-newer'),
    svgstore = require('gulp-svgstore'),
    svgmin = require('gulp-svgmin'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr();



// Styles
gulp.task('styles', function() {
  return gulp.src('scss/master_1.scss')
    .pipe(sass({ style: 'expanded', }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('dist/styles'))
    .pipe(rename({ suffix: '.min-1042014' }))
    .pipe(minifycss())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/styles'))
    .pipe(notify({ message: 'Styles task complete' }));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src(['js/modernizr.custom.js','bower_components/jquery/dist/jquery.min.js','js/classie.js','js/uiprogressbutton.js','js/lightbox.js','js/lighboxinit.js','js/snap.svg-min.js','js/hovers.js','js/detectbrowser.js','js/jquery.fitvids.js','js/jquery.knob.js','js/main2.js'])
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(rename({ suffix: '.min-1042014' }))
    .pipe(uglify())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

// Debug Scripts
gulp.task('debug', function() {
  return gulp.src(['js/main2.js'])
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(notify({ message: 'Debug Scripts task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src('img/**/*')
    .pipe(imagemin({ progressive: true, svgoPlugins: [{removeViewBox: false}] }))
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/images'))
    .pipe(notify({ message: 'Images task complete' }));
});

//SVG Processing
gulp.task('svg', function () {
  return gulp.src('svg/*.svg')
             .pipe(svgmin([{
                  removeDoctype: true
              }, {
                  removeComments: true
              }]))
             .pipe(gulp.dest('dist/svg/'))
});



// Clean
gulp.task('clean', function() {
  return gulp.src(['dist/styles', 'dist/scripts', 'dist/images'], {read: false})
    .pipe(clean());
});

// Default task
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'debug', 'scripts', 'images');
});

// Watch
gulp.task('watch', function() {

  // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err)
    };

    // Watch .scss files
    gulp.watch('scss/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('js/**/*.js', ['scripts']);

    // Watch image files
    gulp.watch('img/**/*', ['images']);

    // Watch image files
    gulp.watch('svg/**/*', ['svg']);




  });

});
