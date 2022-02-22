<?php
require_once './database/connect.php';
include './template/include/header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Create New Password </title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-1.12.4-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://www.onlyxcodes.com/">onlyxcodes</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a
                            href="https://www.onlyxcodes.com/2020/11/reset-password-with-email-in-php.html">Back to
                            Tutorial</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="wrapper">

        <div class="container">

            <div class="col-lg-12">

                <div id="msg">
                    <?php
					if (isset($_SESSION["updateMsg"])) {
					?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php echo $_SESSION["updateMsg"];
									unset($_SESSION["updateMsg"]); ?></strong>
                    </div>
                    <?php
					}
					?>
                </div>
                <center>
                    <h3>Create New Password</h3>
                </center>
                <form method="post" class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" id="txt_password" class="form-control" placeholder="new passowrd" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-6">
                            <input type="password" id="txt_cpassword" class="form-control"
                                placeholder="confirm passowrd" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            <input type="submit" id="btn_update" class="btn btn-primary" value="Update">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-15">
                            You have a account login here? <a href="index.php">
                                <p class="text-info">Login Account</p>
                            </a>
                        </div>
                    </div>

                    <input type="hidden" <?php $_GET["token"]; ?> id="txt_token" />

                </form>

            </div>

        </div>

    </div>

</body>

<script type="text/javascript">
$(document).ready(function() {
    $(document).on("click", "#btn_update", function(e) {

        var password = $("#txt_password").val();
        var cpassword = $("#txt_cpassword").val();
        var token = $("#txt_token").val();

        if (password == "") {
            alert("Please Enter New Password ! ");
        } else if (password.length < 6) {
            alert("Please Enter New Password Must Six Character ! ");
        } else if (cpassword == "") {
            alert("Please Enter Confirm Password !");
        } else if (password != cpassword) {
            alert("Password Not Match ! ");
        } else {
            $.ajax({
                url: "update_password.php",
                method: "post",
                data: {
                    upassword: password,
                    ucpassword: cpassword,
                    utoken: token
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