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
});