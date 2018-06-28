<?php
 	$pro_utilitys = get_field('pro_utilitys'); 
?>
<?if($pro_utilitys) : ?>
<div class="container">
	<div class="mypc-info-service">
		<h2><?=__('Tiện Ích','wpdance')?></h2>
		<div class="mypc-des-sever-over"><?=get_field('mypc_des_service')?></div>
	</div>
	<div class="mypc-content-service">
		<div class="mypc-slider-service">
			<?php foreach ($pro_utilitys as $item) { ?>
				<div class="mypc-service-item">
					<div class="post_thumbnail_image">
						<?php
							$img_ = wp_get_attachment_image_src($item['pro_utility_image'],'image_size_project');
						?>
						<div class="mypc-bg-img-change" style="background-image: url(<?=$img_[0]?>)">
							<img src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/450x305.png'?>" alt="<?=$item['pro_utility_name']?>">
						</div>
					</div>
					<h3 class="mypc-service-name">
						<?=$item['pro_utility_name']?>
					</h3>
				</div>
			<?php } // End Foreach?>
		</div>
		<div class="slider_control">
			<a href="#" class="prev">&lt;</a>
			<a href="#" class="next">&gt;</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		"use strict";						
		var $_this = jQuery('.mypc-content-service');
		var owl = $_this.find('.mypc-slider-service').owlCarousel({
					loop : true
					,items : 3
					,nav : false
					,dots : false
					,navSpeed : 1000
					,slideBy: 1
					,navRewind: false
					,autoplay: true
					,autoplayTimeout: 5000
					,autoplayHoverPause: true
					,autoplaySpeed: false
					,mouseDrag: true
					,touchDrag: true
					,responsiveBaseElement: $_this
					,responsiveRefreshRate: 1000
					,responsive:{
						0:{
							items : 1
						},
						300:{
							items : 1
						},
						579:{
							items : 2
						},
						767:{
							items : 3
						},
						1100:{
							items : 3
						}
					}
					
					,onInitialized: function(){
					}
				});
				$_this.on('click', '.next', function(e){
					e.preventDefault();
					owl.trigger('next.owl.carousel');
				});

				$_this.on('click', '.prev', function(e){
					e.preventDefault();
					owl.trigger('prev.owl.carousel');
				});
	});
</script>
<?php endif; ?>