<?php 
$title = get_field('title_posts_h');
$posts = get_field('posts_h');
?>

<div class="home-section-4 stat">

    <?php if ($title) : ?>
        <div class="stat-title">
            <?php echo esc_html($title); ?>
        </div>
    <?php endif; ?>

    <div class="swiper-3-block">
        <div class="swiper swiper-3">
            <div class="swiper-wrapper stat-group-1">

                <?php if ($posts) : ?>

                    <?php 
                    foreach ($posts as $_post) : 
                        $post = $_post;
                        setup_postdata($post);
                    ?>

                        <?php get_template_part('template-parts/post-item', 'slider'); ?>

                    <?php endforeach; ?>

                <?php else : ?>

                    <?php 
                    $args = [
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 10,
                    ];
                    $query = new WP_Query( $args );
                    ?>

                    <?php if ( $query->have_posts() ) : ?>

                        <?php while ($query->have_posts()) : $query->the_post(); ?>

                            <?php get_template_part('template-parts/post-item', 'slider'); ?>

                        <?php endwhile; ?>

                    <?php endif; ?>

                <?php 
                endif; 
                wp_reset_postdata();
                ?>

            </div>
        </div>
        <div class="swiper-button-prev swiper-3-pn swiper-3-p"></div>
        <div class="swiper-button-next swiper-3-pn swiper-3-n"></div>
    </div>
</div>