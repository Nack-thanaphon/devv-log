<?php
include "./include/header.php";
include "../../database/connect.php";

// checking user logged or not
if (empty($_SESSION['user'])) {
    header('location: index.php');
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include "./include/navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <?php include "./include/topbar.php"; ?>
                </ul>
            </nav>
            <div class="container-fluid">
                <?php include "./user/user_profile.php" ?>
                <?php include "./include/footer.php"; ?>
                <?php include "./include/script.php"; ?>
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
                // for (var i = 0; i < data.length; i++)
                console.log(data)
                // 
                $('#duser_id').val(data[0].salt);
                $('#photo').attr('src', '../../uploads/banner/' + data[0].image + '');
                $('#duser_id').val(data[0].id);
                $('#dfull_name').html(data[0].name);
                $('#duser_name').html(data[0].username);
                $('#duser_date').html(data[0].date);
                $('#duser_email').html(data[0].email);
                $('#duser_role_id').html(data[0].position);
                $('#status').html(data[0].status);
                console.log("good", data)
            },
            error: function(err) {
                console.log("bad", err)

            }
        })
    })

    const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');


    file.addEventListener('change', function() {
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {
            const reader = new FileReader(); //FileReader is a predefined function of JS
            reader.addEventListener('load', function() {
                img.setAttribute('src', reader.result);
            });
            reader.readAsDataURL(choosedFile);

        }
    });



    $('#update_profile').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)
        var form_data = new FormData();
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: "../../services/User/profile.php",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
        }).done(function(resp) {


            console.log(form_data)


            // Swal.fire({
            //     text: 'เพิ่มข้อมูลเรียบร้อย',
            //     icon: 'success',
            //     confirmButtonText: 'ตกลง',
            // }).then((result) => {
            //     // location.reload();

            // });
        })

    });
    </script>
</body>