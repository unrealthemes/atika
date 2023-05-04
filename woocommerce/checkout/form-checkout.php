<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="main-section category busket">
    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        <div class="container">
            <main class="main">

                <div class="busket-section-1">
                    <div class="busket-catalog-col-2 lines">

                        <div class="form-busket-block popup-form">
                            <div class="form-busket-col">

                                <div class="form-title-1">Покупатель</div>

                                <!-- <div class="row cf7-name-group">
                                    <div class="col cf7-name">
                                        <span class="b-form-control-wrap" data-name="your-name">
                                            <input size="40" class="form-control text" placeholder="Имя" value="" type="text" name="your-name">
                                        </span>
                                    </div>
                                </div>

                                <div class="row cf7-family-group">
                                    <div class="col cf7-family">
                                        <input type="text" class="form-control" placeholder="Фамилия">
                                    </div>
                                </div>

                                <div class="row cf7-company-group">
                                    <div class="col cf7-company">
                                        <input type="text" class="form-control" placeholder="Компания">
                                    </div>
                                </div>
                                
                                <div class="row cf7-email-group">
                                    <div class="col cf7-email">
                                        <span class="b-form-control-wrap" data-name="your-email">
                                            <input size="40" class="form-control text email" placeholder="E-mail" value="" type="email" name="your-email">
                                        </span>
                                    </div>
                                </div>

                                <div class="row cf7-tel-group">
                                    <div class="col cf7-tel">
                                        <span class="b-form-control-wrap" data-name="tel-669">
                                            <input size="40" class="form-control text tel" placeholder="Телефон" value="" type="tel" name="tel-669">
                                        </span>
                                    </div>
                                </div>

                                <div class="row cf7-address-group">
                                    <div class="col">
                                        <textarea name="" id="" cols="40" rows="7" class="form-control textarea" placeholder="Адрес доставки"></textarea>
                                    </div>
                                </div>

                                <div class="row cf7-message-wrapper">
                                    <div class="col cf7-message">
                                        <span class="b-form-control-wrap" data-name="your-message">
                                            <textarea cols="40" rows="7" class="form-control wpcf7-textarea" aria-invalid="false" placeholder="Комментарии к заказу" name="your-message"></textarea>
                                        </span>
                                    </div>
                                </div>

                                <div class="row cf7-send-wrapper">
                                    <div class="col cf7-send">
                                        <input class="form-control has-spinner wpcf7-submit" type="submit" value="Оформить заказ">
                                        <span class="wpcf7-spinner"></span>
                                    </div>
                                </div> -->

                                <?php 
                                if ( $checkout->get_checkout_fields() ) : 
                                    $fields = $checkout->get_checkout_fields();
                                ?>

                                    <?php 
                                    foreach ($fields['billing'] as $key => $field) : 
                                        $type = ( ! isset($field['type']) ) ? 'text' : $field['type'];
                                        $required = ( $field['required'] ) ? 'required' : '';
                                        if ($key == 'billing_country') continue;
                                    ?>

                                        <?php if ($key != 'billing_address_1') : ?>
                                            <div class="row cf7-name-group">
                                                <div class="col">
                                                    <span class="b-form-control-wrap" data-name="<?php echo $key; ?>">
                                                        <input  size="40" 
                                                                class="form-control text" 
                                                                placeholder="<?php echo $field['label']; ?>" 
                                                                value="" 
                                                                type="<?php echo esc_attr($type); ?>" 
                                                                name="<?php echo esc_attr($key); ?>"
                                                                <?php echo esc_attr($required); ?>>
                                                    </span>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="row cf7-address-group">
                                                <div class="col">
                                                    <textarea name="<?php echo esc_attr($key); ?>" 
                                                              id="<?php echo esc_attr($key); ?>" 
                                                              cols="40" 
                                                              rows="7" 
                                                              class="form-control textarea" 
                                                              placeholder="<?php echo $field['label']; ?>"></textarea>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                    <div class="row cf7-message-wrapper">
                                        <div class="col cf7-message">
                                            <span class="b-form-control-wrap" data-name="order_comments">
                                                <textarea cols="40" 
                                                          rows="7" 
                                                          class="form-control wpcf7-textarea" 
                                                          aria-invalid="false" 
                                                          placeholder="Комментарии к заказу" 
                                                          name="order_comments"></textarea>
                                            </span>
                                        </div>
                                    </div>

                                    <?php 
                                    // echo '<pre>';
                                    // print_r( $checkout->get_checkout_fields() );
                                    // echo '</pre>';
                                    ?>

                                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                                    <div class="col2-set" id="customer_details">
                                        <div class="col-1">
                                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                                        </div>

                                        <div class="col-2">
                                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                                        </div>
                                    </div>

                                    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                                <?php endif; ?>

                                <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                        
                                <!-- <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3> -->
                                
                                <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                                </div>

                                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </form>

    <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

</div>