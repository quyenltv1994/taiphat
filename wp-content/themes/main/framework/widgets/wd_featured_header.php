<?php 
if(!class_exists('tvlgiao_wpdance_widget_featued')){
	/**
	 * Ads Widget class
	 *
	 */
	class tvlgiao_wpdance_widget_featued extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'wd_featured_header', 'description' => esc_html__('Advertisment  Widget','wpdance'));
			$control_ops = array('width' => 400, 'height' => 350);
			parent::__construct('featured_header', esc_html__('WD - Featured','wpdance'), $widget_ops);
		}

		function widget( $args, $instance ) {
			extract($args);
			$img 			= strlen($instance['img']) > 0 ?  $instance['img']  : "";
			$img_title 		= $instance['img_title'];
			//we progress split youtube links and titles here
			echo  wp_kses_post($before_widget) ;
			if ( !empty( $title ) ) { echo wp_kses_post( $before_title . $title . $after_title ); } ?>
			<div class="wd-featured-header">
				<img src="<?php echo esc_url($img)?>"  alt="<?php echo esc_attr($img_title) ?>" title="<?php echo esc_attr($img_title) ?>"/>
				<span class="wd-content-featured"><?php echo esc_attr($img_title); ?></span>
			</div>
			<?php
			echo wp_kses_post($after_widget) ;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = esc_attr($new_instance['title']);
			$instance['img'] = esc_url($new_instance['img']);
			$instance['img_title'] = esc_attr($new_instance['img_title']);
			return $instance;
		}

		function form( $instance ) {
			$instance 		= wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
			$title 			= strip_tags($instance['title']);
			$img 			= isset($instance['img']) ? esc_attr($instance['img']) : '';
			$imageTitle 	= isset($instance['img_title']) ? esc_attr($instance['img_title']) : '';?>
			<p><label for="<?php echo esc_attr( $this->get_field_id('img') ); ?>"><?php esc_html_e('Image Url','wpdance'); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('img') ); ?>" name="<?php echo esc_attr( $this->get_field_name('img') ); ?>" type="text" value="<?php echo esc_attr($img); ?>" /></p>
			
			<p><label for="<?php echo esc_attr( $this->get_field_id('img_title') ); ?>"><?php esc_html_e('Image title','wpdance'); ?> : </label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('img_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('img_title') ); ?>" type="text" value="<?php echo esc_attr( esc_attr($imageTitle) ); ?>" /></p>
		<?php }
	}
}
register_widget( 'tvlgiao_wpdance_widget_featued');
?>