"use strict";

var gulp       = require('gulp'),
    prefix     = require('gulp-autoprefixer'),
    livereload = require('gulp-livereload'),
    connect    = require('gulp-connect'),
    sass       = require('gulp-sass'),
    wiredep    = require('wiredep').stream,
    useref     = require('gulp-useref'),
    gulpif     = require('gulp-if'),
    uglify     = require('gulp-uglify'),
    minifyCss  = require('gulp-minify-css'),
    clean      = require('gulp-clean'),
    gutil      = require( 'gulp-util' ),
    ftp        = require( 'vinyl-ftp' );


//server connect
gulp.task('connect', function() {
    connect.server({
        root: 'app',
        livereload: true
    });
});


//sass
gulp.task('sass', function () {
    gulp.src('app/sass/*.sass')
        .pipe(sass())
        .pipe(prefix('last 2 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('app/css/'))
        .pipe(connect.reload());
});


// html
gulp.task('html', function () {
    gulp.src('app/index.html')
    .pipe(connect.reload());
    })


//bower
gulp.task('bower', function () {
  gulp.src('app/index.html')
    .pipe(wiredep({
      directory : "app/components/"
    }))
    .pipe(gulp.dest('app/'));
});

//clean
gulp.task('clean', function () {
    return gulp.src('build/', {read: false})
        .pipe(clean());
    });

//build
gulp.task('build', ['clean'], function () {
    var assets = useref.assets();

    return gulp.src('app/*.html')
        .pipe(assets)
        .pipe(gulpif('*.js', uglify()))
        .pipe(gulpif('*.css', minifyCss()))
        .pipe(assets.restore())
        .pipe(useref())
        .pipe(gulp.dest('build'));
});

//bower
gulp.task('bower', function () {
  gulp.src('app/index.html')
    .pipe(wiredep({
      directory : "app/components/"
    }))
    .pipe(gulp.dest('app/'));
});


// watch
gulp.task('watch', function () {
    gulp.watch('app/sass/*.sass', ['sass'])
    gulp.watch('app/*.html', ['html'])
    gulp.watch('bower.json', ['bower'])
})

// default
gulp.task('default', ['connect', 'html', 'sass', 'watch']);