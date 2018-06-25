<?php
/**
 * Shortcode: tvlgiao_wpdance_image_slider
 */

if (!function_exists('tvlgiao_wpdance_image_slider_function')) {
	function tvlgiao_wpdance_image_slider_function($atts) {
		extract(shortcode_atts(array(
			'image_url'		=> ''
			,'show_nav'		=> '1'
			,'auto_play'	=> '1'
			,'class' 		=> ''
		), $atts));
		$array_image 	= explode(',',$image_url); 

		$i = 0;
		$imglink_array = array();
		foreach($array_image as $_image)
	    {	
	        $img_url = wp_get_attachment_image_src($_image, "full");
	        $imglink_array[$i] = $img_url[0];
	        $i++;
	    }
		ob_start(); ?>
			<div class="wd-shortcode-brand <?php echo esc_attr($class); ?>">				
				<?php foreach($array_image as $_image){ ?>
					<?php $img_url = wp_get_attachment_image_src($_image, "full"); ?>
					<img src="<?php echo esc_url($img_url[0]); ?>" alt="">
				<?php } ?>
			</div>
			<script type="text/javascript">
						jQuery(document).ready(function() {
							"use strict";	
							var $_this = jQuery('.wd-shortcode-brand');
							var owl = $_this.owlCarousel({
								item : 1
								,responsive		:{
									0:{
										items: 1
									},
									480:{
										items: 1
									},
									768:{
										items: 1
									},
									992:{
										items: 1
									},
									1200:{
										items: 1
									}
								}
								,nav : true
								<?php if($show_nav) : ?>
									,navText		: [ '<', '>' ]
								<?php endif; ?>
								<?php if($auto_play) : ?>
									,autoplay: true
									,autoplayTimeout: 4000
								<?php endif; ?>
								<?php if(!$show_nav) : ?>
									,nav : false
								<?php endif; ?>
								,dots			: true
								,loop			: true
								,lazyload		: true
								,onInitialized: function(){
									$_this.addClass('loaded').removeClass('loading');
								}
							});
						});	
			</script>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_image_slider', 'tvlgiao_wpdance_image_slider_function');
?>