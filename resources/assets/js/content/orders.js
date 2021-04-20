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
        orders_status.ajax.reload();
    })
    $('#search').on('keyup', function() {
        orders_status.ajax.reload();
    })


    var orders_status = $("#orders_status").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        ajax: {
            url: vendor_site + "/orders",
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
                data: "order_id",
                name: "order_id"
            },
            {
                data: "user",
                name: "user"
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    return `جديد`
                }
            },
            {
                data: "date",
                name: "date"
            },
            {
                data: "qty",
                name: "qty"
            },
            {
                data: "total",
                name: "total",
                render: function(d, t, r, m) {
                    return d + ' $'
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5, 6, 7],
            searchable: false
        }],
        ordering: false,
    });

    $(".dataTables_length").addClass("bs-select");

});