$(document).ready(function() {

    var promocodes = $("#promocodes").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/promocode",
            type: "GET",
        },
        language: {
            url: language,
        },
        "pageLength": 100,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        columns: [
            { data: "code", name: "code" },
            { data: "value", name: "value" },
            { data: "minimum", name: "minimum" },
            { data: "count", name: "count" },
            { data: "start", name: "start" },
            { data: "end", name: "end" },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return '<span class="text-warning">لم يبدأ بعد</span>';
                    } else if (d == 1) {
                        return '<span class="text-success">ساري</span>';
                    } else {
                        return '<span class="text-danger">انتهى</span>';
                    }
                }
            },
            {
                data: "update",
                name: "update",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-info" href="${admin_site}/promocode/${r.id}"><i class="fa fa-edit"></i></a>

                    <a class="btn btn-danger remove" href="${admin_site}/promocode/delete/${r.id}"><i class="fa fa-trash"></i></a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2],
            searchable: true
        }],
        ordering: false,
    });
    var vendor_promocodes = $("#vendor_promocodes").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: vendor_site + "/coupone",
            type: "GET",
        },
        language: {
            url: language,
        },
        "pageLength": 100,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        columns: [
            { data: "code", name: "code" },
            { data: "value", name: "value" },
            { data: "minimum", name: "minimum" },
            { data: "count", name: "count" },
            { data: "start", name: "start" },
            { data: "end", name: "end" },
            {
                data: "status_type",
                name: "status_type",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return '<span class="text-warning">لم يبدأ بعد</span>';
                    } else if (d == 1) {
                        return '<span class="text-success">ساري</span>';
                    } else {
                        return '<span class="text-danger">انتهى</span>';
                    }
                }
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return `<span class="text-danger">معلق</span>`
                    } else {
                        return `<span class="text-success">تمت الموافقة</span>`
                    }
                }
            },
            {
                data: "update",
                name: "update",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-info" href="${vendor_site}/coupone/${r.id}"><i class="fa fa-edit"></i></a>

                    <a class="btn btn-danger remove" href="${vendor_site}/coupone/delete/${r.id}"><i class="fa fa-trash"></i></a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2],
            searchable: true
        }],
        ordering: false,
    });
    $('#status').on('change', function() {
        $("#approval_coupones").DataTable().ajax.reload();
    })
    var approval_coupones = $("#approval_coupones").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/approval/coupones",
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
        columns: [
            { data: "user", name: "user" },
            { data: "code", name: "code" },
            { data: "value", name: "value" },
            { data: "minimum", name: "minimum" },
            { data: "count", name: "count" },
            { data: "start", name: "start" },
            { data: "end", name: "end" },
            {
                data: "status_type",
                name: "status_type",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return '<span class="text-warning">لم يبدأ بعد</span>';
                    } else if (d == 1) {
                        return '<span class="text-success">ساري</span>';
                    } else {
                        return '<span class="text-danger">انتهى</span>';
                    }
                }
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return `<span class="text-danger">معلق</span>`
                    } else {
                        return `<span class="text-success">تمت الموافقة</span>`
                    }
                }
            },
            {
                data: "change",
                name: "change",
                render: function(d, t, r, m) {
                    return `
                    <button type="button" class="btn mx-2 change_status" data-to_status="1" data-status="${r.status}" data-id="${r.id}"><i class="text-primary fa fa-check"></i></button>
                    <button type="button" class="btn mx-2 change_status" data-to_status="0" data-status="${r.status}" data-id="${r.id}"><i class="text-danger fa fa-pause"></i></button>
                    `;
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-danger remove" href="${admin_site}/coupone/delete/${r.id}"><i class="fa fa-trash"></i></a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2],
            searchable: true
        }],
        ordering: false,
    });
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
                body = 'سوف يتم الموافقة على الكوبون';
                type = 'blue';
            } else {
                body = 'سوف يتم إيقاف الكوبون';
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
                            $.post(change_coupones_status, data, function(response) {
                                if (response.success) {
                                    $.alert(response.message)
                                    approval_coupones.ajax.reload();
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