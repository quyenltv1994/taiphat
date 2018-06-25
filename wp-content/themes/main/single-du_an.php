<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Wordpress
 */
?>
<?php get_header(); ?>
<div id="main-content" class="main-content wd-container-single">
	<!-- Image Project -->
	<div class="mypc-pro-slider">
		<?php get_template_part( 'template_part/single-project/image', 'project' );?>
	</div>
	<!-- Info Project -->
	<div class="mypc-sigle-info-pro">
		<?php get_template_part( 'template_part/single-project/info', 'project' );?>
	</div>
	<!-- Type Project -->
	<div class="mypc-type-pro">
		<?php get_template_part( 'template_part/single-project/type', 'project' );?>
	</div>
	<!-- Ground Project -->
	<div class="mypc-ground-pro">
		<?php get_template_part( 'template_part/single-project/ground', 'project' );?>
	</div>
	<!-- Service Project -->
	<div class="mypc-ground-pro mypc-service-pro">
		<?php get_template_part( 'template_part/single-project/service', 'project' );?>
	</div>
	<!-- Why US -->
	<div class="mypc-why-us">
		<?php get_template_part( 'template_part/single-project/why-us', 'project' );?>
	</div>
	<!-- Image and Video -->
	<div class="mypc-image-video">
		<?php get_template_part( 'template_part/single-project/video', 'project' );?>
	</div>
</div><!-- END CONTAINER  -->
<?php get_footer(); ?>