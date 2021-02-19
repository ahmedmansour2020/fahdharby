$(document).ready(function() {

    $('.mobile').on('input', function(event) {
        if ($(this).val().length <= 11) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        } else {
            $(this).val($(this).val().replace($(this).val().charAt($(this).val().length - 1), ''));
        }
    });
    $('.mobile').on('blur', function(event) {
        if ($(this).val().length <= 7) {
            $(this).siblings('.form-errors').html('Mobile number should be at least 7 numbers');
            $('.mobile').focus();
        } else {
            $(this).siblings('.form-errors').html('');
        }
    })
})