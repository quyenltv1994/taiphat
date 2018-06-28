<?php
	// Banner Image
	vc_map(array(
		'name' 				=> esc_html__("Banner Image", 'wpdance'),
		'base' 				=> 'tvlgiao_wpdance_banner_image',
		'description' 		=> esc_html__("Banner Image", 'wpdance'),
		'category' 			=> esc_html__("WPDance", 'wpdance'),
		"params" => array(
			array(
				"type" 			=> "attach_image",
				"class" 		=> "",
				"heading" 		=> esc_html__("Background Image", 'wpdance'),
				"param_name" 	=> "bg_image",
				"value" 		=> "",
				"description" 	=> 'Background image banner',
			)
			,array(
				"type" 			=> "textfield",
				"class" 		=> "",
				"heading" 		=> esc_html__("Link Button", 'wpdance'),
				"param_name" 	=> "link_url",
				"description" 	=> '',
			)
			,array(
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