<?php
/**
 * Shortcode: tvlgiao_special_post
 */
if(!function_exists('tvlgiao_wpdance_get_partners_function')){
	function tvlgiao_wpdance_get_partners_function($atts,$content){
		extract(shortcode_atts(array(
			'title'					=> '',
			'number'				=> 6,
			'columns'				=> 3,
			'auto_play'				=> '1',
			'class'					=> ''
		),$atts));
		$show_detail = 0;
		$args = array(
			'post_type'				=> 'partner',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page'		=> $number,
			'post_status'			=> 'publish',
		);
		wp_reset_query();
		$home_partners 	= new WP_Query($args);
		ob_start();
		$is_slider = 1;
		if ( $home_partners->have_posts() ) {
			$num_post =  $home_partners->post_count;
			if( $num_post < 2 ){ $is_slider = 0; }
			$random_id = 'wd_special_post'.mt_rand();
			?>
			<div class="wd_partner_homes <?php echo esc_attr( $class ); ?>" id="<?php echo esc_attr( $random_id ); ?>">
				<?php if($title != "") : ?>
					<div class="wd-title">
						<h2><?php echo esc_attr( $title ); ?></h2>
					</div>
				<?php endif; ?>
				<div class="wd-margin-15px">
					<div class="wd-container-partner">
						<?php while( $home_partners->have_posts() ) { $home_partners->the_post(); global $post; ?>
							<?php $url_site_partner = get_the_excerpt($post) ?> 
							<div class="wd-content-service">
								<div class="wd-thumbnail-service">
									<?php if(has_post_thumbnail()){ ?>
										<div class="post_thumbnail_image">
											<a target="_blank" class="wd-effect-blog" href="<?php echo esc_url($url_site_partner); ?>">
												<?php the_post_thumbnail('medium',array('title'=>get_the_title())); ?>
											</a>
										</div>
									<?php } ?>									
								</div>
							</div>
						<?php } // End While ?>
					</div>

					<?php if( $is_slider && $num_post >= $columns  ){ ?>
						<div class="slider_control">
							<a href="#" class="prev">&lt;</a>
							<a href="#" class="next">&gt;</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					"use strict";						
					var $_this = jQuery('#<?php echo esc_attr( $random_id ); ?>');
					var _auto_play = <?php if($auto_play == 1){echo 'true';}else{echo 'false';}; ?>;
					var owl = $_this.find('.wd-container-partner').owlCarousel({
								loop : true
								,items : 1
								,nav : false
								,dots : false
								,navSpeed : 1000
								,slideBy: 1
								,rtl:jQuery('body').hasClass('rtl')
								,navRewind: false
								,autoplay: _auto_play
								,autoplayTimeout: 5000
								,autoplayHoverPause: true
								,autoplaySpeed: false
								,mouseDrag: true
								,touchDrag: true
								,responsiveBaseElement: $_this
								,responsiveRefreshRate: 1000
								,responsive:{
									0:{
										items : 1
									},
									300:{
										items : 2
									},
									579:{
										items : 3
									},
									766	:{
										items : 3
									},
									1100:{
										items : <?php echo $columns ?>
									}
								}
								
								,onInitialized: function(){
								}
							});
							$_this.on('click', '.next', function(e){
								e.preventDefault();
								owl.trigger('next.owl.carousel');
							});

							$_this.on('click', '.prev', function(e){
								e.preventDefault();
								owl.trigger('prev.owl.carousel');
							});
				});
			</script>
			<?php 	
		}
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_query();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_get_partners','tvlgiao_wpdance_get_partners_function');
?>