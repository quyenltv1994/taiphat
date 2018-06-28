<?php
/*
Template Name: Template Width Sidebar
*/
get_header(); 

	$post_ID		= tvlgiao_wpdance_get_post_by_global();
	/*PAGE CONFIG*/
	$_page_config 	= get_post_meta($post_ID, '_tvlgiao_wpdance_custom_page_config', true);
	$_page_config 	= unserialize($_page_config);
	$page_layout 	= $_page_config['layout'];
	$layout 		= get_theme_mod('tvlgiao_wpdance_default_page_layout','0-1-0');
	if($page_layout != "0"){
		$layout 	= $page_layout;
	}
	/*CUSTOM DEFAULT*/
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
<div id="main-content" class="main-content mypc-template-new">
	<div class="container">
		<div class="row">
			<div class="wd-padding-left-right-15">
				<div class="col-sm-6">	
					<?php $sidebar_right = $sidebar_right.'_'.$lang; ?>
					<?php if (is_active_sidebar($sidebar_right) ) : ?>
							<?php dynamic_sidebar( $sidebar_right ); ?>
					<?php endif; ?>
				</div>					
				<div class="col-sm-18">
					<div class="wd-content-blog wd-padding-ul-content">
						<div id="primary" class="content-area">
							<main id="main" class="site-main">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php the_content(); ?>	
								<?php endwhile; ?>
							</main><!-- #main -->
						</div><!-- #primary -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>