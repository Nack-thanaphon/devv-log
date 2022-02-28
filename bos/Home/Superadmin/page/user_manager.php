<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <div class="content-wrapper pt-3">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header  border-left-warning text-warning ">

                                    <div class="row  mx-auto">
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6 ">
                                            <h4>
                                                <i class="fas fa-user-edit"></i>
                                                ระบบจัดการผู้ใช้งาน
                                            </h4>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                            <button type="button" name="add" id="add_button" data-toggle="modal"
                                                data-target="#crete_user"
                                                class="btn btn-success btn-xs">เพิ่มข้อมูลผู้ใช้งาน
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <table id="user_tbl" class="table table-hover" width="100%">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>






    <!-- edit -->

    <div id="crete_user" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="crete_user">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-plus"></i>เพิ่มข้อมูลผู้ใช้งาน</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="" width="150px" height="auto">
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label for="">ตำแหน่งผู้ใช้งาน</label>
                                    <select name="user_role_id" id="user_role_id" class="form-control">
                                        <?php echo user_role($conn) ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>ชื่อ-นามสกุล ผู้ใช้งาน</label>
                                    <input type="text" name="full_name" id="full_name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>ชื่อผู้ใช้งาน(id)</label>
                                    <input type="text" name="user_name" id="user_name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>อีเมลผู้ใช้งาน</label>
                                    <input type="email" name="user_email" id="user_email" class="form-control"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>รหัสผ่าน</label>
                                    <input type="password" name="user_password" id="user_password" class="form-control"
                                        required />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id" />
                        <button type="submit" name="action" id="action" class="btn btn-info">เพิ่มข้อมูล</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>

        </div>
    </div>











    <div id="edit_user" class="modal fade">
        <div class="modal-dialog">
            <form id="edit_userform">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-plus"></i>แก้ไขข้อมูลผู้ใช้งาน</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="" width="150px" height="auto">
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label for="">ตำแหน่งผู้ใช้งาน</label>
                                    <select name="user_role_id" id="euser_role_id" class="form-control">
                                        <?php echo user_role($conn) ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>ชื่อ-นามสกุล ผู้ใช้งาน</label>
                                    <input type="text" name="full_name" id="efull_name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>ชื่อผู้ใช้งาน(id)</label>
                                    <input type="text" name="user_name" id="euser_name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>อีเมลผู้ใช้งาน</label>
                                    <input type="email" name="user_email" id="euser_email" class="form-control"
                                        required />
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="euser_id" />
                        <button type="submit" class="btn btn-info">อัพเดตข้อมูล</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>

        </div>
    </div>




    <div id="detail_user" class="modal fade">
        <div class="modal-dialog">
            <form id="edit_userform">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-plus"></i>รายละเอียดผู้ใช้งาน</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cHJvZmlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="" width="150px" height="auto">
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label class="text-primary">ตำแหน่งผู้ใช้งาน</label>
                                    <p class="text-dark text-uppercase" id="duser_role_id">

                                    </p>
                                </div>
                                <div class="form-group">
                                    <label class="text-primary">ชื่อ-นามสกุล ผู้ใช้งาน</label>
                                    <p class="text-dark" id="dfull_name"></p>
                                </div>
                                <div class="form-group">
                                    <label class="text-primary">ชื่อผู้ใช้งาน(id)</label>
                                    <p class="text-dark" id="duser_name"></p>
                                </div>
                                <div class="form-group">
                                    <label class="text-primary">อีเมลผู้ใช้งาน</label>
                                    <p class="text-dark" id="duser_email"></p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="euser_id" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>

        </div>
    </div>



    <?php include "./include/footer.php"; ?>
</body>