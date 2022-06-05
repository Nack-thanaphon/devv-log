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
                <?php include "./newsletter/newsletter_create_manager.php" ?>
                <?php include "../../include/footer.php"; ?>
                <?php include "../../include/script.php"; ?>
            </div>
        </div>
    </div>



    <script>
        $('#n_title').change(function() {
            let d2 = $("#n_title").val();

            if (d2 !== "") {
                $("#submit").attr('disabled', false);
            } else {
                $("#submit").attr('disabled', true);
                $('#msg').show()
                $('#msg').html('กรุณาใส่ข้อมูลก่อนกดเพิ่มข้อมูล')
            }
        })


        $(document).ready(function(e) {
            $("#Newsletter_ad").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "../../services/Newsletter/create.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                }).done(function(resp) {
                    Swal.fire({
                        text: 'เพิ่มข้อมูลเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        location.assign('./newsletter.php');
                    });
                })

            }));
        });


        var dp = $("#datepicker").datepicker({
            format: "MM yyyy",
            startView: "months",
            minViewMode: "months"
        });
    </script>
</body>