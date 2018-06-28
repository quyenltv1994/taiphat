<?php
	if(!function_exists ('tvlgiao_wpdance_register_sidebar')){
		function tvlgiao_wpdance_register_sidebar(){
			register_sidebar(array(
		        'name' 				=> esc_html__('Sidebar', 'wpdance'),
		        'id' 				=> 'sidebar_vi',
		        'description'   	=> esc_html__( 'Main sidebar that appears on the left.', 'wpdance' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
			register_sidebar(array(
		        'name' 				=> esc_html__('Sidebar - EN', 'wpdance'),
		        'id' 				=> 'sidebar_en',
		        'description'   	=> esc_html__( 'Main sidebar that appears on the left.', 'wpdance' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));

		    register_sidebar(array(
		        'name' 				=> esc_html__('Content Top Header', 'wpdance'),
		        'id' 				=> 'content_top_header_vi',
		        'description'   	=> esc_html__( 'Content top header', 'wpdance' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));
		    register_sidebar(array(
		        'name' 				=> esc_html__('Content Top Header - EN', 'wpdance'),
		        'id' 				=> 'content_top_header_en',
		        'description'   	=> esc_html__( 'Content top header', 'wpdance' ),
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));

		    register_sidebar(array(
		        'name' 				=> esc_html__('Languge Select PC', 'wpdance'),
		        'id' 				=> 'languge-select-pc',
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));	
		    register_sidebar(array(
		        'name' 				=> esc_html__('Languge Select Mobile', 'wpdance'),
		        'id' 				=> 'languge-select',
		        'before_widget' 	=> '<aside id="%1$s" class="widget %2$s">',
		        'after_widget' 		=> '</aside>',
		        'before_title' 		=> '<h2 class="widget-title">',
		        'after_title' 		=> '</h2>',
		    ));		
		}
	}
	//Register Sidebar
	add_action('widgets_init', 'tvlgiao_wpdance_register_sidebar');
?>