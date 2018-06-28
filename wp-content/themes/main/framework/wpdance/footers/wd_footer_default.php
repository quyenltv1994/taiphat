<?php
	$default_logo 	= TVLGIAO_WPDANCE_THEME_IMAGES.'/wpdance_logo.png';
	$logo_url	  	= get_theme_mod('tvlgiao_wpdance_header_logo_url', $default_logo); 
	$copyright = get_theme_mod('tvlgiao_wpdance_footer_copyright_text',esc_html__('Copyright CodeSpot. All rights reserved.','wpdance'));
?>
<div class="wd-footer-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="wd-footer-logo">
					<a href="<?php  echo home_url();?>">
						<img src='<?php echo esc_url($logo_url); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a>
				</div>
				<?php if ( is_active_sidebar( 'footer_info' ) ) : ?>
					<div class="wd-footer-info">
						<ul class="xoxo">
							<?php dynamic_sidebar( 'footer_info' ); ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-6">
				<?php if ( is_active_sidebar( 'footer_top_01' ) ) : ?>
					<div class="wd-footer-info">
						<ul class="xoxo">
							<?php dynamic_sidebar( 'footer_top_01' ); ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-6">
				<?php if ( is_active_sidebar( 'footer_top_02' ) ) : ?>
					<div class="wd-footer-info">
						<ul class="xoxo">
							<?php dynamic_sidebar( 'footer_top_02' ); ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-6">
				<?php if ( is_active_sidebar( 'instagram' ) ) : ?>
					<div class="wd-footer-instagram">
						<ul class="xoxo">
							<?php dynamic_sidebar( 'instagram' ); ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="wd-footer-bottom">
	<div class="container">
		<div class="row">
			<div class="wd-footer-info">
				<?php echo esc_attr($copyright); ?>
			</div>
			<div class="wd-footer-">

			</div>
		</div>
	</div>
</div>
