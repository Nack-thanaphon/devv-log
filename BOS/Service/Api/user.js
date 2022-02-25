$(function() { // เรียกใช้งาน datatable
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/User/",
        data: {},
    }).done(function(data) {
        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([

                ` <button " type="button" class="btn btn-outline-primary p-1" id="detail-user" data-toggle="modal" data-id="${data[i].id}">${data[i].id}</button>`,
                `${data[i].name}`,
                `${data[i].position}`,
                `${data[i].status}`,
                `<input class="toggle-event"  id="toggle-event-user" data-id="${data[i].id}" type="checkbox" name="status" 
                    ${data[i].toggle_status ? 'checked' : ''} data-toggle="toggle" data-on="เปิด" 
                            data-off="ปิด" data-onstyle="success" data-style="ios">`,
                `<div class="btn-group" role="group">
                        <button " type="button" class="btn btn-warning " id="edit-user" data-toggle="modal" data-id="${data[i].id}"  >
                            <i class="far fa-edit"></i> แก้ไข
                        </button>
                        <button type="button" class="btn btn-danger" id="delete" data-id="${data[i].id}">
                            <i class="far fa-trash-alt"></i> ลบ
                        </button>
                    </div>`
            ]);
        };

        initDataTables(tableData);
    }).fail(function() {
        Swal.fire({
            text: 'ไม่สามารถเรียกดูข้อมูลได้',
            icon: 'error',
            confirmButtonText: 'ตกลง',
        }).then(function() {
            // location.assign('./')
        })
    })

    function initDataTables(tableData) { // สร้าง datatable
        $('#user_tbl').DataTable({
            data: tableData,
            columns: [{
                    title: "ลำดับที่",
                    className: "align-middle",
                    width: "10%",

                },

                {
                    title: "ชื่อ-นามสกุล",
                    className: "align-middle",
                    width: "40%",


                },

                {
                    title: "ตำแหน่ง",
                    className: "align-middle",
                    width: "10%",


                },
                {
                    title: "สถานะการใช้งาน",
                    className: "align-middle",
                    width: "10%",

                },

                {
                    title: "สถานะ",
                    className: "align-middle",
                    width: "10%",

                },
                {
                    title: "จัดการ",
                    className: "align-middle",
                    width: "20%",

                }
            ],
            initComplete: function() { // เรียกใช้งาน ลบข้อมูล datatable
                $(document).on('click', '#delete', function() {
                    let id = $(this).data('id')
                    Swal.fire({
                        text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่! ลบเลย',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "../../Service/User/delete.php",

                                data: {
                                    id: id
                                }
                            }).done(function() {
                                Swal.fire({
                                    text: 'รายการของคุณถูกลบเรียบร้อย',
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                }).then((result) => {
                                    location.reload();
                                });
                            })
                        }
                    })
                }).on('change', '.toggle-event', function() {
                    toastr.success('อัพเดทข้อมูลเสร็จเรียบร้อย')
                })
            },
            fnDrawCallback: function() {
                $('.toggle-event').bootstrapToggle();
            },
            responsive: {
                details: {

                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            language: {
                "lengthMenu": "แสดงข้อมูล _MENU_ แถว",
                "zeroRecords": "ไม่พบข้อมูลที่ต้องการ",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่พบข้อมูลที่ต้องการ",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": 'ค้นหา',
                "paginate": {
                    "previous": "ก่อนหน้านี้",
                    "next": "หน้าต่อไป"
                }
            }
        })
    }
})


