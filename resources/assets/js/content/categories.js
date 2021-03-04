$(document).ready(function() {

<<<<<<< HEAD
    var brands = $("#brands").DataTable({
=======
    var categories = $("#categories").DataTable({
>>>>>>> ce35a573f30194aff2d4349e567607192f0cd6ef
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
<<<<<<< HEAD
            url: admin_site + "/brand",
=======
            url: admin_site + "/category",
>>>>>>> ce35a573f30194aff2d4349e567607192f0cd6ef
            type: "GET",
        },

        columns: [{
                data: "index",
                name: "index"
            },
            {
                data: "name",
<<<<<<< HEAD
                name: "name"
            },
            {
                data: "url",
                name: "url"
=======
                name: "name",
                render: function(d, t, r, m) {
                    if (r.count == 0) {
                        return d;
                    } else {
                        return `
                        <a href="${admin_site}/category/sub/${r.id}">${d}</a>
                        `
                    }
                }
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
                    <a class="btn btn-info" href="${admin_site}/category/${r.id}">تعديل</a>
                    `;
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-danger remove" href="${admin_site}/category/delete/${r.id}">حذف</a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4],
            searchable: true
        }],
        ordering: false,
    });
    var sub_categories = $("#sub_categories").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/category/sub/" + parent,
            type: "GET",
        },

        columns: [{
                data: "index",
                name: "index"
            },
            {
                data: "name",
                name: "name"
>>>>>>> ce35a573f30194aff2d4349e567607192f0cd6ef
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
<<<<<<< HEAD
                    <a class="btn btn-info" href="${admin_site}/brand/${r.id}">تعديل</a>
=======
                    <a class="btn btn-info" href="${admin_site}/category/${r.id}">تعديل</a>
>>>>>>> ce35a573f30194aff2d4349e567607192f0cd6ef
                    `;
                }
            },
            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `
<<<<<<< HEAD
                    <a class="btn btn-danger remove" href="${admin_site}/brand/delete/${r.id}">حذف</a>
=======
                    <a class="btn btn-danger remove" href="${admin_site}/category/delete/${r.id}">حذف</a>
>>>>>>> ce35a573f30194aff2d4349e567607192f0cd6ef
                    `;
                }
            },


        ],
        columnDefs: [{
<<<<<<< HEAD
            targets: [0, 1, 2, 3],
=======
            targets: [0, 1, 2, 3, 4],
>>>>>>> ce35a573f30194aff2d4349e567607192f0cd6ef
            searchable: true
        }],
        ordering: false,
    });
<<<<<<< HEAD

=======
>>>>>>> ce35a573f30194aff2d4349e567607192f0cd6ef
    $(".dataTables_length").addClass("bs-select");
});