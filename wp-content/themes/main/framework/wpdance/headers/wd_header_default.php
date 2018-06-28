<?php
	$default_logo 	= TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png';
	$logo_url	  	= get_theme_mod('tvlgiao_wpdance_header_logo_url', $default_logo); 
	$sticky_menu 	= get_theme_mod('tvlgiao_wpdance_header_sticky_menu'); 
	$lang  			= 'vi';
	if(class_exists('Polylang')){ $lang = pll_current_language('slug'); }
?>

<div class="container">
	<div class="row">
		<div class="wd-header-logo">
			<a href="<?php  echo home_url();?>">
				<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
			</a>
		</div>
		<div class="wd-header-menu">
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav responsive-nav main-nav-list')); ?>
		</div>
	</div>
</div>

