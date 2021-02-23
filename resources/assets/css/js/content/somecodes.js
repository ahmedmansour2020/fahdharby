$(document).ready(function() {

    //validate category form
    $("#add_tour").validate();

    $('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });


    $('#datepicker-autoclose-1').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#datepicker-autoclose-2').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#datepicker-autoclose-3').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $("#addnewcat").click(function() {
        $(".versionside").toggle();
    });

    $('.input-images').imageUploader({
        'preloaded': images
    });


    $("#add_new_category").on('click', function(e) {
        e.preventDefault();
        var category_name = $("#new_category").val();
        if (category_name == '') return false;
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'name': category_name,
            'slug': string_to_slug(category_name),
            'main_category_id': $('input[name="main_category_id"]').val()
        };

        $.post(quick_add_category_url, data, function(response) {
            if (response.success) {
                $("#new_category").val('');
                var id = response.id;
                $("#home8").append(`
                    <div class="form-group checkboxvers">
                        <label class="css-control css-control-primary css-checkbox">
                            <input type="checkbox" class="css-control-input" name="categories[]"
                                value="${id}" checked>
                            <span class="css-control-indicator"></span> ${category_name}
                        </label>
                    </div>
                `);
            }
        });

    });
});