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
                            <a href="./news.php" type="button" class="btn btn-danger">กลับไปหน้า</a>
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
                                            <!-- <label class="custom-file-label" for="image">รูปปกบทความ</label> -->
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
    

        $('#formData').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)


            let name = $("#name").val();
            let image = $("#image").val();
            let date = $("#date").val();
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





        $(function() {
            $("#datepicker").datepicker({
                todayHighlight: true, // to highlight the today's date
                format: "MM-yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

        $(function() {
            $("#news_date").datepicker({
                todayHighlight: true, // to highlight the today's date
                format: 'dd-MM-yyyy',
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