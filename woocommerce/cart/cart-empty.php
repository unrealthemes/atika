<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
// do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : 
?>

    <div class="main-section category busket">
        <div class="container">
            <main class="main">

                <?php do_action( 'echo_kama_breadcrumbs' ); ?>

                <div class="busket-catalog-list-flex" style="margin: 0 0 452px;">
                    <?php // the_title('<div class="busket-title-1">','</div>'); ?>

                    <div class="busket-title-1">Ваша корзина пуста</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
            </main>
        </div>
    </div>

<?php endif; ?>
