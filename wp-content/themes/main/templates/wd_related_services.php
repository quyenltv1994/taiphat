<?php
	$is_slider 		= false;
	$gallery_ids 	= array();
	$galleries 		= wp_get_post_terms($post->ID,'gallery');
	if(!is_array($galleries))
		$galleries 	= array();
	foreach($galleries as $gallery){
		if( $gallery->count > 0 ){
			array_push( $gallery_ids,$gallery->term_id );
		}	
	}
	if(!empty($galleries) && count($gallery_ids) > 0 )
		$args = array(
			'post_type'=>$post->post_type,
				'tax_query' => array(
				array(
					'taxonomy'	=> 'gallery',
					'field' 	=> 'id',
					'terms' 	=> $gallery_ids
				)
			),
			'post__not_in'	=> array($post->ID),
			'posts_per_page'=> 5,
		);
	else
		$args = array(
		'post_type'			=> $post->post_type,
		'post__not_in'		=> array($post->ID),
		'posts_per_page'	=> 5,
	);
	wp_reset_postdata();
	$related=new WP_Query($args);
	$count=0;
	$random_id = 'wd-related-wrapper-'.mt_rand();
?>
<div class="wd-related-post related block-wrapper wd-related-custom-css">
	<div class="wd-title-wrapper">
		<div class="wd-title-bottom">
			<h4 class="entry-title"><?php esc_html_e('Related Service','wpdance'); ?></h4>
		</div>
	</div>
	<div class="wd-related-wrapper <?php echo esc_attr($random_id); ?>">
		<div class="wd-related-slider wd-list-style wd-shortcode-special-blog">
			<?php if($related->have_posts()) : ?>
				<?php if( $related->post_count > 1 ) $is_slider = true; ?>
				<?php while($related->have_posts()) : $related->the_post(); $count++; global $post;?>
					<?php get_template_part( 'content'); ?>
				<?php endwhile; // End while ?>
			<?php endif; ?>
		</div>
	</div>
</div>
