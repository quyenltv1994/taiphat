<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @package Wordpress
 * @since wpdance
 */
?>
<?php get_header(); ?>
<?php
	/*CUSTOM DEFAULT*/
	$layout 		= get_theme_mod('tvlgiao_wpdance_archive_blog_layout','0-1-0');
	$sidebar_left 	= get_theme_mod('tvlgiao_wpdance_archive_blog_sidebar_left' ,'sidebar');
	$sidebar_right 	= get_theme_mod('tvlgiao_wpdance_archive_blog_sidebar_right','sidebar');
	if( ($layout == '1-0-0') || ($layout == '0-0-1') ){
		$content_class = "col-sm-18";
	}elseif($layout == '1-0-1'){
		$content_class = "col-sm-12";
	}else{
		$content_class = "col-sm-24";
	}
	$lang  			= 'vi';
	if(class_exists('Polylang')){ $lang = pll_current_language('slug'); }	
?>
<?php tvlgiao_wpdance_init_breadcrumbs() ?>
<div id="main-content" class="main-content">
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
					<!-- Content Index -->
					<div class="col-sm-18 wd-list-style wd-shortcode-special-blog">
						<?php if ( have_posts() ) : ?>
							<!-- Start the Loop --> 
							<?php while ( have_posts() ) : the_post(); ?>
								<?php
									get_template_part( 'content', 'rooms' );
								?>
							<?php endwhile; ?>
							<!-- End the Loop -->
							<div class="wd-pagination">
								<?php tvlgiao_wpdance_pagination(); ?>
							</div>
							<div class="wd-registration-purchase">
								<?php if ( is_active_sidebar('registration_purchase') ) : ?>
									<?php dynamic_sidebar('registration_purchase'); ?>
								<?php endif; ?>
							</div>
						<?php else: ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; // End If Have Post ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- END CONTAINER  -->
<?php get_footer(); ?>