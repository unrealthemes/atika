<?php 
$title = get_field('title_products_h');
$products = get_field('products_h');
?>

<div class="home-section-3 newp">

    <?php if ($title) : ?>
        <div class="newp-title">
            <?php echo esc_html($title); ?>
        </div>
    <?php endif; ?>

    <div class="swiper-2-block">
        <div class="swiper swiper-2">
            <div class="swiper-wrapper newp-group-1">
                
            <?php if ($products) : ?>

                <?php 
                foreach ($products as $_product) : 
                    $post = $_product;
                    setup_postdata($post);
                ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endforeach; ?>

            <?php else : ?>

                <?php 
                $args = [
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => 10,
                ];
                $query = new WP_Query( $args );
                ?>

                <?php if ( $query->have_posts() ) : ?>

                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                        <?php wc_get_template_part( 'content', 'product' ); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

            <?php 
            endif; 
            wp_reset_postdata();
            ?>

            </div>
        </div>
        <div class="swiper-button-prev swiper-2-pn swiper-2-p"></div>
        <div class="swiper-button-next swiper-2-pn swiper-2-n"></div>
    </div>

</div>