$(document).on('submit', '#crete_user', function(event) {
    event.preventDefault();

    $.ajax({
        url: "../../Service/User/create.php",
        method: "POST",
        data: {
            fullname: $("#full_name").val(),
            password: MD5($("#user_password").val()),
            username: $("#user_name").val(),
            email: $("#user_email").val(),
            position: $("#user_role_id").val(),
        },
        success: function(data) {
            Swal.fire({
                    text: 'เพิ่มข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                })
                .then((result) => {
                    location.reload();
                });
        }
    })
});




$(document).on('click', '#edit-user', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let id = $(this).data('id');

    $.ajax({
        url: "../../Service/User/update.php",
        method: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {
            $('#euser_id').val(data[0].user_id);
            $('#efull_name').val(data[0].full_name);
            $('#euser_name').val(data[0].user_name);
            $('#euser_email').val(data[0].user_email);
            $('#euser_role_id').val(data[0].user_role_id);
            $('#edit_user').modal('show');
        }
    });
});

$(document).on('click', '#detail-user', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let id = $(this).data('id');

    $.ajax({
        url: "../../Service/User/update.php",
        method: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {

            $('#dfull_name').html(data[0].full_name);
            $('#duser_name').html(data[0].user_name);
            $('#duser_email').html(data[0].user_email);
            $('#duser_role_id').html(data[0].user_role);
            $('#detail_user').modal('show');
        }
    });
});


$('#edit_userform').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../Service/User/update.php",
        data: {
            id: $('#euser_id').val(),
            fullname: $('#efull_name').val(),
            username: $('#euser_name').val(),
            email: $('#euser_email').val(),
            position: $('#euser_role_id').val(),
        },
        success: function(response) {
            Swal.fire({
                text: 'อัพเดตข้อมูลเรียบร้อย',
                icon: 'success',
                confirmButtonText: 'ตกลง',
            }).then((result) => {
                location.reload();
            });

        },
        error: function(err) {
            console.log("bad", err);
        }
    });
});

$(document).on('change', '#toggle-event-user', function() { // เรียกใช้งาน สถานะ datatable
    let id = $(this).data("id");
    let status = '';

    if ($("#toggle-event-user").prop('checked')) {
        status = '1';
    } else {
        status = '0';
    } {
        Swal.fire({
            text: 'อัพเดตข้อมูลเรียบร้อย',
            icon: 'success',
            confirmButtonText: 'ตกลง',
        }).then((result) => {
            $.ajax({
                url: "../../Service/User/status.php",
                method: "POST",
                data: {
                    id: id,
                    status: status
                },
                dataType: "json",
                success: function(data) {
                    location.reload();
                }
            })
        });
    }
});


$("#n_image").change((e) => { // เรียกใช้งาน UPLOADFILE (สำคัญ)
    var form_data = new FormData();
    var ins = document.getElementById(e.target.id).files.length;
    for (var x = 0; x < ins; x++) {
        form_data.append("files[]", document.getElementById(e.target.id).files[x]);
    }
    $.ajax({
        // url: './api/uploadfile.php', // point to server-side PHP script 
        url: '../../Service/News/uploadfile.php', // point to server-side PHP script
        dataType: 'text', // what to expect back from the PHP script
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {

            $("#n_imgname").val(response)
        },
        error: function(err) {
            console.log('bad', err)
        }
    });
})


$("#e_image").change((e) => { // เรียกใช้งาน UPLOADFILE แก้ไข (สำคัญ)

    var form_data = new FormData();
    var ins = document.getElementById(e.target.id).files.length;
    for (var x = 0; x < ins; x++) {
        form_data.append("files[]", document.getElementById(e.target.id).files[x]);
    }
    $.ajax({
        // url: './api/uploadfile.php', // point to server-side PHP script 
        url: "../../Service/News/uploadfile.php", // point to server-side PHP script
        dataType: 'text', // what to expect back from the PHP script
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {
            console.log('good', response)
            $("#e_imgname").val(response)
        },
        error: function(err) {
            console.log('bad', err)
        }
    });
})






