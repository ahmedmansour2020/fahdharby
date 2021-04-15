$(document).ready(function(e) {
    $('#form').validate({
        rules: {

            code: {
                required: true,
            },
            value: {
                required: true,
            },
            minimum: {
                required: true,
            },
            start: {
                required: true,
            },
            end: {
                required: true,
            },


        },
        messages: {
            code: {
                required: "برجاء إدخال الكود ",
            },
            value: {
                required: 'برجاء إدخال القيمة ',
            },
            minimum: {
                required: 'برجاء إدخال الحد الأدنى لتنفيذ الكوبون ',
            },
            start: {
                required: 'برجاء إدخال تاريخ بدء الكوبون  ',
            },
            end: {
                required: 'برجاء إدخال تاريخ انتهاء الكوبون  ',
            },

        }



    })
});