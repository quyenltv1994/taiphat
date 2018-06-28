<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Wordpress
 * @since wpdance
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>"/>

	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<meta name="google-site-verification" content="1gg09_JTj_xq9Ciy_L021cDQhRs-ZBn5hRFK-En-n28" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="main" class="main">
	<header id="header" class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
		<div class="button__menu-container">
			<div class="button__menu-container__open">
				<button class="button__menu-open">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<div class="button__menu-container__close">
				<button class="button__menu-close"></button>
			</div>
		</div>
		<div class="wrapper-fullwidth">
			<div class="header__logo">
				<a href="<?php  echo get_home_url(); ?>" class="header__logo-link">
					<img src="<?php echo TVLGIAO_WPDANCE_THEME_ASSET_URI ?>/images/logo.png" alt="">
				</a>
			</div>
			<div class="header__menu">
				<nav id="menu" class="menu" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array(
						'menu' => 'Main Menu',
						'menu_class' => ''
					) ); ?>
				</nav>
				<a href="" class="read__article">
					<span>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png" alt="">
					</span>
				</a>
			</div>
			<div class="header__right">
				<div class="tele">
					<div>
					<?php
					$count = count( get_field('phone_number', 'option') );
					$i = 0;
						if(have_rows('phone_number', 'option')):
							while(have_rows('phone_number', 'option')): the_row();
					?>
								<a href="tel:<?php the_sub_field('number'); ?>"><?php the_sub_field('text'); ?></a>
								<?php
									if(++$i < $count){
										echo " - ";
									}
								?>
					<?php
							endwhile;
						endif;
					?>
						</div>
				</div>
				<div class="email">
					<div>
						<a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
						</div>
				</div>
			</div>
		</div>
	</header>
	<main id="main__content" class="main__content" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
