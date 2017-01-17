'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('hello', function() {
    console.log('hello gulp');
});

gulp.task('sass', function () {
    return gulp.src('./web/css/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./web/css/'));
});

gulp.task('autoprefixer', function () {
    return gulp.src('./web/css/*.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./web/css/'));
});

gulp.task('watch', function () {
    gulp.watch('./web/css/scss/**/*.scss', ['sass']);
    gulp.watch('./web/css/*.css', ['autoprefixer']);
});