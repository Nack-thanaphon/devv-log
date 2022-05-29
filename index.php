<?php
require_once './database/connect.php';
include './template/include/header.php';
?>

<body>
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

                        <form id="formlogin" method="POST">
                            <div class="form-group">
                                <label for="name" class="text-uppercase">User email</label>
                                <input type="text" name="user_email" id="useremail" class="form-control" placeholder="Enter Your Email ID">
                                <!-- <small id="messageName" class="text-danger">Your name is mandatory.</small> -->
                            </div>
                            <div class="form-group mb-4">
                                <label for="pass" class="text-uppercase">Password</label>
                                <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter Your Password">
                                <!-- <small id="messagePass" class="text-danger">Password is mandatory.</small> -->
                            </div>

                            <button id="login" type="submit" class="btn btn-block login-btn" name="submit" disabled>Login</button>
                        </form>
                        <a href="./forget-password/forget_password.php" class="forgot-password-link">Forgot
                            password?</a>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>


    </div>


    <?php include './template/include/script.php'; ?>

</body>

<script>
    $('#password').change(function() {
        let pass = $("#password").val()

        if (pass == '') {
            $("#login").attr('disabled', true)
        } else {
            $("#login").attr('disabled', false)
        }
    })
</script>