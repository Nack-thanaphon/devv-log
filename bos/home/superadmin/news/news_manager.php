<?php
include "../../../bos/function/function.php"

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header  border-left-primary text-primary ">
                <div class="row  mx-auto">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6 ">
                        <h4>
                            <i class="fas fa-rss-square"></i>
                            ระบบจัดการข่าวสาร
                        </h4>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <button class="btn bg-primary text-white " data-toggle="modal" data-target="#adnews">
                            <i class="fas fa-plus"></i>
                            เพิ่มข่าวสาร
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="logs" class="table table-hover" width="100%">
                </table>
            </div>
        </div>
    </div>



    <div id="adnews" class="modal fade" role="dialog">
        <div class=" modal-dialog  modal-lg">
            <div class="row ">
                <div class="modal-content">
                    <div class="modal-header bg-primary  text-white border-0 pt-4">
                        <h4>
                            <i class="fas fa-plus"></i>
                            เพิ่มข่าว
                        </h4>
                        <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="formData">
                        <div class="card-body">
                            <div class="form row p-0 m-0">
                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>ประเภทข่าว</small>
                                    <select class="custom-select mb-3" name="n_type">
                                        <option disabled>---กรุณาเลือกหัวข้อข่าว---</option>
                                        <?php echo  news_type($conn) ?>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>ประจำเดือน</small>
                                    <div class="input-group">
                                        <div id="datepicker" class="input-group date">
                                            <input class="form-control" type="text" id="n_date" name="n_date" />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <small id="messagePass" class="text-danger"></small>
                                </div>
                                <div class="form-group col-12 col-md-12 m-0 p-1">
                                    <small>หัวข้อข่าว</small>
                                    <input type="text" class="form-control" name="n_name" id="n_name" placeholder="หัวข้อข่าว">
                                    <small id="message_name" class="text-danger"></small>
                                </div>


                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>วัน เดือน ปี</small>

                                    <div id="news_date" class="input-group date">
                                        <input class="form-control" type="text" id="n_create" name="n_create" />
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>ลิงค์</small>

                                    <input type="text" class="form-control" name="url" id="url" placeholder="ลิงค์ข่าวเพิ่มเติม">
                                </div>

                                <div class="form-group col-12 col-md-12 m-0 p-1">
                                    <small>รูปปกข่าว</small>
                                    <div class="custom-file" onchange="preview_image(event)">
                                        <input type="file" class="custom-file-input n_image" name="n_image" id="n_image">
                                        <input id="n_imgname" type="hidden" name="n_imgname">
                                        <label class="custom-file-label" for="n_image">รูปปกข่าว</label>

                                    </div>
                                    <small id="message_img" class="text-danger"></small>


                                </div>

                                <div class="col-12 p-2 m-2 mx-auto">
                                    <h4 class="text-left"></h4>
                                    <img class="p-4 w-100" id="showimg" alt="">
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea id="detail" class="textarea" name="n_detail" placeholder="Place some text here" required>
                                    </textarea>


                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                            <button type="submit" id="news_save" class="btn btn-primary btn-block mx-auto w-75" name="submit">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="enews" class="modal fade" role="dialog">
        <div class=" modal-dialog  modal-lg">
            <div class="row ">
                <div class="modal-content">
                    <div class="modal-header bg-danger  text-white border-0 pt-4">
                        <h4>
                            <i class="fas fa-edit"></i>
                            แก้ไขข่าว
                        </h4>
                        <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="eformData">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>ประเภทข่าว</small>
                                    <select class="custom-select mb-3" name="n_type" id="etype">
                                        <option disabled>---กรุณาเลือกหัวข้อข่าว---</option>
                                        <?php echo  news_type($conn) ?>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>ประจำเดือน</small>
                                    <div class="input-group">
                                        <div id="edatepicker" class="input-group date">
                                            <input class="form-control" type="text" id="en_date" name="en_date" />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-12 m-0 p-1">
                                    <small>หัวข้อข่าว</small>
                                    <input type="text" class="form-control" name="n_name" id="ename" placeholder="ห้วข้อข่าว" required>
                                </div>
                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>วัน เดือน ปี</small>

                                    <div id="enews_date" class="input-group date">
                                        <input class="form-control" type="text" id="en_create" name="en_create" />
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-6 m-0 p-1">
                                    <small>ลิงค์</small>

                                    <input type="text" class="form-control" name="eurl" id="eurl" placeholder="ลิงค์ข่าวเพิ่มเติม">
                                </div>


                                <div class="form-group col-12 col-md-12 m-0 p-1">
                                    <div class="custom-file" onchange="preview_eimage(event)">
                                        <input type="file" class="custom-file-input n_image" name="n_image" id="e_image">
                                        <input id="e_imgname" type="hidden" name="e_imgname">
                                        <label class="custom-file-label" for="n_image">รูปปกข่าว</label>

                                    </div>


                                </div>


                                <div class="col-sm-6">
                                    <small>ภาพก่อนหน้า</small>
                                    <div id="eshowimg" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <small>ภาพตัวอย่าง</small>
                                    <div>
                                        <img id="update_showimg" class="p-1 w-100" alt="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea id="edetail" class="textarea" name="n_detail" placeholder="Place some text here" required>
                                    </textarea>

                                </div>
                            </div>
                            <input id="eid" type="hidden" name="id">
                            <button type="submit" id="enews_save" class="btn btn-primary btn-block mx-auto w-75" name="submit">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>