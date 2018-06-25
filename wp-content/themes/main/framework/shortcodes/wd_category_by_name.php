<?php
/**
 * Shortcode: tvlgiao_wpdance_category_by_name
 */

if (!function_exists('tvlgiao_wpdance_category_by_name_function')) {
	function tvlgiao_wpdance_category_by_name_function($atts) {
		extract(shortcode_atts(array(
			'id_category'		=> '-1'
			,'image_url'		=> ''
			,'title'			=> '1'
			,'readmore'			=> '1'
			,'meta'				=> '1'
			,'class'			=> ''

		), $atts));
		$img = wp_get_attachment_image_src($image_url, "full");
		$imgSrc = $img[0];
		wp_reset_query();	

		$product_categorie 		= get_term( $id_category, 'product_cat' );
		$thumbnail_category 	= get_woocommerce_term_meta( $id_category , 'thumbnail_id', true ); 
		$image_url_category 	= wp_get_attachment_url( $thumbnail_category );   	
		ob_start(); ?>
			<?php if($id_category == '-1') : ?>
				<?php esc_html_e('Please select category.','wpdance'); ?>
			<?php else: ?>
				<div class="wd-cate-pro-by-name wd-box-event-index">
					<div class="wd-cover-img">
						<figure>
							<a href="<?php echo get_category_link($id_category); ?>">
								<img alt="<?php bloginfo('name'); ?>" src="<?php echo $image_url_category; ?>"/>
							</a>
						</figure>
					</div>
					<div class="wd-category-name">
						<a href="<?php echo get_category_link($id_category); ?>">
							<span><?php echo $product_categorie->name; ?></span>
						</a>
					</div>
				</div>
			<?php endif; ?>
		<?php
		$content = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_category_by_name', 'tvlgiao_wpdance_category_by_name_function');
?>