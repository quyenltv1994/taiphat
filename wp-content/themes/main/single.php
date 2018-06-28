<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Wordpress
 */
?>
<?php get_header(); ?>

<?php
	global $post;
	$post_ID		= tvlgiao_wpdance_get_post_by_global();
	//Set Post View
	tvlgiao_wpdance_set_post_views($post_ID);
	//Post Config
	$_post_config 	= get_post_meta($post_ID, '_tvlgiao_wpdance_custom_post_config', true);
	$_post_config 	= unserialize($_post_config);
	$post_layout 	= $_post_config['layout'];
	//Customize Config
	$layout 		= get_theme_mod('tvlgiao_wpdance_single_blog_layout','0-1-0');
	if($post_layout != "0"){
		$layout 	= $post_layout;
	}
	$sidebar_left 	= get_theme_mod('tvlgiao_wpdance_single_blog_sidebar_left','sidebar');
	$sidebar_right 	= get_theme_mod('tvlgiao_wpdance_single_blog_sidebar_right','sidebar');
	$row_class 		= '';
	$row_class_1 	= '';
	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-sm-18";
		$row_class_1 ="row";
	}elseif($layout == '1-0-1'){
		$content_class = "col-sm-12";
		$row_class_1 ="row";
	}else{
		$content_class = "col-sm-24";
		$row_class ="row";
	}
    $lang  			= 'vi';
	if(class_exists('Polylang')){ $lang = pll_current_language('slug'); }	
?>
<?php tvlgiao_wpdance_init_breadcrumbs() ?>
<div id="main-content" class="main-content wd-container-single">
	<div class="container">
		<div class="wd-box-show-content">
			<div class="row">
				<div class="wd-padding-left-right-15">
					<div class="col-sm-6 wd-sidebar-left-rooms">
						<?php $sidebar_right = $sidebar_right.'_'.$lang; ?>
						<?php if (is_active_sidebar($sidebar_right) ) : ?>
								<?php dynamic_sidebar( $sidebar_right ); ?>
						<?php endif; ?>
					</div>
					<!-- Content Single Post -->
						<div class="col-sm-18">
							
							<div class="wd-content-single wd-content-single-rooms">					

								<div class="wd-info-post">
									<div class="wd-title-post">
										<h2 class="wd-heading-title">
											<a href="<?php the_permalink();?>" class="wd-title-post"><?php echo get_the_title($post_ID); ?></a>
										</h2>
									</div>
									<div class="wd-meta-post">
										<div class="wd-date-create-post">
											<?php the_time('j F, Y'); ?>
										</div>
										<div class="wd-category-post">
											<?php esc_html_e('in ','wpdance'); ?>
											<?php the_category(esc_html__(', ', 'wpdance')); ?>
										</div>
									</div>
									<div class="wd-content-detail-post">
										<?php while ( have_posts() ) : the_post();  ?>
											<!-- Content Post -->
											<?php get_template_part( 'content', 'single' ); ?>				
										<?php endwhile; // End of the loop. ?>
									</div>
								</div>
							</div>
							<div class="wd-related_posts">
								<?php get_template_part( 'templates/wd_related_posts' ); ?>	
							</div>
							<div class="wd-registration-purchase">
								<?php if ( is_active_sidebar('registration_purchase') ) : ?>
									<?php dynamic_sidebar('registration_purchase'); ?>
								<?php endif; ?>
							</div>
						</div>
					<!-- Right Content -->
				</div>
			</div>
		</div>
	</div>
</div><!-- END CONTAINER  -->
<?php get_footer(); ?>