<?php
include "../database/connect.php";
include "../function/function.php";
include "../include/header.php";

?>
<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    <div id="wrapper">
        <?php include "../include/navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <?php include "../include/topbar.php"; ?>
                </ul>
            </nav>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header  border-left-primary text-primary ">
                                <div class="row  mx-auto">
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6 d-none d-sm-block">
                                        <h4>
                                            <i class="fas fa-rss-square"></i>
                                            ระบบจัดการบทความ
                                        </h4>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                        <a href="./news_created.php" class="btn bg-primary text-white w-100 ">
                                            <i class="fas fa-plus"></i>
                                            เพิ่มบทความ
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="logs" class="table table-hover" width="100%">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "../include/script.php"; ?>
            <?php include "../include/footer.php"; ?>
        </div>
    </div>

    <script>
        $(function() { // เรียกใช้งาน datatable
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "../services/News/",
                data: {},
            }).done(function(data) {
                let tableData = []
                let n = 1
                data = data.result;

                for (var i = 0; i < data.length; i++) {

                    tableData.push([
                        `${n++}`,
                        `<img src="../${data[i].image}" class="img-fluid" width="100px">`,
                        `${data[i].name}`,
                        `${data[i].type}`,
                        `<input class="toggle-event"  id="toggle_news${data[i].id}" data-id="${data[i].id}" type="checkbox" name="status" 
                ${data[i].status ? 'checked' : ''} data-toggle="toggle" data-on="เปิด" 
                        data-off="ปิด" data-onstyle="success" data-style="ios">`,
                        `<div class="btn-group" role="group">
                        <a  href="./news_edit.php?id=${data[i].id}" class="btn btn-warning  >
                            <i class="far fa-edit"></i> แก้ไข
                        </a>
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

                })
            })

            function initDataTables(tableData) { // สร้าง datatable
                $('#logs').DataTable({
                    data: tableData,
                    order: [
                        ['0', 'desc']
                    ],
                    columns: [{
                            title: "ลำดับที่",
                            className: "align-middle"
                        },
                        {
                            title: "รูปภาพ",
                            className: "align-middle"
                        },
                        {
                            title: "หัวข้อบทความ",
                            className: "align-middle",
                            width: "30%"
                        },

                        {
                            title: "ชนิดบทความ",
                            className: "align-middle",

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
                                        url: "../services/News/delete.php",

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




        $('#formData').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)


            let name = $("#name").val();
            let image = $("#image").val();
            let date = $("#date").val();
            let datail = $("#detail").summernote();

            if (name == "") {
                $('#message_name').show();
                $('#message_name').html('กรุณากรอกหัวข้อบทความ');
                return false
            }
            if (image == "") {
                $('#message_img').show();
                $('#message_img').html('กรุณาอัพภาพหน้าปก');
                return false
            }
            if (datail == "") {
                $('#message_detail').show();
                $('#message_detail').html('กรุณาใส่ข้อมูลบทความ');
                return false
            } else {
                let btsave = $("#news_save").attr('disabled', true);
                e.preventDefault()
                $.ajax({
                    type: 'POST',
                    url: "../services/News/create.php",
                    data: $('#formData').serialize()

                }).done(function(resp) {
                    Swal.fire({
                        text: 'เพิ่มข้อมูลเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        location.assign('./news.php');
                    });
                })
            }



        });




        $(document).on('click', '.edit_data', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
            let id = $(this).data('id');
            $.ajax({
                url: "../services/News/update.php",
                method: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {

                    $('#eid').val(data[0].id);
                    $('#ename').val(data[0].name);
                    $('#eimage').html(data[0].image);
                    $('#e_imgname').val(data[0].image);
                    $('#eshowimg').html('<img src="../../' + data[0].image +
                        '" class="p-1 w-100" width="100px">');
                    $('#etype').val(data[0].type);
                    $('#edate').val(data[0].date);
                    $('#ecreate').val(data[0].create_at);
                    $('#eurl').val(data[0].url);
                    $('#edetail').summernote('pasteHTML', data[0].detail);
                    $('#enews').modal('show');
                }
            });
        });



        $('#eformData').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
            e.preventDefault();
            let btsave = $("#enews_save").attr('disabled', true);

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "../services/News/update.php",
                data: {
                    id: $('#eid').val(),
                    name: $("#ename").val(),
                    detail: $("#edetail").val(),
                    image: $("#e_imgname").val(),
                    type: $("#etype").val(),
                    url: $("#eurl").val(),
                    date: $('#edate').val(),
                    date_create: $('#ecreate').val()

                },
                success: function(response) {
                    Swal.fire({
                        text: 'อัพเดตข้อมูลเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        location.assign('./news.php');
                    });
                    // console.log("good", response);
                },
                error: function(err) {
                    // console.log("bad", err);
                }
            })

        })



        $(document).on('change', '.toggle-event', function(e) { // เรียกใช้งาน สถานะ datatable
            // console.log('e', 1)
            // console.log('e', e.target.id)

            let id = $(this).data("id");
            let status = '';

            if ($("#" + e.target.id).prop('checked')) {
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
                        url: "../services/News/status.php",
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
    </script>



</body>