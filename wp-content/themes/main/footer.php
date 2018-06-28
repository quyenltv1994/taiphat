<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wordpress
 * @since wpdance
 */
?>
</main>
	<div class="footer__top" id="lien_he">
		<div class="wrapper">
			<div class="footer__top--container">
				<p>Liên hệ chúng tôi ngay hôm nay</p>
				<div class="footer__top--main">
					<div class="tele">
						<div>
							<?php
							$count = count( get_field('phone_number', 'option') );
							$i = 0;
							if(have_rows('phone_number', 'option')):
								while(have_rows('phone_number', 'option')): the_row();
									?>
									<a href="tel:<?php the_sub_field('number'); ?>"><?php the_sub_field('text'); ?></a>
									<?php
									if(++$i < $count){
										echo " - ";
									}
									?>
									<?php
								endwhile;
							endif;
							?>
						</div>
					</div>
					<div class="email">
						<div>
							<a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
						</div>
					</div>
				</div>
				<div class="footer__top--content">
					<div class="left">
						<img src="<?php echo get_template_directory_uri() ?>/assets/images/email-icon-footer.png" alt="">
						<p><?php echo __("Đăng ký <br>
							nhận bảng tin", 'tp') ?></p>
					</div>
					<div class="right">
						<p><?php echo __("Cập nhật thông tin khuyến mãi nhất <br>
							Hưởng quyền lợi giảm giá riêng biệt", 'tp') ?></p>
						<div class="form">
							<?php echo do_shortcode('[contact-form-7 id="42" title="Contact form 1"]') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer__bottom">
		<div class="wrapper">
			<div class="footer__bottom--container">
				<div class="company__name">
					<?php the_field('company_name', 'option'); ?>
				</div>
				<div class="location">
					<div>
						<?php the_field('location', 'option'); ?>
					</div>
				</div>
				<div class="tax__number">
					<div>
						<?php echo __("Mã số thuế: ", 'tp') ?><?php the_field('tax_number', 'option'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>