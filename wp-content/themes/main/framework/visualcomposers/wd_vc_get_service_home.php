<?php
	// Special Blog
	vc_map(array(
		'name' 				=> esc_html__("Get Services Home", 'wpdance'),
		'base' 				=> 'tvlgiao_wpdance_get_services',
		'description' 		=> esc_html__("Display service in home page", 'wpdance'),
		'category' 			=> esc_html__("WPDance", 'wpdance'),
		'params' => array(
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Title", 'wpdance'),
				'description' 	=> esc_html__("Title", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'title',
				'value' 		=> ''
			),
			array(
				'type' 				=> 'dropdown',
				'heading' 			=> esc_html__( 'Style', 'wpdance' ),
				'param_name' 		=> 'style_service',
				'admin_label' 		=> true,
				'value' => array(
						'Style Thumbnail'	=> 'style-thumbnail',
						'Style Icon'		=> 'style-icon'
						
					),
				'description' 		=> '',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Post", 'wpdance'),
				'description' 	=> esc_html__("number", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'number',
				'value' 		=> '6'
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Columns", 'wpdance'),
				'description' 	=> esc_html__("Columns", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'columns',
				'value' 		=> '3',
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Number Excerpt", 'wpdance'),
				'description' 	=> esc_html__("Number Excerpt", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'number_excerpt',
				'value' 		=> '30'
			),			
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Auto Play", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "auto_play",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> "",
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Extra class name", 'wpdance'),
				'description'	=> esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'class',
				'value' 		=> ''
			)
		)
	));
?>