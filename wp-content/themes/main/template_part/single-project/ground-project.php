<?php
	$ground_args = get_field('mypc_pro_gallery_image'); 
?>
<?php if(count($ground_args) > 0) : ?>
<div class="container">
	<h2 class="mypc_title"><?=__('Mặt Bằng Dự Án','wpdance'); ?></h2>
</div>
<div class="mypc-content-ground-pro">
	<div id="mypc-slider-ground">
		<?php foreach ($ground_args as $ground) { ?>
		<div class="ground-item">
			<div class="mypc-bg-img-change" style="background-image: url(<?=$ground['url']?>)">
				<img src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/1920x1080.png'?>">
			</div>
		</div>
		<?php } // End Forearch ?>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			"use strict";						
			$('#mypc-slider-ground').owlCarousel({
				loop : true
				,items : 1
				,nav : false
				,dots : false
				,navSpeed : 1000
				,nav: true
				,navigation: true
				,slideBy: 1
				,autoplay: true
				,autoplayTimeout: 5000
				,autoplayHoverPause: true
				,autoplaySpeed: false
				,mouseDrag: true
				,touchDrag: true
				,responsive:{
						0:{
							stagePadding: 0
						},
						300:{
							stagePadding: 0
						},
						579:{
							stagePadding: 80
						},
						767:{
							stagePadding: 100
						},
						1100:{
							stagePadding: 150
						}
				}
			});
		});
	</script>
</div>
<?php endif; ?>