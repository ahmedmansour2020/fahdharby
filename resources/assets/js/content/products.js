$(document).ready(function() {

    var products = $("#products").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: vendor_site + "/product",
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
                data: "sub_category_name",
                name: "sub_category_name"
            },
            {
                data: "brand",
                name: "brand"
            },
            {
                data: "price",
                name: "price"
            },
            {
                data: "update",
                name: "update",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-info" href="${vendor_site}/product/${r.id}">تعديل</a>
                    `;
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-danger remove" href="${vendor_site}/product/delete/${r.id}">حذف</a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5, 6, 7],
            searchable: true
        }],
        ordering: false,
    });

    $(".dataTables_length").addClass("bs-select");
});