<?php
include "../../include/editer_header.php";
include "../../database/connect.php";

// checking user logged or not
if (empty($_SESSION['user'])) {
    header('location: index.php');
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include "../../include/admin_navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <?php include "../../include/topbar.php"; ?>
                </ul>
            </nav>
            <div class="container-fluid">
                <?php include "./file/file_group_manager.php" ?>
                <?php include "../../include/footer.php"; ?>
                <?php include "../../include/script.php"; ?>
            </div>
        </div>
    </div>



    <script>
        $(function() { // เรียกใช้งาน datatable
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "../../services/File/file_group/",
                data: {},
            }).done(function(data) {
                let tableData = []
                let n = 1
                data = data.result;
                for (var i = 0; i < data.length; i++) {
                    tableData.push([

                        `${n++}`,
                        `${data[i].name}`,

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
                    order: [
                        ['0', 'desc']
                    ],
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
                                        url: "../../services/File/file_group/delete.php",
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
                url: "../../services/File/file_group/create.php",
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
                url: "../../services/File/file_group/update.php",
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
                url: "../../services/File/file_group/update.php",
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


                },
                error: function(err) {

                }
            })

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
    </script>



</body>