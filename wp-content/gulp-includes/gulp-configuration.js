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

const config = {

    /*
     ###########################################
     ########## PROJECT CONFIGURATION ##########
     ###########################################
     */

    /* This is important for favicon generation */
    project_name : "EZI-X",

    /* This is important for favicon generation */
    /* Simply fill in your app's default language code. Please respect the syntax. */
    /* Language codes list : https://msdn.microsoft.com/en-us/library/ee825488(v=cs.20).aspx */
    project_lang : 'fr-FR',

    /* Root folder of your application, CMS, framework... */
    project_root_directory : '/',

    /*
     ###########################################
     ######### JAVASCRIPT CONFIGURATION ########
     ###########################################
     */

    generateJs : {
        /* Enable or disable Javascript compilation */
        enable : true,

        /* Compiled JS file name */
        output_name : 'main',

        /* Compiled JS file destination */
        output_path : '/themes/main/assets/js/',

        /* Path to external libs (e.g. sliders, modals ...). Most likely node_modules stuffs */
        src : [
            'node_modules/jquery-ui-dist/jquery-ui.min.js',
            'node_modules/ddslick/dist/jquery.ddslick.min.js',
            'node_modules/wowjs/dist/wow.min.js',
            'node_modules/readmore-js/readmore.min.js',
            'node_modules/sumoselect/jquery.sumoselect.min.js',
            'node_modules/owl.carousel/dist/owl.carousel.min.js',
            'node_modules/flexslider/jquery.flexslider-min.js',
            'node_modules/sticky-sidebar/dist/jquery.sticky-sidebar.js',
            'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js',
            'node_modules/dotdotdot/src/js/jquery.dotdotdot.min.js',
            'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js'
        ],

        /* Modernizr will be included in the bundle if feature-detects is filled. */
        modernizr : {

            /* https://modernizr.com/download?video-videoloop */
            'feature-detects' : [
                // "test/video",
                // "test/video/loop"
            ],

            /* Add classes in <html> tag ? */
            'add-classes-in-html-tag' : false
        }
    },

    /*
     ###########################################
     ######### SASS / CSS CONFIGURATION ########
     ###########################################
     */

    generateCss : {
        /* Enable or disable Css compilation */
        enable : true,

        /* Compiled CSS file destination */
        output_path : '/themes/main/assets/css/'
    },

    /*
     ###########################################
     ############ HTML CONFIGURATION ###########
     ###########################################
     */

    generateHtml : {
        /* Enable or disable Html compilation */
        enable : true,

        /* Compiled HTML files destination */
        output : '/themes/main/assets/html/'
    },

    /*
     ###########################################
     ######### Gitignore CONFIGURATION #########
     ###########################################
     */

    generateGitignore : {
        /* Enable or disable .gitignore compilation */
        enable : false
    },

    /*
     ###########################################
     ########### IMAGE CONFIGURATION ###########
     ###########################################
     */

    generateImages : {
        /* Images folder for gulp imagemin task */
        folder : '/themes/main/assets/images/'
    },

    /*
     ###########################################
     ########## FAVICON CONFIGURATION ##########
     ###########################################
     */

    generateFavicon : {
        /* Compiled favicon destination */
        output : '/themes/main/assets/images/favicon/',

        /* Favicon source */
        src : '/themes/main/assets/images/favicon.png',

        /* Main color used for flattened icons' background and iOS/Android's UI  */
        main_color : '#ffffff'
    },

    /*
     ###########################################
     ########## PLUGINS CONFIGURATION ##########
     ###########################################
     */

    plugins : {
        responsiveImage : {
            enable : false
        }
    }
};

module.exports = config;