<?php
/**
 * Shortcode: tvlgiao_special_post
 */
if(!function_exists('tvlgiao_wpdance_get_services_function')){
	function tvlgiao_wpdance_get_services_function($atts,$content){
		extract(shortcode_atts(array(
			'title'					=> '',
			'style_service'			=> 'style-thumbnail',
			'number'				=> 6,
			'columns'				=> 3,
			'number_excerpt'		=> 30,
			'auto_play'				=> '1',
			'class'					=> ''
		),$atts));
		$show_detail = 0;
		$args = array(
			'post_type'				=> 'service',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page'		=> $number,
			'post_status'			=> 'publish',
			'meta_key'				=> '_serivce_show_homes',
			'meta_value'			=> '1',
		);
		wp_reset_query();
		$home_services = new WP_Query($args);
		ob_start();
		$is_slider = 1;
		if ( $home_services->have_posts() ) {
			$num_post =  $home_services->post_count;
			if( $num_post < 2 ){ $is_slider = 0; }
			$random_id = 'wd_special_post'.mt_rand();
			?>
			<div class="wd_service_homes <?php echo esc_attr( $class ); ?> <?php echo esc_attr( $style_service ); ?>" id="<?php echo esc_attr( $random_id ); ?>">
				<?php if($title != "") : ?>
					<div class="wd-title">
						<h2><?php echo esc_attr( $title ); ?></h2>
					</div>
				<?php endif; ?>
				<div class="wd-margin-15px">
					<div class="wd-container-service">
						<?php while( $home_services->have_posts() ) { $home_services->the_post(); global $post; ?>
							<div class="wd-content-service">
								<?php if($style_service == 'style-thumbnail'){ ?>
									<div class="wd-thumbnail-service">
										<?php if(has_post_thumbnail()){ ?>
											<div class="post_thumbnail_image">
												<a class="wd-effect-blog" href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail('medium',array('title'=>get_the_title())); ?>
												</a>
											</div>
										<?php } ?>
										<h4>
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_html__( 'Permalink to %s', 'wpdance' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
												<?php echo esc_attr(get_the_title()); ?>
											</a>
										</h4>
										<p><?php tvlgiao_wpdance_the_excerpt_max_words($number_excerpt); ?></p>
									</div>
								<?php }else{ ?>
									<div class="wd-icon-service">
										<span><i class="fa <?php echo esc_attr(get_post_meta($post->ID,'_serivce_font_icon',true)); ?>" aria-hidden="true"></i></span>
										<h4>
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_html__( 'Permalink to %s', 'wpdance' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
												<?php echo esc_attr(get_the_title()); ?>
											</a>
										</h4>
										<p><?php tvlgiao_wpdance_the_excerpt_max_words($number_excerpt); ?></p>
									</div>
								<?php } // End IF ?>
		
							</div>
						<?php } // End While ?>
					</div>

					<?php if( $is_slider ){ ?>
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
					var owl = $_this.find('.wd-container-service').owlCarousel({
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
										items : 2
									},
									767:{
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
add_shortcode('tvlgiao_wpdance_get_services','tvlgiao_wpdance_get_services_function');
?>