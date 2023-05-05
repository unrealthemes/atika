<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$img_url = get_the_post_thumbnail_url( $product->get_id(), 'medium' );

if ( ! $img_url ) {
    $img_url = wc_placeholder_img_src();
}
?>

<div <?php wc_product_class( 'tool-col', $product ); ?>>
    <a class="c-group-link" href="<?php echo get_permalink( $product->get_id() ); ?>">

        <?php // if ($product->get_sku()) : ?>
            <div class="product-num">
                <?php echo $product->get_sku(); ?>
            </div>
        <?php // endif; ?>

        <img class="tool-col-img" src="<?php echo $img_url; ?>" alt="<?php echo $product->get_name(); ?>">
        <div class="tool-col-name"><?php echo $product->get_name(); ?></div>
    </a>

    <?php if ($product->get_stock_quantity()) : ?>
        <div class="tool-count">
            <?php echo $product->get_stock_quantity(); ?> шт.
        </div>
    <?php endif; ?>

    <?php woocommerce_template_loop_price(); ?>

    <?php 
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    do_action( 'woocommerce_after_shop_loop_item' );
    ?>

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' );
	?>

    <?php wc_get_template_part( 'single-product/discount' ); ?>

</div>