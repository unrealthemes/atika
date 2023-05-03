<?php

class UT_Product {

    private static $_instance = null;

    static public function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

        add_action('pre_get_posts', [$this, 'filter_pre_get_post']);
    }

    public function filter_pre_get_post( $query ) {

        if ( (is_shop() || is_tax()) && ! is_admin() && ! $query->is_single && $query->is_main_query() ) {
    
            $query->set( 'posts_per_page', get_option( 'posts_per_page' ) );  
        }
    }

} 