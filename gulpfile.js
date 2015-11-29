'use strict';

var gulp = require('gulp');
var gutil = require("gulp-util"); // Util
var plumber = require('gulp-plumber'); // Prevent stopping watch
var concat = require('gulp-concat');  //  concatinate files
var rename = require("gulp-rename");  // rename

var compass = require('gulp-compass'); // Sass compiler
var autoprefixer = require('gulp-autoprefixer'); // Add vendor prefix
var csscomb = require('gulp-csscomb'); // Format CSS
var minifyCss = require('gulp-minify-css'); // Minify CSS

var coffee = require('gulp-coffee');  // Coffee compiler
var uglify = require('gulp-uglify');  // Uglify

var path = {
  root_dir: __dirname,
  css_dir: 'web/css',
  js_dir: 'web/js',
  img_dir: 'web/assets',
  sass_dir: 'web/scss',
  sass: 'web/scss/*.scss',
  coffee: 'web/coffee/*.coffee'
}

// Compile sass
gulp.task('compass', function(){
  gulp.src(path.sass)
    .pipe(plumber())
    .pipe(compass({
      project: path.root_dir,
      sass: path.sass_dir,
      css: path.css_dir
    }))
    .pipe(concat('style.css'))
    // .pipe(autoprefixer('last 2 version', 'ie 8', 'ie 7'))
    // .pipe(csscomb())
    // .pipe(gulp.dest(path.css_dir))
    // .pipe(minifyCss({
    //   keepSpecialComments: 0
    // }))
    .pipe(rename({extname: '.min.css'}))
    .pipe(gulp.dest(path.css_dir))
});

// Complile coffee
gulp.task('coffee', function(){
  gulp.src(path.coffee)
  .pipe(plumber())
  .pipe(coffee({bare: true})
    .on("error", gutil.log.bind(gutil, "Coffee Error"))
  )
  .pipe(concat("application.js"))
  .pipe(gulp.dest(path.js_dir))
  .pipe(uglify())
  .pipe(rename({extname: '.min.js'}))
  .pipe(gulp.dest(path.js_dir))
});

// Watch coffee and sass files
gulp.task('watch', function() {
  gulp.watch(path.sass, ['compass']);
  // gulp.watch(path.coffee, ['coffee']);
});

gulp.task('default', ['compass'/*,'coffee'*/,'watch']);
