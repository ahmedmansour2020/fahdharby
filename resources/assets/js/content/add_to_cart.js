$(document).ready(function() {

    $(document).on('click', '.add_to_cart', function(e) {
        e.preventDefault();
        var product_id = $(this).data('id');

        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'product_id': product_id
        };

        $.post(add_to_cart, data, function(response) {

        })
        $(this).text('المنتج موجود بالعربة');
        $(this).addClass('disabled');

    })


})