<?php
	class Tvlgiao_Wpdance_GeneralTheme{
		//Variable
		protected $tvlgiao_wpdance_theme_name		= 'WP Dance';
		protected $tvlgiao_wpdance_theme_slug		= 'wpdance';

		protected $tvlgiao_wpdance_arr_functions 	= array();
		protected $tvlgiao_wpdance_arr_widgets 		= array();
		protected $tvlgiao_wpdance_arr_libs 		= array();
		protected $tvlgiao_wpdance_arr_customize 	= array();
		protected $tvlgiao_wpdance_arrshortcodes 	= array();
		protected $tvlgiao_wpdance_arrvisualcomposer = array();

		//Constructor
		public function __construct(){
			$this->tvlgiao_wpdance_constant();
			$this->tvlgiao_wpdance_init_arr_functions();
			$this->tvlgiao_wpdance_init_arr_widgets();
			$this->tvlgiao_wpdance_init_arr_libs();
			$this->tvlgiao_wpdance_init_arr_customize();
			$this->tvlgiao_wpdance_init_arr_shortcodes();
			$this->tvlgiao_wpdance_init_arr_registervc();
		}
		// Function Setup Theme
		public function tvlgiao_wpdance_init(){
			//After setup theme
			add_action( 'after_setup_theme', array($this,'tvlgiao_wpdance_setup_theme'));
			//Include Lib
			$this->tvlgiao_wpdance_init_libs();
			//Include Function
			$this->tvlgiao_wpdance_init_functions();
			//Include Widget
			$this->tvlgiao_wpdance_init_widgets();
			//Include Customize
			$this->tvlgiao_wpdance_init_customize();
			//Shortcode
			$this->tvlgiao_wpdance_init_shortcodes();
			//Customize Color Styling
			$name = TVLGIAO_WPDANCE_THEME_SLUG.'custom_style';
			if( !get_option( $name ) ) {
				tvlgiao_wpdance_save_custom_style();
			}
			//Load VC
			if($this->tvlgiao_wpdance_checkPluginVC()){
				if ( ! defined( 'ABSPATH' ) ) { exit; }
				add_action("vc_before_init",array($this,'tvlgiao_wpdance_load_visual'));
			}
			//Call admin
			require_once get_template_directory().'/framework/includes/wd_metaboxes.php';
			$classNameAdmin = 'Tvlgiao_Wpdance_Admin_GeneralTheme';
			$panel 			= new $classNameAdmin();
		}
		// Constant
		protected function tvlgiao_wpdance_constant(){			
			// Default
			define('TVLGIAO_WPDANCE_DS',DIRECTORY_SEPARATOR);	
			define('TVLGIAO_WPDANCE_THEME_NAME'				, $this->tvlgiao_wpdance_theme_name );
			define('TVLGIAO_WPDANCE_THEME_SLUG'				, $this->tvlgiao_wpdance_theme_slug.'_');
			define('TVLGIAO_WPDANCE_THEME_DIR'				, get_template_directory());
			define('TVLGIAO_WPDANCE_THEME_URI'				, get_template_directory_uri());
			define('TVLGIAO_WPDANCE_THEME_ASSET_URI'		, TVLGIAO_WPDANCE_THEME_URI . '/assets');
			// Style-Script-Image
			define('TVLGIAO_WPDANCE_THEME_IMAGES'			, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/images');
			define('TVLGIAO_WPDANCE_THEME_CSS'				, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/css');
			define('TVLGIAO_WPDANCE_THEME_JS'				, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/js');
			define('TVLGIAO_WPDANCE_THEME_FONT'				, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/fonts');
			//Framework Theme
			define('TVLGIAO_WPDANCE_THEME_FRAMEWORK'		, TVLGIAO_WPDANCE_THEME_DIR . '/framework');
			define('TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI'	, TVLGIAO_WPDANCE_THEME_URI . '/framework');
			//Folder in Framework
			define('TVLGIAO_WPDANCE_THEME_FUNCTIONS'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/functions');	
			define('TVLGIAO_WPDANCE_THEME_LIB'				, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/lib');
			define('TVLGIAO_WPDANCE_THEME_INCLUDES_PLUGIN'	, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/plugins');
			define('TVLGIAO_WPDANCE_THEME_WIDGETS'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/widgets');
			define('TVLGIAO_WPDANCE_THEME_SHORTCODES'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/shortcodes');
			define('TVLGIAO_WPDANCE_THEME_REGISTERVC'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/visualcomposers');
			define('TVLGIAO_WPDANCE_THEME_INCLUDES'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/includes');
			define('TVLGIAO_WPDANCE_THEME_INCLUDES_URI'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI 	. '/includes');
			//Folder WPDANCE
			define('TVLGIAO_WPDANCE_THEME_WPDANCE'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 	. '/wpdance');
			define('TVLGIAO_WPDANCE_THEME_CUSTOMIZE'		, TVLGIAO_WPDANCE_THEME_WPDANCE 	. '/customize');
		}
		//Include Function
		protected function tvlgiao_wpdance_init_arr_functions(){
			$this->tvlgiao_wpdance_arr_functions = array('wd_register_sidebar','wd_register_tgmpa_plugin','wd_main','wd_pagination','wd_customize_set_custom_css','wd_customize_live_preview_color',
														 'wd_comment_form','wd_customize_styling_style','wd_woo_account','wd_woo_cart','wd_excerpt','wd_soundcloud','wd_counter_views','wd_template_tag',
														 'wd_breadcrumbs','wd_woo_hook','wd_woo_product','wd_custom_style_font','wd_font_customize','wd_customize_set_font');
		}
		//Include Widget
		protected function tvlgiao_wpdance_init_arr_widgets(){
			$this->tvlgiao_wpdance_arr_widgets = array('wd_social_profiles','wd_special_post','wd_emads','wd_featured_header','wd_contact_us');
		}
		//Include Lib
		protected function tvlgiao_wpdance_init_arr_libs(){
			$this->tvlgiao_wpdance_arr_libs = array('class-tgm-plugin-activation','add-control-custom-radio-image','wd-add-control-custom-font');
		}
		//Include Customize
		protected function tvlgiao_wpdance_init_arr_customize(){
			$this->tvlgiao_wpdance_arr_customize = array('wd_customize_sanitize_callback','wd_customize_header','wd_customize_footer','wd_customize_blog','wd_customize_styling_option','wd_customize_theme_option',
														 'wd_customize_product','wd_customize_font');
		}
		protected function tvlgiao_wpdance_init_arr_shortcodes(){
			$this->tvlgiao_wpdance_arrshortcodes = array('wd_image_slider','wd_girl_list_blog','wd_feature','wd_social_profiles','wd_banner_image',
														 'wd_category_by_name','wd_get_service_home','wd_get_testimonial','wd_get_programs','wd_get_services',
														 'wd_get_partners');
		}

		protected function tvlgiao_wpdance_init_arr_registervc(){
			$this->tvlgiao_wpdance_arrvisualcomposer = array('wd_vc_image_slider','wd_vc_blog_girl_list','wd_vc_feature','wd_vc_social_profiles','wd_vc_banner_image',
															  'wd_vc_category_by_name','wd_vc_get_service_home','wd_vc_get_testimonial','wd_vc_get_programs','wd_vc_get_services',
															  'wd_vc_get_partners');
		}
		// Load File
		protected function tvlgiao_wpdance_init_functions(){
			foreach($this->tvlgiao_wpdance_arr_functions as $function){
				if(file_exists(TVLGIAO_WPDANCE_THEME_FUNCTIONS."/{$function}.php")){
					require_once TVLGIAO_WPDANCE_THEME_FUNCTIONS."/{$function}.php";
				}	
			}
		}
		protected function tvlgiao_wpdance_init_widgets(){
			foreach($this->tvlgiao_wpdance_arr_widgets as $widget){
				if(file_exists(TVLGIAO_WPDANCE_THEME_WIDGETS."/{$widget}.php")){
					require_once TVLGIAO_WPDANCE_THEME_WIDGETS."/{$widget}.php";
				}
			}
		}
		protected function tvlgiao_wpdance_init_libs(){
			foreach($this->tvlgiao_wpdance_arr_libs as $lib){
				if(file_exists(TVLGIAO_WPDANCE_THEME_LIB. "/{$lib}.php")){
					require_once TVLGIAO_WPDANCE_THEME_LIB. "/{$lib}.php";
				}
			}
		}
		protected function tvlgiao_wpdance_init_customize(){
			foreach($this->tvlgiao_wpdance_arr_customize as $custom){
				if(file_exists(TVLGIAO_WPDANCE_THEME_CUSTOMIZE. "/{$custom}.php")){
					require_once TVLGIAO_WPDANCE_THEME_CUSTOMIZE. "/{$custom}.php";
				}
			}
		}
		protected function  tvlgiao_wpdance_init_shortcodes(){
			foreach($this->tvlgiao_wpdance_arrshortcodes as $shortcode){
				if( file_exists(TVLGIAO_WPDANCE_THEME_SHORTCODES."/{$shortcode}.php") ){
					require_once TVLGIAO_WPDANCE_THEME_SHORTCODES."/{$shortcode}.php";
				}	
			}
		}
		protected function tvlgiao_wpdance_checkPluginVC(){
			$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
			if(in_array('js_composer/js_composer.php',$_active_vc)){
				return true;
			}else{
				return false;
			}
		}

		public function tvlgiao_wpdance_load_visual(){
			foreach ($this->tvlgiao_wpdance_arrvisualcomposer as $visual) {
				if( file_exists(TVLGIAO_WPDANCE_THEME_REGISTERVC."/{$visual}.php") ){
					require_once TVLGIAO_WPDANCE_THEME_REGISTERVC."/{$visual}.php";
				}
			}
	    }
		//Setup Theme
		public function tvlgiao_wpdance_setup_theme(){
		    global $content_width;
		    if ( !isset($content_width) ) {
		        $content_width = 1170;
		    }
			//Make theme available for translation
			//Translations can be filed in the /languages/ directory
   			load_theme_textdomain('wpdance', get_template_directory() . '/languages');
   			//Import Register Menu
   			$this->tvlgiao_wpdance_register_location_menu();
   			//Import Theme Support
   			$this->tvlgiao_wpdance_theme_support();
   			//Import Google Font
   			add_action('wp_enqueue_scripts',array($this,'tvlgiao_wpdance_slug_fonts_url'));
   			//Import Script / Style
   			add_action('wp_enqueue_scripts',array($this,'tvlgiao_wpdance_add_scripts'));
		}
		//Register Menu
		public function tvlgiao_wpdance_register_location_menu(){
			register_nav_menus(array(
		        'primary' 			=> esc_html__('Primary', 'wpdance'),
		        'primary_mobile' 	=> esc_html__('Primary Menu Mobile', 'wpdance'),
		    ));
		}
		//Theme Support
		public function tvlgiao_wpdance_theme_support(){
			//Add Image Size
			add_image_size('image_size_thumbnail',150,90,true);
			add_image_size('image_size_medium',420,250,true);
			add_image_size('image_size_large',780,465,true);
			add_image_size('image_size_testimonial',100,100,true);
			add_image_size('image_size_project',600,420,true);
			add_image_size('image_size_post',700,360,true);
			add_image_size('image_size_post_second',450,305,true);
			add_image_size('image_size_service',390,550,true);
			add_image_size('image_size_slider_home',1550,780,true);
			// Enable support for Post Formats.
    		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
			add_theme_support( "title-tag" );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support('woocommerce');		
		}
		//Google Font Theme
		function tvlgiao_wpdance_slug_fonts_url() {
		    $tvlgiao_wpdance_query_args = array(
		        'family' => urlencode('Roboto Condensed:400,400italic,700,700italic|Open Sans:400,600,700,300|Playfair Display:400,700')
		    );
		    wp_register_style( 'google-fonts', add_query_arg( $tvlgiao_wpdance_query_args, "//fonts.googleapis.com/css" ), array(), null );
		    wp_enqueue_style( 'google-fonts' );
		}
		//Add Script
		public function tvlgiao_wpdance_add_scripts(){
			/*----------------- Style ---------------------*/
			// LIB
			wp_register_style('font-awesome', 				TVLGIAO_WPDANCE_THEME_CSS.'/font-awesome.min.css');
			wp_enqueue_style('font-awesome');
			
			// CSS OF THEME
			wp_register_style('tvlgiao-wpdance-style-css', 	TVLGIAO_WPDANCE_THEME_CSS.'/main.css');
			wp_enqueue_style('tvlgiao-wpdance-style-css');

			/*----------------- Script ---------------------*/
    		// LIB
    		
    		// JS OF THEME
    		wp_register_script( 'tvlgiao-wpdance-main-js', 	TVLGIAO_WPDANCE_THEME_JS.'/main.js');
    		wp_enqueue_script('tvlgiao-wpdance-main-js');


		    if (is_singular() && comments_open()) { wp_enqueue_script('comment-reply'); }
			
		}
	}
?>