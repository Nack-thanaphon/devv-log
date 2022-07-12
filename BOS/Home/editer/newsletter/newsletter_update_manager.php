<?php
include "../../../bos/function/function.php"

?>

<div class="row">
    <div class="col-12   p-1 m-0 pb-5">
        <div class="card m-0 p-0">
            <div class="card-header  border-left-danger text-danger ">
                <div class="row mx-auto">
                    <div class="col-6 p-0 ">
                        <h4 class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-envelope-open-text m-0 p-0"></i>
                            แก้ไขจดหมายข่าว
                        </h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="./newsletter.php" class="btn btn-danger text-white">กลับ</a>
                    </div>
                </div>
            </div>
            <form id="eNewsletter_ad">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <div class="row">

                            <div class="col">
                                <label for="url">วันเดือนปี</label>
                                <div class="input-group">
                                    <div id="datepicker" class="input-group date">
                                        <input class="form-control" type="text" id="en_date" name="en_date" readonly placeholder="จดหมายข่าวประจำเดือน :" />
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"><span class="input-group-addon">
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
                        <label for="en_name">ชื่อจดหมายข่าว</label>
                        <input type="text" class="form-control" name="en_title" id="en_title" placeholder="กรุณากรอกชื่อจดหมายข่าว" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="en_detail">รายละเอียด</label>
                        <textarea type="text" id="en_detail" class="form-control" name="en_detail" placeholder="กรุณากรอกชื่อรายละเอียด"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="enf_name" class="form-label">กรุณาอัพโหลดไฟล์ PDF</label>
                        <br>
                        <input id="enf_name" type="hidden" name="enf_name">
                        <input class="form-control" type="file" name="enf_file" id="enf_file">
                        <small id="name_show"></small>
                    </div>
                    <input type="hidden" name="n_user_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                    <input type="hidden" name="id" id="newsletter_id" />
                    <button type="submit" id="submit_newsletter" class="btn btn-primary w-100">เรียบร้อย</button>
            </form>
        </div>
    </div>
</div>