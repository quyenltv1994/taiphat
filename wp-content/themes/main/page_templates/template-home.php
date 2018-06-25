<?php
/*
Template Name: Home Template
*/
get_header(); 
?>
<div id="main-content" class="main-content woocommerce home-page-template">
	<!--  Slider Home Page -->
	<div class="mypc-home-slider">
		<?php get_template_part( 'template_part/home', 'slider' );?>
	</div>
	<!-- About US -->
	<div class="mypc-about-us">
		<?php get_template_part( 'template_part/about', 'us' );?>
	</div>
	<!-- Projet Featured -->
	<div class="mypc-project-featured">
		<?php get_template_part('template_part/project','featured') ?>
	</div>
	<!-- Price Project -->
	<div class="mypc-project-price">
		<?php get_template_part('template_part/project','price') ?>
	</div>
	<!-- Table Price -->
	<div class="mypc-table-price">
		<?php get_template_part('template_part/table','price') ?>
	</div>
	<!-- New Vietlandvn -->
	<div class="mypc-new">
		<?php get_template_part('template_part/new'); ?>
	</div>
</div>
<?php get_footer(); ?>