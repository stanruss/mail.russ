var gulp         = require('gulp');
var	rename       = require('gulp-rename');
var	postcss      = require('gulp-postcss');
var	assets       = require('postcss-assets');
var	nested       = require('postcss-nested');
var	short        = require('postcss-short');
var	cssnano      = require('gulp-cssnano');
var	cssnext      = require('postcss-cssnext');
var	autoprefixer = require('gulp-autoprefixer');
var	sass         = require('gulp-sass');
var notify       = require('gulp-notify');
var browserSync  = require('browser-sync');

gulp.task('browser-sync', function() {
	browserSync({
		proxy: 
		"mail.russ",
		notify: false
	
	});
});
gulp.task('sass', function() {
		var processors = [
			short,
			nested,
			cssnext,
			assets({
				loadPaths: ['app/'],
				relativeTo: 'app/css/'
			})
		];
	return gulp.src('app/sass/**/*.sass')
	.pipe(sass().on("error", notify.onError()))
	.pipe(postcss(processors))
	.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(autoprefixer({
    browsers: ['last 12 versions'],
    cascade: false
    }))
	.pipe(cssnano())
	.pipe(gulp.dest('app/css'))
	.pipe(browserSync.reload({stream: true}));
});
gulp.task('watch', ['sass', 'browser-sync'], function() {
	gulp.watch('app/sass/**/*.sass', ['sass']);
	gulp.watch(['app/**/*.js', 'app/js/common.js'], ['scripts']);
	gulp.watch('app/*.php', browserSync.reload);
});
gulp.task('default', ['watch', 'sass']);
