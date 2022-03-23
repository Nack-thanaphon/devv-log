<?php
include "../../../bos/function/function.php"

?>


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
                        <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#c_user"
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






<!-- edit -->

<div id="c_user" class="modal fade">
    <div class="modal-dialog">
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
                            <input type="email" name="user_email" id="user_email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>รหัสผ่าน</label>
                            <input type="password" name="user_password" id="user_password" class="form-control"
                                autocomplete="new-password" required />
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" id="user_id" />
                <button id="create_user" class="btn btn-primary">เพิ่มข้อมูล</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>


    </div>
</div>











<div class="container login-container">

    <!--end main container-->
</div>

<div id="detail_user" class="modal fade">
    <div class="modal-dialog">
        <form id="edit_userform">
            <div class="modal-content card">
                <div class="card-header">
                    <h4></i> โปรไฟล์ส่วนตัว
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </h4>
                    <small>หน่วยงานสุขภาพอาเซียน มหาวิทยาลัยมหิดล</small>
                </div>
                <div class="card-body ">
                    <div class="main-container login-card py-3">
                        <img src="https://scontent.fbkk12-1.fna.fbcdn.net/v/t39.30808-6/260284501_461086452110209_5998823695527518410_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeF7dkCBqJPE2yfAe3xSRFran4TDBiv2d_ifhMMGK_Z3-FUONH-d6Ve9Ws78y-utCwQT4AzdD8v-LFRrQ84jlqmE&_nc_ohc=Zqp4cxPiAPgAX83j8aq&_nc_zt=23&_nc_ht=scontent.fbkk12-1.fna&oh=00_AT_o6WV8hY26PFXpxCxLpx-hnhn71dpP1hBQHuq3XEZQZg&oe=62383035"
                            alt="..." class="img-circle profile-img">
                        <!-- <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="..." class="img-circle profile-img"> -->
                    </div>

                    <hr>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12  col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">ตำแหน่งผู้ใช้งาน</small>
                                    <p class="text-dark text-uppercase" id="duser_role_id"></p>

                                </div>

                            </div>
                            <div class="col-12 col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">ชื่อ-นามสกุล</small>
                                    <p class="text-dark" id="dfull_name"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12  col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">อีเมลผู้ใช้งาน</small>
                                    <p class="text-dark" id="duser_email"></p>
                                </div>
                            </div>
                            <div class="col-12  col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">ชื่อผู้ใช้งาน</small>
                                    <p class="text-dark" id="duser_name"></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12  col-md-6 p-0 m-0 py-1">

                                <div class="form-group">
                                    <small class="text-primary">วันเดือนปีเกิด</small>
                                    <p class="text-dark" id="duser_name">19 jun 1992</p>
                                </div>
                            </div>
                            <div class="col-12  col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">เพศ</small>
                                    <p class="text-dark" id="duser_name">ชาย</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">ลงทะเบียนวันที่ :</small>
                                    <p class="text-dark" id="duser_name">12 jan 1992</p>
                                </div>
                            </div>
                            <div class=" col-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">สถานะการใช้งาน :</small> <br>
                                    <p class="badge badge-pill badge-success">ใช้งานอยู่</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>