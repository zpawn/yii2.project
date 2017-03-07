/**
 * @copyright (c) 2008 - 2017 FF.ua.
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

(function ($) {
    'use strict';

    function showCart (cart) {
        $('#cartModal .modal-body').html(cart);
        $('#cartModal').modal();
    }

    $('.add-to-cart').on('click', function (event) {
        event.preventDefault();
        var id = $(event.target).data('id');
        $.ajax({
            url: '/cart/add',
            data: {
                id: id
            },
            method: 'get',
            success: function (res) {
                if (!res) {
                    console.log('product not found');
                }
                showCart(res);
            },
            error: function (res) {
                console.log('error');
            }
        });
    });

    $('.clearCart').on('click', function (event) {
        $.ajax({
            url: '/cart/clear',
            type: 'get',
            success: function (response) {
                if (!response) {
                    console.log('Clear Cart empty response');
                }
                showCart(response);
            },
            error: function (response) {
                console.log('Clear cart error');
            }
        });
    });
}(jQuery));