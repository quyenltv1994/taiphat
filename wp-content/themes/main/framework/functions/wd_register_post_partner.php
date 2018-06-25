<?php
	add_action('init',  'tvlgiao_wpdance_register_post_partner',0);
	function tvlgiao_wpdance_register_post_partner(){
		register_post_type('partner', array(
			'labels' => array(
				'name' 				=> esc_html__("Partners", 'wpdance'),
				'singular_name' 	=> esc_html__("Partners", 'wpdance'),
            	'new_item'          => esc_html__("Add New Partner", 'wpdance' ),
            	'edit_item'         => esc_html__("Edit Partner", 'wpdance' ),
            	'view_item'   		=> esc_html__("View Partner", 'wpdance' )
			),
			'public' 				=> true,
			'show_in_admin_bar' 	=> true,
			'rewrite'             	=> array('slug' => 'partner'),
			'supports'            	=> array( 'title','excerpt','thumbnail' ),
			'menu_icon'          	=> esc_url(TVLGIAO_WPDANCE_THEME_IMAGES) . '/icon-partner.png',
			'menu_position'			=> 7,
			'capability_type' 		=> 'post'
			
		));
	}
?>