<?php
/**
 * Shortcode: tvlgiao_special_post
 */
if(!function_exists('tvlgiao_wpdance_get_testimonial_function')){
	function tvlgiao_wpdance_get_testimonial_function($atts,$content){
		extract(shortcode_atts(array(
			'title'					=> '',
			'number'				=> 6,
			'columns'				=> 3,
			'number_excerpt'		=> 30,
			'auto_play'				=> '1',
			'class'					=> ''
		),$atts));
		$show_detail = 0;
		$args = array(
			'post_type'				=> 'testimonial',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page'		=> $number,
			'post_status'			=> 'publish',
		);
		wp_reset_query();
		$home_testimonials = new WP_Query($args);
		ob_start();
		$is_slider = 1;
		if ( $home_testimonials->have_posts() ) {
			$num_post =  $home_testimonials->post_count;
			if( $num_post < 2 ){ $is_slider = 0; }
			$random_id = 'wd_testimonial_post'.mt_rand();
			?>
			<div class="wd_testimonial_homes <?php echo esc_attr( $class ); ?>" id="<?php echo esc_attr( $random_id ); ?>">
				<?php if($title != "") : ?>
					<div class="wd-title">
						<h2><?php echo esc_attr( $title ); ?></h2>
					</div>
				<?php endif; ?>
				<div class="wd-margin-15px">
					<div class="wd-container-testimonial wd-shortcode-testimonials style-3">
						<?php while( $home_testimonials->have_posts() ) { $home_testimonials->the_post(); global $post; ?>
							<?php
								$testimonial_meta 	= get_post_meta($post->ID,'_testimonial_meta_box',true);
								$testimonial_meta 	= unserialize($testimonial_meta);	
							?>
							<div class="wd-testimonial">			
								<?php if(has_post_thumbnail()){ ?>
									<div class="wd-avatar">
										<a class="wd-effect-blog" href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('image_size_testimonial',array('title'=>get_the_title())); ?>
										</a>
									</div>
								<?php } ?>
								<div class="wd-info-testimonial">
									<div class="wd-conent-testimonial">
										<?php tvlgiao_wpdance_the_excerpt_max_words($number_excerpt); ?>
									</div>
									<div class="wd-author-byline">
										<span class="wd-author">
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_html__( 'Permalink to %s', 'wpdance' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
												<?php echo esc_attr(get_the_title()); ?>
											</a>
										</span>
										<span class="wd-byline"><?php echo esc_attr($testimonial_meta['testi_byline']);?></span>
										<span class="wd-rate">
											<?php for($i=1; $i<= (int)$testimonial_meta['testi_url']; $i++) { ?>
												<i class="fa fa-star" aria-hidden="true"></i>
											<?php } // End For ?>
										</span>
									</div>
								</div>
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
					var _auto_play = <?php echo esc_attr( $auto_play ); ?> == 1;
					var owl = $_this.find('.wd-container-testimonial').owlCarousel({
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
										items : <?php echo $columns -1 ?>
									},
									579:{
										items : <?php echo $columns?>
									},
									767:{
										items : <?php echo $columns ?>
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
add_shortcode('tvlgiao_wpdance_get_testimonial','tvlgiao_wpdance_get_testimonial_function');
?>