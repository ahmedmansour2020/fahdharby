$(document).ready(function() {
    $('#status').on('change', function() {
        product_offers.ajax.reload();
    })

    var product_offers = $("#product_offers").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        ajax: {
            url: vendor_site + "/offers/product/" + product_id,
            type: "GET",
            data: {
                'status': function() { return $('#status').val(); },

            },
        },
        language: {
            url: language,
        },
        "pageLength": 100,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        columns: [{
                data: "main_price",
                name: "main_price"
            },
            {
                data: "offer",
                name: "offer"
            },
            {
                data: "after_price",
                name: "after_price"
            },
            {
                data: "start",
                name: "start"
            },
            {
                data: "end",
                name: "end"
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return `<span class="text-warning">لم يبدأ بعد</span>`;
                    } else if (d == 1) {
                        return `<span class="text-success">ساري</span>`;
                    } else {
                        return `<span class="text-danger">انتهى</span>`;
                    }
                }
            },
            {
                data: "approved",
                name: "approved",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return `<span class="text-danger">معلق</span>`;
                    } else {
                        return `<span class="text-primary">تمت الموافقة</span>`;
                    }
                }
            },
            {
                data: "remove",
                name: "remove",
                render: function(d, t, r, m) {
                    return `
                    <a href="${vendor_site}/offer/delete/${r.id}" class="remove"><i class="text-danger fa fa-trash"></i></a>
                    `;
                }
            }


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5],
            searchable: false
        }],
        ordering: false,
    });
    var approval_offers = $("#approval_offers").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/approval/offers",
            type: "GET",
        },
        language: {
            url: language,
        },
        "pageLength": 100,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        columns: [{
                data: "image",
                name: "image",
                render: function(d, t, r, m) {
                    if (d == null) {
                        return null
                    } else {

                        return `
                        <img width="80" height="80" src="${d}" alt>
                        `;
                    }
                }
            },
            {
                data: "name",
                name: "name"
            },
            {
                data: "main_price",
                name: "main_price"
            },
            {
                data: "offer",
                name: "offer"
            },
            {
                data: "after_price",
                name: "after_price"
            },
            {
                data: "start",
                name: "start"
            },
            {
                data: "end",
                name: "end"
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return `<span class="text-warning">لم يبدأ بعد</span>`;
                    } else if (d == 1) {
                        return `<span class="text-success">ساري</span>`;
                    } else {
                        return `<span class="text-danger">انتهى</span>`;
                    }
                }
            },
            {
                data: "approved",
                name: "approved",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return `<span class="text-danger">معلق</span>`;
                    } else {
                        return `<span class="text-primary">تمت الموافقة</span>`;
                    }
                }
            },
            {
                data: "change",
                name: "change",
                render: function(d, t, r, m) {
                    return `
                    <button type="button" class="btn mx-2 change_status" data-to_status="1" data-status="${r.approved}" data-id="${r.id}"><i class="text-primary fa fa-check"></i></button>
                    <button type="button" class="btn mx-2 change_status" data-to_status="0" data-status="${r.approved}" data-id="${r.id}"><i class="text-warning fa fa-pause"></i></button>
                    `;
                }
            },
            {
                data: "remove",
                name: "remove",
                render: function(d, t, r, m) {
                    return `
                    <a href="${admin_site}/offer/delete/${r.id}" class="remove"><i class="text-danger fa fa-trash"></i></a>
                    `;
                }
            }


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5],
            searchable: false
        }],
        ordering: false,
    });

    $(".dataTables_length").addClass("bs-select");
    $(document).on('click', '.change_status', function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        var to_status = $(this).data('to_status');
        var title = "";
        var body = "";
        var type = "";
        var way = 1;
        if (status == to_status) {
            way = 0;
            title = "لا يمكن تغيير الحالة الى نفسها"
            body = false;
            type = 'black';
        } else {
            title = "تغيير حالة المنتج"
            if (to_status == 1) {
                body = 'سوف يتم الموافقة على المنتج';
                type = 'blue';
            } else if (to_status == 0) {
                body = 'سوف يتم إيقاف المنتج مؤقتا';
                type = 'orange';

            } else {
                body = 'سوف يتم رفض المنتج';
                type = 'red';
            }
        }
        if (way == 1) {
            $.confirm({
                title: title,
                type: type,
                typeAnimated: true,

                content: body,
                buttons: {
                    نعم: {
                        btnClass: 'btn-blue',
                        action: function() {
                            var data = {
                                '_token': $('meta[name="csrf-token"]').attr('content'),
                                'status': to_status,
                                'id': id
                            }
                            $.post(change_offer_status, data, function(response) {
                                if (response.success) {
                                    $.alert(response.message)
                                    approval_offers.ajax.reload();
                                }
                            })
                        }
                    },
                    لا: {
                        btnClass: 'btn-red',
                        action: function() {

                        }
                    }

                }
            });
        } else {

            $.confirm({
                title: title,
                type: type,
                typeAnimated: true,

                content: body,
                buttons: {
                    حسنا: {
                        btnClass: 'btn-blue',
                        action: function() {

                        }
                    },

                }
            });
        }
    })
});