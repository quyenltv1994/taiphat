<?php
	add_action('init',  'tvlgiao_wpdance_register_post_program',0);
	function tvlgiao_wpdance_register_post_program(){
		register_post_type('program', array(
			'labels' => array(
				'name' 				=> esc_html__("Programs", 'wpdance'),
				'singular_name' 	=> esc_html__("Programs", 'wpdance'),
            	'new_item'          => esc_html__("Add New Program", 'wpdance' ),
            	'edit_item'         => esc_html__("Edit Program", 'wpdance' ),
            	'view_item'   		=> esc_html__("View Program", 'wpdance' )
			),
			'public' 				=> true,
			'show_in_admin_bar' 	=> true,
			'rewrite'             	=> array('slug' => 'program'),
			'supports'            	=> array( 'title', 'editor','excerpt','thumbnail' ),
			'menu_icon'          	=> esc_url(TVLGIAO_WPDANCE_THEME_IMAGES) . '/icon-program.png',
			'menu_position'			=> 5,
			'capability_type' 		=> 'post'
			
		));
		register_taxonomy( 'category-program', array( 'program' ), array(
			'labels'            => array(
				'name' 				=> esc_html__('Program Categories', 'wpdance'),
				'singular_name' 	=> esc_html__('Program Categories', 'wpdance'),
            	'new_item'          => esc_html__('Add New', 'wpdance' ),
            	'edit_item'         => esc_html__('Edit Category', 'wpdance' ),
            	'view_item'   		=> esc_html__('View Category', 'wpdance' ),
            	'add_new_item'      => esc_html__('Add New Program Categories', 'wpdance' ),
            	'menu_name'         => esc_html__('Program Categories' , 'wpdance' ),
			),
			'public'           	 	=> true,
			'show_admin_column' 	=> true,
			'hierarchical'      	=> true,
			'query_var'         	=> true,
			'rewrite'           	=> array( 'slug' => 'category-program' ),	
		));
	}
?>