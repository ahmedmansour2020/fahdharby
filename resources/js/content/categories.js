$(document).ready(function () {

    var table = $("#categories").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/category",
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
                data: "image",
                name: "image",
                render: function (d, t, r, m) {
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
                data: "details",
                name: "details"
            },
   
            {
                data: "price",
                name: "price"
            },
            {
                data: "update",
                name: "update",
                render: function (d, t, r, m) {
                    return `
                    <a class="btn btn-info" href="${admin_site}/category/${r.id}">${update}</a>
                    `;
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function (d, t, r, m) {
                    return `
                    <a class="btn btn-danger remove" href="${admin_site}/delete-category/${r.id}">${delte}</a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5, 6],
            searchable: true
        }],
        ordering: false,
    });
    $(".dataTables_length").addClass("bs-select");
});