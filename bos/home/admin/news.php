<?php
include "../../include/admin_header.php";
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
                <?php include "./news/news_manager.php" ?>
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
                url: "../../services/News/",
                data: {},
            }).done(function(data) {
                let tableData = []
                let n = 1
                data = data.result;
                for (var i = 0; i < data.length; i++) {
                    tableData.push([
                        `${n++}`,
                        `<img src="../../${data[i].image}" class="img-fluid" width="100px">`,
                        `${data[i].name}`,
                        `${data[i].type}`,
                        `<input class="toggle-event"  id="toggle_news${data[i].id}" data-id="${data[i].id}" type="checkbox" name="status" 
                ${data[i].n_status ? 'checked' : ''} data-toggle="toggle" data-on="เปิด" 
                        data-off="ปิด" data-onstyle="success" data-style="ios">`,
                        `<div class="btn-group" role="group">
                        <button " type="button" class="btn btn-warning edit_data" data-toggle="modal" data-id="${data[i].id}"  >
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
                    location.assign('./')
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
                            title: "หัวข้อข่าว",
                            className: "align-middle",
                            width: "30%"
                        },

                        {
                            title: "ชนิดข่าว",
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
                                        url: "../../services/News/delete.php",

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


            let name = $("#n_name").val();
            let image = $("#n_image").val();
            let date = $("#n_date").val();
            let datail = $("#detail").summernote();

            if (name == "") {
                $('#message_name').show();
                $('#message_name').html('กรุณากรอกหัวข้อข่าว');
                return false
            }
            if (image == "") {
                $('#message_img').show();
                $('#message_img').html('กรุณาอัพภาพหน้าปก');
                return false
            }
            if (datail == "") {
                $('#message_detail').show();
                $('#message_detail').html('กรุณาใส่ข้อมูลข่าว');
                return false
            } else {
                let btn_save = $("#news_save").attr('disabled', true);
                e.preventDefault()
                $.ajax({
                    type: 'POST',
                    url: "../../services/News/create.php",
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
                url: "../../services/News/update.php",
                method: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {

                    $('#eid').val(data[0].n_id);
                    $('#ename').val(data[0].n_name);
                    $('#eimage').html(data[0].n_image);
                    $('#e_imgname').val(data[0].n_image);
                    $('#eshowimg').html('<img src="../../' + data[0].n_image +
                        '" class="p-1 w-100" width="100px">');
                    $('#etype').val(data[0].n_type);
                    $('#en_date').val(data[0].n_date);
                    $('#en_create').val(data[0].create_at);
                    $('#eurl').val(data[0].url);
                    $('#edetail').summernote('pasteHTML', data[0].n_detail);
                    $('#enews').modal('show');
                }
            });
        });



        $('#eformData').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
            e.preventDefault();
            let btn_save = $("#enews_save").attr('disabled', true);

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "../../services/News/update.php",
                data: {
                    id: $('#eid').val(),
                    name: $("#ename").val(),
                    detail: $("#edetail").val(),
                    image: $("#e_imgname").val(),
                    type: $("#etype").val(),
                    url: $("#eurl").val(),
                    date: $('#en_date').val(),
                    date_create: $('#en_create').val()

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

        $(function() {
            $("#datepicker,#edatepicker").datepicker({
                todayHighlight: true, // to highlight the today's date
                format: "MM yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });
        $(function() {
            $("#news_date,#enews_date").datepicker({
                todayHighlight: true, // to highlight the today's date
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });


        $(document).ready(function() { // เรียกใช้งาน Summernote

            $('#detail').summernote({
                lang: 'Th-TH', // default: 'en-US'
                height: 200,
                focus: true
            });
            $('#edetail').summernote({
                lang: 'ko-KR', // default: 'en-US'
                height: 200,
                focus: true
            });
        })






        $("#n_image").change((e) => { // เรียกใช้งาน UPLOADFILE (สำคัญ)

            var form_data = new FormData();
            var ins = document.getElementById(e.target.id).files.length;

            form_data.append("files[]", document.getElementById(e.target.id).files[0]);

            $.ajax({
                // url: './api/uploadfile.php', // point to server-side PHP script 
                url: '../../services/News/uploadfile.php', // point to server-side PHP script
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    // console.log('response', response)
                    $("#n_imgname").val(response)
                },
                error: function(err) {
                    // console.log('bad', err)
                }
            });
        })



        $("#e_image").change((e) => { // เรียกใช้งาน UPLOADFILE (สำคัญ)

            var form_data = new FormData();
            var ins = document.getElementById(e.target.id).files.length;

            form_data.append("files[]", document.getElementById(e.target.id).files[0]);

            $.ajax({
                // url: './api/uploadfile.php', // point to server-side PHP script 
                url: '../../services/News/uploadfile.php', // point to server-side PHP script
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    // console.log('response', response)
                    $("#e_imgname").val(response)
                },
                error: function(err) {
                    // console.log('bad', err)
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
                        url: "../../services/News/status.php",
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