<?php
/*
Template Name: Page Project
*/
get_header(); 
?>
<?php tvlgiao_wpdance_init_breadcrumbs() ?>
<div id="main-content" class="main-content woocommerce mypc-page-projects">
	<?php $args = array(
		'posts_per_page'   => -1,
		'offset'           => 0,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'post_type'        => 'du_an',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts_array = get_posts( $args ); ?>
	<div class="container">
		<div class="mypc-content-page-project" >
			<?php foreach ($posts_array as $project) { ?>
				<div class="mypc-content-pro mypc_ratio_<?=get_field('mypc_ratio',$project->ID)?>">
					<div class="mypc-img-bg-hover" style="background-image: url(<?=get_the_post_thumbnail_url($project->ID,'image_size_project')?>)">
						<img class="mypc-img-pc" src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/'.get_field('mypc_ratio',$project->ID).'.png'?>" alt="<?=$project->post_title?>">
						<img class="mypc-img-mobile" src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/1x1.png'?>" alt="<?=$project->post_title?>">
					</div>
					<h3 class="mypc-tile-pro"><?=$project->post_title?></h3>
					<div class="mmypc-hover-pro">
						<div class="mypc-hover-pro-wrap">
							<h4><?=$project->post_title?></h4>
							<span><?=get_field('mypc_pro_description',$project->ID)?></span>
							<?php
								if(get_field('mypc_link_sub_project',$project->ID) != ''){
									$link_pro = get_field('mypc_link_sub_project',$project->ID);
								}else{
									$link_pro = get_permalink($project->ID);
								}
							?>
							<a href="<?=$link_pro?>" alt="<?=$project->post_title?>"><?=__('Xem thêm','wpdance')?></a>
						</div>
					</div>			
				</div>
			<?php } // End Forearch?>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.mypc-content-page-project').masonry('reload', {
				itemSelector: '.mypc-content-pro',
			});		 
		});
	</script>
</div>
<?php get_footer(); ?>