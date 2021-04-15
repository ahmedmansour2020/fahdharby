$(document).ready(function() {
    $('.change_cart_qty').on('change', function() {
        var id = $(this).data('id');
        var qty = $(this).val();
        var price = $(this).data('price');
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id,
            'qty': qty
        }

        $.post(change_cart_qty, data, function(response) {
            if (response.success) {
                $('#total_price').text(response.total + '$')
            }
        })
        if (qty == 1) {
            $('#cart_price_' + id).html(price + '$');
        } else {
            $('#cart_price_' + id).html(
                price * qty + '$' +
                `<span style="font-size: 14px;">(سعر القطعة الواحدة ${price}$)</span>`
            )
        }
    })

    $('#send_code').on('click', function() {
        var promocode = $('#promocode').val();
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'promocode': promocode,
        }
        $.post(add_promocode, data, function(response) {
            if (response.success) {
                $('#message').html(`<span style="color:green">${response.message}</span>`)
            } else {
                $('#message').html(`<span style="color:red">${response.message}</span>`)
            }

        })
    })

})