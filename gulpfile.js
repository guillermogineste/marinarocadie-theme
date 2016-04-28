// Load plugins
var gulp = require('gulp'),
  	plugins = require('gulp-load-plugins')({ camelize: true });
var gutil = require('gulp-util');
// Styles
gulp.task('styles', function() {
  return gulp.src('assets/styles/*.scss')
  .pipe(plugins.sourcemaps.init())
  .pipe(plugins.sass.sync({
    outputStyle: 'expanded',
    precision: 10,
    includePaths: ['.']
  }).on('error', plugins.sass.logError))
  .pipe(plugins.autoprefixer('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
  .pipe(plugins.sourcemaps.write())
  .pipe(gulp.dest('assets/styles/build'))
  .pipe(plugins.cleanCss({ keepSpecialComments: 1 }))
  .pipe(plugins.livereload())
  .pipe(gulp.dest('./'))
  .pipe(plugins.notify({ message: 'Styles task complete' }));
});

// Vendor Plugin Scripts
gulp.task('plugins', function() {
  return gulp.src(['assets/js/source/plugins.js', 'assets/js/vendor/*.js'])
	.pipe(plugins.concat('plugins.js'))
	.pipe(gulp.dest('assets/js/build'))
	.pipe(plugins.rename({ suffix: '.min' }))
	.pipe(plugins.uglify())
	.pipe(plugins.livereload())
	.pipe(gulp.dest('assets/js'))
	.pipe(plugins.notify({ message: 'Scripts task complete' }));
});

// Site Scripts
gulp.task('scripts', function() {
  return gulp.src(['assets/js/source/*.js', '!assets/js/source/plugins.js'])
	.pipe(plugins.jshint('.jshintrc'))
	.pipe(plugins.jshint.reporter('default'))
	.pipe(plugins.concat('main.js'))
	.pipe(gulp.dest('assets/js/build'))
	.pipe(plugins.rename({ suffix: '.min' }))
	// .pipe(plugins.uglify().on('error', gutil.log))
  .pipe(plugins.uglify().on('error', function(e) { console.log('\x07',e.message); return this.end(); }))
	.pipe(plugins.livereload())
	.pipe(gulp.dest('assets/js'))
	.pipe(plugins.notify({ message: 'Scripts task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src('assets/images/**/*')
	.pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })))
	.pipe(plugins.livereload())
	.pipe(gulp.dest('assets/images'))
	.pipe(plugins.notify({ message: 'Images task complete' }));
});

// Watch
gulp.task('watch', function() {

  plugins.livereload.listen();

	// Watch .scss files
	gulp.watch('assets/styles/**/*.scss', ['styles']);

	// Watch .js files
	gulp.watch('assets/js/**/*.js', ['plugins', 'scripts']);

	// Watch image files
	gulp.watch('assets/images/**/*', ['images']);

});

// Default task
gulp.task('default', ['styles', 'plugins', 'scripts', 'images', 'watch']);
