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
            <div class="container-fluid ">
                <div id="enews" class="row m-0 p-0" role="dialog">
                    <div class="col-12 m-0 p-0 border">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-plus"></i>
                                เพิ่มบทความ
                            </h4>
                            <a href="./" type="button" class="btn btn-danger">กลับไปหน้า</a>
                        </div>
                        <form id="formData">
                            <div class="card-body">
                                <div class="form row p-0 m-0">
                                    <div class="form-group col-12 col-md-6 m-0 p-1">
                                        <small>ประเภทบทความ</small>
                                        <select class="custom-select mb-3" name="type">
                                            <option disabled>---กรุณาเลือกหัวข้อบทความ---</option>
                                            <?php echo  news_type($conn) ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6 m-0 p-1">
                                        <small>ประจำเดือน</small>
                                        <div class="input-group">
                                            <div id="datepicker" class="input-group date">
                                                <input class="form-control" type="text" id="date" name="date" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <small id="messagePass" class="text-danger"></small>
                                    </div>
                                    <div class="form-group col-12 col-md-12 m-0 p-1">
                                        <small>หัวข้อบทความ</small>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="หัวข้อบทความ">
                                        <small id="message_name" class="text-danger"></small>
                                    </div>


                                    <div class="form-group col-12 col-md-6 m-0 p-1">
                                        <small>วัน เดือน ปี</small>

                                        <div id="news_date" class="input-group date">
                                            <input class="form-control" type="text" id="create" name="create" />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-md-6 m-0 p-1">
                                        <small>ลิงค์</small>

                                        <input type="text" class="form-control" name="url" id="url" placeholder="ลิงค์บทความเพิ่มเติม">
                                    </div>

                                    <div class="form-group col-12 col-md-12 m-0 p-1">
                                        <small>รูปปกบทความ</small>
                                        <div class="custom-file" onchange="preview_image(event)">
                                            <input type="file" class="custom-file-input image" name="image" id="image">
                                            <input id="imgname" type="hidden" name="imgname">
                                            <label class="custom-file-label" for="image">รูปปกบทความ</label>

                                        </div>
                                        <small id="message_img" class="text-danger"></small>


                                    </div>

                                    <div class="col-12 p-2 m-2 mx-auto">
                                        <h4 class="text-left"></h4>
                                        <img class="p-4 w-100" id="showimg" alt="">
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="detail">รายละเอียด</label>
                                        <textarea id="detail" class="textarea" name="detail" placeholder="Place some text here" required>
                                    </textarea>


                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                                <button type="submit" id="news_save" class="btn btn-primary btn-block mx-auto w-75" name="submit">บันทึกข้อมูล</button>
                            </div>
                        </form>

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






        $("#image").change((e) => { // เรียกใช้งาน UPLOADFILE (สำคัญ)

            var form_data = new FormData();
            var ins = document.getElementById(e.target.id).files.length;

            form_data.append("files[]", document.getElementById(e.target.id).files[0]);

            $.ajax({
                // url: './api/uploadfile.php', // point to server-side PHP script 
                url: '../services/News/uploadfile.php', // point to server-side PHP script
                dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    // console.log('response', response)
                    $("#imgname").val(response)
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
                url: '../services/News/uploadfile.php', // point to server-side PHP script
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