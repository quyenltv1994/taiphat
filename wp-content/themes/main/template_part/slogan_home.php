<div class="wrapper">
    <div class="slogan__home--main">
        <div class="image">
            <?php
            wp_reset_postdata();
            $img = get_field('hinh');
            $image = wp_get_attachment_image_src( $img["ID"], 'image_size_gt');
            ?>
            <img src="<?php echo $image[0]; ?>" alt="">
        </div>
        <div class="slogan__home--content">
            <h2>“<?php the_field('nhan_gt') ?>”</h2>
            <div class="description">
                <?php the_field('mo_ta') ?>
            </div>
            <?php if(get_field('link_gt')): ?>
                <p>
                    <a href="<?php the_field('link_gt'); ?>">
                        <span>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="">
                        </span>
                    </a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>