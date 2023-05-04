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