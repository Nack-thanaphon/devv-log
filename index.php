<?php
require_once './database/connect.php';
include './template/include/header.php';
?>

<body>
    <?php

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

                        <h1 class="login-title">Log in</h1>
                        <?php include './template/include/message.php'; ?>

                        <form id="formlogin">
                            <div class="form-group">
                                <label for="name" class="text-uppercase">User email</label>
                                <input type="text" name="user_email" id="name" class="form-control"
                                    placeholder="Enter Your Email ID" required>
                                <!-- <small id="messageName" class="text-danger">Your name is mandatory.</small> -->
                            </div>
                            <div class="form-group mb-4">
                                <label for="pass" class="text-uppercase">Password</label>
                                <input type="password" name="user_password" id="pass" class="form-control"
                                    placeholder="Enter Your Password" required>
                                <!-- <small id="messagePass" class="text-danger">Password is mandatory.</small> -->
                            </div>
                            <div class="g-recaptcha py-2 px-auto w-100" data-callback="makeaction"
                                data-sitekey="6LcHsIYeAAAAAJSgjxLsmJnnO75l9omnnlLmtJ7s"></div>
                            <button id="login" class="btn btn-block login-btn">Login</button>
                        </form>
                        <a href="forget-password.php" class="forgot-password-link">Forgot password?</a>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>
    <script>
    // กำหนดปุ่มเป็น disable ไว้ ต้องทำ reCHAPTCHA ก่อนจึงกดได้
    function makeaction() {
        document.getElementById('submit').disabled = false;
    }
    </script>

    </div>

    <?php

    include './template/include/script.php';

    ?>