'use strict';

(function(module) {

  var options = {
    // Build options
    sourcePath: './src',
    assetOutputPath: './',
    jsFiles: [
      './src/vendor/jquery/dist/jquery.min.js',
      './src/vendor/modernizr/modernizr.js',
      './src/vendor/lodash/lodash.min.js',
      './src/js/*.js'
    ],

    // SASS options
    sass: {
      sourcemap: true,
      style: 'expanded'
    }
  };

  module.exports = options;

})(module);
