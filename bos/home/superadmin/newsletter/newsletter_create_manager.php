<?php
include "../../../bos/function/function.php"

?>
<div class="row">
    <div class="col-12   p-1 m-0 pb-5">
        <div class="card m-0 p-0">
            <div class="card-header  border-left-primary text-primary ">
                <div class="row mx-auto">
                    <div class="col-6 p-0 ">
                        <h4 class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-envelope-open-text m-0 p-0"></i>
                            เพิ่มจดหมายข่าว
                        </h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="./newsletter.php" class="btn btn-danger text-white">กลับ</a>
                    </div>
                </div>
            </div>
            <form id="Newsletter_ad">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <div class="row">

                            <div class="col">
                                <label for="url">วันเดือนปี</label>
                                <div class="input-group">
                                    <div id="datepicker" class="input-group date">
                                        <input class="form-control" type="text" name="n_date" readonly
                                            placeholder="จดหมายข่าวประจำเดือน :" />
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
                        <label for="b_name">ชื่อจดหมายข่าว</label>
                        <input type="text" id="n_title" class="form-control" name="n_title"
                            placeholder="กรุณากรอกชื่อจดหมายข่าว">
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="">รายละเอียดจดหมายข่าว</label>
                            <small id="msg" class="text-danger"></small>
                            <textarea class="form-group col-md-12" class="textarea" name="n_detail" id="detail"
                                name="n_detail"></textarea>
                        </div>

                    </div>
                    <input type="hidden" name="n_user_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                    <button type="submit" disabled class="btn btn-primary btn-block mx-auto w-100" id="submit"
                        name="submit">บันทึกข้อมูล</button>
            </form>
        </div>
    </div>
</div>