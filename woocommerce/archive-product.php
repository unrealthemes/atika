<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

global $wp_query;

$category_obj = get_queried_object();
$description = get_the_archive_description();
$child_cats = get_terms( $category_obj->taxonomy, [ 'parent' => $category_obj->term_id, 'orderby' => 'slug', 'hide_empty' => 0 ] );
$categories = get_terms( 'product_cat', [
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0,
    'parent' => 0,
] ); 

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<?php if ( is_tax('product_cat') && $category_obj->parent == 0 ) : ?>

    <div class="main-section catalog">
        <div class="container">
            <main class="main">

                <?php do_action( 'echo_kama_breadcrumbs' ); ?>

                <div class="catalog-list-flex">
                    <div class="catalog-list-title"><?php woocommerce_page_title(); ?></div>
                    <div class="catalog-list-desc">Найдено <?php echo ut_num_decline( $wp_query->found_posts, [ 'товар', 'товара', 'товаров' ] ); ?></div>
                </div>

                <div class="catalog-section-1">

                    <div class="catalog-col-1">

                        <?php if ($categories) : ?>
                            <ul class="catalog-list">
                                <?php 
                                foreach ($categories as $category) : 
                                    $term_link = get_term_link($category->term_id, $category->taxonomy);
                                    $child_categories = get_terms( 
                                        $category->taxonomy, 
                                        [ 
                                            'child_of' => $category->term_id, 
                                            'orderby' => 'slug', 
                                            'hide_empty' => 0 
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
                        <?php endif; ?>

                        <?php 
                        /**
                         * Hook: woocommerce_sidebar.
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                        ?>

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

                        <?php if ($description) : ?>
                            <div class="desc-sir">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </main>
        </div>
    </div>

<?php 
else : 
    $parent_category = get_term_by( 'id', $category_obj->parent, $category_obj->taxonomy );
    $parent_term_link = get_term_link($parent_category->term_id, $parent_category->taxonomy);
    $child_categories = get_terms( 
        $parent_category->taxonomy, 
        [ 
            'child_of' => $parent_category->term_id, 
            'orderby' => 'slug', 
            'hide_empty' => 0 
        ] 
    );
?>

    <div class="main-section category">
        <div class="container">
            <main class="main">

                <?php do_action( 'echo_kama_breadcrumbs' ); ?>

                <?php if ( is_tax('product_cat') ) : ?>
                    <div class="catalog-list-flex">
                        <a href="<?php echo esc_url($parent_term_link); ?>">
                            <svg class="catalog-list-arrow-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
                            </svg>
                            <div class="catalog-list-title"><?php echo esc_html($parent_category->name); ?></div>
                        </a>
                        <div class="catalog-list-desc">Найдено <?php echo ut_num_decline( $wp_query->found_posts, [ 'товар', 'товара', 'товаров' ] ); ?></div>
                    </div>
                <?php else : ?>
                    <div class="catalog-list-flex">
                        <div class="catalog-list-desc-">Найдено <?php echo ut_num_decline( $wp_query->found_posts, [ 'товар', 'товара', 'товаров' ] ); ?></div>
                    </div>
                <?php endif; ?>

                <div class="catalog-category"><?php woocommerce_page_title(); ?></div>

                <div class="category-section-1">

                    <div class="catalog-col-1">

                        <?php if ( $child_categories ) : ?>
                            <ul class="catalog-list">

                                <?php 
                                foreach ($child_categories as $child_category) : 
                                    $child_term_link = get_term_link($child_category->term_id, $child_category->taxonomy);
                                    if ( $child_category->term_id == $category_obj->term_id ) continue;
                                ?>
                                    <li class="catalog-list-inner">
                                        <a href="<?php echo esc_url($child_term_link); ?>">
                                            <?php echo esc_html($child_category->name); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        <?php endif; ?> 

                        <?php do_action( 'ut_main_filter_options' ); ?>

                    </div>

                    <div class="catalog-col-2">

                        <div class="c-grid-flex">

                            <?php do_action('woo_catalog_ordering'); ?>

                            <?php 
                            /**
                            * Hook: woocommerce_before_shop_loop.
                            *
                            * @hooked woocommerce_output_all_notices - 10
                            * @hooked woocommerce_result_count - 20
                            * @hooked woocommerce_catalog_ordering - 30
                            */
                            do_action( 'woocommerce_before_shop_loop' );
                            ?>

                        </div>

                        <div class="tool-group-1 first">
                            <div class="tool-col head">
                                <div class="product-num">Код</div>
                                <div class="tool-col-img-block">Фото</div>
                                <div class="tool-col-name-block">Наименование</div>
                                <div class="tool-count">В упаковке</div>
                                <div class="newp-price">Цена</div>
                                <div class="newp-cart-d">Кол-во</div>
                                <div class="newp-add-cart"></div>
                            </div>
                        </div>

                        <?php 
                        if ( woocommerce_product_loop() ) {
                        
                            woocommerce_product_loop_start();
                        
                            if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();
                        
                                    /**
                                    * Hook: woocommerce_shop_loop.
                                    */
                                    do_action( 'woocommerce_shop_loop' );
                        
                                    wc_get_template_part( 'content', 'product' );
                                }
                            }
                        
                            woocommerce_product_loop_end();
                        
                        } else {
                            /**
                            * Hook: woocommerce_no_products_found.
                            *
                            * @hooked wc_no_products_found - 10
                            */
                            do_action( 'woocommerce_no_products_found' );
                        }
                        ?>

                        <?php 
                        /**
                        * Hook: woocommerce_after_shop_loop.
                        *
                        * @hooked woocommerce_pagination - 10
                        */
                        do_action( 'woocommerce_after_shop_loop' );
                        ?>

                        <?php if ($description) : ?>
                            <div class="desc-sir">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </main>
        </div>
    </div>

<?php endif; ?>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );