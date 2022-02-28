$(function() { // เรียกใช้งาน datatable
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/File/file_type/",
        data: {},
    }).done(function(data) {
        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([
                `${data[i].id}`,

                `${data[i].name}`,

                `<div class="btn-group" role="group">
                        <button " type="button" class="btn btn-warning edit_file_type" data-toggle="modal" data-id="${data[i].id}"  >
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
        $('#file_t').DataTable({
            data: tableData,
            columns: [{
                    title: "ลำดับที่",
                    className: "align-middle",
                    width: "10%"
                },

                {
                    title: "ประเภทเอกสาร",
                    className: "align-middle",
                    width: "70%"
                },

                {
                    title: "จัดการ",
                    className: "align-middle",
                    width: "20%"
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
                                url: "../../Service/File/file_type/delete.php",
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


$('#file_type').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../../Service/File/file_type/create.php",
        data: {
            t_name: $("#t_name").val(),
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


$(document).on('click', '.edit_file_type', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let id = $(this).data('id');
    $.ajax({
        url: "../../Service/File/file_type/update.php",
        method: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {
            $('#et_id').val(data[0].t_id);
            $('#et_name').val(data[0].t_name);
            $('#eadfile_t').modal('show');
        }
    });
});



$('#efile_type').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../Service/File/file_type/update.php",
        data: {
            id: $('#et_id').val(),
            name: $('#et_name').val(),
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