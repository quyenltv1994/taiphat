<?php
	$data_args = get_field('mypc_content_welfare');
?>
<?php if($data_args) : ?>
<div class="container">
	<h2 class="mypc-title"><?=get_field('title_welfare')?></h2>
	<div class="mypc-content-why-us">
		<div class="welfare-wrap-slider" id="welfare-wrap-slider">
			<?php foreach ($data_args as $item) { ?>
				<div class="welfare-item-content">
					<div class="icon-welfare">
						<img src="<?=$item['icon']?>">
					</div>
					<h3><?=$item['title']?></h3>
					<div class="content-welfare">
						<?=$item['description']?>
					</div>
				</div>
			<?php } ?>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$("#welfare-wrap-slider").owlCarousel({
			    	loop: true,
			        nav: true,
			        autoplay: true,
			        arrows: false,
			        navigation: false,
					responsive:{
						0:{
							items : 1
						},
						300:{
							items : 1
						},
						579:{
							items : 2
						},
						766	:{
							items : 2
						},
						1100:{
							items : 4
						}
					}	
				});			 
			});
		</script>
	</div>
</div>
<?php endif; ?>