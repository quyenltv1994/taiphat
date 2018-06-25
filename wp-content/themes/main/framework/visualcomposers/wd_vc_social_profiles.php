<?php
	//Social Profiles
	vc_map(array(
		'name' 				=> esc_html__("Social Profiles", 'wpdance'),
		'base' 				=> 'tvlgiao_wpdance_social_profiles',
		'description' 		=> esc_html__("Social Profiles", 'wpdance'),
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
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Style Show", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "style",
				"value" => array(
						'Style 1' 		=> 'style-1',
						'Style 2' 		=> 'style-2'
					),
				"description" 	=> ""
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Title Social", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_title",
				"value" => array(
						'Yes' 		=> '1',
						'No' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show RSS", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_rss",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("RSS ID", 'wpdance'),
				'description' 	=> esc_html__("res id", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'rss_id',
				'value' 		=> '#'
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Twitter", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_twitter",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Twitter ID", 'wpdance'),
				'description' 	=> esc_html__("twitter id", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'twitter_id',
				'value' 		=> '#'
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Facebook", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_facebook",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Facebook ID", 'wpdance'),
				'description' 	=> esc_html__("facebook id", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'facebook_id',
				'value' 		=> '#'
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Google", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_google",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Google ID", 'wpdance'),
				'description' 	=> esc_html__("google id", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'google_id',
				'value' 		=> '#'
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Pin", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_pin",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Pin ID", 'wpdance'),
				'description' 	=> esc_html__("pin id", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'pin_id',
				'value' 		=> '#'
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Youtube", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_youtube",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("Youtube ID", 'wpdance'),
				'description' 	=> esc_html__("youtube id", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'youtube_id',
				'value' 		=> '#'
			),
			array(
				"type" 			=> "dropdown",
				"class" 		=> "",
				"heading" 		=> esc_html__("Show Instagram", 'wpdance'),
				"admin_label" 	=> true,
				"param_name" 	=> "show_instagram",
				"value" => array(
						'Show' 		=> '1',
						'Hide' 		=> '0'
					),
				"description" 	=> ""
			),
			array(
				'type' 			=> 'textfield',
				'class' 		=> '',
				'heading' 		=> esc_html__("RSS Instagram", 'wpdance'),
				'description' 	=> esc_html__("instagram id", 'wpdance'),
				'admin_label' 	=> true,
				'param_name' 	=> 'instagram_id',
				'value' 		=> '#'
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