$(document).ready(function() {
    $(document).on('click', '#all', function() {
        if ($('#all:checked').val() != null) {
            $('.email').attr('checked', "checked");
            var ids = "";
            $('.email').each(function(e) {
                ids += "," + $(this).val();
            })
            ids = ids.substr(1)
            $('#checked').val(ids)
        } else {
            $('.email').removeAttr('checked');
            $('#checked').val('')
        }

    })
    $(document).on('click', 'input[name="emails[]"],#all', function() {
        setTimeout(function() {

            var checked = $('input[name="emails[]"]:checked').length;

            $('#counter').html(checked);
        }, 100)

    })
    $(document).on('click', 'input[name="emails[]"]', function() {

        if ($(this).prop('checked') == false) {
            if ($('#checked').val().indexOf($(this).val()) > 0) {
                $('#checked').val($('#checked').val().replace(',' + $(this).val(), ''))

            } else {
                if ($('#checked').val().indexOf(',') == -1) {
                    $('#checked').val($('#checked').val().replace($(this).val(), ''))
                } else {
                    $('#checked').val($('#checked').val().replace($(this).val() + ',', ''))
                }
            }
            $('#all').prop('checked', false)
        } else {
            if ($('#checked').val() == "") {

                $('#checked').val($(this).val())

            } else {

                $('#checked').val($('#checked').val() + ',' + $(this).val())

            }
        }
        var email = $('.email');
        var c = 0;
        for (var i = 0; i < email.length; i++) {
            if ($(email[i]).prop('checked') == true) {
                c++;
            }
        }
        if (c == email.length) {
            $('#all').prop('checked', true)
        }

    })
    $(document).on('change', '#all', function() {

        if (this.checked) {
            $(".email").prop('checked', true);
        } else {
            $(".email").prop('checked', false);
        }
        if ($(".email:checked").length == 0) {
            $('button[type="submit"]').prop('disabled', true);
        } else {
            if (keywordHasValue()) {
                $('button[type="submit"]').prop('disabled', false);
            }
        }
    });



    function keywordHasValue() {
        var has_value = false;
        $('input[name="emails[]"]').each(function(i, obj) {
            if ($(obj).val() != '') {
                has_value = true;
                return;
            }
        });
        return has_value;
    }


    var contact_users = $("#contact_users").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/user",
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
                data: "email",
                name: "email"
            },
            {
                data: "mobile",
                name: "mobile"
            },

            {
                data: "send_email",
                name: "send_email",
                render: function(d, t, r, m) {
                    var array = $('#checked').val().split(',');
                    for (var i = 0; i < array.length; i++) {
                        array[i] *= 1;
                    }

                    if (jQuery.inArray(r.id, array) !== -1) {
                        return `
                        <input name="emails[]" class="email" multiple type="checkbox" value="${r.id}" checked />
                        `;
                    } else {

                        return `
                        <input name="emails[]" class="email" multiple type="checkbox" value="${r.id}" />
                        `;
                    }
                }
            },
            {
                data: "send_sms",
                name: "send_sms",
                render: function(d, t, r, m) {
                    return `
                    <input name="sms[]" multiple type="checkbox" value="${r.id}" />
                    `;
                }
            },
            // {
            //     data: "delete",
            //     name: "delete",
            //     render: function(d, t, r, m) {
            //         return `
            //         <a class="btn btn-danger remove" href="${home_site}/delete-user/${r.id}">${delte}</a>
            //         `;
            //     }
            // },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5],
            searchable: true
        }],
        ordering: false,
    });
    var contact_subscripers = $("#contact_subscripers").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/subscripers",
            type: "GET",
        },

        columns: [{
                data: "index",
                name: "index"
            },


            {
                data: "email",
                name: "email"
            },
            {
                data: "mobile",
                name: "mobile"
            },

            {
                data: "send_email",
                name: "send_email",
                render: function(d, t, r, m) {
                    var array = $('#checked').val().split(',');
                    for (var i = 0; i < array.length; i++) {
                        array[i] *= 1;
                    }

                    if (jQuery.inArray(r.id, array) !== -1) {
                        return `
                        <input name="emails[]" class="email" multiple type="checkbox" value="${r.id}" checked />
                        `;
                    } else {

                        return `
                        <input name="emails[]" class="email" multiple type="checkbox" value="${r.id}" />
                        `;
                    }
                }
            },
            {
                data: "send_sms",
                name: "send_sms",
                render: function(d, t, r, m) {
                    return `
                    <input name="sms[]" multiple type="checkbox" value="${r.id}" />
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

    var users = $("#users").DataTable({
        dom: "lBfrtip",
        buttons: ["excel", "print"],
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: admin_site + "/users",
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
                data: "email",
                name: "email"
            },
            {
                data: "mobile",
                name: "mobile"
            },
            {
                data: "role",
                name: "role"
            },

            {
                data: "delete",
                name: "delete",
                render: function(d, t, r, m) {
                    return `
                    <a class="btn btn-danger remove" href="${admin_site}/delete-user/${r.id}">${delte}</a>
                    `;
                }
            },


        ],
        columnDefs: [{
            targets: [0, 1, 2, 3, 4, 5],
            searchable: true
        }],
        ordering: false,
    });
    $(".dataTables_length").addClass("bs-select");





    $(document).on('change input', 'input[type="file"]', function() {

        $('#submit').click()

    })

});