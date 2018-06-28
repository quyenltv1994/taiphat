<?php
/**
 * Shortcode: tvlgiao_wpdance_special_gird_list_blog
 */

if (!function_exists('tvlgiao_wpdance_program_gird_list_function')) {
	function tvlgiao_wpdance_program_gird_list_function($atts) {
		extract(shortcode_atts(array(
			'id_category'				=> '-1',
			'number_program'			=> '12',
			'show_gird_list'			=> 'gird',
			'columns'					=> '1',
			'excerpt_words'				=> '20',
			'class'						=> ''

		), $atts));
		wp_reset_query();
		// New blog
		$args = array(  
			'post_type' 		=> 'program',  
			'posts_per_page' 	=> $number_program,
			'paged' 			=> get_query_var('paged')
		);
		//Category
		if( $id_category != -1 ){
			$args['tax_query']= array(
					    	array(
							    	'taxonomy' 		=> 'category',
									'terms' 		=> $id_category,
									'field' 		=> 'term_id',
									'operator' 		=> 'IN'
								),
			   			);				
		}
		$special_programs 		= new WP_Query( $args );

		$gird_list_class 	= "wd-gird-style";
		if($show_gird_list != 'gird'){
			$gird_list_class = "wd-list-style";
		}
		$span_class 		= "col-sm-".(24/$columns);
		ob_start(); ?>
		<?php if( $special_programs->have_posts() ) :?>
			<div class='wd-shortcode-special-blog wd-related-wrapper content_blog <?php echo esc_attr($class); ?> <?php echo esc_attr($gird_list_class); ?>'>
				<?php while( $special_programs->have_posts() ) : $special_programs->the_post(); global $post; ?>
					<div class="wd-load-more-content-blog <?php echo esc_attr($span_class);?>">
						<div class="wd-wrap-content-blog  wd-wrap-content-room">
							<div>
								<!-- Post type: Show Thumbnail -->
								<?php if( has_post_thumbnail() ): ?>
									<div class="wd-thumbnail-post">
										<a class="thumbnail" href="<?php the_permalink(); ?>">
											<?php
												the_post_thumbnail('medium');
											?>
										</a>
									</div>
								<?php endif; // End If ?>

								<div class="wd-info-post">
									<div class="wd-title-post">
										<h3 class="wd-heading-title">
											<a href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
										</h3>
									</div>								
									<div class="wd-content-detail-post">
										<?php $excerpt 	= tvlgiao_wpdance_string_limit_words(get_the_excerpt() , $excerpt_words )."..."; echo esc_attr($excerpt); ?>
									</div>
								</div>
							</div>
						</div>	
					</div>					
				<?php endwhile; ?>			
			</div>
			<div class="clear"></div>
			<div class="wd-pagination">
				<?php tvlgiao_wpdance_pagination(3, $special_programs) ?>
			</div>
		<?php endif;// End have post ?>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_program_gird_list', 'tvlgiao_wpdance_program_gird_list_function');
?>