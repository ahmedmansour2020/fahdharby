$(document).ready(function() {

    var total_rate = $('#rate_star').val();
    var rate_star = $('.rate_star')

    $(rate_star).each(function(e) {
        if (total_rate == 0) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).addClass('far fa-star');
        } else if (total_rate <= 10) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).addClass('fa fa-star-half');
        } else if (total_rate <= 20) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
        } else if (total_rate <= 30) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).addClass('fa fa-star-half');
        } else if (total_rate <= 40) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).removeClass('far fa-star-half');
            $(rate_star[1]).addClass('fa fa-star');
        } else if (total_rate <= 50) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).removeClass('far fa-star-half');
            $(rate_star[1]).addClass('fa fa-star');
            $(rate_star[2]).removeClass('far fa-star');
            $(rate_star[2]).addClass('fa fa-star-half');
        } else if (total_rate <= 60) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).removeClass('far fa-star-half');
            $(rate_star[1]).addClass('fa fa-star');
            $(rate_star[2]).removeClass('far fa-star');
            $(rate_star[2]).removeClass('far fa-star-half');
            $(rate_star[2]).addClass('fa fa-star');
        } else if (total_rate <= 70) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).removeClass('far fa-star-half');
            $(rate_star[1]).addClass('fa fa-star');
            $(rate_star[2]).removeClass('far fa-star');
            $(rate_star[2]).removeClass('far fa-star-half');
            $(rate_star[2]).addClass('fa fa-star');
            $(rate_star[3]).removeClass('far fa-star');
            $(rate_star[3]).addClass('fa fa-star-half');
        } else if (total_rate <= 80) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).removeClass('far fa-star-half');
            $(rate_star[1]).addClass('fa fa-star');
            $(rate_star[2]).removeClass('far fa-star');
            $(rate_star[2]).removeClass('far fa-star-half');
            $(rate_star[2]).addClass('fa fa-star');
            $(rate_star[3]).removeClass('far fa-star');
            $(rate_star[3]).removeClass('far fa-star-half');
            $(rate_star[3]).addClass('fa fa-star');
        } else if (total_rate <= 90) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).removeClass('far fa-star-half');
            $(rate_star[1]).addClass('fa fa-star');
            $(rate_star[2]).removeClass('far fa-star');
            $(rate_star[2]).removeClass('far fa-star-half');
            $(rate_star[2]).addClass('fa fa-star');
            $(rate_star[3]).removeClass('far fa-star');
            $(rate_star[3]).removeClass('far fa-star-half');
            $(rate_star[3]).addClass('fa fa-star');
            $(rate_star[4]).removeClass('far fa-star');
            $(rate_star[4]).addClass('fa fa-star-half');
        } else if (total_rate <= 100) {
            $(rate_star[0]).removeClass('far fa-star');
            $(rate_star[0]).removeClass('far fa-star-half');
            $(rate_star[0]).addClass('fa fa-star');
            $(rate_star[1]).removeClass('far fa-star');
            $(rate_star[1]).removeClass('far fa-star-half');
            $(rate_star[1]).addClass('fa fa-star');
            $(rate_star[2]).removeClass('far fa-star');
            $(rate_star[2]).removeClass('far fa-star-half');
            $(rate_star[2]).addClass('fa fa-star');
            $(rate_star[3]).removeClass('far fa-star');
            $(rate_star[3]).removeClass('far fa-star-half');
            $(rate_star[3]).addClass('fa fa-star');
            $(rate_star[4]).removeClass('far fa-star');
            $(rate_star[4]).removeClass('far fa-star-half');
            $(rate_star[4]).addClass('fa fa-star');
        }
    })



    $('.rate').each(function(e) {
        $(this).css('cursor', 'pointer')
    })
    $('.rate').on('click', function() {
        $('.rate').removeClass('fa');
        $('.rate').addClass('far');
        var value = $(this).data('value');
        $('#rate_value').val(value);
        switch (value) {
            case 5:
                $('.rate:nth-child(5)').removeClass('far')
                $('.rate:nth-child(5)').addClass('fa')
            case 4:
                $('.rate:nth-child(4)').removeClass('far')
                $('.rate:nth-child(4)').addClass('fa')
            case 3:
                $('.rate:nth-child(3)').removeClass('far')
                $('.rate:nth-child(3)').addClass('fa')
            case 2:
                $('.rate:nth-child(2)').removeClass('far')
                $('.rate:nth-child(2)').addClass('fa')
            case 1:
                $('.rate:nth-child(1)').removeClass('far')
                $('.rate:nth-child(1)').addClass('fa')
                break;
        }

    })





})