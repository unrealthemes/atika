<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package unreal-themes
 */

get_header();

// global $wp_query;
?>

	<div class="main-section category">
        <div class="container">
            <main class="main">

                <?php do_action( 'echo_kama_breadcrumbs' ); ?>

				<!-- <div class="catalog-list-flex">
					<div class="catalog-list-desc-">Найдено <?php //echo ut_num_decline( $wp_query->found_posts, [ 'товар', 'товара', 'товаров' ] ); ?></div>
				</div> -->
                <div class="catalog-category">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результаты поиска по запросу: %s', 'unreal-themes' ), '<span>' . get_search_query() . '</span>' );
					?>
				</div>

                <div class="category-section-1">
                    <div class="catalog-col-1">

                        <?php // if ( $child_categories ) : ?>
                            <!-- <ul class="catalog-list">

                                <?php 
                                // foreach ($child_categories as $child_category) : 
                                    // $child_term_link = get_term_link($child_category->term_id, $child_category->taxonomy);
                                    // if ( $child_category->term_id == $category_obj->term_id ) continue;
                                ?>
                                    <li class="catalog-list-inner">
                                        <a href="<?php // echo esc_url($child_term_link); ?>">
                                            <?php // echo esc_html($child_category->name); ?>
                                        </a>
                                    </li>
                                <?php // endforeach; ?>

                            </ul> -->
                        <?php // endif; ?> 

                        <?php do_action( 'ut_main_filter_options' ); ?>

                        <!-- <div class="catalog-filter">
                            <div class="catalog-filter-title">Цена (руб.)</div>

                            <div class="catalog-input-flex">
                                <input type="text" placeholder="От 2">
                                <input type="text" placeholder="До 999999">
                            </div>

                            <div class="price-field">
                                <input type="range" min="100" max="500" value="100" id="lower">
                                <input type="range" min="100" max="500" value="500" id="upper">
                            </div>

                            <div class="catalog-filter-flex">
                                <div class="catalog-filter-title">Бренд</div>
                                <div class="catalog-filter-all">Все ></div>
                            </div>

                            <ul class="catalog-filter-list">

                                <li class="catalog-filter-li">
                                    <input id="licota" type="checkbox">
                                    <label for="licota" class="catalog-filter-label">Licota</label>
                                </li>

                                <li class="catalog-filter-li">
                                    <input id="garwin-pro" type="checkbox">
                                    <label for="garwin-pro" class="catalog-filter-label">Garwin Pro</label>
                                </li>

                                <li class="catalog-filter-li">
                                    <input id="autodelo" type="checkbox">
                                    <label for="autodelo" class="catalog-filter-label">АвтоDeло</label>
                                </li>

                                <li class="catalog-filter-li">
                                    <input id="yato" type="checkbox">
                                    <label for="yato" class="catalog-filter-label">YATO</label>
                                </li>

                                <li class="catalog-filter-li">
                                    <input id="cobalt" type="checkbox">
                                    <label for="cobalt" class="catalog-filter-label">КОБАЛЬТ</label>
                                </li>

                            </ul>

                        </div> -->

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

                    </div>
                </div>
            </main>
        </div>
    </div>

<?php
get_footer();