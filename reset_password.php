<?php
require_once './database/connect.php';
include './template/include/header.php';
?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 login-section-wrapper">
                <div class="brand-wrapper">

                    <h1>MUGH</h1>
                    <p>Mahidol University Global Health</p>

                </div>
                <div class="login-wrapper my-auto">

                    <h1 class="login-title">Reset Password</h1>
                    <?php include './template/include/message.php'; ?>

                    <form method="post" class="form-horizontal">
                        <div class="form-group mb-4">
                            <label for="pass" class="text-uppercase">กรุณากรอกรหัสผ่าน</label>
                            <input type="password" id="txt_password" class="form-control"
                                placeholder="Enter Your Password">
                            <!-- <small id="messagePass" class="text-danger">Password is mandatory.</small> -->
                        </div>
                        <div class="form-group mb-4">
                            <label for="pass" class="text-uppercase">กรุณากรอกรหัสผ่านอีกครั้ง</label>
                            <input type="password" id="txt_cpassword" class="form-control"
                                placeholder="Enter Your Re-Password">
                            <!-- <small id="messagePass" class="text-danger">Password is mandatory.</small> -->
                        </div>

                        <button id="btn_update" type="submit" class="btn btn-block login-btn" value="Update">Change
                            Password</button>
                        <input type="hidden" value="<?php echo $_GET["token"]; ?>" id="txt_token" />
                    </form>
                    <a href="./" class="forgot-password-link">
                        < ย้อนกลับ</a>
                </div>
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    alt="login image" class="login-img">
            </div>
        </div>
    </div>
</main>


<?php

include './template/include/script.php';

?>