$(function() { // เรียกใช้งาน datatable
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/File/file_group/",
        data: {},
    }).done(function(data) {
        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([
                `<a href="https://www.mugh.or.th/single_news.php?id=${data[i].id}" target="_blank" class="btn btn-outline-primary p-1"> ${data[i].id} </a>`,
                `${data[i].name}`,
                `<input class="toggle-event"  id="toggle-event-file-group" data-id="${data[i].id}" type="checkbox" name="status" 
                    ${data[i].status ? 'checked' : ''} data-toggle="toggle" data-on="เผยแพร่" 
                            data-off="ปิด" data-onstyle="success" data-style="ios">`,
                `<div class="btn-group" role="group">
                        <button " type="button" class="btn btn-warning edit_file_group" data-toggle="modal" data-id="${data[i].id}"  >
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
        $('#file_g').DataTable({
            data: tableData,
            columns: [{
                    title: "ลำดับที่",
                    className: "align-middle"
                },

                {
                    title: "ประเภทเอกสาร",
                    className: "align-middle",
                    width: "50%"
                },



                {
                    title: "สถานะ",
                    className: "align-middle"
                },
                {
                    title: "จัดการ",
                    className: "align-middle"
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
                                url: "../../Service/File/file_group/delete.php",
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

$(function() {
    $("#datepicker").datepicker({
        todayHighlight: true, // to highlight the today's date
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    }).datepicker('update', new Date());
});


$('#file_group').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../../Service/File/file_group/create.php",
        data: {
            g_name: $("#g_name").val(),
            detail: $("#g_detail").val(),
            date: $("#g_date").val(),
            g_address: $("#g_address").val(),
        },
    }).done(function(resp) {
        Swal.fire({
            text: 'เพิ่มข้อมูลเรียบร้อย',
            icon: 'success',
            confirmButtonText: 'ตกลง',
        }).then((result) => {
            location.reload();

        });
    })



});


$(document).on('click', '.edit_file_group', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let id = $(this).data('id');

    $.ajax({
        url: "../../Service/File/file_group/update.php",
        method: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {
            $('#eg_id').val(data[0].g_id);
            $('#eg_name').val(data[0].g_name);
            $('#eg_detail').val(data[0].g_detail);
            $('#eg_date').val(data[0].g_date);
            $('#eg_address').val(data[0].g_address);
            $('#eadfile_g').modal('show');
        }
    });
});



$('#efile_group').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../Service/File/file_group/update.php",
        data: {
            id: $('#eg_id').val(),
            name: $('#eg_name').val(),
            detail: $('#eg_detail').val(),
            address: $('#eg_address').val(),
        },
        success: function(response) {
            Swal.fire({
                text: 'อัพเดตข้อมูลเรียบร้อย',
                icon: 'success',
                confirmButtonText: 'ตกลง',
            }).then((result) => {
                location.reload();

            });
            console.log("good", response);

        },
        error: function(err) {
            console.log("bad", err);
        }
    })

})


$(document).on('change', '#toggle-event-file-group', function() { // เรียกใช้งาน สถานะ datatable
    let id = $(this).data("id");
    let g_status = '';
    if ($("#toggle-event-file-group").prop('checked')) {
        g_status = '1';
    } else {
        g_status = '0';
    } {
        $.ajax({
                url: "../../Service/File/file_group/status.php",
                method: "POST",
                data: {
                    id: id,
                    status: g_status
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                }
            })
            .then((result) => {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                })
            });
    }
});



$(function() { // เรียกใช้งาน Summernote
    $('#detail').summernote({
        height: 300,
    });
    $('#edetail').summernote({
        height: 300,
    });
})




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