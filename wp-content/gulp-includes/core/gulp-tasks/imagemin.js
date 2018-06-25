/*
 * @file
 *
 * - gulp imagemin
 *
 * Optimise .jpg .jpeg .png .gif .svg images.
 *
 */

const pump = require('pump'),
    imagemin = require('gulp-imagemin'),
    config = require('../../gulp-configuration.js'),
    gulp = require('gulp'),
    upath = require('upath'),
    plumber = require('gulp-plumber'),
    chmod = require('gulp-chmod'),
    rls = require('remove-leading-slash');

module.exports = function (done) {
    pump([
             gulp.src([
                          rls(upath.join(rls(config.generateImages.folder), '**', '*.gif')),
                          rls(upath.join(rls(config.generateImages.folder), '**', '*.png')),
                          rls(upath.join(rls(config.generateImages.folder), '**', '*.jpg')),
                          rls(upath.join(rls(config.generateImages.folder), '**', '*.jpeg')),
                          rls(upath.join(rls(config.generateImages.folder), '**', '*.svg'))
                      ]),
             plumber(),
             imagemin([
                          imagemin.gifsicle({ interlaced : true, optimizationLevel : 3 }),
                          imagemin.jpegtran({ progressive : false }),
                          imagemin.optipng({ optimizationLevel : 7 }),
                          imagemin.svgo({ plugins : [{ removeViewBox : false }, { removeUselessStrokeAndFill : false }] })
                      ]),
             chmod(
                 {
                     owner : {
                         read : true,
                         write : true,
                         execute : true
                     },
                     group : {
                         read : true,
                         write : false,
                         execute : true
                     },
                     others : {
                         read : true,
                         write : false,
                         execute : true
                     }
                 }
             ),
             plumber.stop(),
             gulp.dest(rls(config.generateImages.folder))
         ], function () {
        done();
    });
};