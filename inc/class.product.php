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

        add_action( 'pre_get_posts', [$this, 'filter_pre_get_post'] );
        add_action( 'woocommerce_product_options_general_product_data', [$this, 'tab_price_add_custom_fields'] );
        add_action( 'woocommerce_process_product_meta', [$this, 'product_custom_fields_save'], 10 );
    }

    public function filter_pre_get_post( $query ) {

        if ( ( is_shop() || is_tax() ) && ! is_admin() && ! $query->is_single && $query->is_main_query() ) {
    
            $query->set( 'posts_per_page', get_option( 'posts_per_page' ) );  
        }
    }

    public function tab_price_add_custom_fields() {

        global $product, $post;

        echo '<div class="options_group">';
            woocommerce_wp_text_input( [
                'id' => '_ut_part_txt',
                'label' => 'Партия',
                'type' => 'text',
                'placeholder' => 'Минимальная партия — 1 шт.',
                'description' => 'Текст в блоке с ценой',
            ] );
            woocommerce_wp_text_input( [
                'id' => '_ut_package_txt',
                'label' => 'Упаковка',
                'type' => 'text',
                'placeholder' => 'В упаковке: 6 шт.',
                'description' => 'Текст в блоке с ценой',
            ] );
            woocommerce_wp_textarea_input( [
                'id' => '_ut_price_txt',
                'label' => 'Текст',
                'description' => 'Текст под блоком с ценой',
            ] );
        echo '</div>';
    }

    public function product_custom_fields_save( $post_id ) {

        update_post_meta( $post_id, '_ut_price_txt', $_POST['_ut_price_txt'] );
        update_post_meta( $post_id, '_ut_part_txt', $_POST['_ut_part_txt'] );
        update_post_meta( $post_id, '_ut_package_txt', $_POST['_ut_package_txt'] );
    }

} 