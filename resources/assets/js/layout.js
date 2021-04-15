$(document).ready(function() {
    $('#logout2').on('click', function(e) {
        e.preventDefault();
        $('#logout').click();
    })


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

    set_notifications()

    setInterval(function() {
        $.get(get_current_notifications, function(response) {
            $('#notification-all').text(response.all_aproval);
            $('#notification-users').text();
            $('#notification-products').text(response.products_approval);
            $('#notification-offers').text(response.offers_approval);
            set_notifications()
        })
        set_notifications()
    }, 1000)

    function set_notifications() {
        $('.notification').each(function(e) {
            if ($(this).text() > 0) {
                $(this).removeClass('hidden')
            } else {
                $(this).addClass('hidden')
            }

        })
    }
})