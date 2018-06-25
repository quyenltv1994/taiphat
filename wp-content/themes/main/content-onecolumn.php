<?php
	$show_title 	= get_theme_mod('tvlgiao_wpdance_genneral_blog_show_title','1');
	$show_thumbnail = get_theme_mod('tvlgiao_wpdance_genneral_blog_show_thumbnail','1');
	$show_date 		= get_theme_mod('tvlgiao_wpdance_genneral_blog_show_date','1');
	$show_author 	= get_theme_mod('tvlgiao_wpdance_genneral_blog_show_author','1');
	$show_category 	= get_theme_mod('tvlgiao_wpdance_genneral_blog_show_category','1');
	$show_readmore 	= get_theme_mod('tvlgiao_wpdance_genneral_blog_show_read_more','1');
	$show_excerpt 	= get_theme_mod('tvlgiao_wpdance_genneral_blog_show_excerpt','1');
	$number_excerpt = get_theme_mod('tvlgiao_wpdance_genneral_blog_number_excerpt','20');
?>
<div class="wd-wrap-content-blog">
	<!-- Post type: Show Thumbnail -->
	<?php if( has_post_thumbnail() && $show_thumbnail ): ?>
		<div class="wd-thumbnail-post">
			<a class="thumbnail" href="<?php the_permalink(); ?>">
				<?php
					the_post_thumbnail();
				?>
			</a>
		</div>
	<?php endif; // End If ?>

	<div class="wd-info-post">
		<?php if($show_title) : ?>
			<div class="wd-title-post">
				<h2 class="wd-heading-title">
					<a href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
				</h2>
			</div>
		<?php endif; ?>
		<div class="wd-meta-post">
			<?php if($show_author) : ?>
				<div class="wd-author-post">
					<?php esc_html_e('by ','wpdance'); ?>
					<?php the_author_posts_link(); ?>
				</div>
			<?php endif; ?>
			<?php if($show_category) : ?>
				<div class="wd-category-post">
					<?php esc_html_e('in ','wpdance'); ?>
					<?php the_category(esc_html__(', ', 'wpdance')); ?>
				</div>
			<?php endif; ?>
			<?php 
				//the_time('d/m/Y');
				//the_tags(esc_html__('', 'wpdance'),esc_html__(', ', 'wpdance'));
			?>
		</div>
		<?php if($show_excerpt) : ?>
			<div class="wd-content-detail-post">
				<?php //the_content(); ?>
				<?php $excerpt 	= tvlgiao_wpdance_string_limit_words(get_the_excerpt() , $number_excerpt )."..."; echo esc_attr($excerpt); ?>
			</div>

		<?php endif; ?>
		<?php if($show_readmore) : ?>
			<div class="readmore">
				<a class="readmore_link" href="<?php the_permalink(); ?>"><?php esc_html_e('read more','wpdance') ?></a>
			</div>
		<?php endif; ?>
	</div>
</div>