$(document).ready(function() {

    var brands = $("#brands").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/brand",
            type: "GET",
        },

        columns: [{
                data: "index",
                name: "index"
            },
            {
                data: "name",
                name: "name"
            },
            {
                data: "url",
                name: "url"
            },
            {
                data: "image",
                name: "image",
                render: function(d, t, r, m) {
                    if (d == null) {
                        return null;
                    } else {
                        return `
                            <img src="${d}" width="80" height="80">
                                  `;
                    }
                }
            },
            {
                data: "update",
                name: "update",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-info" href="${admin_site}/brand/${r.id}">تعديل</a>
                    `;
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-danger remove" href="${admin_site}/brand/delete/${r.id}">حذف</a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3],
            searchable: true
        }],
        ordering: false,
    });

    $(".dataTables_length").addClass("bs-select");
});