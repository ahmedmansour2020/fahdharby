$(document).ready(function() {

    $('.tab').on('click', function() {
        var type = $(this).data('type');
        $('.tab').removeClass('active');
        $(this).addClass('active');

        $('.tab-pane').addClass('hidden');
        $('.tab-pane[data-type=' + type + ']').removeClass('hidden');
        $('.tab-pane[data-type=' + type + ']').addClass('active');

    })



})