<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<?php
if ( $order ) :

    $count_position = count($order->get_items());
    $count_products = $order->get_item_count();
    $count_position_txt = ut_num_decline( $count_position, [ 'позиция', 'позиции', 'позиций' ] );
    $count_products_txt = ut_num_decline( $count_products, [ 'товар', 'товара', 'товаров' ] );
    ?>

    <div class="main-section order-done">
        <div class="container">
            <main class="main">
                <div class="breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="<?php echo home_url('/'); ?>">Главная</a>
                        <span>&gt;</span>
                        Заказ принят
                    </div>
                </div>
                <div class="order-info-desc">
                    <div class="order-title-1">
                        Спасибо за заказ.
                    </div>
                    <div class="order-info-desc-item-1">
                        Заказ №<?php echo $order->get_id(); ?> на сумму <?php echo wc_price($order->get_total()); ?> от <?php echo date( 'm.d.Y H:i', strtotime($order->get_date_created()) ); ?> принят в обработку.
                    </div>
                    <div class="order-info-desc-item-2">
                        В ближайшее время наш менеджер свяжется с Вами для уведомления о готовности заказа.<br>
                        Информация о заказе была продублирована на указанный Вами e-mail.
                    </div>
                    <div class="order-info-desc-item-3">
                        Посмотреть детали заказа можно в Вашем личном кабинете.<br>
                        Если Вы сделали первый заказ, регистрационные данные были отправлены на Ваш e-mail.<br>
                        (Если после первого заказа, Вы не получили данные о регистрации, пожалуйста проверьте папку SPAM).
                    </div>
                </div>
                <div class="order-info">
                    <div class="order-tite-2">
                        Информация о заказе
                    </div>
                    <div class="order-count-info">
                        <?php echo $count_position_txt; ?>, <?php echo $count_products_txt; ?> на: <?php echo wc_price($order->get_total()); ?>
                    </div>
                    <div class="order-group-1">

                        <?php 
                        foreach ( $order->get_items() as $item_id => $item ) : 
                            $product = $item->get_product();
                            $thumbnail_url = get_the_post_thumbnail_url( $product->get_id(), 'thumbnail' );
                            $thumbnail_url = ($thumbnail_url) ? $thumbnail_url : wc_placeholder_img_src();
                        ?>

                            <div class="tool-col-line">
                                <a class="c-group-link-line" href="<?php echo get_permalink( $product->get_id() ); ?>">
                                    <div class="product-num-line"><?php echo $product->get_sku(); ?></div>
                                    <img class="tool-col-img-line" src="<?php echo esc_attr($thumbnail_url); ?>" alt="<?php echo $product->get_name(); ?>">
                                    <div class="tool-col-name-line"><?php echo $product->get_name(); ?></div>
                                </a>

                                <div class="tool-count-line"><?php echo $item->get_quantity(); ?> шт.</div>

                                <div class="newp-price-line">

                                    <?php echo wc_price($item->get_total()); ?>

                                    <?php // if ( $product->get_sale_price() ) : ?>

                                        <?php // echo strip_tags( wc_price( $product->get_sale_price() ) ); ?>

                                    <?php // else : ?>

                                        <?php // echo strip_tags( wc_price( $product->get_price() ) ); ?>

                                    <?php // endif; ?>

                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </main>
        </div>
    </div>

<?php else : ?>

    <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
        <?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </p>

<?php endif; ?>