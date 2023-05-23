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

$brands = wc_get_product_terms( $product->get_id(), 'brand' );
?>
<div <?php wc_product_class( 'swiper-slide newp-col', $product ); ?>>

	<a href="<?php echo get_permalink( $product->get_id() ); ?>" class="newp-col-link">
        <img class="newp-col-img" src="<?php echo $img_url; ?>" alt="<?php echo $product->get_name(); ?>">
    </a>
    <div class="newp-group-brand">

		<?php if ($brands) : ?>
			<?php foreach ($brands as $brand) : ?>
				<div class="newp-brand-name">
					<?php echo esc_html($brand->name); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>

        <?php if ($product->get_sku()) : ?>
            <div class="newp-articul-number">
                <?php echo $product->get_sku(); ?>
            </div>
        <?php endif; ?>

    </div>
    <div class="newp-col-name">
		<a href="<?php echo get_permalink( $product->get_id() ); ?>">
			<?php echo $product->get_name(); ?>
		</a>
    </div>

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
