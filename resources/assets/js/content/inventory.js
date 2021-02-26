var qty = 0;
$(document).ready(function() {
    $(document).on('keyup', '#qty', function() {
        qty = $(this).val();
        if ($(this).data('type') == -1) {
            if (qty > $(this).data('qty')) {
                $('.swal2-confirm').attr('disabled', '');
                if (lang == 'ar') {

                    $('.form-errors').html('الكمية المتبقية لا يمكن أن تكون أقل من 0')
                } else {

                    $('.form-errors').html('Remained quantity can not be lower than 0')
                }
            } else {
                $('.swal2-confirm').removeAttr('disabled');
                $('.form-errors').html('')
            }
        }
    })

    $("#inventory").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/inventory",
            type: "GET",
        },

        columns: [{
                data: "id",
                name: "id"
            },
            {
                data: "name",
                name: "name"
            },
            {
                data: "qty",
                name: "qty"
            },
            {

                data: "add",
                name: "add",
                render: function(data, type, row, meta) {
                    return `<a href="${admin_site}/edit-quantity/${row.id}" data-qty="${row.qty}" data-type="1" class="action btn btn-success btn-block">+</a>`;
                }
            },
            {

                data: "substract",
                name: "substract",
                render: function(data, type, row, meta) {
                    return `<a href="${admin_site}/edit-quantity/${row.id}" data-qty="${row.qty}" data-type="-1" class="action btn btn-danger btn-block">-</a>`;
                }
            },

        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4],
            searchable: true
        }, {
            'width': '180px',
            'targets': [3, 4]
        }],
        ordering: true,
    });


    $(".dataTables_length").addClass("bs-select");

    $(document).on('click', ".action", function(e) {
        var href = $(this).attr("href");
        var type = $(this).data('type');
        var quantity = $(this).data('qty');
        var title = "";
        var body = "";
        if (lang == 'ar') {
            title = type == 1 ? "إضافة كمية" : "طرح كمية";
            body = `
            <div class="form-group">
            <label>أدخل الكمية</label>
            <input type="text" class="form-control" id="qty" data-type="${type}" data-qty="${quantity}">
            <div class="form-errors"></div>
            </div>
            `;
        } else {
            title = type == 1 ? "Add Quantity" : "Substract Quantity";
            var body = `
            <div class="form-group">
            <label>Enter Quantity</label>
            <input type="text" class="form-control" id="qty" data-type="${type}" data-qty="${quantity}">
            <div class="form-errors"></div>
            </div>
            `;
        }
        e.preventDefault();
        Swal.fire({
            title: title,
            html: body,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: yes,
            cancelButtonText: no,
        }).then((result) => {
            if (result.value) {
                window.location.href = href + '/' + (qty * type);
            }
        })
    });



    $(document).on('click', ".remove", function(e) {
        var href = $(this).attr("href");
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure',

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
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