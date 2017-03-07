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

    /**
     * Clear cart
     */
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

    /**
     * Remove item product from Cart
     */
    $('#cartModal .modal-body').on('click', '.remove-from-cart', function (event) {
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/remove',
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

    /**
     * Show Cart modal window
     */
    $('#showCartModal').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: '/cart/show',
            type: 'get',
            success: function (response) {
                if (!response) {
                    console.log('Empty response');
                }
                showCart(response);
            },
            error: function (response) {
                console.log('Error Cart');
            }
        });
    });
}(jQuery));