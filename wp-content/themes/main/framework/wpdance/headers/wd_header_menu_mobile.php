<?php
	$default_logo 	= TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png';
	$logo_url	  	= get_theme_mod('tvlgiao_wpdance_header_logo_url', $default_logo); 
	$sticky_menu 	= get_theme_mod('tvlgiao_wpdance_header_sticky_menu'); 
	$current_user 	= wp_get_current_user();
	$class_login	= "";
	if ( 0 != $current_user->ID ) {
		$class_login = "wp-user-login-mobile";
	}
	$lang  			= 'vi';
	if(class_exists('Polylang')){ $lang = pll_current_language('slug'); } 
?>		
<div class="wd-header-bottom">
	<div class="container">
		<?php $header_middle = 'content_top_header_'.$lang;?>
		<?php if ( is_active_sidebar( $header_middle  ) ) : ?>
			<div class="row	">								
				<div class="wd-header-info wd-header-top">
					<?php dynamic_sidebar( $header_middle  ); ?>
				</div>					
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="wd-header-logo">
				<a href="<?php  echo home_url();?>">
					<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
				</a>
			</div>
			<div class="wd-header-menu">
				<a class="menu-bars open-menu"><i class="fa fa-bars"></i></a>
				<div class="pushmenu-left <?php echo esc_attr($class_login);?>">
					<div class="mypc-top-menu">
						<a class="menu-bars close-menu"><i class="fa fa-bars"></i></a>
						<a href="<?php  echo home_url();?>" class="mypc-logo-show">
							<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
						</a>
					</div>
					<?php
						if( has_nav_menu( 'primary_mobile' ) ){ 
							wp_nav_menu( array( 'container_class' => 'mobile-main-menu toggle-menu','theme_location' => 'primary_mobile' ) ); 
						}
						else{
							wp_nav_menu( array( 'container_class' => 'mobile-main-menu toggle-menu','menu_class' => 'nav navbar-nav responsive-nav main-nav-list', 'theme_location' => 'primary' ) ); 
						}
					?>
				</div>
			</div>
			<div class="wd-header-cart">
				<?php if ( is_active_sidebar('languge-select') ) : ?>
					<div class="wd-languge-site-mobile">
						<?php dynamic_sidebar('languge-select'); ?>	
					</div>
				<?php endif; ?>	
			</div>
		</div>
	</div>
</div>