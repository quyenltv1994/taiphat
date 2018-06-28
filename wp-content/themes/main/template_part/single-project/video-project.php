<?php
	$array_image = get_field('mypc_image_videos'); 
?>
<?php if($array_image) : ?>
	<div class="container">
		<h2 class="mypc_title"><?=__('Hình Ảnh & Video', 'wpdance')?></h2>
	</div>

	<div class="mypc-image-video-content">			
		<?php foreach($array_image as $item_image){ ?>
			<div class="mypc-item-image">
				<div class="mypc-item-img">		
					<!-- Image -->
					<?php if($item_image['acf_fc_layout'] == 'project_image') { ?>
						<?php $img_ =  wp_get_attachment_image_src($item_image['image'],'full');?>
						<div class="mypc-bg-img-change" style="background-image: url(<?=$img_['0']?>)">
							<img src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/1920x1080.png'?>" alt="hình ảnh Việt LandVN">
						</div>
					<?php } ?>
					
					<!-- Video -->
					<?php if($item_image['acf_fc_layout'] == 'project_video') { ?>
						<?php $img_ =  wp_get_attachment_image_src($item_image['image_video'],'full');?>
						<div class="mypc-bg-img-change" style="background-image: url(<?php echo esc_url($img_[0]); ?>)">
							<img src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/1920x1080.png'?>" alt="hình ảnh Việt LandVN">
						</div>
						<div class="mypc-content-video">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$item_image["id_video"]?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						</div>
					<?php } ?>
				</div>
				<h3><?=$item_image['title']?></h3>
			</div>
		<?php } ?>
	</div>
	<script type="text/javascript">
				jQuery(document).ready(function() {
					"use strict";	
					var $_this = jQuery('.mypc-image-video-content');
					var owl = $_this.owlCarousel({
						item : 1
						,responsive		:{
							0:{
								items: 1
								,stagePadding: 0
							},
							480:{
								items: 1
								,stagePadding: 0
							},
							768:{
								items: 1
								,stagePadding: 100
							},
							992:{
								items: 1
								,stagePadding: 100
							},
							1200:{
								items: 1
								,stagePadding: 100
							}
						}
						,stagePadding: 100
						,navText		: [ '<', '>' ]
						,nav: true
						,autoplay: false
						,autoplayTimeout: 4000
						,loop			: true
						,lazyload		: true
					});
				});	
	</script>
<?php endif; ?>