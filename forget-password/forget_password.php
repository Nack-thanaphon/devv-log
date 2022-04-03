<?php
require_once '../database/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUGH| Mahidol University Global Health</title>
    <link rel="icon" href="./img/logo/logo.png" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</head>

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

                        <h1 class="login-title">Forget Password</h1>

                        <div id="msg"></div>

                        <div class="form-group mb-4">
                            <label id="m-email" class="text-uppercase">กรุณากรอกอีเมลล์</label>
                            <input type="text" id="txt_email" class="form-control" placeholder="Enter Your Email">
                            <!-- <small id="messagePass" class="text-danger">Password is mandatory.</small> -->
                        </div>
                        <button id="btn_send" type="submit" class="btn btn-block login-btn">Send
                            Email</button>

                        <a href="../" class="forgot-password-link">
                            ย้อนกลับ</a>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>
    </div>
    <script src="../services/forget_password.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


</body>