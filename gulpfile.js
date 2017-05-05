'use strict';

var gulp = require('gulp'),
  util = require('gulp-util'),
  gulpif = require('gulp-if'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  jscs = require('gulp-jscs'),
  sass = require('gulp-sass'),
  cssglobbing = require('gulp-css-globbing'),
  csso = require('gulp-csso'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer-core'),

  options = require('./config'),
  sourcePath = options.sourcePath,
  processors = [
    autoprefixer({
      browsers: ['last 2 versions', '> 1% in FI', 'ie 9']
    })
  ],

  isProd = Boolean(util.env.prod);

gulp.task('jscs', function() {
  return gulp.src(sourcePath + '/**/*.js')
    .pipe(jscs());
});

gulp.task('build:js', ['jscs'], function() {
  return gulp.src(options.jsFiles)
  .pipe(concat('scripts.js'))
  .pipe(gulpif(isProd, uglify()))
  .pipe(gulp.dest(options.assetOutputPath + '/js'));
});

gulp.task('build:css', function() {
  return gulp.src(sourcePath + '/style.scss')
    .pipe(sass(options.sass))
    .pipe(postcss(processors))
    .pipe(gulpif(isProd, csso()))
    .pipe(gulp.dest('.'));
});

gulp.task('watch', ['build:all'], function() {
  gulp.watch([
    sourcePath + '/*.scss',
    sourcePath + '/**/*.scss',
    '!' + sourcePath + '/vendor/**'
  ], ['build:css']);

  gulp.watch([
    sourcePath + '/*.js',
    sourcePath + '/**/*.js'
  ], ['build:js']);
});

gulp.task('build:all', [
  'build:css',
  'build:js'
]);

gulp.task('default', ['watch']);
