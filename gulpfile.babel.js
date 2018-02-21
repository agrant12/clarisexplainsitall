'use strict';

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	uglify = require('gulp-uglify'),
	jshint = require('gulp-jshint'),
	cssnano = require('gulp-cssnano'),
	babel = require('gulp-babel'),
	concat = require('gulp-concat'),
	cmq = require('gulp-combine-mq'),
	rename = require('gulp-rename'),
	add = require('gulp-add-src');

var dirs = {
	src:    './_src/',
	build:  './public'
},

styles = {
	src:    '${dirs.src}/sass',
	build:  './public/css'
},

scripts = {
	src:    '${dirs.src}/scripts',
	build:  './public/js'
};

/*
 *  CSS task
 */
 gulp.task('styles', function () {

	console.log('starting task: [styles]');

	gulp.src('./_src/sass/app.scss')
	.pipe(sass({errLogToConsole: true}))
	.pipe(cmq({
        beautify: false
    }))
    .pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(gulp.dest(styles.build))
	.pipe(concat('app.css'))
	.pipe(rename({ suffix: '.min' }))
	.pipe(gulp.dest(styles.build));
});

/*
 *  JS task
 */
 gulp.task('scripts',function(){

	console.log('starting task: [scripts]');
	
	// Custom JS
	gulp.src([
		'./_src/scripts/app.js'
		])
	.pipe(babel({presets: ['es2016']}))
	.pipe(concat('app.js'))
	.pipe(gulp.dest(scripts.build))
	.pipe(concat('app.js'))
	.pipe(rename({ suffix: '.min' }))
	.pipe(gulp.dest(scripts.build));
});

/*
 *  WATCH tasks to serve up
 */
 gulp.task('watch', ['styles', 'scripts'], function() {
	gulp.watch('${styles.src}/**/*.scss', ['styles']);
	gulp.watch('${scripts.src}/**/*.js', ['scripts']);
});

/*
 *  DEFAULT tasks to serve up
 */
 gulp.task('default', ['styles', 'scripts', 'templates']);

