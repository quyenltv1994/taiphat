<?php 
if(!class_exists('tvlgiao_wpdance_widget_category_product_search')){
	/**
	 * Category Product Widget
	 *
	 */
	class tvlgiao_wpdance_widget_category_product_search extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'widget_category_product_search', 'description' => esc_html__('Search Product By Category','wpdance'));
			parent::__construct('category_search', esc_html__('WD - Search Product By Category','wpdance'), $widget_ops);
		}
		
		
		function widget( $args, $instance ) {
			extract($args);

			wp_reset_query();	
			$args = array(
				'number'     => '',
				'orderby'    => 'name',
				'order'      => 'ASC',
				'hide_empty' => true,
				'include'    => array()
			);

			$product_categories = get_terms( 'product_cat', $args ); 

			echo wp_kses_post($before_widget);
			$categories_show = '<option value="">'.esc_html__( 'Danh mục sản phẩm', 'wpdance' ).'</option>';
			$check = '';
			if(is_search()){
				if(isset($_GET['term']) && $_GET['term']!=''){
					$check = $_GET['term'];	
				}
			}
			$checked = '';
			foreach($product_categories as $category){
				if(isset($category->slug)){
					if(trim($category->slug) == trim($check)){
						$checked = 'selected="selected"';
					}
					$categories_show  .= '<option '.$checked.' value="'.$category->slug.'">'.$category->name.'</option>';
					$checked = '';
				}
			} ?>
			<div class="search-product-by-category">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ) ?>">
				 	<select class="wd_search_product" name="term"><?php echo balanceTags($categories_show); ?></select>
				 	<div class="wd_search_form">
					 	<input type="text" class="search-field" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_html_e( 'Từ khóa tìm kiếm...', 'wpdance' ); ?> " />
					 	<input type="submit" title="Search" id="searchsubmit" class="search-submit" value="<?php echo esc_attr__( 'Tìm kiếm', 'wpdance' ); ?>" />
					 	<input type="hidden" name="post_type" value="product" />
					 	<input type="hidden" name="taxonomy" value="product_cat" />
				 	</div>
				</form>
			</div>
			<?php 
			echo wp_kses_post($after_widget);
		}
		

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			return $instance;
		}

		function form( $instance ) { 
		}
	}
}
register_widget( 'tvlgiao_wpdance_widget_category_product_search');
?>