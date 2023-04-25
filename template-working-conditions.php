<?php
/**
 * Template name: Условия работы
 */

get_header(); 

if (have_posts()) : 

    while (have_posts()) : the_post(); 

    $title = get_field('title_wc');
    $items = get_field('items_wc');
    ?>

        <div class="main-section delivery">
			<div class="container">
				<main class="main">

                    <?php do_action( 'echo_kama_breadcrumbs' ); ?>

                    <?php if ($title) : ?>
                        <div class="delivery-title-1">
                            <?php echo esc_html($title); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($items) : ?>
                        <div class="delivery-part">

                            <?php 
                            foreach ($items as $item) : 
                                $title_item = $item['title_items_wc'];
                                $price = $item['price_items_wc'];
                                $brands = $item['brands_items_wc'];
                                $class = ($brands) ? 'delivery-desc-4' : '';
                            ?>
                                <div class="delivery-desc-2 <?php echo esc_attr($class); ?>">

                                    <?php if ($title_item) : ?>
                                        <div class="delivery-title-2">
                                            <?php echo esc_html($title_item); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php echo $item['txt_items_wc']; ?>

                                    <?php if ($price) : ?>
                                        <div class="delivery-pl">
                                            <?php echo esc_html($price); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($brands) : ?>
                                        <div class="delivery-brand-row">

                                            <?php 
                                            foreach ($brands as $brand_id) : 
                                                $brand_url = wp_get_attachment_url( $brand_id, 'full' );
                                            ?>
                                                <div class="delivery-brand-img">
                                                    <img src="<?php echo esc_attr($brand_url); ?>" alt="Image">
                                                </div>
                                            <?php endforeach; ?>

                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>

				</main>
			</div>
		</div>

    <?php
    endwhile; 

endif; 

get_footer();