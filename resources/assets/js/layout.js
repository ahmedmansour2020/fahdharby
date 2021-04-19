$(document).ready(function() {

    var href = window.location.href;
    var tabs = $('a.accordion-body');
    $(tabs).each(function(e) {
        if ($(this).attr('href') == href) {
            //   $(this).addClass('bg-light text-dark')
            $(this).addClass('text-light')
            $(this).parents('.accordion-collapse').addClass('show');
            $(this).parents('.accordion-item').children('.accordion-header').children('button.accordion-button').removeClass('collapsed');
        }
    })

})