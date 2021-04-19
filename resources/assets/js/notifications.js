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
})