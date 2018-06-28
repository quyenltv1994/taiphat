<?php if(get_field('mypc_type_pro_des') != "") : ?>
<div class="container">
	<div class="mypc-type-left">
		<h3><?=__('Loại Biệt Thự','wpdance')?></h3>
		<div class="mypc-type-pro-des">
			<?=get_field('mypc_type_pro_des')?>
		</div>
	</div>
	<div class="mypc-type-rignt">
		<?php
			$img_ = wp_get_attachment_image_src(get_field('mypc_type_pro_img'),'full');
		?>
		<img src="<?=$img_[0]?>" alt="Loại biệt thự Việt Landvn">
	</div>
</div>
<?php endif; ?>