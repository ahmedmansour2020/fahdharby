$(document).ready(function() {

    var sliders = $("#sliders").DataTable({
        dom: "lBfrtip",
        processing: false,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/settings/sliders",
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
                data: "index",
                name: "index"
            },
            {
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
                data: "content",
                name: "content",
                render: function(d, t, r, m) {
                    var color = "#000";
                    if (r.color != null) {
                        color = r.color;
                    }
                    if (d.length > 50) {
                        return `<span style="color:${color}">${d.substr(0, 50) + "..."}</span>`;
                    } else {
                        return `<span style="color:${color}">${d}</span>`;
                    }
                }
            },
            {
                data: "status",
                name: "status",
                render: function(d, t, r, m) {
                    if (d == 0) {
                        return `    
                        <label class="switch">
                       <input type="checkbox" class="change_status" data-id="${r.id}" id="status_${r.id}">
                       <span class="slider round"></span>
                       </label>
                       `;
                    } else {
                        return `  
                        <label class="switch">
                    <input type="checkbox" class="change_status" data-id="${r.id}" id="status_${r.id}" checked>
                    <span class="slider round"></span>
                    </label>
                    `;
                    }
                }
            },
            {
                data: "action",
                name: "action",
                render: function(d, t, r, m) {
                    return `
                    <a href="${admin_site}/setting/slider/${r.id}" class="mx-2"><i class="text-info fa fa-edit"></i></a>
                    <a href="${admin_site}/setting/slider/delete/${r.id}" class="remove"><i class="text-danger fa fa-trash"></i></a>
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
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id,
        }
        $.post(change_slider_status, data, function(response) {})
    })
});