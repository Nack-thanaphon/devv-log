<?php
include "../../bos/function/function.php"

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header  border-left-primary  ">
                <div class="row  mx-auto">
                    <div class="col-lg-12  ">
                        <h4>
                            <i class="fas fa-users-edit text-primary"></i>
                            อัพเดตข้อมูลส่วนตัว
                        </h4>
                        <small>หน่วยงานสุขภาพอาเซียน มหาวิทยาลัยมหิดล</small>

                    </div>

                </div>

            </div>

            <form id="edit_usersform" enctype="multipart/form-data">
                <div class="row py-3 p-0 m-0">
                    <div class="col-12 col-md-4 m-auto">
                        <!-- <div class="container"> -->
                        <p class="text-center">รูปประจำตัว</p>
                        <div class="profile-name">
                            <img src="../../uploads/profile/no_img.png" id="profile_pic" class="img-circle profile-img">

                            <div class="middle">
                                <label for="p_file" class="text" id="uploadBtn">เลือกรูปภาพ</label>
                                <input id="p_name" type="hidden" name="p_name">
                                <input id="p_file" type="file" class="custom-file-input" name="p_file">
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-8 px-3 p-2">
                        <h5 class="text-center text-sm-left ">รายละเอียดข้อมูลส่วนตัว</h5>
                        <hr>
                        <div class="form-group col-md-12 m-1">
                            <div class="row">
                                <div class="col-12  col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ตำแหน่งผู้ใช้งาน :</p>
                                        <p class="text-dark text-uppercase" id="dusers_role_id"></p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ชื่อ-นามสกุล :</p>
                                        <p class="text-dark" id="dfull_name"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12  col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">อีเมลผู้ใช้งาน :</p>
                                        <p class="text-dark" id="dusers_email"></p>
                                    </div>
                                </div>
                                <div class="col-12  col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ชื่อผู้ใช้งาน :</p>
                                        <p class="text-dark" id="dusers_name"></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ลงทะเบียนวันที่ :</p>
                                        <p class="text-dark" id="dusers_date"></p>
                                    </div>
                                </div>
                                <div class=" col-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">สถานะการใช้งาน :</p>
                                        <p id="status"></p>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="col-12 mx-auto py-2">
                                <input id="dusers_id" type="hidden" name="p_salt">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="./" class="btn btn-danger w-100">Back
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100" type="submit" name="submit">อัพเดตข้อมูล</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>