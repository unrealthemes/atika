<?php
/**
 * Template name: Каталог
 */

get_header(); 

if (have_posts()) : 

    while (have_posts()) : the_post(); 

    $child_cats = [];
    $categories = get_terms( 'product_cat', [
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => 0,
        'parent' => 0,
    ] ); 
    ?>

    <div class="main-section catalog">
        <div class="container">
            <main class="main">

                <?php do_action( 'echo_kama_breadcrumbs' ); ?>

                <div class="catalog-list-flex">
                    <div class="catalog-list-title"><?php the_title(); ?></div>
                </div>

                <div class="catalog-section-1">

                <?php if ($categories) : ?>

                        <div class="catalog-col-1"> 
                            <ul class="catalog-list">
                                <?php 
                                foreach ($categories as $category) : 
                                    $term_link = get_term_link($category->term_id, $category->taxonomy);
                                    $child_categories = get_terms( 
                                        [
                                            'taxonomy' => $category->taxonomy, 
                                            'hide_empty' => 0,
                                            'child_of' => $category->term_id,
                                        ]
                                    );
                                    $class = ($child_categories) ? 'catalog-item-has-children' : '';
                                ?>
                                    <li class="catalog-item <?php echo $class; ?>">

                                        <?php if ( $child_categories ) : ?>
                                            <div class="ic"></div>
                                        <?php endif; ?>

                                        <a href="<?php echo esc_url($term_link); ?>">
                                            <?php echo esc_html($category->name); ?>
                                        </a>

                                        <?php if ( $child_categories ) : ?>
                                            <ul class="catalog-list-sub">

                                                <?php 
                                                foreach ($child_categories as $child_category) : 
                                                    $child_cats[] = $child_category;
                                                    $child_term_link = get_term_link($child_category->term_id, $child_category->taxonomy);
                                                ?>
                                                    <li class="catalog-list-inner">
                                                        <a href="<?php echo esc_url($child_term_link); ?>">
                                                            <?php echo esc_html($child_category->name); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>

                                            </ul>
                                        <?php endif; ?>

                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="catalog-col-2">

                            <?php if ($child_cats) : ?>

                                <div class="tool-group-1">

                                    <?php 
                                    foreach ($child_cats as $child_cat) : 
                                        $cat_link = get_term_link($child_cat->term_id, $child_cat->taxonomy);
                                        $child_cat_thumb_id = get_woocommerce_term_meta($child_cat->term_id, 'thumbnail_id', true);
                                        $image_url = ($child_cat_thumb_id) ? wp_get_attachment_url($child_cat_thumb_id, 'thumbnail') : wc_placeholder_img_src();
                                    ?>

                                        <div class="tool-col">
                                            <a href="<?php echo esc_url($cat_link); ?>">
                                                <img class="tool-col-img" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_html($child_cat->name); ?>">
                                                <div class="tool-col-name"><?php echo esc_html($child_cat->name); ?></div>
                                            </a>
                                        </div>

                                    <?php endforeach ?>

                                </div>

                            <?php endif; ?>

                            <?php if (get_the_content()) : ?>
                                <div class="desc-sir">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                </div>

            </main>
        </div>
    </div>

    <?php
    endwhile; 

endif; 

get_footer();