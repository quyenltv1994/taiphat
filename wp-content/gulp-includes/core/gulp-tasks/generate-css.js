/*
 * @file
 *
 * - gulp generate-css [--dev]
 *
 * Disable px to rem conversion, build sourcemaps.
 *
 */

const pump = require('pump'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass'),
    autoprefixer = require('autoprefixer'),
    postcss = require('gulp-postcss'),
    cssnano = require('cssnano'),
    pxtorem = require('postcss-pxtorem'),
    flexbugsFixes = require('postcss-flexbugs-fixes'),
    config = require('../../gulp-configuration.js'),
    gulp = require('gulp'),
    upath = require('upath'),
    rls = require('remove-leading-slash'),
    gulpif = require('gulp-if'),
    path = require('path'),
    sassGlob = require('gulp-sass-glob'),
    glob = require("glob"),
    argv = require('minimist')(process.argv.slice(2)),
    del = require('del'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    os = require('os'),
    browserSync = require('browser-sync').create(),
    chmod = require('gulp-chmod'),
    log = require('fancy-log');

module.exports = function () {

    config.generateCss.src = [];
    var cssFiles = glob.sync(rls(upath.join(rls(config.generateCss.src_path), '*.scss')));
    cssFiles.forEach(function (file) {
        config.generateCss.src.push(file);
    });

    var plugins = [
        flexbugsFixes(),
        autoprefixer(
            {
                browsers: ['last 6 versions'],
                cascade: false
            }
        )
    ];

    if (!argv.dev) {
        plugins.push(pxtorem(
            {
                rootValue: 16,
                propList: ['*'],
                replace: true,
                mediaQuery: false
            },
            {
                map: true
            }
        ));
    }


    var nano_plugin = [
        cssnano(
            {
                discardUnused: true,
                mergeIdents: true,
                reduceIdents: false,
                zindex: false,
                discardComments: {removeAll: true}
            }
        )
    ];

    config.generateCss.src.forEach(function (file) {
        var filename = path.basename(file);
        if (!argv.dev) {
            del([
                rls(upath.join(rls(config.generateCss.output_path), filename.replace('.scss', '') + '.css.map'))
            ]);
        }
        pump([
                gulp.src(rls(upath.join(rls(config.generateCss.src_path), filename))),
                plumber({
                    errorHandler: function (err) {
                        var title = '## SASS compilation error ##';
                        if (os.platform() === 'win32') {
                            notify.onError(
                                {
                                    title: title,
                                    message: err.message
                                }
                            )(err);
                        } else {
                            log.error(title);
                            log.error(err.message);
                        }
                    }
                }),
                gulpif(argv.dev, sourcemaps.init({largeFile: true})),
                sassGlob(),
                gulpif(
                    argv.dev,
                    sass(
                        {
                            file: rls(upath.join(rls(config.generateCss.src_path), filename)),
                            sourceMap: rls(upath.join(rls(config.generateCss.output_path), filename.replace('.scss', '') + '.css.map'))
                        }
                    )
                ),
                gulpif(
                    !argv.dev,
                    sass(
                        {
                            file: rls(upath.join(rls(config.generateCss.src_path), filename))
                        }
                    )
                ),
                concat(filename.replace('.scss', '') + '.css'),
                postcss(plugins),
                postcss(nano_plugin),
                gulpif(argv.dev, sourcemaps.write('./', {
                    sourceRoot: path.relative(
                        rls(config.generateCss.output_path),
                        rls(config.generateCss.src_path)
                    )
                })),
                gulpif((argv.dev && argv.reload && config.generateHtml.enable), browserSync.stream({match: '**/*.css'})),
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
                gulp.dest(rls(config.generateCss.output_path))
            ]
        );
    });

};