<?php
/*
Template Name: Home Template
*/
get_header();
?>
	<div class="banner">
		<?php
		get_template_part('template_part/slider_home');
		?>
	</div>
	<div class="slogan__home" id="gioi_thieu">
		<?php
			get_template_part('template_part/slogan_home');
		?>
	</div>
	<div class="service" id="dichvu">
		<?php
		get_template_part('template_part/service');
		?>
	</div>
<?php get_footer(); ?>