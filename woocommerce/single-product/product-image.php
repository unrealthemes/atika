<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();
$post_thumbnail_src = ( $post_thumbnail_id ) ? wp_get_attachment_url( $post_thumbnail_id, 'full' ) : wc_placeholder_img_src( 'woocommerce_single' );
$attachment_ids = $product->get_gallery_image_ids();
?>

<?php do_action( 'woocommerce_product_thumbnails' ); ?>

<div class="p-full-image">

	<?php if ( $attachment_ids ) : ?>
    
    <div class="swiper swiper-productImg">
    	<div class="swiper-wrapper p-full-image-group">

    		<div class="swiper-slide p-full-image-block">
			    <a href="<?php echo $post_thumbnail_src; ?>" class="p-full-image-item" data-fancybox="gallery">
			        <img src="<?php echo $post_thumbnail_src; ?>" alt="Gallery image">
                    <div class="zoom-icon-block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M288 192H224V128c0-8.844-7.156-16-16-16S192 119.2 192 128v64H128C119.2 192 112 199.2 112 208S119.2 224 128 224h64v64c0 8.844 7.156 16 16 16S224 296.8 224 288V224h64c8.844 0 16-7.156 16-16S296.8 192 288 192zM507.3 484.7l-141.5-141.5C397 306.8 416 259.7 416 208C416 93.13 322.9 0 208 0S0 93.13 0 208S93.13 416 208 416c51.68 0 98.85-18.96 135.2-50.15l141.5 141.5C487.8 510.4 491.9 512 496 512s8.188-1.562 11.31-4.688C513.6 501.1 513.6 490.9 507.3 484.7zM208 384C110.1 384 32 305 32 208S110.1 32 208 32S384 110.1 384 208S305 384 208 384z"/>
                        </svg>
                    </div>
			    </a>
			</div>

			<?php foreach ( $attachment_ids as $attachment_id ) : ?>

                <div class="swiper-slide p-full-image-block">
                    <a href="<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>" class="p-full-image-item" data-fancybox="gallery">
                        <img src="<?php echo wp_get_attachment_url( $attachment_id, 'medium' ); ?>" alt="Gallery image">
                        <div class="zoom-icon-block">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M288 192H224V128c0-8.844-7.156-16-16-16S192 119.2 192 128v64H128C119.2 192 112 199.2 112 208S119.2 224 128 224h64v64c0 8.844 7.156 16 16 16S224 296.8 224 288V224h64c8.844 0 16-7.156 16-16S296.8 192 288 192zM507.3 484.7l-141.5-141.5C397 306.8 416 259.7 416 208C416 93.13 322.9 0 208 0S0 93.13 0 208S93.13 416 208 416c51.68 0 98.85-18.96 135.2-50.15l141.5 141.5C487.8 510.4 491.9 512 496 512s8.188-1.562 11.31-4.688C513.6 501.1 513.6 490.9 507.3 484.7zM208 384C110.1 384 32 305 32 208S110.1 32 208 32S384 110.1 384 208S305 384 208 384z"/>
                            </svg>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

		</div>
	</div>

	<?php endif; ?>

	<!-- <div class="zoom-icon-block">
	    <a href="#">
	        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 192H224V128c0-8.844-7.156-16-16-16S192 119.2 192 128v64H128C119.2 192 112 199.2 112 208S119.2 224 128 224h64v64c0 8.844 7.156 16 16 16S224 296.8 224 288V224h64c8.844 0 16-7.156 16-16S296.8 192 288 192zM507.3 484.7l-141.5-141.5C397 306.8 416 259.7 416 208C416 93.13 322.9 0 208 0S0 93.13 0 208S93.13 416 208 416c51.68 0 98.85-18.96 135.2-50.15l141.5 141.5C487.8 510.4 491.9 512 496 512s8.188-1.562 11.31-4.688C513.6 501.1 513.6 490.9 507.3 484.7zM208 384C110.1 384 32 305 32 208S110.1 32 208 32S384 110.1 384 208S305 384 208 384z"/></svg>
	    </a>
	</div> -->

</div>