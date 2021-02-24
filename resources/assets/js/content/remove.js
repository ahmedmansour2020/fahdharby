$(document).ready(function() {
    $(document).on('click', ".remove", function(e) {
        var href = $(this).attr("href");
        e.preventDefault();
        Swal.fire({
            title: sure,

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: yes,
            cancelButtonText: no,
        }).then((result) => {

            if (result.value) {
                Swal.fire(
                    'Deleted',
                    '',
                    'success'
                );

                window.location.href = href;
            }
        })
    });
});