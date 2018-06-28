<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @package Wordpress
 * @since wpdance
 */
?>
<?php get_header(); ?>
	<div class="banner">
		<?php
		get_template_part('template_part/slider_home');
		?>
	</div>
	<div class="slogan__home">
		<div class="wrapper">
			<div class="slogan__home--main">
				<div class="image">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/image-slogan.png" alt="">
				</div>
				<div class="slogan__home--content">
					<h2>“Phát triển niềm tin - Vệ sinh sạch đẹp”</h2>
					<div class="description">
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
					</div>
					<p>
						<a href="">
                        <span>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="">
                        </span>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="service">
		<?php
		get_template_part('template_part/service');
		?>
	</div>
<?php get_footer(); ?>