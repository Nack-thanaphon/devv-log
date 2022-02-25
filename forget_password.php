<?php
require_once './database/connect.php';
include './template/include/header.php';
?>

<body>
    <div class="container">

        <div class="row">
            <div class="col-12 col-md-8 mx-auto  py-5">
                <div class="card">

                    <div class="card-header bg-primary text-center text-white w-100">
                        <h3>กู้คืนรหัสผ่าน</h3>

                    </div>
                    <div id="msg" class="col-md-12 p-1 py-3 mx-auto">

                        <?php include './template/include/message.php'; ?>
                    </div>
                    <form method="post" class="form-horizontal">
                        <div class="py-3 p-5">

                            <label for="basic-url">อีเมลที่ต้องการแก้ไขรหัสผ่าน</label>

                            <div class="form-group py-5">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text " id="basic-addon3">Your email</span>
                                    </div>
                                    <input type="text" class="form-control" id="txt_email"
                                        aria-describedby="basic-addon3">
                                </div>

                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row px-3">
                                <div class="col-12 col-md-3 col-xs-4 pb-2">
                                    <button type="submit" class="btn btn-warning w-100">ติดต่อแอดมิน</button>
                                </div>
                                <div class="col-12 col-md-9 col-xs-8 ">

                                    <input type="submit" id="btn_send" class="btn btn-success w-100" value="Send Mail">
                                </div>
                            </div>
                    </form>
                </div>


            </div>

        </div>
    </div>




</body>

<script type="text/javascript">
$(document).ready(function() {
    $(document).on("click", "#btn_send", function(e) {

        var email = $("#txt_email").val();
        var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".com");

        if (email == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        } else {
            $.ajax({
                url: "send_email.php",
                method: "post",
                data: {
                    uemail: email
                },
                success: function(response) {
                    $("#msg").html(response);
                }
            });
        }
    });
});
</script>

</html>


<?php

include './template/include/script.php';

?>