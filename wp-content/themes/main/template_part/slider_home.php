<div class="flexslider">
    <ul class="slides">
        <?php
        wp_reset_postdata();
        $args = array(
            'post_type' => 'slider',
            'posts_per_page' => 3,
            'post_status' => 'publish'
        );
        $query = new WP_Query($args);
        if($query->have_posts()):
            while($query->have_posts()): $query->the_post();
            $image = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'image_size_slider_home');
        ?>
            <li>
                <?php echo $image; ?>
                <div class="banner__item wrapper">
                    <div class="slides__item--content">
                        <?php the_title(); ?>
                    </div>
                </div>
            </li>
        <?php
            endwhile;
        endif;
        ?>
    </ul>
</div>