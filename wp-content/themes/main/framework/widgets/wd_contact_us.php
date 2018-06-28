<?php 
if(!class_exists('tvlgiao_wpdance_contact_us')){
	/**
	 * Ads Widget class
	 *
	 */
	class tvlgiao_wpdance_contact_us extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'widget_contact', 'description' => esc_html__('Contact US','wpdance'));
			$control_ops = array('width' => 400, 'height' => 350);
			parent::__construct('contact_us', esc_html__('WD - CONTACT US','wpdance'), $widget_ops);
		}

		function widget( $args, $instance ) {
			extract($args);
			$title 			= apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
			$phone_number 	= $instance['phone_number'];
			$description 	= $instance['description'];
	
			echo  wp_kses_post($before_widget) ; ?>
			<div class="wd-contact-us-sidebar">
				<?php if ( !empty( $title ) ) { echo wp_kses_post( $before_title . "HOTLINE" . $after_title ); } ?>
				<div class="wd-content-contact">
					<div class="us-image">
						<img alt="tel:<?php echo esc_attr($phone_number); ?>" border="0" src="http://www.sunrisecity.net.vn/_/rsrc/1460712149031/home/tuvan1.png">
					</div>
					<div class="us-infortion">
						<h4><?php echo esc_attr($title); ?></h4>
						<a href="tel:<?php echo esc_attr($phone_number); ?>" title="<?php echo esc_attr($title); ?>">
							<span><?php echo esc_attr($phone_number); ?></span>
						</a>
					</div>
					<div class="clear"></div>
				</div>
				<?php if($description != "") : ?>
					<div class="us-description">
						<i><?php echo esc_attr($description); ?></i>
					</div>
				<?php endif; ?>
			</div>
			<?php
			echo wp_kses_post($after_widget) ;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = esc_attr($new_instance['title']);
			$instance['phone_number'] = esc_attr($new_instance['phone_number']);
			$instance['description'] = esc_attr($new_instance['description']);
			return $instance;
		}

		function form( $instance ) {
			$instance 		= wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
			$title 			= strip_tags($instance['title']);
			$phone_number 	= isset($instance['phone_number']) ? esc_attr($instance['phone_number']) : '';
			$description 	= isset($instance['description']) ? esc_attr($instance['description']) : '';
			?>
		
			<p><label for="<?php echo esc_attr( $this->get_field_id('title')); ?>"><?php esc_html_e('Title','wpdance'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" name="<?php echo esc_attr( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $instance['title']); ?>" /></p>
			
			<p><label for="<?php echo esc_attr( $this->get_field_id('phone_number')); ?>"><?php esc_html_e('phone_number','wpdance'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone_number')); ?>" name="<?php echo esc_attr( $this->get_field_name('phone_number')); ?>" type="text" value="<?php echo esc_attr( $phone_number); ?>" /></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id('description')); ?>"><?php esc_html_e('description','wpdance'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('description')); ?>" name="<?php echo esc_attr( $this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr( $description); ?>" /></p>
			<?php
		}
	}
}
register_widget( 'tvlgiao_wpdance_contact_us');
?>