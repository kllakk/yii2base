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

gulp.task('sass:watch', function () {
    gulp.watch('./web/css/scss/**/*.scss', ['sass']);
});