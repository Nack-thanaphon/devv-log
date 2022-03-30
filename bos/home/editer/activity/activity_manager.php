<?php
include "../../../bos/function/function.php"

?>

<div class="row">
    <div class="col-12 col-sm-12 pb-2 p-0">
        <div class="card ">
            <div class="card-header border-left-primary  ">
                <h4 class="text-primary">
                    <i class="fas fa-rss-square"></i>
                    ระบบจัดการกิจกรรม
                </h4>
                <small>จัดการกิจกรรมต่างๆภายใน : สำนักงานสุขภาพอาเซียน</small>
            </div>
            <div class="card-body" id="calendar"></div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-md" id="ad_activity" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div id="ad_activity" class="col-12 col-sm-4  "> -->
            <div class="col-12 p-0 m-0 card ">

                <div class=" card-header border-left-primary shadow h-100 py-3">
                    <div class="row">
                        <div class="col-12">
                            <b>
                                <h4 class="p-0 m-0 pl-2 text-left text-primary">
                                    <i class="fas fa-rss-square p-0"></i>
                                    เพิ่มกิจกรรม
                                </h4>
                            </b>
                        </div>

                    </div>
                </div>

                <div class="card-body pt-5 m-0">
                    <div class="col-12 ">
                        <div class="form">
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlSelect1" class="text-primary">ประเภทกิจกรรม</label>
                                <select class="form-control" id="e_type" name="f_group">
                                    <?php echo  event_type($conn) ?>
                                </select>
                            </div>

                        </div>


                        <div class="form-group col-md-12">
                            <label for="n_name" class="text-primary">ชื่อกิจกรรม</label>
                            <input type="text" class="form-control" name="e_name" value="" id="e_name"
                                placeholder="กรุณากรอกชื่อกิจกรรม">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="n_name" class="text-primary">ลิงค์กิจกรรม (*ถ้ามี)</label>
                            <input type="text" class="form-control" id="ee_link" placeholder="กรุณากรอกลิงค์กิจกรรม">
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="n_name" id="text_header" class="text-primary">รายละเอียดกิจกรรม</label>

                                <textarea class="form-control" id="e_detail" type="text" name="e_detail" rows="3"
                                    placeholder="กรุณากรอกรายละเอียดกิจกรรม"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="n_name" class="text-primary">ชื่อสถานที่ (*จำเป็น)</label>
                            <input type="text" class="form-control" name="e_address" id="e_address"
                                placeholder="กรุณากรอกชื่อสถานที่">
                        </div>
                        <div class="col" id="middle_line">
                            <p class="text-primary"><span>วัน-เวลา กิจกรรม</span></p>

                        </div>
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="url">วัน-เริ่มต้น</label>
                                    <div class="input-group">
                                        <div id="datepicker" class="input-group date">
                                            <input class="form-control" type="text" id="start" readonly />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span
                                                        class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">

                                    <label for="url">วัน-สิ้นสุด</label>

                                    <div class="input-group">
                                        <div id="editdatepicker" class="input-group date">
                                            <input class="form-control" type="text" id="end" readonly />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span
                                                        class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="url">เวลา-เริ่มต้น</label>

                                    <div class="input-group">
                                        <div class="input-group date">
                                            <input class="form-control" type="time" id="s_time" name="s_time" />
                                            <div class="input-group-append">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <label for="url">เวลา-สิ้นสุด</label>

                                    <div class="input-group">
                                        <div class="input-group date">
                                            <input class="form-control" type="time" id="e_time" name="e_time" />
                                            <div class="input-group-append">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group col-md-12">
                                <label for="url" class="text-primary">เลือกไฟล์เอกสาร(*ถ้ามี)</label>

                                <div class="custom-file">
                                    <label class="custom-file-label" id="file_name"> *เฉพาะไฟล์
                                        .pdf,.doc,.ptt (ไม่เกิน 15MB เท่านั้น )
                                    </label>
                                    <input id="e_name" type="hidden" name="f_fname">

                                    <input id="e_file" type="file" class="custom-file-input" name="e_file">
                                </div>
                            </div> -->

                        <div class="form-group col-sm-12 w-100 ">
                            <div class="col-8 mx-auto">
                                <input type="hidden" id="user_create" value="<?php echo $_SESSION['user']['id'] ?>" />

                                <button type="submit" class="btn btn-primary btn-block mx-auto w-100" id="event_create"
                                    disabled name="submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-md" id="ead_activity" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div id="ad_activity" class="col-12 col-sm-4  "> -->
            <div class="col-12 p-0 m-0 card ">
                <div class=" card-header border-left-danger shadow h-100 py-3">
                    <div class="row">
                        <div class="col-12">
                            <b>
                                <h4 class="p-0 m-0 pl-2 text-left text-danger">
                                    <i class="fas fa-rss-square p-0"></i>
                                    อัพเดตกิจกรรม
                                </h4>
                            </b>
                        </div>
                    </div>
                </div>

                <div class="card-body py-5 m-0">
                    <div class="col-12 ">

                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1" class="text-primary">ประเภทกิจกรรม</label>
                            <select class="form-control" id="eet_type">
                                <option disabled>---กรุณาเลือกหัวข้อข่าว---</option>
                                <?php echo  event_type($conn) ?>
                            </select>
                        </div>




                        <div class="form-group col-md-12">
                            <label for="n_name" class="text-primary">ชื่อกิจกรรม</label>
                            <input type="text" class="form-control" id="ee_name" placeholder="กรุณากรอกชื่อกิจกรรม">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="n_name" class="text-primary">ลิงค์กิจกรรม (*ถ้ามี)</label>
                            <input type="text" class="form-control" name="e_link" id="e_link"
                                placeholder="กรุณากรอกลิงค์กิจกรรม">
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="n_name" id="text_header" class="text-primary">รายละเอียดกิจกรรม</label>

                                <textarea class="form-control" id="ee_detail" type="text" rows="3"
                                    placeholder="กรุณากรอกรายละเอียดกิจกรรม"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="n_name" class="text-primary">ชื่อสถานที่ (*จำเป็น)</label>
                            <input type="text" class="form-control" id="ee_address" placeholder="กรุณากรอกชื่อสถานที่">
                        </div>
                        <div class="col" id="middle_line">
                            <p class="text-primary"><span>วัน-เวลา กิจกรรม</span></p>

                        </div>
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="url">วัน-เริ่มต้น</label>
                                    <div class="input-group">
                                        <div id="datepicker" class="input-group date">
                                            <input class="form-control" type="text" id="e_start" readonly />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span
                                                        class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">

                                    <label for="url">วัน-สิ้นสุด</label>

                                    <div class="input-group">
                                        <div id="editdatepicker" class="input-group date">
                                            <input class="form-control" type="text" id="e_end" readonly />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span
                                                        class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="url">เวลา-เริ่มต้น</label>
                                    <div class="input-group">
                                        <div class="input-group date">
                                            <input class="form-control" type="time" id="es_time" />
                                            <div class="input-group-append">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <label for="url">เวลา-สิ้นสุด</label>

                                    <div class="input-group">
                                        <div class="input-group date">
                                            <input class="form-control" type="time" id="ee_time" />
                                            <div class="input-group-append">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 w-100 ">
                        <div class="row p-0 m-0">
                            <div class="col-6">
                                <button class="btn btn-primary btn-block mx-auto w-100" id="event_submit"
                                    name="submit">บันทึกข้อมูล</button>
                            </div>
                            <div class="col-6">
                                <input type="hidden" id="e_id">
                                <button class="btn btn-danger btn-block mx-auto w-100"
                                    id="event_delete">ลบข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>