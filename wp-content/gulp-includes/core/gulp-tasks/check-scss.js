/*
 * @file
 *
 * - gulp check-scss
 *
 * Checks SCSS syntax.
 *
 */

const pump = require('pump'),
    gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    notify = require('gulp-notify'),
    config = require('../../gulp-configuration.js'),
    rls = require('remove-leading-slash'),
    sassLint = require('gulp-sass-lint'),
    upath = require('upath'),
    os = require('os'),
    log = require('fancy-log');

module.exports = function () {
    pump([
        gulp.src(rls(upath.join(rls(config.generateCss.src_path), '**', '*.scss'))),
        plumber({
            errorHandler: function (err) {
                var title = '## Non-compliant CSS code ##';
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
        sassLint({
            rules: {
                'no-duplicate-properties': 1,
                'no-empty-rulesets': 1,
                'border-zero': [1, {'convention': '0'}],
                'no-invalid-hex': 1,
                'no-misspelled-properties': 1,
                'quotes': [1, {'style': 'single'}],
                'trailing-semicolon': [1, {'include': true}],
                'zero-unit': [1, {'include': false}],
                'url-quotes': 1,
                'shorthand-values': 1,
                'attribute-quotes': 0,
                'bem-depth': 0,
                'brace-style': 0,
                'class-name-format': 0,
                'no-vendor-prefixes': 0,
                'clean-import-paths': 0,
                'declarations-before-nesting': 0,
                'empty-args': 0,
                'empty-line-between-blocks': 0,
                'extends-before-declarations': 0,
                'extends-before-mixins': 0,
                'final-newline': 0,
                'force-attribute-nesting': 0,
                'force-element-nesting': 0,
                'force-pseudo-nesting': 0,
                'function-name-format': 0,
                'hex-length': 0,
                'hex-notation': 0,
                'id-name-format': 0,
                'indentation': 0,
                'leading-zero': 0,
                'max-file-line-count': 0,
                'max-line-length': 0,
                'mixin-name-format': 0,
                'mixins-before-declarations': 0,
                'nesting-depth': 0,
                'no-attribute-selectors': 0,
                'no-color-hex': 0,
                'no-color-keywords': 0,
                'no-color-literals': 0,
                'no-combinators': 0,
                'no-css-comments': 0,
                'no-debug': 0,
                'no-disallowed-properties': 0,
                'no-extends': 0,
                'no-ids': 0,
                'no-important': 0,
                'no-mergeable-selectors': 0,
                'no-qualifying-elements': 0,
                'no-trailing-whitespace': 0,
                'no-trailing-zero': 0,
                'no-transition-all': 0,
                'no-universal-selectors': 0,
                'no-url-domains': 0,
                'no-url-protocols': 0,
                'no-warn': 0,
                'one-declaration-per-line': 0,
                'placeholder-in-extend': 0,
                'placeholder-name-format': 0,
                'property-sort-order': 0,
                'property-units': 0,
                'pseudo-element': 0,
                'single-line-per-selector': 0,
                'space-after-bang': 0,
                'space-after-colon': 0,
                'space-after-comma': 0,
                'space-around-operator': 0,
                'space-before-bang': 0,
                'space-before-brace': 0,
                'space-before-colon': 0,
                'space-between-parens': 0,
                'variable-for-property': 0,
                'variable-name-format': 0
            }
        }),
        sassLint.format(),
        sassLint.failOnError(),
        plumber.stop()
    ]);
};