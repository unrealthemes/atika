<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>

<?php 
if ( ! WC()->cart->is_empty() ) : 
    $count_position = count(WC()->cart->get_cart());
    $count_products = WC()->cart->get_cart_contents_count();
?>

    <div class="cart-popup <?php echo esc_attr( $args['list_class'] ); ?>">
        <div class="cart-popup-wrapper">

            <?php do_action( 'woocommerce_before_mini_cart' ); ?>

            <?php
            do_action( 'woocommerce_before_mini_cart_contents' );

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                    // $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $thumbnail_url     = get_the_post_thumbnail_url( $_product->get_id(), 'thumbnail' );
                    $thumbnail_url     = ($thumbnail_url) ? $thumbnail_url : wc_placeholder_img_src();
                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    $total_product_price = $_product->get_price() * $cart_item['quantity'];
                    ?>

                    <div class="cart-popup-col woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                        
                        <div class="cart-popup-img-block">
                            <img class="cart-popup-img" src="<?php echo esc_attr($thumbnail_url); ?>" alt="">
                        </div>

                        <a href="<?php echo esc_url( $product_permalink ); ?>" class="cart-popup-title">
                            <?php echo wp_kses_post( $product_name ); ?>
                        </a>

                        <div class="cart-popup-price"><?php echo $product_price; ?></div>

                        <div class="cart-popup-count">x<?php echo $cart_item['quantity']; ?></div>

                        <div class="cart-popup-sum"><?php echo wc_price($total_product_price); ?></div>

                        <div class="cart-popup-del-block">
                            <?php
                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                'woocommerce_cart_item_remove_link',
                                sprintf(
                                    '<a href="%s" class="cart-popup-del remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_attr__( 'Remove this item', 'woocommerce' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $cart_item_key ),
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

            do_action( 'woocommerce_mini_cart_contents' );
            ?>

            <div class="cart-popup-sumfull">
            <?php
                /**
                 * Hook: woocommerce_widget_shopping_cart_total.
                 *
                 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
                 */
                // do_action( 'woocommerce_widget_shopping_cart_total' );
                $count_position_txt = ut_num_decline( $count_position, [ 'позиция', 'позиции', 'позиций' ] );
                $count_products_txt = ut_num_decline( $count_products, [ 'товар', 'товара', 'товаров' ] );
                ?>
                Итого: <?php echo $count_position_txt; ?>, <?php echo $count_products_txt; ?> на: <?php echo WC()->cart->get_total(); ?>
            </div>

            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

            <div class="cart-popup-far">
                <a class="cart-popup__link" href="<?php echo esc_url( wc_get_checkout_url() ); ?>">
                    <div class="cart-popup-name">Оформить заказ</div>
                </a>
                <?php // do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
            </div>

            <?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

            <?php do_action( 'woocommerce_after_mini_cart' ); ?>

        </div>

    </div>

<?php else : ?>

    <div class="cart-popup <?php echo esc_attr( $args['list_class'] ); ?>" style="display:none;">
        <div class="cart-popup-wrapper">
            <div class="cart-popup-sumfull">
                <?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?>
            </div>
        </div>
    </div>

<?php endif; ?>