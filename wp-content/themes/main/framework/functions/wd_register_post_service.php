<?php
	add_action('init',  'tvlgiao_wpdance_register_post_service',0);
	function tvlgiao_wpdance_register_post_service(){
		register_post_type('service', array(
			'labels' => array(
				'name' 				=> esc_html__("Services", 'wpdance'),
				'singular_name' 	=> esc_html__("Services", 'wpdance'),
            	'new_item'          => esc_html__("Add New Service", 'wpdance' ),
            	'edit_item'         => esc_html__("Edit Service", 'wpdance' ),
            	'view_item'   		=> esc_html__("View Service", 'wpdance' )
			),
			'public' 				=> true,
			'show_in_admin_bar' 	=> true,
			'rewrite'             	=> array('slug' => 'service'),
			'supports'            	=> array( 'title', 'editor','excerpt','thumbnail' ),
			'menu_icon'          	=> esc_url(TVLGIAO_WPDANCE_THEME_IMAGES) . '/icon-service.png',
			'menu_position'			=> 7,
			'capability_type' 		=> 'post'
			
		));
		register_taxonomy( 'category-service', array( 'service' ), array(
			'labels'            => array(
				'name' 				=> esc_html__('Service Categories', 'wpdance'),
				'singular_name' 	=> esc_html__('Service Categories', 'wpdance'),
            	'new_item'          => esc_html__('Add New', 'wpdance' ),
            	'edit_item'         => esc_html__('Edit Category', 'wpdance' ),
            	'view_item'   		=> esc_html__('View Category', 'wpdance' ),
            	'add_new_item'      => esc_html__('Add New Service Categories', 'wpdance' ),
            	'menu_name'         => esc_html__('Service Categories' , 'wpdance' ),
			),
			'public'           	 	=> true,
			'show_admin_column' 	=> true,
			'hierarchical'      	=> true,
			'query_var'         	=> true,
			'rewrite'           	=> array( 'slug' => 'category-service' ),	
		));
	}

	// Metabox
	add_action( 'admin_init', 'tvlgiao_wpdance_service_metaboxes' );
	function tvlgiao_wpdance_service_metaboxes() {
		add_meta_box( 'tx_service_meta', 'Config Service', 'tvlgiao_wpdance_service_metaboxes_html', 'service', 'side', 'default');
	}
	function tvlgiao_wpdance_service_metaboxes_html(){
		global $post;
		$post_id = $post->ID;
		$service_home 	= get_post_meta($post_id,'_serivce_show_homes',true);
		$font_icon 		= get_post_meta($post_id,'_serivce_font_icon',true);	
		?>
		<div class="wd-service">
			<p>
				<input type="checkbox" name="service-home" id="service-home" value="1" <?php if($service_home == '1') echo 'checked' ?>/><?php esc_html_e('Show Homes', 'wpdance'); ?>
				<br><span class="description"><?php esc_html_e('Check if show service at home page', 'wpdance') ?></span></td>
			</p>
			<p>
				<label><?php esc_html_e('Service Icon','twentysixteen');?> </label><br/>
				<input type="text" name="service-icon" id="service-icon" value="<?php echo esc_attr($font_icon);?>" />
				<br><span class="description"><?php esc_html_e('Click here get font icon: ', 'twentysixteen') ?><a href="http://fontawesome.io/icons/"><?php esc_html_e('Font Icon', 'twentysixteen') ?></a><?php esc_html_e(' - ex: fa fa-user', 'twentysixteen') ?></span></td>
			</p>
			<input type="hidden" name="meta_service" class="change-layout" value="meta_service"/>	
		</div>
		<?php
	}
	//Save Metabox
	add_action( 'save_post', 'tvlgiao_wpdance_service_save_meta', 1, 2 );
	function tvlgiao_wpdance_service_save_meta($post_id){
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
		if( isset($_POST['meta_service']) && $_POST['meta_service'] == 'meta_service'){
			$service_home = $_POST['service-home'];
			update_post_meta($post_id,'_serivce_show_homes',$service_home);	
			$font_icon = $_POST['service-icon'];
			update_post_meta($post_id,'_serivce_font_icon',$font_icon);	
		}
	}
?>