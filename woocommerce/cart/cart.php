<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit;

$count_position = count(WC()->cart->get_cart());
$count_products = WC()->cart->get_cart_contents_count();
?>

<div class="main-section category busket">

    <?php do_action( 'woocommerce_before_cart' ); ?>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <div class="container">
            <main class="main">

                <?php do_action( 'echo_kama_breadcrumbs' ); ?>

                <div class="busket-catalog-list-flex">
                    <?php the_title('<div class="busket-title-1">','</div>'); ?>

                    <div class="clear-button">
                        <a id="prowc_empty_cart" href="<?php echo home_url('/cart/?prowc_empty_cart'); ?>">Очистить корзину</a>
                    </div>
                </div>

                <?php do_action( 'woocommerce_before_cart_table' ); ?>

                <div class="busket-section-1" style="margin-bottom:0px;">
                    <div class="busket-catalog-col-2 lines">
                        <div class="busket-tool-group-1">
                            <div class="busket-head">
                                <div class="product-num">Код</div>
                                <div class="busket-tool-col-img-block">Фото</div>
                                <div class="tool-col-name-block">Наименование</div>
                                <div class="busket-newp-price">Цена</div>
                                <div class="busket-newp-cart-d">Кол-во</div>
                                <div class="busket-tool-count">Сумма</div>
                                <div class="img-del-block"></div>
                            </div>

                            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    $thumbnail_url     = get_the_post_thumbnail_url( $_product->get_id(), 'thumbnail' );
                                    $thumbnail_url     = ($thumbnail_url) ? $thumbnail_url : wc_placeholder_img_src();
                                    // $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                    $total_product_price = $_product->get_price() * $cart_item['quantity'];
                                ?>

                                    <div class="busket-tool-col <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                        <div class="product-num"><?php echo $_product->get_sku(); ?></div>
                                        
                                        <div class="busket-tool-col-img-block">
                                            <a class="c-group-link" href="<?php echo esc_url($product_permalink); ?>">
                                                <img class="busket-tool-col-img" src="<?php echo esc_attr($thumbnail_url); ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="tool-col-name-block">
                                            <a class="c-group-link" href="<?php echo esc_url($product_permalink); ?>">
                                                <div class="busket-tool-col-name"><?php echo $_product->get_name(); ?></div>
                                            </a>
                                        </div>

                                        <div class="busket-newp-price">

                                            <?php if ( $_product->get_sale_price() ) : ?>

                                                <span>
                                                    <?php echo strip_tags( wc_price( $_product->get_sale_price() ) ); ?>
                                                </span>
                                                - 
                                                <?php echo strip_tags( wc_price( $_product->get_regular_price() ) ); ?>

                                            <?php else : ?>

                                                <?php echo strip_tags( wc_price( $_product->get_price() ) ); ?>

                                            <?php endif; ?>

                                        </div>

                                        <div class="busket-newp-cart-d">
                                            <div class="number-input p-col">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                <?php
                                                if ( $_product->is_sold_individually() ) {
                                                    $min_quantity = 1;
                                                    $max_quantity = 1;
                                                } else {
                                                    $min_quantity = 0;
                                                    $max_quantity = $_product->get_max_purchase_quantity();
                                                }

                                                $product_quantity = woocommerce_quantity_input(
                                                    array(
                                                        'classes'      => 'quantity',
                                                        'min_value'    => 1,
                                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                                        'input_value'  => $cart_item['quantity'],
                                                        'max_value'    => $max_quantity,
                                                        'min_value'    => $min_quantity,
                                                        'product_name' => $_product->get_name(),
                                                    ),
                                                    $_product,
                                                    false
                                                );

                                                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                                ?>
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div>

                                        <div class="busket-tool-count"><?php echo wc_price($total_product_price); ?></div>

                                        <?php 
                                        if ( $_product->get_sale_price() ) : 
                                            $percent = ( 100 * (float)$_product->get_sale_price() ) / (float)$_product->get_regular_price(); 
                                            $result_percent = ceil( 100 - $percent );
                                        ?>
                                            <div class="busket-c-cool-price">
                                                <img src="<?php echo THEME_URI; ?>/img/sloi_1_kopiya_2_2.png" alt="">
                                                <div class="c-cool-price-num"><?php echo $result_percent; ?>%</div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="img-del-block">
                                            <?php
                                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                    'woocommerce_cart_item_remove_link',
                                                    sprintf(
                                                        '<a href="%s" class="img2-del remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                        esc_html__( 'Remove this item', 'woocommerce' ),
                                                        esc_attr( $product_id ),
                                                        esc_attr( $_product->get_sku() )
                                                    ),
                                                    $cart_item_key
                                                );
                                            ?>
                                        </div>
                                    </div>

                                <?php
                                }
                            }
                            ?>

                            <?php do_action( 'woocommerce_cart_contents' ); ?>

                            <?php if ( wc_coupons_enabled() ) { ?>
                                <div class="coupon">
                                    <label for="coupon_code" class="screen-reader-text">
                                        <?php esc_html_e( 'Coupon:', 'woocommerce' ); ?>
                                    </label> 
                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
                                    <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">
                                        <?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>
                                    </button>
                                    <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                </div>
                            <?php } ?>

                            <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
                                <?php esc_html_e( 'Update cart', 'woocommerce' ); ?>
                            </button>

                            <?php do_action( 'woocommerce_cart_actions' ); ?>

                            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

                            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                            
                        </div>

                        <?php 
                        $count_position_txt = ut_num_decline( $count_position, [ 'позиция', 'позиции', 'позиций' ] );
                        $count_products_txt = ut_num_decline( $count_products, [ 'товар', 'товара', 'товаров' ] );
                        ?>
                        <div class="busket-full-price">
                            Итого: <?php echo $count_position_txt; ?>, <?php echo $count_products_txt; ?> на: <?php wc_cart_totals_order_total_html(); ?>
                        </div>

                        <?php if ( ! is_checkout() ) : ?>
                            <div class="form-busket-block popup-form">
                                <div class="form-busket-col">
                                    <div class="row cf7-send-wrapper">
                                        <div class="col cf7-send">
                                            <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="form-control has-spinner wpcf7-submit">
                                                К оформлению заказа
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <?php do_action( 'woocommerce_after_cart_table' ); ?>

            </main>
        </div>
    </form>

    <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

    <div class="cart-collaterals">
        <?php
            /**
             * Cart collaterals hook.
             *
             * @hooked woocommerce_cross_sell_display
             * @hooked woocommerce_cart_totals - 10
             */
            // do_action( 'woocommerce_cart_collaterals' );
        ?>
    </div>

    <?php do_action( 'woocommerce_after_cart' ); ?>

</div>