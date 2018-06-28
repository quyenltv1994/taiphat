<?php
	/*--------------------------------------------------------------*/
	/*						 CONTROL THEME	 						*/
	/*--------------------------------------------------------------*/
	//add_action('init',  'tvlgiao_wpdance_bootstrap_htmlblock_init');
	function tvlgiao_wpdance_bootstrap_htmlblock_init(){
		register_taxonomy( 'wpdance_category_html', 'book', array(
			'hierarchical'      => true,
			'labels'            => array(
				'name' 				=> esc_html__('Categories HTML', 'wpdance'),
				'singular_name' 	=> esc_html__('Categories HTML', 'wpdance'),
            	'new_item'          => esc_html__('Add New', 'wpdance' ),
            	'edit_item'         => esc_html__('Edit Post', 'wpdance' ),
            	'view_item'   		=> esc_html__('View Post', 'wpdance' ),
            	'add_new_item'      => esc_html__('Add New Category HTML', 'wpdance' ),
            	'menu_name'         => esc_html__( 'Categories HTML' , 'wpdance' ),
			),
			'show_ui'           	=> true,
			'show_admin_column' 	=> true,
			'query_var'         	=> true,
			'rewrite'           	=> array( 'slug' => 'wpdance_category_html' ),				
			'public'				=> true,
		));

		register_post_type('wpdance_html', array(
			'labels' => array(
				'name' 				=> esc_html__("Content Footer", 'wpdance'),
				'singular_name' 	=> esc_html__("Content Footer", 'wpdance'),
            	'new_item'          => esc_html__( 'Add New', 'wpdance' ),
            	'edit_item'         => esc_html__( 'Edit Post', 'wpdance' ),
            	'view_item'   		=> esc_html__( 'View Post', 'wpdance' )
			),
			'menu_position' 		=> 21,
			'taxonomies' 			=> array('wpdance_category_html'),
			'public' 				=> true,
			'has_archive' 			=> false
		));
		
		add_theme_support('post-thumbnails');
		add_post_type_support( 'wpdance_html', 'thumbnail' );
		
		$term_header = term_exists( 'wpdance_header_layout', 'wpdance_category_html' );
		if ( $term_header == 0 && $term_header == null ) {
		    wp_insert_term( esc_html__('Header', 'wpdance') , 'wpdance_category_html', array(
		    	'description'		=> esc_html__('Layout Header','wpdance'),
		    	'slug' 				=> 'wpdance_header_layout'
				));
		}
		

		$term_footer = term_exists( 'wpdance_footer_layout_vi', 'wpdance_category_html' );
		if ( $term_footer == 0 && $term_footer == null ) {
  			wp_insert_term( esc_html__('Footer VI', 'wpdance') , 'wpdance_category_html', array(
			    'description'		=> esc_html__('Layout Footer VI','wpdance'),
			    'slug' 				=> 'wpdance_footer_layout_vi'
  			));
  		}	

		$term_footer_en = term_exists( 'wpdance_footer_layout_en', 'wpdance_category_html' );
		if ( $term_footer_en == 0 && $term_footer_en == null ) {
  			wp_insert_term( esc_html__('Footer EN', 'wpdance') , 'wpdance_category_html', array(
			    'description'		=> esc_html__('Layout Footer EN','wpdance'),
			    'slug' 				=> 'wpdance_footer_layout_en'
  			));
  		}		
	}		
	/**
	 * Return HTML Headers array used for WP_Customize_Control select
	 * $value_default : Url image defaul header.
	 * Value return: Url Image or Name Header
	 * @return array 
	 */
	if(!function_exists ('tvlgiao_wpdance_get_html_choices')){
		function tvlgiao_wpdance_get_html_choices($slug_terms, $value_default, $value_return) {
			global $post;
			$pre_post 	= $post;
			$choices 	= array('-1' => $value_default);
			$args = array(
				'post_type' 	=> 'wpdance_html',
				'posts_per_page'=>-1,
				'orderby' 		=> 'post_title',
				'order' 		=> 'ASC',
				'tax_query' 	=> array(
					array(
						'taxonomy' => 'wpdance_category_html',
						'field'    => 'slug',
						'terms'    => array( $slug_terms ),
					)
				),
			);
			$html_block = new WP_Query( $args );
			while ($html_block->have_posts()) {
				$html_block->the_post();
				if($value_return == 'url_image'){
					$choices[get_the_ID()] = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
				}else{
					$choices[get_the_ID()] = get_the_title('', '', false);
				}
			}
			wp_reset_postdata();
			$post 		= $pre_post;
			return $choices;
		}
	}


	/*GET HEADER LAYOUT*/
	if (!function_exists('tvlgiao_wpdance_get_header_post')) {
		/**
		 * Return HTML Block post assigned to the header
		 * @return string
		 */
		function tvlgiao_wpdance_get_header_post() {
			$meta_key_header 	= '_tvlgiao_wpdance_custom_header';
			if (!get_the_ID() || !($id = @get_post_meta(get_the_ID(), $meta_key_header , true)))
				if (!($id = @get_theme_mod('tvlgiao_wpdance_header_layout','-1')))
					return;
			if(@get_post_meta(get_the_ID(), $meta_key_header , true) == -1){
				$id 	= @get_theme_mod('tvlgiao_wpdance_header_layout','-1');
			}
			if (!($post = get_post($id)))
				return;
			return $post;
		}
	}


	if (!function_exists('tvlgiao_wpdance_get_content_header')) {
		/**
		 * Return the content of HTML Block assigned to the Header
		 * @return string
		 */
		function tvlgiao_wpdance_get_content_header() {
			global $post;
			$pre_post = $post;

			if (!($cur_post = tvlgiao_wpdance_get_header_post()))
				return;
		
			$post 		= $cur_post;
			$content 	= apply_filters('the_content', $cur_post->post_content);
			$post 		= $pre_post;
			return $content;
		}
	}
	// Header
	add_action( 'tvlgiao_wpdance_header_init_action', 'tvlgiao_wpdance_header_init', 5 );
	if(!function_exists ('tvlgiao_wpdance_header_init')){
		function tvlgiao_wpdance_header_init($wp_customize){
			$content_header = tvlgiao_wpdance_get_content_header();
			if(!(empty($content_header))){ ?>
				<div class="container">
					<div class="row">
						<?php echo ($content_header); ?>
					</div>
				</div>
			<?php }else{
				if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_default.php")){
					require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_default.php";
				}	
			}
		}
	}
	add_action( 'tvlgiao_wpdance_menu_mobile', 'tvlgiao_wpdance_header_menu_mobile', 5 );
	if(!function_exists ('tvlgiao_wpdance_header_menu_mobile')){
		function tvlgiao_wpdance_header_menu_mobile(){
			if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_menu_mobile.php")){
				require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_menu_mobile.php";
			}
		}
	}	

	/*GET FOOTER LAYOUT*/
	if (!function_exists('tvlgiao_wpdance_get_footer_post')) {
		/**
		 * Return HTML Block post assigned to the header
		 * @return string
		 */
		function tvlgiao_wpdance_get_footer_post() {
			// Data Footer
			$lang  			= 'vi';
			if(class_exists('Polylang')){ $lang = pll_current_language('slug'); }	
			$slug_lang = 'wpdance_footer_layout_'.$lang;
			$args 	= array(
				'post_type'  	=> 'wpdance_html', 
				'numberposts' 	=> 2, 
				'tax_query'     => array(
			        array(
			            'taxonomy'  => 'wpdance_category_html',
			            'field'     => 'slug',
			            'terms'     => $slug_lang,
			        ),
			    ),
			);
			$html_footer = get_posts($args);
			$meta_key_footer 	= '_tvlgiao_wpdance_custom_footer';
			if (!get_the_ID() || !($id = @get_post_meta(get_the_ID(), $meta_key_footer , true)))
				if (!($id =  $html_footer['0']->ID))
					return;
			if(@get_post_meta(get_the_ID(), $meta_key_footer , true) == -1){
				if($html_footer) $id = $html_footer['0']->ID;
			} 
			if (!($post = get_post($id)))
				return;

			return $post;
		}
	}


	if (!function_exists('tvlgiao_wpdance_get_content_footer')) {
		/**
		 * Return the content of HTML Block assigned to the Header
		 * @return string
		 */
		function tvlgiao_wpdance_get_content_footer() {
			global $post;
			$pre_post = $post;
			if (!($cur_post = tvlgiao_wpdance_get_footer_post()))
				return;
			$post 		= $cur_post;
			$content 	= apply_filters('the_content', $cur_post->post_content);
			$post 		= $pre_post;
			return $content;
		}
	}

	// Footer
	add_action( 'tvlgiao_wpdance_footer_init_action', 'tvlgiao_wpdance_footer_init', 5 );
	if(!function_exists ('tvlgiao_wpdance_footer_init')){
		function tvlgiao_wpdance_footer_init($wp_customize){
			$content_footer = tvlgiao_wpdance_get_content_footer();
			if(!(empty($content_footer))){ ?>
				<div class="container">
					<div class="row">
						<?php echo ($content_footer); ?>
					</div>
				</div>
			<?php }else{
				if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/footers/wd_footer_default.php")){
					require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/footers/wd_footer_default.php";
				}	
			}
		}
	}

	//Breadcrumbs Init
	if(!function_exists ('tvlgiao_wpdance_init_breadcrumbs')){
		function tvlgiao_wpdance_init_breadcrumbs(){
			$layout_breadcrumbs	= get_theme_mod('tvlgiao_wpdance_breadcrumb','breadcrumb_default'); 
			global $post;
			if(isset($post)){
				$image_url = get_field('images_breadcrumbs',$post->ID);
			}
			if($image_url == ''){
				$image_url = get_field('image_breadcrumbs','option');
			}
			
			?>
			<div class="wd-blog-breadcrumb" style="background-image: url(<?=$image_url?>)">
				<div class="container">
					<div class="title-cotainer-header">
						<?php
							
							 	echo "<h3>".get_the_title()."</h3>";
						?>
					</div>
				</div>
			</div>
			<?php 	
		}
	}
	add_filter('get_the_archive_title', function ($title) {
	    return str_replace(':',' -',$title);
	});
	/*---------------------------------------------------------------------------*/
	/*								FUNCTION 									 */
	/*---------------------------------------------------------------------------*/
	
	// Comment Content
	if ( !function_exists( 'tvlgiao_wpdance_theme_comment' )){
		function tvlgiao_wpdance_theme_comment( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ) :
				case '' :
					?>
					<div <?php comment_class(); ?> id="wd-comment-container">
						<div id="comment-<?php comment_ID(); ?>">
							<div class="comment-author vcard">
								<?php echo get_avatar($comment, 70 ); ?>
							</div><!-- .comment-author .vcard -->
							<div class="comment-text">
								<div class="comment-info-container">
									<div class="comment-author-date">
										<?php printf(  '%s <span class="says"></span>', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
									</div>

									<div class="comment-info">
										<span class="reply"><?php comment_reply_link( array_merge( array( 'reply_text' => '<i class="fa fa-reply"></i>') , array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
										<span class="edit"><?php edit_comment_link('<i class="fa fa-pencil-square-o"></i>', ' ' );?></span>
									</div><!-- .reply -->
								</div>
								<div class="comment-body"><?php comment_text(); ?></div>
								<?php if ( $comment->comment_approved == '0' ) : ?>
									<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wpdance' ); ?></em><br/>
								<?php endif; ?>
								<div class="comment-date"><?php printf( esc_html__( '%1$s', 'wpdance' ), get_comment_date()); ?> </div>
							</div>
						</div><!-- #comment-##  -->
					</div>
					<?php
					break;
				case 'pingback'  :
				case 'trackback' :
				break;
			endswitch;
		} // End Function
	} // End If

	// Get global data
	if(!function_exists ('tvlgiao_wpdance_get_post_by_global')){
		function tvlgiao_wpdance_get_post_by_global(){
			global $post;
			$id_post = $post->ID;
			return $id_post;
		}
	}
	
	// Add Social Share
	add_action('wp_head', 'tvlgiao_wpdance_addthis_script', 999);
	function tvlgiao_wpdance_addthis_script(){
		if( is_single() || is_page_template('page-templates/blog-template.php') || is_category() || is_tag() ){ ?>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-547e8f2f2a326738" async="async"></script>
		<?php }
	}

	// Filter Search Form
	add_filter( 'get_search_form', 'tvlgiao_wpdance_search_form' );
	function tvlgiao_wpdance_search_form( $form ) {
		$query_search = esc_html__( 'Search item here....' , 'wpdance');
		if(get_search_query() != ""){
			$query_search = get_search_query();
		}
		$id   = 'searchform-'.mt_rand();
	    $form = '
		    <form role="search" method="get" id="'.$id.'" class="searchform" action="' . home_url( '/' ) . '" >
		    	<input type="text" placeholder="' . $query_search . '" name="s" />
		    	<button type="submit" title="Search"><i class="fa fa-search"></i></button>
		    </form>'; 
	    return $form;
	}
	

	if (!function_exists('tvlgiao_wpdance_htmlblock_css')) {
		/**
		 * Function add custom CSS of HTML Block in the head element
		 *
		 * @param integer $post_id Post ID
		 * @return string CSS to add to the head tag
		 */
		function tvlgiao_wpdance_htmlblock_css($post_id) {
			$ret = '';
			
			/** code copied from Vc_Base::addPageCustomCss() */
			$post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
			if ( ! empty( $post_custom_css ) )
				$ret .= '<style type="text/css" data-type="vc_custom-css">'.$post_custom_css.'</style>';
			
			/** code copied from Vc_Base::addShortcodesCustomCss() */
			$shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
			if ( ! empty( $shortcodes_custom_css ) ) {
				$ret .= '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$shortcodes_custom_css.'</style>';
			}
			
			return $ret;
		}
	}
	/** Visual composer is installed? */
	if (function_exists('visual_composer')) {
		if (!function_exists('tvlgiao_wpdance_htmlblock_vc_styles')) {
			/**
			 * Add Visual Composer custom css styles of HTML Blocks
			 *
			 * Visual Composer only includes css style of the main post, so we have
			 * to add custom css styles of HTML blocks by ourself.
			 */
			function tvlgiao_wpdance_htmlblock_vc_styles() {
				
				if ($post = tvlgiao_wpdance_get_header_post())
					echo tvlgiao_wpdance_htmlblock_css($post->ID);
					
				if ($post = tvlgiao_wpdance_get_footer_post())
					echo tvlgiao_wpdance_htmlblock_css($post->ID);
			}
		}
		add_action('wp_head', 'tvlgiao_wpdance_htmlblock_vc_styles');
	}

	// Check Woo
	if( !function_exists('tvlgiao_wpdance_is_woocommerce') ){
		function tvlgiao_wpdance_is_woocommerce(){
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				return false;
			}
			return true;
		}
	}

	add_action( 'wp_head', 'tvlgiao_wpdance_print_inline_script', 100000000 );
	if(!function_exists ('tvlgiao_wpdance_print_inline_script')){
		function tvlgiao_wpdance_print_inline_script(){
		?>	
		<script type="text/javascript">
			<?php if( defined('ICL_LANGUAGE_CODE') ): ?>
				var _ajax_uri = '<?php echo admin_url('admin-ajax.php?lang='.ICL_LANGUAGE_CODE, 'relative');?>';
			<?php else: ?>
				var _ajax_uri = '<?php echo admin_url('admin-ajax.php', 'relative');?>';
			<?php endif; ?>
		</script>
		<?php
		}
	}

	/*Function : Scroll Button */
	function tvlgiao_wpdance_scroll_button_site_function(){
	    $scroll_button    = get_theme_mod('tvlgiao_wpdance_scroll_button', "no");
	    if($scroll_button == "yes"){ ?>
            <div id="to-top" class="scroll-button">
                <a class="scroll-button" href="javascript:void(0)" title="<?php esc_html_e('Back to Top','wpdance');?>"></a>
            </div>
	    <?php };
	}
	add_action('tvlgiao_wpdance_footer_init_action','tvlgiao_wpdance_scroll_button_site_function');

	if( !function_exists('tvlgiao_wpdance_get_form_user_mobile') ){
		function tvlgiao_wpdance_get_form_user_mobile(){
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				return;
			} ?>
			<div class="wd_loginuser">
				<div class="wd_tini_account_control">
					<?php
						global $woocommerce;
						$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
						if ( $myaccount_page_id ) {
						  	$myaccount_page_url = get_permalink( $myaccount_page_id );
						}else{
							$myaccount_page_url = "";
						}	
					?>
					<a href="<?php echo esc_url($myaccount_page_url);?>" title="<?php esc_html_e('My Account','wpdance');?>">
						<?php if(is_user_logged_in()): ?>	
							<span><?php esc_html_e('My Account','wpdance');?></span>
						<?php else:?>
							<span><?php esc_html_e('Login','wpdance');?></span>
						<?php endif;?>		
					</a>	
				</div>
			</div>
			<?php
		}
	}
	remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
	remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
	add_action( 'tvlgiao_woo_checkout_coupon_form', 'woocommerce_checkout_coupon_form', 10 );

	add_filter( 'woocommerce_checkout_fields' , 'tvlgiao_woo_custom_override_checkout_fields' );
	function tvlgiao_woo_custom_override_checkout_fields( $fields ) {
		unset($fields['billing']['billing_company']);
		unset($fields['billing']['billing_country']);
		unset($fields['billing']['billing_address_2']);
		unset($fields['billing']['billing_state']);
		unset($fields['billing']['billing_postcode']);
	     return $fields;
	}	

	add_filter( 'body_class', function( $classes ) {
		$lang  			= 'vi';
		if(class_exists('Polylang')){
			$lang 			= pll_current_language('slug');
		}
		$class_languge = '';
		if($lang == 'vi') $class_languge = 'wd-site-languge-vi';
		if($lang == 'en') $class_languge = 'wd-site-languge-en';
	    return array_merge( $classes, array( $class_languge ) );
	} );
	
	add_action('acf/init', 'tvlgiao_wpdance_acf_init');
	function tvlgiao_wpdance_acf_init() {
		
		if( function_exists('acf_add_options_page') ) {
			
			$option_page = acf_add_options_page(array(
				'page_title' 	=> __('Theme General Settings', 'wpdance'),
				'menu_title' 	=> __('Theme Settings', 'wpdance'),
				'menu_slug' 	=> 'theme-general-settings',
			));
			
		}
		
	}
	function tvlgiao_wpdance_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'tvlgiao_wpdance_mime_types');


	function the_excerpt_max_charlength($charlength) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo $subex;
			}
			echo '...';
		} else {
			echo $excerpt;
		}
	}
	function my_acf_google_map_api( $api ){
		
		$api['key'] = get_field('mypc_may_key','option') ;
		
		return $api;
		
	}
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
?>