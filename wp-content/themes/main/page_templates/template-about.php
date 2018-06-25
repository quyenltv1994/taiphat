<?php
/*
Template Name: About US
*/
get_header(); 
?>
<?php tvlgiao_wpdance_init_breadcrumbs() ?>
<div id="main-content" class="main-content woocommerce mypc-page-about-us">
	<div class="container">
		<!-- About US -->
		<div class="mypc-us-about">
			<div class="mypc-us-description">
				<h2><?=__('Về Chúng Tôi','wpdance')?></h2>
				<span><?=get_field('mypc_info_company');?></span>
			</div>
			<div class="mypc-us-image">
				<?php
				$image = wp_get_attachment_image_src(get_field('mypc_image_company'),'full');
				?>
				<?php if($image) : ?>
					<img src="<?=$image[0]?>" alt="Việt Land VN">
				<?php endif; ?>
			</div>
			<div class="mypc-us-image-cloned">
				<?php if($image) : ?>
					<img src="<?=$image[0]?>" alt="Việt Land VN">
				<?php endif; ?>

			</div>
		</div>
		<!-- Service -->
		<div class="mypc-services">
			<h2 class="mypc_title"><?=__('Dịch Vụ','wpdance');?></h2>
			<?php
			$service_args = get_field('mypc_services');
			?>
			<?php foreach ($service_args as $service) { ?>
			<?php $img_ser = wp_get_attachment_image_src($service['mypc_serivce_img'],'image_size_post_second'); ?>
			<div class="mypc-service-item">
				<img src="<?=$img_ser[0]?>" alt="Dịch Vụ Việt Land VN">
				<h3><?=$service['mypc_service_name']?></h3>
				<ul>
					<?php foreach ($service['mypc_service_des'] as $name) { ?>
					<li><?=$name['title']?></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- Partner -->
	<div class="mypc-company-partner">
		<div class="container">
			<h2 class="mypc_title"><?=__('Đối Tác','wpdance')?></h2>
			<?php
			$partners = get_field('mypc_partners');
			?>
			<div class="mypc-content-partner">
				<?php foreach ($partners as $partner) { ?>
				<div class="mypc-partner-item">
					<a href="<?=$partner['link_website']?>">
						<img src="<?=$partner['logo_partner']?>">
					</a>
				</div>
				<?php } // End forearch ?>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function() {
					"use strict";	
					var $_this = jQuery('.mypc-content-partner');
					var owl = $_this.owlCarousel({
						item : 1
						,responsive		:{
							0:{
								items: 2
							},
							480:{
								items: 3
							},
							768:{
								items: 3
							},
							992:{
								items: 4
							},
							1200:{
								items: 5
							}
						}
						,navigation: true
						,nav: true
						,navText		: [ '<', '>' ]
						,autoplay: true
						,autoplayTimeout: 4000
						,loop			: true
						,lazyload		: true
						,onInitialized: function(){
							$_this.addClass('loaded').removeClass('loading');
						}
					});
				});	
			</script>
		</div>
	</div>
	<!-- Projects -->
	<div class="mypc-project-delivery">
		<div class="container">
			<h2 class="mypc_title"><?=__('Dự Án Phân Phối', 'wpdance')?></h2>
		</div>
		<?php
		$project_delivery = get_field('mypc_project_about');
		?>
		<?php foreach ($project_delivery as $project) { ?>
		<?php
		$style = $project['style_project'];
		$style = $style[0];
		?>
		<div class="mypc-content-project mypc-pro-<?=$style?>" style="background-image: url(<?=$project['mypc_pro_image']?>)">
			<div class="container">
				<?php if($style == 'left') : ?>
					<div class="mypc-project mypc-img-pc">
						<?php $info_pro = $project['mypc_info_project']; ?>
						<?php $image 	= wp_get_attachment_image_src($info_pro['pro_img'],'full'); ?>
						<img src="<?=$image[0]?>" alt="Việt Land VN">
						<div class="mypc-info-pro-sub">
							<h3><?=$info_pro['pro_name']?></h3>
							<span><?=$info_pro['pro_description'];?></span>
						</div>
					</div>					
				<?php endif; ?>

				<div class="mypc-investors">
					<?php $investors = $project['mypc_info_investors']; ?>
					<h3><?=$investors['investors_name']?></h3>
					<div class="content-inver-des">
						<?=$investors['investors_description']?>
					</div>
				</div>
				<?php $info_pro = $project['mypc_info_project']; ?>
				<?php $image 	= wp_get_attachment_image_src($info_pro['pro_img'],'full'); ?>
				<div class="mypc-project mypc-img-mobile" >
					<div class="mypc-img-bg-cover" style="background-image: url(<?=$image[0]?>)">
						<img class="mypc-img-mobile" src="<?=TVLGIAO_WPDANCE_THEME_IMAGES.'/1x1.png'?>">
					</div>
					<div class="mypc-info-pro-sub">
						<h3><?=$info_pro['pro_name']?></h3>
						<span><?=$info_pro['pro_description'];?></span>
					</div>
				</div>
				<?php if($style == 'right') : ?>
					<div class="mypc-project mypc-img-pc">
						<?php $info_pro = $project['mypc_info_project']; ?>
						<?php $image 	= wp_get_attachment_image_src($info_pro['pro_img'],'full'); ?>
						<img src="<?=$image[0]?>" alt="Việt Land VN">
						<div class="mypc-info-pro-sub">
							<h3><?=$info_pro['pro_name']?></h3>
							<span><?=$info_pro['pro_description'];?></span>
						</div>
					</div>					
				<?php endif; ?>
			</div>
		</div>
		<?php } // End forearch ?>
	</div>
	
</div>
<?php get_footer(); ?>