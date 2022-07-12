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
                <?php include "./user/user_profile.php" ?>
                <?php include "../../include/footer.php"; ?>
                <?php include "../../include/script.php"; ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var baseUrl = (window.location).href; // You can also use document.URL
            var salt = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "../../services/User/update.php",
                data: {
                    salt: salt,
                },
                success: function(data) {


                    data = data.result;


                    let Img_profile = data[0].image;
                    if (Img_profile != '') {
                        $('#profile_pic,#profile_top').attr('src', '../../uploads/profile/' + data[0].image + '');

                    } else {
                        $('#profile_pic').attr('src', '../../uploads/profile/no_img.png');

                    }
                    $('#duser_id').val(data[0].salt);
                    $('#dfull_name').html(data[0].name);
                    $('#duser_name').html(data[0].username);
                    $('#duser_date').html(data[0].date);
                    $('#duser_email').html(data[0].email);
                    $('#duser_role_id').html(data[0].position_name);
                    $('#status').html(data[0].status);
                    console.log("good", data)
                },
                error: function(err) {
                    console.log("bad", err)

                }
            })
        })




        $('#edit_userform').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "../../services/User/profile.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
            }).done(function(resp) {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                }).then((result) => {
                    location.reload();
                });
            })
        });

        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#profile_pic');
        const file = document.querySelector('#p_file');
        const uploadBtn = document.querySelector('#uploadBtn');


        file.addEventListener('change', function() {
            //this refers to file
            const choosedFile = this.files[0];

            if (choosedFile) {
                const reader = new FileReader(); //FileReader is a predefined function of JS
                reader.addEventListener('load', function() {
                    data = img.setAttribute('src', reader.result);
                });
                reader.readAsDataURL(choosedFile);
            }
        });
    </script>
</body>