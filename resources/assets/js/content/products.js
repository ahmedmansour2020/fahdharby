$(document).ready(function() {
    var href = window.location.href;
    var standard = vendor_site + '/product?stored=true';
    if (href == standard) {
        $('input[name="tabs"]').removeAttr('checked');
        $('input[name="tabs"]').each(function(e) {
            if ($(this).val() == 2) {
                $(this).attr('checked', 'true');
            }
        });
        $('a.nav-link').removeClass('active');
        $('a.review-tab').addClass('active');
    }

    $('li.nav-item').on('click', function() {
        $('input[name="tabs"]').removeAttr('checked')
        $(this).children('input[name="tabs"]').attr('checked', 'true')
        products.ajax.reload();
    })
    $('#search').on('keyup', function() {
        products.ajax.reload();
    })


    var products = $(".products").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        ajax: {
            url: vendor_site + "/product",
            type: "GET",
            data: {
                tab: function() {
                    return $('input[name="tabs"]:checked').val()
                },
                search: function() {
                    return $('#search').val()
                },

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
                data: "image",
                name: "image",
                render: function(d, t, r, m) {
                    if (d == null) {
                        return null
                    } else {

                        return `
                        <a href="${vendor_site}/set-main-image/${r.id}" title="اضغط هنا لاختيار الصورة الرئيسية"><img width="80" height="80" src="${d}" alt></a>
                        `;
                    }
                }
            },
            {
                data: "name",
                name: "name",
                render: function(d, t, r, m) {
                    if (d.length > 70) {
                        return d.substr(0, 70) + " ...";
                    } else {
                        return d;
                    }
                }
            },
            {
                data: "price",
                name: "price"
            },
            {
                data: "qty",
                name: "qty"
            },
            {
                data: "update_date",
                name: "update_date"
            },
            {
                data: "duration",
                name: "duration"
            },
            {
                data: "action",
                name: "action",
                render: function(d, t, r, m) {
                    return `
                    <a href="${vendor_site}/product/${r.id}" class="mx-2"><i class="text-info fa fa-edit"></i></a>
                    <a href="${vendor_site}/product/delete/${r.id}" class="remove"><i class="text-danger fa fa-trash"></i></a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5, 6],
            searchable: false
        }],
        ordering: false,
    });
    $('#status').on('change', function() {
        $("#approval_products").DataTable().ajax.reload();
    })
    var approval_products = $("#approval_products").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/approval/products",
            type: "GET",
            data: {
                'status': function() { return $('#status').val(); }
            }

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
                name: "name",
                render: function(d, t, r, m) {
                    if (d.length > 70) {
                        return d.substr(0, 70) + " ...";
                    } else {
                        return d;
                    }
                }
            },
            {
                data: "price",
                name: "price"
            },
            {
                data: "qty",
                name: "qty"
            },
            {
                data: "update_date",
                name: "update_date"
            },
            {
                data: "duration",
                name: "duration"
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    switch (d) {
                        case '0':
                            return `<span class="text-success">قيد المراجعة</span>`;
                        case '1':
                            return `<span class="text-primary">تمت الموافقة</span>`;
                        case '2':
                            return `<span class="text-warning">متوقف مؤقتا</span>`;
                        case '3':
                            return `<span class="text-danger">مرفوض</span>`;

                    }
                }
            },
            {
                data: "change",
                name: "change",
                render: function(d, t, r, m) {
                    return `
                    <button type="button" class="btn mx-2 change_status" data-to_status="1" data-status="${r.status}" data-id="${r.id}"><i class="text-primary fa fa-check"></i></button>
                    <button type="button" class="btn mx-2 change_status" data-to_status="2" data-status="${r.status}" data-id="${r.id}"><i class="text-warning fa fa-pause"></i></button>
                    <button type="button" class="btn mx-2 change_status" data-to_status="3" data-status="${r.status}" data-id="${r.id}"><i class="text-danger fa fa-times"></i></button>
                    `;
                }
            },
            {
                data: "action",
                name: "action",
                render: function(d, t, r, m) {
                    return `
                    <a href="${admin_site}/product/${r.id}" class="mx-2"><i class="text-info fa fa-eye"></i></a>
                    <a href="${admin_site}/product/delete/${r.id}" class="remove"><i class="text-danger fa fa-trash"></i></a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5, 6],
            searchable: false
        }],
        ordering: false,
    });
    var products_offers = $("#products_offers").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        ajax: {
            url: vendor_site + "/offers/products",
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
                data: "price",
                name: "price"
            },
            {
                data: "qty",
                name: "qty"
            },

            {
                data: "action",
                name: "action",
                render: function(d, t, r, m) {
                    return `
                    <button class="btn btn-outline-dark offer" data-id="${r.id}" type="button"><i class="fa fa-gift "></i></button>
                    `;
                }
            },
            {
                data: "menu",
                name: "menu",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-info" href="${vendor_site}/offers/product/${r.id}" type="button"><i class="fa fa-bars "></i></a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4],
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
            } else if (to_status == 2) {
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
                            $.post(change_product_status, data, function(response) {
                                if (response.success) {
                                    $.alert(response.message)
                                    approval_products.ajax.reload();
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

    $(document).on('click', '.offer', function() {
        var id = $(this).data('id');
        var content = `
        <div class="row w-100">
        <div class="form-group col-12">
        <label>نسبة الخصم</label>
        <input class="form-control " id="offer" type="number" placeholder="%">
        </div>
        <div class="form-group col-12">
        <label>من</label>
        <input class="form-control " id="start" type="date">
        </div>
        <div class="form-group col-12">
        <label>إلى</label>
        <input class="form-control " id="end" type="date">
        </div>
        </div>
        `;
        $.confirm({
            title: 'إضافة عرض للمنتج',
            content: content,
            buttons: {
                تنفيذ: {
                    btnClass: 'btn btn-success',
                    action: function() {
                        var offer = $('#offer').val();
                        var start = $('#start').val();
                        var end = $('#end').val();
                        var data = {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'id': id,
                            'offer': offer,
                            'start': start,
                            'end': end
                        }
                        $.post(add_offer, data, function(response) {
                            products_offers.ajax.reload();
                        });
                    }
                },
                إلغاء: {
                    btnClass: 'btn btn-danger',
                    action: function() {

                    }
                }
            }
        })
    })
});