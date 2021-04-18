if ($('#get_message').length) {
    var message = $('#get_message').text();
    Swal.fire({
        icon: 'success',
        html: message,
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "حسنًا"
    })
}