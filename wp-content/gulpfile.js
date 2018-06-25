/*
 * @file
 *
 * - gulp [--dev]
 * - gulp watch [--dev] [--reload]
 *
 * - gulp generate-css  [--dev]
 * - gulp generate-favicon
 * - gulp generate-html
 * - gulp check-js
 * - gulp check-scss
 * - gulp generate-javascript [--dev]
 * - gulp imagemin
 * - gulp generate-gitignore
 * - gulp clean
 *
 */

const config = require('./gulp-includes/gulp-configuration.js'),
    gulp = require('gulp'),
    watch = require('gulp-watch'),
    upath = require('upath'),
    rls = require('remove-leading-slash'),
    argv = require('minimist')(process.argv.slice(2)),
    browserSync = require('browser-sync').create(),
    reload = browserSync.reload,
    path = require('path'),
    log = require('fancy-log');

if (!argv._.length || argv._[0] === 'watch' || argv._[0] === 'generate-css' || argv._[0] === 'generate-javascript') {
    if (argv.dev) {
        process.env.NODE_ENV = 'development';
        log.info('Notice : Consider using the --dev option for development and testing purposes only.');
    } else {
        process.env.NODE_ENV = 'production';
        log.info('Notice : Consider using the --dev option for development and testing purposes.');
    }
}

if (argv._[0] === 'watch') {
    if (!argv.reload && config.generateHtml.enable && argv.dev) {
        log.info('Notice : Consider using the --reload option to automatically reload browser when changes are detected.');
    }
}

if (!argv._.length || argv._[0] === 'watch' || argv._[0] === 'generate-css' || argv._[0] === 'generate-javascript') {
    log.info('GULP MODE : ' + process.env.NODE_ENV.toUpperCase());
}

var tasks = [
    {
        name : 'generate-favicon',
        description : 'Create and attach favicon files.',
        flags : {}
    },
    {
        name : 'imagemin',
        description : 'Optimise .jpg .jpeg .png .gif .svg images.',
        flags : {}
    },
    {
        name : 'clean',
        description : 'Erase generated assets.',
        flags : {}
    }
];

var default_tasks = [];

if (config.generateJs.enable) {
    tasks.push(
        {
            name : 'check-js',
            description : 'Checks JavaScript syntax.',
            flags : {}
        },
        {
            name : 'generate-javascript',
            description : 'Build JavaScript code.',
            flags : {
                '—-dev' : 'No minification, add viewport logging in console, build sourcemaps.'
            }
        }
    );
    default_tasks.push('check-js', 'generate-javascript');
    config.generateJs.src_path = '/gulp-includes/js/';
}

if (config.generateCss.enable) {
    tasks.push(
        {
            name : 'check-scss',
            description : 'Checks Scss syntax.',
            flags : {}
        },
        {
            name : 'generate-css',
            description : 'Build CSS stylesheets.',
            flags : {
                '—-dev' : 'Disable px to rem conversion, build sourcemaps.'
            }
        }
    );
    default_tasks.push('check-scss', 'generate-css');
    config.generateCss.src_path = '/gulp-includes/scss/';
}

if (config.generateHtml.enable) {
    tasks.push(
        {
            name : 'generate-html',
            description : 'Build html templates.',
            flags : {}
        }
    );
    default_tasks.push('generate-html');
    config.generateHtml.src = '/gulp-includes/www/';
}

if (config.generateGitignore.enable) {
    tasks.push(
        {
            name : 'generate-gitignore',
            description : 'Build custom .gitignore according to gulp-includes/gulp-configuration.js.',
            flags : {}
        }
    );
    default_tasks.push('generate-gitignore');
}

function getTaskByModule(task) {
    var getTask = require('./gulp-includes/core/gulp-tasks/' + task.name);
    getTask.description = task.description;
    getTask.flags = task.flags;
    return getTask;
}

for (var i in tasks) {
    gulp.task(tasks[i].name, getTaskByModule(tasks[i]));
}

gulp.task('default', default_tasks, function () {
    notifyCompilationEnded();
});

gulp.task('watch', default_tasks, function () {
    setTimeout(function(){
        notifyCompilationEnded();
        if (config.generateHtml.enable && argv.dev) {
            browserSync.init(
                {
                    server : true,
                    startPath : upath.join(rls(config.generateHtml.output), 'index.html'),
                    ui : false,
                    notify : false,
                    snippetOptions : {
                        ignorePaths : "**/*"
                    }
                }
            );
        }
        var tasks_to_run = [];
        var watcher = gulp.watch(['./gulpfile.js', './gulp-includes/core/gulp-tasks/**/*.js', './gulp-includes/gulp-configuration.js']);
        watcher.on('change', function (absolute_path) {
            log.info('Watch has detected changes in ' + path.relative(__dirname, absolute_path.path));
            log.info('Please restart Gulp.');
            process.exit(0);
        });
        if (config.generateJs.enable) {
            tasks_to_run = ['check-js', 'generate-javascript'];
            if (config.generateHtml.enable) {
                tasks_to_run.push('generate-html');
            }
            if (config.generateGitignore.enable) {
                tasks_to_run.push('generate-gitignore');
            }
            if (config.generateHtml.enable && argv.reload && argv.dev) {
                gulp.watch(rls(upath.join(rls(config.generateJs.src_path), '*.js')), tasks_to_run).on("change", reload);
            } else {
                gulp.watch(rls(upath.join(rls(config.generateJs.src_path), '*.js')), tasks_to_run);
            }
        }
        if (config.generateCss.enable) {
            tasks_to_run = ['check-scss', 'generate-css'];
            if (config.generateHtml.enable) {
                tasks_to_run.push('generate-html');
            }
            if (config.generateGitignore.enable) {
                tasks_to_run.push('generate-gitignore');
            }
            if (config.generateHtml.enable && argv.reload && argv.dev) {
                gulp.watch(rls(upath.join(rls(config.generateCss.src_path), '**', '*')), tasks_to_run).on("change", reload);
            } else {
                gulp.watch(rls(upath.join(rls(config.generateCss.src_path), '**', '*')), tasks_to_run);
            }
        }
        if (config.generateHtml.enable) {
            tasks_to_run = ['generate-html'];
            if (config.generateGitignore.enable) {
                tasks_to_run.push('generate-gitignore');
            }
            if (config.generateHtml.enable && argv.reload && argv.dev) {
                gulp.watch(rls(upath.join(rls(config.generateHtml.src), '**', '*')), tasks_to_run).on("change", reload);
            } else {
                gulp.watch(rls(upath.join(rls(config.generateHtml.src), '**', '*')), tasks_to_run);
            }
        }
    }, 10);
});

function notifyCompilationEnded() {
    if (config.generateHtml.enable && argv.dev) {
        log.info('index.html\'s location : ' + upath.join(__dirname, rls(config.generateHtml.output), 'index.html'));
    }
}