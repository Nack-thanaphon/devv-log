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
                                แก้ไขบทความ
                            </h4>
                            <a href="./news.php" type="button" class="btn btn-danger">กลับไปหน้า</a>
                        </div>
                        <div id="eformData">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6 m-0 p-1">
                                        <small>ประเภทข่าว</small>
                                        <select class="custom-select mb-3" name="n_type" id="etype">
                                            <option disabled>---กรุณาเลือกหัวข้อข่าว---</option>
                                            <?php echo  news_type($conn) ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6 m-0 p-1">
                                        <small>ประจำเดือน</small>
                                        <div class="input-group">
                                            <div id="edatepicker" class="input-group date">
                                                <input class="form-control" type="text" id="edate" name="edate" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-md-12 m-0 p-1">
                                        <small>หัวข้อข่าว</small>
                                        <input type="text" class="form-control" name="n_name" id="ename" placeholder="ห้วข้อข่าว" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6 m-0 p-1">
                                        <small>วัน เดือน ปี</small>

                                        <div id="enews_date" class="input-group date">
                                            <input class="form-control" type="text" id="ecreate" name="ecreate" />
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

                                        <input type="text" class="form-control" name="eurl" id="eurl" placeholder="ลิงค์ข่าวเพิ่มเติม">
                                    </div>


                                    <div class="form-group col-12 col-md-12 m-0 p-1">
                                        <div class="custom-file" onchange="preview_eimage(event)">
                                            <input type="file" class="custom-file-input n_image" name="n_image" id="e_image">
                                            <input id="e_imgname" type="hidden" name="e_imgname">
                                            <label class="custom-file-label" for="n_image">รูปปกข่าว</label>

                                        </div>


                                    </div>

                                    <div class="col-sm-6">
                                        <small>ภาพก่อนหน้า</small>
                                        <div id="eshowimg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <small>ภาพตัวอย่าง</small>
                                        <div>
                                            <img id="update_showimg" class="p-1 w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="detail">รายละเอียด</label>
                                        <textarea id="edetail"  name="detail" placeholder="Place some text here" required>
                                    </textarea>

                                    </div>
                                </div>
                                <input id="eid" type="hidden" name="id">
                                <button id="enews_save" type="submit" class="btn btn-primary btn-block mx-auto w-75">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../include/script.php"; ?>
    <?php include "../include/footer.php"; ?>


    <script>
        $(document).ready(function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
            var baseUrl = (window.location).href; // You can also use document.URL
            var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

            $.ajax({
                url: "../services/news/update.php",
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
                    $('#eshowimg').html('<img src="../' + data[0].image +
                        '" class="p-1 w-100" width="100px">');
                    $('#etype').val(data[0].type);
                    $('#edate').val(data[0].date);
                    $('#ecreate').html(data[0].create_at);
                    $('#eurl').val(data[0].url);
                    if (data[0].detail != null) {
                        $('#edetail').summernote('code', data[0].detail);
                    }

                }
            });
        });




        $('#enews_save').on('click', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
            e.preventDefault();
            let btnsave = $("#enews_save").attr('disabled', true);

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "../services/news/update.php",
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

                },
                error: function(err) {

                }
            })

        })

        $(function() {
            $("#edatepicker").datepicker({
                todayHighlight: true, // to highlight the today's date
                format: "MM-yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(function() {
            $("#enews_date").datepicker({
                todayHighlight: true, // to highlight the today's date
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });


        $(document).ready(function() { // เรียกใช้งาน Summernote
            $('#edetail').summernote({
                lang: 'Th-TH', // default: 'en-US'
                height: 200,
                focus: true
            });

        })



        $("#e_image").change((e) => { // เรียกใช้งาน UPLOADFILE (สำคัญ)

            var form_data = new FormData();
            var ins = document.getElementById(e.target.id).files.length;

            form_data.append("files[]", document.getElementById(e.target.id).files[0]);

            $.ajax({
                // url: './api/uploadfile.php', // point to server-side PHP script 
                url: '../services/news/uploadfile.php', // point to server-side PHP script
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
                        url: "../services/news/status.php",
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