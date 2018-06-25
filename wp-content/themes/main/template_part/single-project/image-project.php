<?php
	$images_array = get_field('mypc_pro_gallery_image');
?>
<div class="mypc-image-project">
	<div class="mypc-slider-top">
		<div id="mypc-image-project-slider" class="mypc-project-content-slider">
			<?php foreach ($images_array as $image) { ?>	
				<div class="mypc-project-item">
					<div class="mypc-bg-img-change" style="background-image: url(<?=$image['url']?>)">
						<img src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/1920x1080.png'?>" alt="<?=$image['name']?>">
					</div>
				</div>
			<?php }; // End Forearch?>
		</div>
		<div class="mypc-title-single-pro">
			<h2 class="wd-heading-title"><?php the_title(); ?></h2>
		</div>
	</div>
	<div class="mypc-slider-bottom">
		<?php foreach ($images_array as $image) { ?>
			<div class="mypc-project-control">
				<img src="<?=$image['sizes']['image_size_thumbnail']?>" alt="<?=$image['name']?>">
			</div>
		<?php }; // End Forearch?>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#mypc-image-project-slider").owlCarousel({
	    	loop: true,
	        nav: true,
	        autoplay: true,
	        arrows: true,
	        animateOut: 'animated fadeOut',
	        animateIn: 'animated fadeIn',
	        navigation: true,
	        dotsContainer: '.mypc-slider-bottom',
	        responsive: {
	            0: {
	                items: 1
	            }
	        }		
		});			 
	});
</script>