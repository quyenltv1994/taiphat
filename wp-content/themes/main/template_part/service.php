<div class="service__container wrapper">
	<div class="row service__main">
		<?php
			wp_reset_postdata();
			$args = array(
				'post_type' => 'dich_vu',
				'posts_per_page' => 6,
				'post_status' => 'publish'
			);
			$query = new WP_Query($args);
			if($query->have_posts()):
				while($query->have_posts()): $query->the_post();
					$image = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'image_size_service');
		?>
		<div class="col-4">
			<div class="item">
				<div class="image">
					<?php echo $image; ?>
				</div>
				<div class="content">
					<h2 class="title">
						<?php the_title(); ?>
					</h2>
					<div class="content__main">
						<div class="description">
							<?php the_excerpt(); ?>
						</div>
						<p>
							<a href="<?php the_permalink(); ?>" class="read__article">
								<span>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png" alt="">
								</span>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<?php
				endwhile;
			endif;
		?>
	</div>
</div>