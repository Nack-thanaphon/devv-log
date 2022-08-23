<div id="mdetail_user" class="modal fade">
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
                        <img src="https://scontent.fbkk12-1.fna.fbcdn.net/v/t39.30808-6/260284501_461086452110209_5998823695527518410_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeF7dkCBqJPE2yfAe3xSRFran4TDBiv2d_ifhMMGK_Z3-FUONH-d6Ve9Ws78y-utCwQT4AzdD8v-LFRrQ84jlqmE&_nc_ohc=Zqp4cxPiAPgAX83j8aq&_nc_zt=23&_nc_ht=scontent.fbkk12-1.fna&oh=00_AT_o6WV8hY26PFXpxCxLpx-hnhn71dpP1hBQHuq3XEZQZg&oe=62383035" alt="..." class="img-circle profile-img">
                        <!-- <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="..." class="img-circle profile-img"> -->
                    </div>
                    <hr>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12  col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">ตำแหน่งผู้ใช้งาน</small>
                                    <p class="text-dark text-uppercase" id="mduser_role_id"></p>

                                </div>

                            </div>
                            <div class="col-12 col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">ชื่อ-นามสกุล</small>
                                    <p class="text-dark" id="mdfull_name"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12  col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">อีเมลผู้ใช้งาน</small>
                                    <p class="text-dark" id="mduser_email"></p>
                                </div>
                            </div>
                            <div class="col-12  col-md-6 p-0 m-0 py-1">
                                <div class="form-group">
                                    <small class="text-primary">ชื่อผู้ใช้งาน</small>
                                    <p class="text-dark" id="mduser_name"></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12  col-md-6 p-0 m-0 py-1">

                                <div class="form-group">
                                    <small class="text-primary">วันเดือนปีเกิด</small>
                                    <p class="text-dark" id="mduser_name">19 jun 1992</p>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">คุณต้องการออกจากระบบใช่ไหม?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">กด "ออกจากระบบ" ด้านล่างเพื่อออกจากระบบ</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <a class="btn btn-primary" href="../../../auth/logout.php">ออกจากระบบ</a>
            </div>
        </div>
    </div>
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; DEV-LOG. | Mahidol University Global Health



            </span>
        </div>
    </div>
</footer>