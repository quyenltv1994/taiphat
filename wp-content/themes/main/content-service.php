<?php

	$post_id 		= get_the_ID();
	$_post_config 	= get_post_meta($post_id,'_tvlgiao_wpdance_custom_room_config',true);
	$_bed_room 		= get_post_meta($post_id,'_tvlgiao_bed_rooms',true);
	$_post_config 	= unserialize($_post_config);
	$_featured_room = get_post_meta($post_id,'_tvlgiao_featured_room',true);
?>
<div class="wd-wrap-content-blog wd-wrap-content-room">
	<!-- Post type: Show Thumbnail -->
	<div class="wd-title-post">
		<?php if($_featured_room==1){ ?>
			<img src="<?php echo esc_url(TVLGIAO_WPDANCE_THEME_IMAGES.'/hot_37552.gif');?>" alt="Sixhomes Hot Apartment">
		<?php } ?>
		<h3 class="wd-heading-title">
			<a href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
		</h3>
	</div>
	<div>
		<div class="wd-thumbnail-post">
			<a class="thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('medium'); ?>
			</a>
		</div>
		<div class="wd-info-post">
			<div class="wd-content-detail-post">
				<?php $excerpt 	= get_the_excerpt()."..."; echo esc_attr($excerpt); ?>
			</div>
			<div class="wd-content-meta-room">
				<ul class="icons-box ">
					<li class="icons fa fa-usd"><span><?php esc_html_e('Rooms rates: ', 'wpdance') ?></span><span class="price"><?php echo $_post_config['rooms_rates']; ?></span></li>
					<li class="icons fa fa-area-chart"><span><?php esc_html_e('Acreage rooms: ', 'wpdance') ?></span><span class="acreage"><?php echo $_post_config['rooms_acreage']; ?> m<sup>2</sup></span></li>
					<li class="icons fa fa-bed"><span><?php esc_html_e('Bed rooms: ', 'wpdance') ?></span><span class="bedroom"><?php echo $_bed_room ?></span></li>
					<li class="icons fa fa-certificate"><span><?php esc_html_e('Bath rooms: ', 'wpdance') ?></span><span class="bathrooms"><?php echo $_post_config['rooms_bathrooms'] ?></span></li>
				</ul>
			</div>
		</div>
	</div>
</div>