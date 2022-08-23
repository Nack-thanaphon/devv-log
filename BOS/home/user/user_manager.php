<?php
include "../../bos/function/function.php"

?>

<style>
    .user input::placeholder {
        font-size: 1rem;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header  border-left-primary text-primary ">

                <div class="row  mx-auto">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6 ">
                        <h4>
                            <i class="fas fa-user-edit"></i>
                            ระบบจัดการผู้ใช้งาน
                        </h4>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#c_user" class="btn btn-primary btn-xs">เพิ่มข้อมูลผู้ใช้งาน
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






<!-- edit -->

<div id="c_user" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header border-left-primary text-primary ">
                <h4><span class="text-primary">เพิ่มข้อมูลผู้ใช้งาน</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row user">
                    <div class="col-12 col-md-12 mx-auto">
                        <div class="input-group my-1 m-0 pb-1">
                            <span class="input-group-text" id="basic-addon1">ตำแหน่งผู้ใช้งาน</span>
                            <select name="user_role_id" id="user_role_id" class="form-control">
                                <?php echo user_role($conn) ?>
                            </select>
                        </div>
                        <div class="form-group m-0 pb-1">
                            <small>ชื่อ-นามสกุล</small>
                            <input type="text" name="full_name" id="full_name" class="form-control " required placeholder="กรอกชื่อ-นามสกุล" />
                        </div>

                        <div class="form-group m-0 pb-1">
                            <small>ชื่อผู้ใช้งาน</small>
                            <input type="text" name="user_name" id="user_name" class="form-control" required placeholder="กรอกชื่อผู้ใช้งาน เช่น Jariya srikad" />
                        </div>
                        <div class="form-group">
                            <small>อีเมลผู้ใช้งาน <span id="ck_email"></span></small>
                            <input type="email" name="user_email" id="user_email" class="form-control" required placeholder="กรอกอีเมลล์ผู้ใช้งาน" />
                        </div>
                        <div class="form-group">
                            <small>รหัสผ่าน ครั้งที่ 1</small>
                            <input type="password" name="user_password" id="user_password" class="form-control " autocomplete="new-password" required placeholder="กรอกรหัสผ่าน" />
                            <small>รหัสผ่าน ครั้งที่ 2
                                <span class="text-danger" id="msg"></span></small>
                            <input type="password" name="user_password" id="reuser_password" class="form-control" required placeholder="กรอกรหัสผ่านอีกครั้ง" />
                        </div>
                    </div>
                </div>
                <div class="">
                    <input type="hidden" name="user_id" id="user_id" />
                    <button id="create_user" class=" btn btn-primary" disabled>เพิ่มข้อมูล</button>
                    <button type="button" class=" btn btn-danger" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>
</div>




<div id="e_user" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header border-left-warning ">
                <h4><span class="text-warning">แก้ไขข้อมูลผู้ใช้งาน</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row user">
                    <div class="col-12 col-md-12 mx-auto">
                        <div class="input-group my-1 m-0 pb-1">
                            <span class="input-group-text" id="basic-addon1">ตำแหน่งผู้ใช้งาน</span>
                            <select name="user_role_id" id="euser_role_id" class="form-control">
                                <?php echo user_role($conn) ?>
                            </select>
                        </div>
                        <div class="form-group m-0 pb-1">
                            <small>ชื่อ-นามสกุล</small>
                            <input type="text" name="full_name" id="efull_name" class="form-control " required placeholder="กรอกชื่อ-นามสกุล" />
                        </div>

                        <div class="form-group m-0 pb-1">
                            <small>ชื่อผู้ใช้งาน</small>
                            <input type="text" name="user_name" id="euser_name" class="form-control" required placeholder="กรอกชื่อผู้ใช้งาน เช่น Jariya srikad" />
                        </div>
                        <div class="form-group">
                            <small>อีเมลผู้ใช้งาน <span id="eck_email"></span></small>
                            <input type="email" name="user_email" id="euser_email" class="form-control" required placeholder="กรอกอีเมลล์ผู้ใช้งาน" />
                        </div>
                    </div>
                </div>
                <div class="">
                    <input type="hidden" name="euser_id" id="euser_id" />
                    <button id="edit_user" class="btn btn-primary w-100 m-2">อัพเดตข้อมูล</button>
                    <button type="button" class=" btn btn-danger w-100 m-2" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>
</div>