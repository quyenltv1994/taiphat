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
<div class="wd-wrap-content-blog  wd-wrap-content-room">
	<div>
		<!-- Post type: Show Thumbnail -->
		<?php if( has_post_thumbnail() && $show_thumbnail ): ?>
			<div class="wd-thumbnail-post">
				<a class="thumbnail" href="<?php the_permalink(); ?>">
					<?php
						the_post_thumbnail('medium');
					?>
				</a>
			</div>
		<?php endif; // End If ?>

		<div class="wd-info-post">
			<div class="wd-title-post">
				<h3 class="wd-heading-title">
					<a href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
				</h3>
			</div>
			<?php if($show_excerpt) : ?>
				<div class="wd-content-detail-post">
					<?php //the_content(); ?>
					<?php $excerpt 	= tvlgiao_wpdance_string_limit_words(get_the_excerpt() , $number_excerpt )."..."; echo esc_attr($excerpt); ?>
				</div>

			<?php endif; ?>
		</div>
	</div>
</div>