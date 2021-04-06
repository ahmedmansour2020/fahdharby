$(document).ready(function(e) {
    //validate category form
    $("#category_form").validate();

    //open image upload on click on image
    $('#image_preview_container').click(function() {
        $('#image').trigger('click');
    });

    $('#image').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#image_preview_container').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });




    $('#remove').click(function() {
        $.confirm({
            title: 'حذف الصورة',
            type: 'red',
            typeAnimated: true,
            content: 'هل أنت متأكد من حذف الصورة ؟',
            buttons: {
                نعم: {
                    btnClass: 'btn-blue',
                    action: function() {
                        if (type == 1) {
                            var data = {
                                '_token': $('meta[name="csrf-token"]').attr('content'),
                                'id': $("#image_preview_container").data("id")
                            };

                            $.post(brand_delete_image, data, function(response) {
                                if (response.success) {
                                    $.alert('تم حذف الصورة');
                                    $('#image_preview_container').attr('src', img);
                                } else {
                                    $.alert('حدثت مشكلة أثناء حذف الصورة');
                                }
                            });
                        } else {
                            $.alert('تم حذف الصورة');
                            $('#image_preview_container').attr('src', img);
                        }
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