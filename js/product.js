'use strict';

let PRODUCT = {

    init: function init() {

        // PRODUCT.save_form();
        PRODUCT.update_qty();
    },

    update_qty: function update_qty() {

        $('.number-input').on('click', function () {
            let upd_qty = $(this).parent().find('input').val();
            $(this).parents('.group-1').find('.add_to_cart_button').attr('data-quantity', upd_qty);     
        });
    },

    // save_form: function save_form() {

    //     $('#form').submit( function( e ) {

    //         e.preventDefault();
    //         let data = {
    //             action     : 'ut_save_form',
    //             ajax_nonce : ut_product.ajax_nonce,
    //             form       : $('#form').serialize(),
    //         };

    //         $.ajax({
    //             url  : ut_product.ajaxurl,
    //             data : data,
    //             type : 'POST',
    //             beforeSend: function() {
    //                 let overlay = $('<div id="overlay_form"><img src="' + ut_product.get_template_directory_uri + '/images/preloader.gif"></div>');
    //                     overlay.appendTo('#form');
    //                 $('button[name="form"]').attr( "disabled", true ); 
    //             },
    //             success: function( response ) {

    //                 if ( response.success ) {
    //                     $('#overlay_form').remove();
    //                     $('button[name="form"]').removeAttr("disabled");
    //                 }
    //             }
    //         });
    //     });
    // },

};

$(document).ready( PRODUCT.init() );