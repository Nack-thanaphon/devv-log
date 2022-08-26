<?php
include "../include/header.php";
include "../database/connect.php";

// checking users logged or not
if (empty($_SESSION['users'])) {
    header('location: index.php');
}
?>

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
                <?php include "./users/users_profile.php" ?>
                <?php include "../include/footer.php"; ?>
                <?php include "../include/script.php"; ?>
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
                url: "../services/users/update.php",
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
                    $('#dusers_id').val(data[0].salt);
                    $('#dfull_name').html(data[0].name);
                    $('#dusers_name').html(data[0].usersname);
                    $('#dusers_date').html(data[0].date);
                    $('#dusers_email').html(data[0].email);
                    $('#dusers_role_id').html(data[0].positioname);
                    $('#status').html(data[0].status);
                    console.log("good", data)
                },
                error: function(err) {
                    console.log("bad", err)

                }
            })
        })




        $('#edit_usersform').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "../services/users/profile.php",
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