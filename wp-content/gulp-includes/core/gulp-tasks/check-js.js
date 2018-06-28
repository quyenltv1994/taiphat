/*
 * @file
 *
 * - gulp check-js
 *
 * Checks JavaScript syntax.
 *
 */

const jshint = require('gulp-jshint'),
    pump = require('pump'),
    config = require('../../gulp-configuration.js'),
    gulp = require('gulp'),
    upath = require('upath'),
    rls = require('remove-leading-slash'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    gulpif = require('gulp-if'),
    os = require('os'),
    log = require('fancy-log');

module.exports = function () {
    pump([
        gulp.src(rls(upath.join(rls(config.generateJs.src_path), '*.js'))),
        gulpif(os.platform() === 'win32', plumber()),
        gulpif(os.platform() != 'win32', plumber(
            {
                errorHandler: function (err) {
                    var title = '## JavaScript compilation Error ##';
                    log.error(title);
                    log.error(err.message);
                }
            }
        )),
        jshint(),
        gulpif(os.platform() === 'win32', notify(function (file) {
            if (file.jshint.success) {
                return false;
            }
            log.error('## JavaScript compilation Error ##');
            var errors = file.jshint.results.map(function (data) {
                if (data.error) {
                    return "(Ligne " + data.error.line + ') ' + data.error.reason;
                }
            }).join("\n");
            return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
        })),
        plumber.stop()
    ]);
};