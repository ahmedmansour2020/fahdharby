$(document).ready(function(e) {
    //validate category form
    $("#category_form").validate();

    //open image upload on click on image
    $('#image_preview_container').click(function() { $('#image').trigger('click'); });

    //auto generate slug from title
    $("#category_name").on("change paste keyup", function() {
        var title = $(this).val();
        if (title != "") {
            var slug = string_to_slug($(this).val());
            $("#slug").val(slug);
        }

    });

    $('#image').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#image_preview_container').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });



    if (type == 1) {
        $('#remove').click(function() {

            Swal.fire({
                title: sure,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: yes
            }).then((result) => {
                if (result.isConfirmed) {
                    var data = {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'category_id': $("#image_preview_container").data("category_id")
                    };

                    $.post(delete_category_image, data, function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Deleted!',
                                'Your image has been deleted.',
                                'success'
                            )
                            $('img').attr('src', img);
                        }
                    });
                }
            })
        });

    } else {


        $('#remove').click(function() {

            Swal.fire({
                title: sure,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: yes
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#image').val(null);
                    $('img').attr('src', img);
                }
            })
        });


    }

});