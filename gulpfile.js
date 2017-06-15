'use strict';

var gulp = require('gulp'),
  gutil = require('gulp-util'),
  gulpif = require('gulp-if'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  jscs = require('gulp-jscs'),
  sass = require('gulp-sass'),
  csso = require('gulp-csso'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer-core'),

  options = require('./config'),
  sourcePath = options.sourcePath,
  processors = [
    autoprefixer({
      browsers: [
        'last 2 Chrome versions',
        'last 2 Firefox versions',
        'Explorer >= 10',
        'last 1 Edge versions',
        'last 3 iOS versions',
        'last 2 Safari versions',
        'last 2 ChromeAndroid versions',
        'Android >= 4.1'
      ]
    })
  ],

  isProd = Boolean(gutil.env.prod);

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
    .on('error', gutil.log)
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
