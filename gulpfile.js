'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var sourcemaps   = require('gulp-sourcemaps');

gulp.task('hello', function() {
    console.log('hello gulp');
});

gulp.task('css', function () {
    var processors = [
        autoprefixer,
        cssnano
    ];

    return gulp.src('./web/css/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.init())
        .pipe(postcss(processors))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./web/css/'));
});

gulp.task('watch', function () {
    gulp.watch('./web/css/scss/**/*.scss', ['css']);
});