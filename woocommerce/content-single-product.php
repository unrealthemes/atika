<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$price_txt = get_post_meta($product->get_id(), '_ut_price_txt', true);
$part_txt = get_post_meta($product->get_id(), '_ut_part_txt', true);
$package_txt = get_post_meta($product->get_id(), '_ut_package_txt', true);
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

    <?php do_action( 'echo_kama_breadcrumbs' ); ?>

    <div class="p-image-flex">

        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action( 'woocommerce_before_single_product_summary' );
        ?>

        <div class="p-info-text-flex">

            <div class="p-info-flex">

                <?php if ($product->get_sku()) : ?>
                    <div class="p-art">
                        Артикул: <span><?php echo $product->get_sku(); ?></span>
                    </div>
                <?php endif; ?>

                <div class="p-title">
                    <?php echo $product->get_name(); ?>
                </div>

                <div class="p-group">

                    <?php if ( $part_txt || $package_txt ) : ?>
                        <div class="p-desc">
                            
                            <?php if ($part_txt) : ?>
                                <p>Минимальная партия - <?php echo esc_html($part_txt); ?> шт.</p>
                            <?php endif; ?>
                            
                            <?php if ($package_txt) : ?>
                                <p>В упаковке: <?php echo esc_html($package_txt); ?> шт.</p>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                    
                </div>
            </div>

            <?php if ($price_txt) : ?>
                <div class="p-text-var">
                    <?php echo nl2br($price_txt); ?>
                </div>
            <?php endif; ?>

        </div>

    </div>

    <?php if ($product->get_description()) : ?>
        <div class="desc-block">
            <div class="desc-product-title">Описание товара: </div>
            <div class="desc-product">
                <?php echo $product->get_description(); ?>
            </div>
        </div>
    <?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
