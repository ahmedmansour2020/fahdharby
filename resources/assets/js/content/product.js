$(document).ready(function() {
    fill_sub_categories();

    $('#main_category').on('change', fill_sub_categories);



    function fill_sub_categories() {
        var main_category_id = $('#main_category').val();
        var options = "";
        for (var i = 0; i < sub_categories.length; i++) {
            if (sub_categories[i].parent_id == main_category_id) {
                if (type == 1) {
                    if (sub_category == sub_categories[i].id) {
                        options += `<option selected value="${sub_categories[i].id}">${sub_categories[i].name}</option>`
                    } else {
                        options += `<option value="${sub_categories[i].id}">${sub_categories[i].name}</option>`
                    }
                } else {
                    options += `<option value="${sub_categories[i].id}">${sub_categories[i].name}</option>`
                }
            }
        }
        $('#sub_category').html(options)

    }

})