<?php
	add_action('init',  'tvlgiao_wpdance_register_post_testimonial',0);
	function tvlgiao_wpdance_register_post_testimonial(){
		register_post_type('testimonial', array(
			'labels' => array(
				'name' 				=> esc_html__("Testimonials", 'wpdance'),
				'singular_name' 	=> esc_html__("Testimonials", 'wpdance'),
            	'new_item'          => esc_html__("Add New Testimonial", 'wpdance' ),
            	'edit_item'         => esc_html__("Edit Testimonial", 'wpdance' ),
            	'view_item'   		=> esc_html__("View Testimonial", 'wpdance' )
			),
			'public' 				=> true,
			'show_in_admin_bar' 	=> true,
			'rewrite'             	=> array('slug' => 'testimonial'),
			'supports'            	=> array( 'title', 'editor','thumbnail' ),
			'menu_icon'          	=> esc_url(TVLGIAO_WPDANCE_THEME_IMAGES) . '/icon-testimonial.png',
			'menu_position'			=> 9,
			'capability_type' 		=> 'post'
			
		));
	}

	// Metabox
	add_action( 'admin_init', 'tvlgiao_wpdance_testimonial_metaboxes' );
	function tvlgiao_wpdance_testimonial_metaboxes() {
		add_meta_box( 'tx_testimonial_meta', 'Config Testimonial', 'tvlgiao_wpdance_testimonial_metaboxes_html', 'testimonial', 'side', 'default');
	}
	function tvlgiao_wpdance_testimonial_metaboxes_html(){
		global $post;
		$post_id = $post->ID;
		$testimonial_meta 	= get_post_meta($post_id,'_testimonial_meta_box',true);
		$testimonial_meta 	= unserialize($testimonial_meta);	
		?>
		<div class="wd-testimonial">
			<p>
				<label><?php esc_html_e('Byline','wpdance');?> </label>
				<input type="text" name="testimonial-byline" id="testimonial-byline" value="<?php echo esc_attr($testimonial_meta['testi_byline']);?>" />
				<br><span class="description"><?php esc_html_e('Enter a byline for the customer giving this testimonial (for example: "CEO of WooThemes")', 'wpdance') ?></span></td>
			</p>
			<p>
				<label><?php esc_html_e('Rate Star','wpdance');?> </label>
				<input type="text" name="testimonial-url" id="testimonial-url" value="<?php echo esc_attr($testimonial_meta['testi_url']);?>" />
				<br><span class="description"><?php esc_html_e('Enter number star', 'wpdance') ?></span></td>
			</p>
			<input type="hidden" name="meta_testimonial" class="change-layout" value="meta_testimonial"/>	
		</div>
		<?php
	}
	//Save Metabox
	add_action( 'save_post', 'tvlgiao_wpdance_testimonial_save_meta', 1, 2 );
	function tvlgiao_wpdance_testimonial_save_meta($post_id){
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
		if( isset($_POST['meta_testimonial']) && $_POST['meta_testimonial'] == 'meta_testimonial'){
			$_default_post_config = array(
				'testi_url' 	=> $_POST['testimonial-url'],
				'testi_byline'	=> $_POST['testimonial-byline']
			);
			$ret_str = serialize($_default_post_config);
			update_post_meta($post_id,'_testimonial_meta_box',$ret_str);
		}
	}
?>