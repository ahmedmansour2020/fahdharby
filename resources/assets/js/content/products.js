$(document).ready(function() {
    var href = window.location.href;
    var standard = vendor_site + '/product?stored=true';
    if (href == standard) {
        $('input[name="tabs"]').removeAttr('checked');
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

    var language =
        "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json";

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
                    return `
                <img width="80" height="80" src="${d}" alt>
                `;
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

    $(".dataTables_length").addClass("bs-select");
});