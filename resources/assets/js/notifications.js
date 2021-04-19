$(document).ready(function() {
    if (user_role == 1) {

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
    }
    if ($('.notify-alarm').text() == 0) {
        $('.notify-alarm').addClass('hidden');
    } else {
        $('.notify-alarm').removeClass('hidden');
    }
    $(document).on('click', '.notify', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var id = $(this).data('id');
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id,
        }

        $.post(notification_seen, data, function(response) {});

        window.location.href = href;
    })
})