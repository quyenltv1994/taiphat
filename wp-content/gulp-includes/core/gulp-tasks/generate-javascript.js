/*
 * @file
 *
 * - gulp generate-javascript [--dev]
 *
 * Build JavaScript code.
 *
 */

const pump = require('pump'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    config = require('../../gulp-configuration.js'),
    gulp = require('gulp'),
    gulpif = require('gulp-if'),
    upath = require('upath'),
    rls = require('remove-leading-slash'),
    path = require('path'),
    argv = require('minimist')(process.argv.slice(2)),
    del = require('del'),
    modernizr = require("modernizr"),
    log = require('fancy-log'),
    os = require('os'),
    notify = require('gulp-notify'),
    gap = require('gulp-append-prepend'),
    browserSync = require('browser-sync').create(),
    chmod = require('gulp-chmod'),
    plumber = require('gulp-plumber');

config.generateJs.src.unshift(
    '/node_modules/jquery/dist/jquery.min.js'
    /*'/node_modules/jquery.resizeend/lib/jquery.resizeend.min.js',*/
    /*'gulp-includes/core/js/display.js' */
);

if (config.plugins.responsiveImage.enable) {
    config.generateJs.src.push(
        'gulp-includes/core/plugins/responsive-image/responsive-image.js'
    );
}

if (argv.dev) {
    config.generateJs.src.push(
        'gulp-includes/core/js/dev.js'
    );
}

config.generateJs.src.forEach(function (part, index, arr) {
    arr[index] = rls(arr[index]);
});

config.generateJs.src.push(rls(upath.join(rls(config.generateJs.src_path), '*.js')));

module.exports = function () {
    if (!argv.dev) {
        del([upath.join(rls(config.generateJs.output_path), config.generateJs.output_name + '.js.map')]);
    }
    var insertBefore = ' ';
    if (config.generateJs.modernizr['feature-detects'].length > 0) {
        var modernizr_options = [];
        if (config.generateJs.modernizr['add-classes-in-html-tag']) {
            modernizr_options = [
                "setClasses"
            ];
        }
        modernizr.build(
            {
                "minify": true,
                "options": modernizr_options,
                "feature-detects": config.generateJs.modernizr['feature-detects']
            }, function (modernizr_build) {
                insertBefore += modernizr_build;
                generateJavaScript(insertBefore);
            }
        );
    } else {
        generateJavaScript(insertBefore);
    }

    function generateJavaScript(insertBefore) {
        pump([
                gulp.src(config.generateJs.src),
                plumber(),
                gulpif(argv.dev, sourcemaps.init({largeFile: true})),
                concat(config.generateJs.output_name + '.js'),
                gap.prependText(insertBefore),
                gulpif(!argv.dev, uglify().on('error', function (err) {
                    var title = '## JavaScript compilation Error ##';
                    if (os.platform() === 'win32') {
                        notify.onError(
                            {
                                title: title,
                                message: err
                            }
                        )(err);
                    } else {
                        log.error(title);
                        log.error(err);
                    }
                })),
                gulpif(argv.dev, sourcemaps.write('./', {
                    sourceRoot: path.relative(
                        rls(config.generateJs.output_path),
                        rls(rls(config.generateJs.src_path))
                    )
                })),
                gulpif((argv.dev && argv.reload && config.generateHtml.enable), browserSync.stream({match: '**/*.js'})),
                chmod(
                    {
                        owner: {
                            read: true,
                            write: true,
                            execute: true
                        },
                        group: {
                            read: true,
                            write: false,
                            execute: true
                        },
                        others: {
                            read: true,
                            write: false,
                            execute: true
                        }
                    }
                ),
                plumber.stop(),
                gulp.dest(rls(config.generateJs.output_path))
            ]
        );
    }
};