function preview_image(event) { // เรียกใช้งาน preview imagebefore (สำคัญ)
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('showimg');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_eimage(event) { // เรียกใช้งาน preview เก่า (สำคัญ)
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('update_showimg');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}




MD5 = function(e) {
    function h(a, b) {
        var c, d, e, f, g;
        e = a & 2147483648;
        f = b & 2147483648;
        c = a & 1073741824;
        d = b & 1073741824;
        g = (a & 1073741823) + (b & 1073741823);
        return c & d ?
            g ^ 2147483648 ^ e ^ f :
            c | d ?
            g & 1073741824 ?
            g ^ 3221225472 ^ e ^ f :
            g ^ 1073741824 ^ e ^ f :
            g ^ e ^ f;
    }

    function k(a, b, c, d, e, f, g) {
        a = h(a, h(h((b & c) | (~b & d), e), g));
        return h((a << f) | (a >>> (32 - f)), b);
    }

    function l(a, b, c, d, e, f, g) {
        a = h(a, h(h((b & d) | (c & ~d), e), g));
        return h((a << f) | (a >>> (32 - f)), b);
    }

    function m(a, b, d, c, e, f, g) {
        a = h(a, h(h(b ^ d ^ c, e), g));
        return h((a << f) | (a >>> (32 - f)), b);
    }

    function n(a, b, d, c, e, f, g) {
        a = h(a, h(h(d ^ (b | ~c), e), g));
        return h((a << f) | (a >>> (32 - f)), b);
    }

    function p(a) {
        var b = "",
            d = "",
            c;
        for (c = 0; 3 >= c; c++)
            (d = (a >>> (8 * c)) & 255),
            (d = "0" + d.toString(16)),
            (b += d.substr(d.length - 2, 2));
        return b;
    }
    var f = [],
        q,
        r,
        s,
        t,
        a,
        b,
        c,
        d;
    e = (function(a) {
        a = a.replace(/\r\n/g, "\n");
        for (var b = "", d = 0; d < a.length; d++) {
            var c = a.charCodeAt(d);
            128 > c ?
                (b += String.fromCharCode(c)) :
                (127 < c && 2048 > c ?
                    (b += String.fromCharCode((c >> 6) | 192)) :
                    ((b += String.fromCharCode((c >> 12) | 224)),
                        (b += String.fromCharCode(((c >> 6) & 63) | 128))),
                    (b += String.fromCharCode((c & 63) | 128)));
        }
        return b;
    })(e);
    f = (function(b) {
        var a,
            c = b.length;
        a = c + 8;
        for (
            var d = 16 * ((a - (a % 64)) / 64 + 1),
                e = Array(d - 1),
                f = 0,
                g = 0; g < c;

        )
            (a = (g - (g % 4)) / 4),
            (f = (g % 4) * 8),
            (e[a] |= b.charCodeAt(g) << f),
            g++;
        a = (g - (g % 4)) / 4;
        e[a] |= 128 << ((g % 4) * 8);
        e[d - 2] = c << 3;
        e[d - 1] = c >>> 29;
        return e;
    })(e);
    a = 1732584193;
    b = 4023233417;
    c = 2562383102;
    d = 271733878;
    for (e = 0; e < f.length; e += 16)
        (q = a),
        (r = b),
        (s = c),
        (t = d),
        (a = k(a, b, c, d, f[e + 0], 7, 3614090360)),
        (d = k(d, a, b, c, f[e + 1], 12, 3905402710)),
        (c = k(c, d, a, b, f[e + 2], 17, 606105819)),
        (b = k(b, c, d, a, f[e + 3], 22, 3250441966)),
        (a = k(a, b, c, d, f[e + 4], 7, 4118548399)),
        (d = k(d, a, b, c, f[e + 5], 12, 1200080426)),
        (c = k(c, d, a, b, f[e + 6], 17, 2821735955)),
        (b = k(b, c, d, a, f[e + 7], 22, 4249261313)),
        (a = k(a, b, c, d, f[e + 8], 7, 1770035416)),
        (d = k(d, a, b, c, f[e + 9], 12, 2336552879)),
        (c = k(c, d, a, b, f[e + 10], 17, 4294925233)),
        (b = k(b, c, d, a, f[e + 11], 22, 2304563134)),
        (a = k(a, b, c, d, f[e + 12], 7, 1804603682)),
        (d = k(d, a, b, c, f[e + 13], 12, 4254626195)),
        (c = k(c, d, a, b, f[e + 14], 17, 2792965006)),
        (b = k(b, c, d, a, f[e + 15], 22, 1236535329)),
        (a = l(a, b, c, d, f[e + 1], 5, 4129170786)),
        (d = l(d, a, b, c, f[e + 6], 9, 3225465664)),
        (c = l(c, d, a, b, f[e + 11], 14, 643717713)),
        (b = l(b, c, d, a, f[e + 0], 20, 3921069994)),
        (a = l(a, b, c, d, f[e + 5], 5, 3593408605)),
        (d = l(d, a, b, c, f[e + 10], 9, 38016083)),
        (c = l(c, d, a, b, f[e + 15], 14, 3634488961)),
        (b = l(b, c, d, a, f[e + 4], 20, 3889429448)),
        (a = l(a, b, c, d, f[e + 9], 5, 568446438)),
        (d = l(d, a, b, c, f[e + 14], 9, 3275163606)),
        (c = l(c, d, a, b, f[e + 3], 14, 4107603335)),
        (b = l(b, c, d, a, f[e + 8], 20, 1163531501)),
        (a = l(a, b, c, d, f[e + 13], 5, 2850285829)),
        (d = l(d, a, b, c, f[e + 2], 9, 4243563512)),
        (c = l(c, d, a, b, f[e + 7], 14, 1735328473)),
        (b = l(b, c, d, a, f[e + 12], 20, 2368359562)),
        (a = m(a, b, c, d, f[e + 5], 4, 4294588738)),
        (d = m(d, a, b, c, f[e + 8], 11, 2272392833)),
        (c = m(c, d, a, b, f[e + 11], 16, 1839030562)),
        (b = m(b, c, d, a, f[e + 14], 23, 4259657740)),
        (a = m(a, b, c, d, f[e + 1], 4, 2763975236)),
        (d = m(d, a, b, c, f[e + 4], 11, 1272893353)),
        (c = m(c, d, a, b, f[e + 7], 16, 4139469664)),
        (b = m(b, c, d, a, f[e + 10], 23, 3200236656)),
        (a = m(a, b, c, d, f[e + 13], 4, 681279174)),
        (d = m(d, a, b, c, f[e + 0], 11, 3936430074)),
        (c = m(c, d, a, b, f[e + 3], 16, 3572445317)),
        (b = m(b, c, d, a, f[e + 6], 23, 76029189)),
        (a = m(a, b, c, d, f[e + 9], 4, 3654602809)),
        (d = m(d, a, b, c, f[e + 12], 11, 3873151461)),
        (c = m(c, d, a, b, f[e + 15], 16, 530742520)),
        (b = m(b, c, d, a, f[e + 2], 23, 3299628645)),
        (a = n(a, b, c, d, f[e + 0], 6, 4096336452)),
        (d = n(d, a, b, c, f[e + 7], 10, 1126891415)),
        (c = n(c, d, a, b, f[e + 14], 15, 2878612391)),
        (b = n(b, c, d, a, f[e + 5], 21, 4237533241)),
        (a = n(a, b, c, d, f[e + 12], 6, 1700485571)),
        (d = n(d, a, b, c, f[e + 3], 10, 2399980690)),
        (c = n(c, d, a, b, f[e + 10], 15, 4293915773)),
        (b = n(b, c, d, a, f[e + 1], 21, 2240044497)),
        (a = n(a, b, c, d, f[e + 8], 6, 1873313359)),
        (d = n(d, a, b, c, f[e + 15], 10, 4264355552)),
        (c = n(c, d, a, b, f[e + 6], 15, 2734768916)),
        (b = n(b, c, d, a, f[e + 13], 21, 1309151649)),
        (a = n(a, b, c, d, f[e + 4], 6, 4149444226)),
        (d = n(d, a, b, c, f[e + 11], 10, 3174756917)),
        (c = n(c, d, a, b, f[e + 2], 15, 718787259)),
        (b = n(b, c, d, a, f[e + 9], 21, 3951481745)),
        (a = h(a, q)),
        (b = h(b, r)),
        (c = h(c, s)),
        (d = h(d, t));

    return (p(a) + p(b) + p(c) + p(d)).toLowerCase();
};