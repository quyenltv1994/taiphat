<?php
	$blog_category = array();
	$blog_category[esc_html__('All Category','wpdance')] = -1;
	$categories = 	get_terms( 'category-program', 
								array('hide_empty' 	=> 0)
							 );
	foreach ($categories as $category ) {
		$blog_category[$category->slug] = $category->term_id;
	}
	wp_reset_postdata();

	vc_map(array(
			"name"				=> esc_html__("Programs Gird/List",'wpdance'),
			"base"				=> 'tvlgiao_wpdance_program_gird_list',
			'description' 		=> esc_html__("Programs Gird/List", 'wpdance'),
			"category"			=> esc_html__("WPDance",'wpdance'),
			"params"=>array(	
				array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Select Category', 'wpdance' )
					,'param_name' 	=> 'id_category'
					,'admin_label' 	=> true
					,'value' 		=> $blog_category
					,'description' 	=> ''
				),
				array(
					'type'			=> 'textfield'
					,'heading' 		=> esc_html__( 'Number of programs', 'wpdance' )
					,'param_name' 	=> 'number_program'
					,'admin_label' 	=> true
					,'value' 		=> '12'
				),
				array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Show Gird/List', 'wpdance' )
					,'param_name' 	=> 'show_gird_list'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'Show Gird'		=> 'gird'
							,'Show List'	=> 'list'
						)
					,'description' => ''
				),
				array(
					'type' 			=> 'dropdown'
					,'heading' 		=> esc_html__( 'Columns', 'wpdance' )
					,'param_name' 	=> 'columns'
					,'admin_label' 	=> true
					,'value' 		=> array(
							'1 Columns'		=> '1'
							,'2 Columns'	=> '2'
							,'3 Columns'	=> '3'
							,'4 Columns'	=> '4'
						)
					,'description' => ''
				),
				array(
					'type' 			=> 'textfield'
					,'heading' 		=> esc_html__( 'Number of excerpt words', 'wpdance' )
					,'param_name' 	=> 'excerpt_words'
					,'admin_label' 	=> true
					,'value' 		=> '20'
					,'description' 	=> ''
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
		)
	);
?>