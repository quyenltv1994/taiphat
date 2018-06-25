/*
 * @file
 *
 * - gulp generate-html
 *
 * Build html templates.
 *
 */

const pump = require('pump'),
    htmlbeautify = require('gulp-html-beautify'),
    twig = require('gulp-twig'),
    glob = require("glob"),
    config = require('../../gulp-configuration.js'),
    gulp = require('gulp'),
    pathExists = require('path-exists'),
    upath = require('upath'),
    rls = require('remove-leading-slash'),
    plumber = require('gulp-plumber'),
    argv = require('minimist')(process.argv.slice(2)),
    browserSync = require('browser-sync').create(),
    gulpif = require('gulp-if'),
    chmod = require('gulp-chmod'),
    localeCode = require('locale-code'),
    path = require('path');

module.exports = function () {

    config.generateCss.src = [];
    var cssFiles = glob.sync(rls(upath.join(rls(config.generateCss.src_path), '*.scss')));
    cssFiles.forEach(function (file) {
        config.generateCss.src.push(file);
    });

    var preview_menu = '';
    var templatesfiles = glob.sync(rls(upath.join(rls(config.generateHtml.src), 'templates', '**', '*.twig')));
    var files = [];

    for (var i = 0; i < templatesfiles.length; i++) {
        var filename = templatesfiles[i].replace(/^.*[\\\/]/, '').replace('.twig', '.html');
        files.push(filename);
    }

    files.sort();

    for (var key in files) {
        preview_menu += '<li><a title="Accéder à la page ' + files[key] + '" href="' + files[key] + '">' + files[key] + '</a></li>';
    }

    var favicon_url = false;

    if (pathExists.sync(rls(config.generateFavicon.output))) {
        favicon_url = upath.normalize(path.relative(rls(config.generateHtml.output), rls(config.generateFavicon.output)));
        if (favicon_url.substr(favicon_url.length - 1) != '/') {
            favicon_url = favicon_url + '/';
        }
    }

    var img_url = upath.normalize(path.relative(rls(config.generateHtml.output), rls(config.generateImages.folder)));
    if (img_url.substr(img_url.length - 1) != '/') {
        img_url = img_url + '/';
    }

    var img_gulp_demo = upath.normalize(path.relative(rls(config.generateHtml.output), rls('gulp-includes/core/images')));
    if (img_gulp_demo.substr(img_gulp_demo.length - 1) != '/') {
        img_gulp_demo = img_gulp_demo + '/';
    }

    var css_Files = [];
    config.generateCss.src.forEach(function (file) {
        var filename = path.basename(file).replace('.scss', '');
        var finalurl = upath.normalize(path.relative(rls(config.generateHtml.output), rls(upath.join(rls(config.generateCss.output_path), filename + '.css'))));
        css_Files.push(
            {
                'name' : filename,
                'url' : finalurl
            }
        );
    });

    var jsUrl = false;
    if (config.generateJs.src.length) {
        jsUrl = {
            'url' : upath.normalize(path.relative(rls(config.generateHtml.output), rls(upath.join(rls(config.generateJs.output_path), config.generateJs.output_name + '.js')))),
            'filename' : config.generateJs.output_name + '.js'
        }
    }

    var functions = [];
    if (config.plugins.responsiveImage.enable) {
        functions.push(
            {
                name : 'responsiveImage',
                func : function (options) {
                    var tag = '<noscript class="gulp-responsiveimage" ';
                    if (options['src']) {
                        tag += 'data-src="' + options['src'] + '" ';
                    }
                    if (options['alt']) {
                        tag += 'data-alt="' + options['alt'] + '" ';
                    }
                    if (options['class']) {
                        tag += 'data-class="' + options['class'] + '" ';
                    }
                    if (options['id']) {
                        tag += 'data-id="' + options['id'] + '" ';
                    }
                    if (options['title']) {
                        tag += 'data-title="' + options['title'] + '" ';
                    }
                    if (options['src_2560']) {
                        tag += 'data-src-2560="' + options['src_2560'] + '" ';
                    }
                    if (options['src_1920']) {
                        tag += 'data-src-1920="' + options['src_1920'] + '" ';
                    }
                    if (options['src_1440']) {
                        tag += 'data-src-1440="' + options['src_1440'] + '" ';
                    }
                    if (options['src_1366']) {
                        tag += 'data-src-1366="' + options['src_1366'] + '" ';
                    }
                    if (options['src_1280']) {
                        tag += 'data-src-1280="' + options['src_1280'] + '" ';
                    }
                    if (options['src_1024']) {
                        tag += 'data-src-1024="' + options['src_1024'] + '" ';
                    }
                    if (options['src_768']) {
                        tag += 'data-src-768="' + options['src_768'] + '" ';
                    }
                    if (options['src_480']) {
                        tag += 'data-src-480="' + options['src_480'] + '" ';
                    }
                    if (options['src_320']) {
                        tag += 'data-src-320="' + options['src_320'] + '"';
                    }
                    tag += '><img ';
                    if (options['src']) {
                        tag += 'src="' + options['src'] + '" ';
                    }
                    if (options['alt']) {
                        tag += 'alt="' + options['alt'] + '" ';
                    }
                    if (options['class']) {
                        tag += 'class="' + options['class'] + '" ';
                    }
                    if (options['title']) {
                        tag += 'title="' + options['title'] + '" ';
                    }
                    if (options['id']) {
                        tag += 'id="' + options['id'] + '"';
                    }
                    tag += '/></noscript>';
                    return tag;
                }
            }
        );
    }

    pump([
             gulp.src([rls(upath.join(rls(config.generateHtml.src), 'templates', '**', '*.twig')), 'gulp-includes/core/index.twig']),
             plumber(),
             twig({
                      data : {
                          favicon_url : favicon_url,
                          css_files : css_Files,
                          js_url : jsUrl,
                          css_url : upath.normalize(path.relative(rls(config.generateHtml.output), rls(config.generateCss.output_path))),
                          preview_menu : preview_menu,
                          project_name : config.project_name,
                          img_url : img_url,
                          img_gulp_demo : img_gulp_demo,
                          lang_code : localeCode.getLanguageCode(config.project_lang),
                          favicon_color: config.generateFavicon.main_color
                      },
                      functions : functions
                  }),
             htmlbeautify(
                 {
                     useConfig : false,
                     indentSize : 2,
                     preserve_newlines : false
                 }
             ),
             gulpif((argv.dev && argv.reload), browserSync.stream({ match : '**/*.html' })),
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
             gulp.dest(rls(config.generateHtml.output))
         ]
    )
    ;

};