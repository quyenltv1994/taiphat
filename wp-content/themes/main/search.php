<?php
/**
 * The template for displaying search results pages
 *
 * @package Wordpress
 * @since wpdance
 */
?>
<?php get_header(); ?>
<?php
	/*CUSTOM DEFAULT*/
	$layout 		= get_theme_mod('tvlgiao_wpdance_default_page_layout','0-1-0');
	$sidebar_left 	= get_theme_mod('tvlgiao_wpdance_default_page_sidebar_left','sidebar');
	$sidebar_right 	= get_theme_mod('tvlgiao_wpdance_default_page_sidebar_right','sidebar');
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
				<!-- Left Content -->
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
							<?php if(isset($_GET['post_type']) && $_GET['post_type'] == 'rooms'){ ?>
								<?php echo do_shortcode('[tvlgiao_wpdance_search_rooms]'); ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'content', 'rooms' ); ?>
								<?php endwhile; ?>
							<?php }else{ ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'content', get_post_format() ); ?>
								<?php endwhile; ?>
							<?php } // Endif ?>
							<!-- Start the Loop --> 

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
