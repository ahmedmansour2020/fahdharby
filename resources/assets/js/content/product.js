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
        if (options == "") {
            options = '<option value="" disabled selected>فئة السلعة الفرعية</option>';
        }
        $('#sub_category').html(options)

    }

    $('#form').validate({
        rules: {

            name_ar: {
                required: true,
            },
            main_category: {
                required: true,
            },
            sub_category: {
                required: true,
            },
            qty: {
                required: true,
            },
            price: {
                required: true,
            },
            duration: {
                required: true,
            },
            description_ar: {
                required: true,
            },

        },
        messages: {
            name_ar: {
                required: "برجاء إدخال اسم المنتج",
            },
            main_category: {
                required: 'برجاء اختيار فئة المنتج الرئيسية',
            },
            sub_category: {
                required: 'برجاء اختيار فئة المنتج الفرعية',
            },
            qty: {
                required: 'برجاء تحديد كمية المنتج ',
            },
            price: {
                required: 'برجاء تحديد سعر المنتج ',
            },
            duration: {
                required: 'برجاء تحديد مدة تجهيز المنتج ',
            },
            description_ar: {
                required: 'برجاء كتابة وصف المنتج',
            },
        }



    })



})