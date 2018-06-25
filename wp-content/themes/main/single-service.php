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
	//Customize Config
	$layout 		= get_theme_mod('tvlgiao_wpdance_single_blog_layout','0-1-0');
	$sidebar_left 	= get_theme_mod('tvlgiao_wpdance_single_blog_sidebar_left','sidebar');
	$sidebar_right 	= get_theme_mod('tvlgiao_wpdance_single_blog_sidebar_right','sidebar');
	// Lang
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
					<div class="wd-content-service-single">					
						<div class="wd-title-post">
							<h2 class="wd-heading-title">
								<a href="<?php the_permalink();?>" class="wd-title-post"><?php echo get_the_title($post_ID); ?></a>
							</h2>
						</div>
						<div class="wd-content-detail-post">
							<?php while ( have_posts() ) : the_post();  ?>
								<!-- Content Post -->
								<?php get_template_part( 'content', 'single' ); ?>
							<?php endwhile; // End of the loop. ?>
						</div>					
					</div>
					<div class="wd-related_posts">
						<?php get_template_part( 'templates/wd_related_services' ); ?>	
					</div>
				</div>
				<!-- Right Content -->
			</div>
			</div>
		</div>
	</div>
</div><!-- END CONTAINER  -->
<?php get_footer(); ?>