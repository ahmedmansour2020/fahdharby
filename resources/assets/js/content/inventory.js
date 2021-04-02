var qty = 0;
$(document).ready(function() {
    $(document).on('keyup', '#qty', function() {
        qty = $(this).val();
        if ($(this).data('type') == -1) {
            if (qty > $(this).data('qty')) {
                $('.jconfirm-buttons .btn-blue').attr('disabled', '');

                $('.form-errors').html('الكمية المتبقية لا يمكن أن تكون أقل من 0')

            } else {
                $('.jconfirm-buttons .btn-blue').removeAttr('disabled');
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
            url: vendor_site + "/inventory",
            type: "GET",
        },
        "pageLength": 100,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        language: {
            url: language,
        },
        columns: [{
                data: "image",
                name: "image",
                render: function(d, t, r, m) {
                    return `
                    <img width="80" height="80" src="${d}">
                    `;
                }
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
                    return `<a href="${vendor_site}/edit-quantity/${row.id}" data-qty="${row.qty}" data-type="1" class="action btn btn-success  btn-lg">+</a>`;
                }
            },
            {

                data: "substract",
                name: "substract",
                render: function(data, type, row, meta) {
                    return `<a href="${vendor_site}/edit-quantity/${row.id}" data-qty="${row.qty}" data-type="-1" class="action btn btn-danger btn-lg">-</a>`;
                }
            },

        ],
        columnDefs: [{
                targets: [0, 1, 2, 3, 4],
                searchable: true
            }, {
                'width': '120px',
                'targets': [3, 4]
            },
            {
                'width': '150px',
                'targets': [0]
            }
        ],
        ordering: false,
    });


    $(".dataTables_length").addClass("bs-select");

    $(document).on('click', ".action", function(e) {
        var href = $(this).attr("href");
        var type = $(this).data('type');
        var quantity = $(this).data('qty');
        var title = "";
        var body = "";

        title = type == 1 ? "إضافة كمية" : "طرح كمية";
        body = `
            
            <label>أدخل الكمية</label>
            <input type="text" class="form-control" id="qty" data-type="${type}" data-qty="${quantity}">
            <div class="form-errors text-danger"></div>
        
            `;

        e.preventDefault();

        $.confirm({
            title: title,
            type: 'blue',
            typeAnimated: true,
            content: body,
            buttons: {
                نعم: {
                    btnClass: 'btn-blue',
                    action: function() {
                        // $.alert('Confirmed!');
                        window.location.href = href + '/' + (qty * type);
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