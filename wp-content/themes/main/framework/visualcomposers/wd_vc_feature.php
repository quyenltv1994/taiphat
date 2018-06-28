<?php
	if( post_type_exists('feature') || class_exists('Woothemes_Features') ){
		$feature_options = array();
		$args = array(
			'post_type'			=> 'feature'
			,'post_status'		=> 'publish'
			,'posts_per_page' 	=> -1
			);
		$feature_options = tvlgiao_wpdance_vc_get_data($args);

		vc_map( array(
			'name' 			=> esc_html__( 'Feature By Woo', 'wpdance' )
			,'base' 		=> 'tvlgiao_wpdance_feature'
			,'category' 	=> esc_html__( 'WD Content', 'wpdance')
			,'params' 		=> array(
				array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Feature ID', 'wpdance' )
					,'param_name' 		=> 'id'
					,'admin_label' 		=> true
					,'value' 			=> $feature_options
					,'description' 		=> ''
				 )
				,array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Show thumbnail or icon font', 'wpdance' )
					,'param_name' 		=> 'show_icon_font_thumbnail'
					,'admin_label' 		=> true
					,'value' => array(
							'Show icon font'	=> '1'
							,'Show thumbnail'	=> '0'
							
						)
					,'description' 		=> ''
				)
				,array(
					'type' 				=> 'iconpicker',
					'heading' 			=> esc_html__( 'Icon', 'wpdance' ),
					'param_name' 		=> 'icon_fontawesome',
					'value' 			=> 'fa fa-adjust',
					'settings' 			=> array(
						'emptyIcon' 		=> false,
						'iconsPerPage' 		=> 4000,
					),
					'description' 		=> esc_html__( 'Select icon from library.', 'wpdance' ),
					'dependency'  		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('1'))
				)
				,array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Style Font Icon', 'wpdance' )
					,'param_name' 		=> 'style_font'
					,'admin_label' 		=> true
					,'value' => array(
							 'Style Icon 1'			=> 'style-font-1'
							,'Style Icon 2'			=> 'style-font-2'
							,'Style Icon 3'			=> 'style-font-3'
							,'Style Icon 4'			=> 'style-font-4'
							,'Style Icon 5'			=> 'style-font-5'
							,'Style Icon 6'			=> 'style-font-6'
							,'Style Icon 7'			=> 'style-font-7'
							,'Style Icon 8'			=> 'style-font-8'
							,'Style Icon 9'			=> 'style-font-9'
							,'Style Icon 10'		=> 'style-font-10'
						)
					,'description' 		=> ''
					,'dependency'		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('1'))
				)
				,array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Style Thumbnail', 'wpdance' )
					,'param_name' 		=> 'style_thumbnail'
					,'admin_label' 		=> true
					,'value' => array(
							 'Style Thumbnail 1'	=> 'style-thumbnail-1'
							,'Style Thumbnail 2'	=> 'style-thumbnail-2'
							,'Style Thumbnail 3'	=> 'style-thumbnail-3'
							,'Style Thumbnail 4'	=> 'style-thumbnail-4'
							,'Style Thumbnail 5'	=> 'style-thumbnail-5'
							,'Style Thumbnail 6'	=> 'style-thumbnail-6'
							,'Style Thumbnail 7'	=> 'style-thumbnail-7'
							,'Style Thumbnail 8'	=> 'style-thumbnail-8'
						)
					,'description' 		=> ''
					,'dependency'		=> Array('element' => "show_icon_font_thumbnail", 'value' => array('0'))
				)
				,array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Show feature title', 'wpdance' )
					,'param_name' 		=> 'title'
					,'admin_label' 		=> true
					,'value' 			=> array(
							'Yes'	=> 'yes'
							,'No'	=> 'no'
						)
					,'description' 		=> ''
				)
				,array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Show excerpt', 'wpdance' )
					,'param_name' 		=> 'excerpt'
					,'admin_label' 		=> true
					,'value' 			=> array(
							'Yes'	=> 'yes'
							,'No'	=> 'no'
						)
					,'description' 		=> ''
				)
				,array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Show Readmore', 'wpdance' )
					,'param_name' 		=> 'readmore'
					,'admin_label' 		=> true
					,'value' 			=> array(
							'Yes'	=> 'yes'
							,'No'	=> 'no'
						)
					,'description' 		=> ''
				)
				,array(
					'type' 				=> 'dropdown'
					,'heading' 			=> esc_html__( 'Active', 'wpdance' )
					,'param_name' 		=> 'active'
					,'admin_label' 		=> true
					,'value' => array(
							'No'	=> 'no'
							,'Yes'	=> 'yes'
						)
					,'description' 		=> ''
				),
				array(
					'type' 				=> 'textfield',
					'class' 			=> '',
					'heading' 			=> esc_html__("Extra class name", 'wpdance'),
					'description'		=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
					'admin_label' 		=> true,
					'param_name' 		=> 'class',
					'value' 			=> ''
				),
			)
		));
	}
?>