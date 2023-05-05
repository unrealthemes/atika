'use strict';

let PRODUCT = {

    init: function init() {

        PRODUCT.update_qty();
        PRODUCT.update_cart();

        $('.c-sort div').on('click', function(event){
            event.preventDefault();
            var selected = $(this).data('orderby');
            $('select[name="orderby"]').val(selected).change();
        });


        PRODUCT.field_autocomplete('#checkout_first_name', '#billing_first_name');
        PRODUCT.field_autocomplete('#checkout_last_name', '#billing_last_name');
        PRODUCT.field_autocomplete('#checkout_company', '#billing_company');
        PRODUCT.field_autocomplete('#checkout_email', '#billing_email');
        PRODUCT.field_autocomplete('#checkout_phone', '#billing_phone');
        PRODUCT.field_autocomplete('#checkout_address', '#billing_address_1');
        PRODUCT.field_autocomplete('#checkout_comment', '#order_comments');

    },

    field_autocomplete: function field_autocomplete($from, $to) {

        $($from).keyup(function() {
            var input = this.value;
            $($to).val(input);
            console.log(input);
        });
    },

    update_cart: function update_cart() {

        $('.busket-newp-cart-d .number-input button').on('click', function () {
            $('button[name="update_cart"]').prop('disabled', false).click();
        });
    },

    update_qty: function update_qty() {

        $('.number-input').on('click', function () {
            let upd_qty = $(this).parent().find('input').val();
            $(this).parents('.group-1').find('.add_to_cart_button').attr('data-quantity', upd_qty);     
        });
    },

};

$(document).ready( PRODUCT.init() );