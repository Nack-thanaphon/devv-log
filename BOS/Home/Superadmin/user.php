<?php
include "../../database/connect.php";
include "./include/header.php";
include "../../Function/function.php";

// checking user logged or not
if (empty($_SESSION['user'])) {

    header('location: index.php');
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include "./include/navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <?php include "./include/topbar.php"; ?>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <div class="card-header border-0 pt-4 bg-primary text-white">
                                    <div class="row  mx-auto">
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6 ">
                                            <h4>
                                                <i class="fas fa-user-edit"></i>
                                                ระบบจัดการผู้ใช้งาน
                                            </h4>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                            <button type="button" name="add" id="add_button" data-toggle="modal"
                                                data-target="#userModal"
                                                class="btn btn-success btn-xs">เพิ่มข้อมูลผู้ใช้งาน
                                            </button>
                                        </div>
                                    </div>


                                </div>
                                <span id="alert_action" class="py-2"></span>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 table-responsive">
                                            <table id="user_data" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับที่</th>
                                                        <th style="width: 20%;">Email</th>
                                                        <th>ชื่อผู้ใช้งาน</th>
                                                        <th>ตำแหน่ง</th>
                                                        <th>สถานะการใช้งาน</th>
                                                        <th>อัพเดตข้อมูล</th>
                                                        <th>เปิด-ปิด สถานะ</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="userModal" class="modal fade">
                            <div class="modal-dialog">
                                <form method="post" id="user_form">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fa fa-plus"></i>Add User</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="">ตำแหน่งผู้ใช้งาน</label>
                                                <select name="user_role_id" id="user_role_id" class="form-control">
                                                    <?php echo user_role($conn) ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>ชื่อผู้ใช้งาน</label>
                                                <input type="text" name="user_name" id="user_name" class="form-control"
                                                    required />
                                            </div>
                                            <div class="form-group">
                                                <label>อีเมลผู้ใช้งาน</label>
                                                <input type="email" name="user_email" id="user_email"
                                                    class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label>รหัสผ่าน</label>
                                                <input type="password" name="user_password" id="user_password"
                                                    class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="user_id" id="user_id" />
                                            <input type="hidden" name="btn_action" id="btn_action" />
                                            <input type="submit" name="action" id="action" class="btn btn-info"
                                                value="Add" />
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include "./include/footer.php"; ?>


</body>