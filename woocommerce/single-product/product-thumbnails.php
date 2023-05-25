<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();
$post_thumbnail_src = ( $post_thumbnail_id ) ? wp_get_attachment_url( $post_thumbnail_id, 'thumbnail' ) : wc_placeholder_img_src( 'woocommerce_single' );
$attachment_ids = $product->get_gallery_image_ids();
?>

<div class="swiper-rel">

    <?php if ( $attachment_ids ) : ?>

        <div class="swiper swiper-productImgMini">
            <div class="p-small-image-group swiper-wrapper">
                <div class="swiper-slide p-small-image-block">
                    <a href="#" class="p-small-image-item">
                        <img src="<?php echo $post_thumbnail_src; ?>" alt="">
                    </a>
                </div>
                
                <?php foreach ( $attachment_ids as $attachment_id ) : ?>

                    <div class="p-small-image-block swiper-slide">
                        <a href="#" class="p-small-image-item">
                            <img src="<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>" alt="">
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
        <div class="swiper-button-block">
            <div class="swiper-button-prev swiper-productImgMini-p swiper-productImgMini-pn"></div>
            <div class="swiper-button-next swiper-productImgMini-n swiper-productImgMini-pn"></div>
        </div>

    <?php endif; ?>

</div>