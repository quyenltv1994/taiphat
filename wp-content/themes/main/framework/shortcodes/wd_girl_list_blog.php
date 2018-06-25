<?php
/**
 * Shortcode: tvlgiao_wpdance_special_gird_list_blog
 */

if (!function_exists('tvlgiao_wpdance_special_gird_list_blog_function')) {
	function tvlgiao_wpdance_special_gird_list_blog_function($atts) {
		extract(shortcode_atts(array(
			'id_category'				=> '-1'
			,'data_show'				=> 'recent_blog'
			,'number_blogs'				=> '12'
			,'show_data_image_slider'	=> '1'
			,'show_gird_list'			=> 'gird'
			,'sort'						=> 'term_id'
			,'order_by'					=> 'DESC'
			,'columns'					=> '1'
			,'excerpt_words'			=> '20'
			,'pagination_loadmore'		=> '1'
			,'number_loadmore'			=> '8'
			,'class'					=> ''

		), $atts));
		wp_reset_query();
		// New blog
		$args = array(  
			'post_type' 		=> 'tin_tuc',  
			'posts_per_page' 	=> $number_blogs,
			'orderby' 			=> $sort,
			'order'				=> $order_by,
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
		}else{
			$args['tax_query']= array(
					    	array(
									'taxonomy' 		=> 'category',
									'field'    		=> 'slug',
									'terms'    		=> 'video-tho-tay',
									'operator' 		=> 'NOT IN',
							)
			   			);
		}
		//Most View Products
		if($data_show == 'mostview_blog'){
			$args['meta_key'] 	= '_wd_post_views_count';
			$args['orderby'] 	= 'meta_value_num';
			$args['order'] 		= 'DESC';
		}
		//Most Comment
		if($data_show == 'comment_blog'){
			$args['orderby']		= 'comment_count';
		}	
		$special_blogs 		= new WP_Query( $args );

		$gird_list_class 	= "wd-gird-style";
		if($show_gird_list != 'gird'){
			$gird_list_class = "wd-list-style";
		}
		$span_class 		= "col-sm-".(24/$columns);
		$class_video= "";
		if($show_data_image_slider == "0" && $show_gird_list == "gird" /*GRID*/){
			$class= "wd-custom-style-video";
		}
		ob_start(); ?>
		<?php if( $special_blogs->have_posts() ) :?>
			<div class='wd-shortcode-special-blog wd-related-wrapper content_blog <?php echo esc_attr($class); ?> <?php echo esc_attr($gird_list_class); ?> <?php echo esc_attr($class_video); ?>'>
				<?php while( $special_blogs->have_posts() ) : $special_blogs->the_post(); global $post; ?>
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
			<?php if($pagination_loadmore == "1") : ?>
				<div class="wd-pagination">
					<?php tvlgiao_wpdance_pagination(3, $special_blogs) ?>
				</div>
			<?php endif; ?>
			<?php if($pagination_loadmore == "0") : ?>
				<div class="wd-loadmore">
					<div style="display: none;" id="show_image_loading">
						<img src="<?php echo SC_IMAGE.'/ajax-loader_image.gif';?>" alt="HTML5 Icon" style="height:15px;">
					</div>

					<div id="loadmore">
						<a href="#" class="button btn_loadmore_blog"><?php _e('LOAD MORE','wpdance') ?></a>
					</div>
				</div>
				<div class="hidden">
					<input type="text" value="<?php echo esc_attr($number_loadmore); ?>" id="tvlgiao_blog_number_loadmore">
					<input type="text" value="<?php echo esc_attr($id_category); ?>" id="tvlgiao_blog_id_category">	
					<input type="text" value="<?php echo esc_attr($data_show); ?>" id="tvlgiao_blog_data_show">
					<input type="text" value="<?php echo esc_attr($columns); ?>" id="tvlgiao_blog_columns">
					<input type="text" value="<?php echo esc_attr($show_data_image_slider); ?>" id="tvlgiao_blog_show_data_image_slider">
					<input type="text" value="<?php echo esc_attr($show_gird_list); ?>" id="tvlgiao_blog_show_gird_list">
				</div>					
			<?php endif; ?>
		<?php endif;// End have post ?>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_special_gird_list_blog', 'tvlgiao_wpdance_special_gird_list_blog_function');
?>