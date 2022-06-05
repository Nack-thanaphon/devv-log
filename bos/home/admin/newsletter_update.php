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
                <?php include "./newsletter/newsletter_update_manager.php" ?>
                <?php include "../../include/footer.php"; ?>
                <?php include "../../include/script.php"; ?>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var baseUrl = (window.location).href; // You can also use document.URL
            var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "../../services/Newsletter/update.php",
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#newsletter_id').val(data[0].id);
                    $('#en_title').val(data[0].n_title);
                    $('#en_detail').val(data[0].n_detail);
                    $('#name_show').append('ไฟล์ปัจจุบัน:  ', data[0].n_file);
                    $('#en_date').val(data[0].n_date);
                    // console.log("good", data)
                },
                error: function(err) {
                    // console.log("bad", err)

                }
            })
        })


        $('#eNewsletter_ad').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
            e.preventDefault();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "../../services/Newsletter/update.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        text: 'อัพเดตข้อมูลเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        location.assign('./newsletter.php');
                    });
                    // console.log("good", response);

                },
                error: function(err) {
                    // console.log("bad", err);
                }
            })

        })
        $(function() {
            $("#datepicker").datepicker({
                todayHighlight: true, // to highlight the today's date
                format: "MM yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });
    </script>
</body>