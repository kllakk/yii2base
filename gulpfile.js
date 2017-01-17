'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('hello', function() {
    console.log('hello gulp');
});

gulp.task('sass', function () {
    return gulp.src('./web/css/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./web/css/'));
});

gulp.task('autoprefixer', function () {
    var postcss      = require('gulp-postcss');
    var sourcemaps   = require('gulp-sourcemaps');
    var autoprefixer = require('autoprefixer');

    return gulp.src('./web/css/*.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }) ]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./web/css/'));
});

gulp.task('watch', function () {
    gulp.watch('./web/css/scss/**/*.scss', ['sass']);
    gulp.watch('./web/css/*.css', ['autoprefixer']);
});