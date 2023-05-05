<?php

class UT_Cart {

    private static $_instance = null;

    static public function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        add_action( 'woocommerce_before_checkout_form', [$this, 'cart_on_checkout_page'], 11 );
        add_filter( 'woocommerce_add_to_cart_fragments', [$this, 'add_to_cart_fragment'] );
        add_filter( 'woocommerce_checkout_fields' , [$this, 'remove_checkout_fields'] ); 
        add_filter( 'default_checkout_billing_country', [$this, 'change_default_checkout_country'] );
    }
 
    function cart_on_checkout_page() {
        echo do_shortcode( '[woocommerce_cart]' );
    }

    public function add_to_cart_fragment( $fragments ) {

        // mini cart
        ob_start();
        wc_get_template_part( 'cart/mini-cart' );
        $fragments['.cart-popup'] = ob_get_clean();

        // cart count
        ob_start();
        wc_get_template_part( 'cart/cart-count' );
        $fragments['.cart-count'] = ob_get_clean();

        return $fragments;
    }

    public function remove_checkout_fields( $fields ) { 

        $shipping_method = preg_replace("/[^A-Za-z_ ]/", '', $_POST['shipping_method'][0]);

        unset($fields['billing']['billing_state']); 
        unset($fields['billing']['billing_postcode']); 
        unset($fields['billing']['billing_city']); 
        unset($fields['billing']['billing_address_2']); 

        // $fields['billing']['billing_address_1']['required'] = false;

        // echo '<pre>';
        // print_r( $fields );
        // echo '</pre>';
        
        return $fields; 
    }

    function change_default_checkout_country() {
        return 'RU'; // country code
    }
    
} 