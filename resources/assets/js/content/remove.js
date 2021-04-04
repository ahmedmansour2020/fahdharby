$(document).ready(function() {
    $(document).on('click', ".remove", function(e) {
        var href = $(this).attr("href");
        e.preventDefault();
        $.confirm({
            title: 'هل تريد حذف هذا العنصر ؟',
            type: 'red',
            typeAnimated: true,

            content: false,
            buttons: {
                نعم: {
                    btnClass: 'btn-blue',
                    action: function() {
                        // $.alert('Confirmed!');
                        window.location.href = href;
                    }
                },
                لا: {
                    btnClass: 'btn-red',
                    action: function() {
                        // $.alert('Canceled!');
                    },
                }

            }
        });

    });
});