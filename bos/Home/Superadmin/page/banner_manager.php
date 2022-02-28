<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-md-9">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header  border-left-primary text-primary ">
                            <div class="row mx-auto">
                                <div class="col-6 p-0 ">
                                    <h4 class="m-0 p-0 font-weight-bold ">
                                        <i class="fas fa-rss-square m-0 p-0"></i>
                                        ระบบจัดการแบนเนอร์
                                    </h4>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary text-white" data-toggle="modal"
                                        data-target="#adbanner_uploads">+ เพิ่มแบนเนอร์</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card-body">
                                <table id="banner_tb" class="table table-hover" width="100%">
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-between">
                <div class="row">
                    <div class="col-12  p-0 m-0">
                        <div class="card">
                            <div class="card-header border-left-primary ">
                                <b>
                                    <i class="fas fa-rss-square p-0"></i>
                                    จำนวนแบนเนอร์ทั้งหมด
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                            <?php echo  count_total_banner($conn) ?>
                                        </h1>
                                    </div>
                                    <div class="col-4">
                                        <p class="p-0 m-0 text-right">/ ไฟล์</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12  p-0 m-0">
                        <div class="card">
                            <div class="card-header border-left-warning text-warning  ">
                                <b>
                                    <i class="fas fa-rss-square p-0"></i>
                                    จำนวนแบนเนอร์ ที่ออนไลน์
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                            <?php echo  total_banner_online($conn) ?>
                                        </h1>
                                    </div>
                                    <div class="col-4">
                                        <p class="p-0 m-0 text-right">/ ไฟล์</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>








    <div class="container-fluid">
        <div id="adbanner_uploads" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-lg mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-plus"></i>
                                เพิ่มแบนเนอร์
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="adbanner" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form">
                                        <label for="b_name" class="py-2">
                                            <h4>รายละเอียดแบนเนอร์</h4>
                                        </label>
                                        <div class="col-md-12">
                                            <img class="w-100 pb-2" height="100%" id="showimg" alt="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="b_name">ชื่อแบนเนอร์</label>
                                            <input type="text" class="form-control" name="b_title" id="b_title"
                                                placeholder="กรุณากรอกชื่อแบนเนอร์" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="n_name">ลิงค์แบนเนอร์(*ถ้ามี)</label>
                                            <input type="text" class="form-control" name="b_link" id="b_link"
                                                placeholder="กรุณากรอกลิงค์แบนเนอร์" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-group">
                                                <label for="n_name">รายละเอียดแบนเนอร์</label>

                                                <textarea class="form-control" id="b_detail" type="text" name="b_detail"
                                                    rows="3" placeholder="กรุณากรอกรายละเอียดแบนเนอร์"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="url">หน่วยงาน / สถาบัน</label>
                                                    <input type="text" class="form-control" name="b_by" id="b_by"
                                                        placeholder="สถาบันสุขภาพอาเซียน">
                                                </div>

                                                <div class="col">
                                                    <label for="url">วันเดือนปี</label>
                                                    <div class="input-group">
                                                        <div id="datepicker" class="input-group date">
                                                            <input class="form-control" type="text" id="b_date"
                                                                name="b_date" readonly />
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12" onchange="preview_image(event)">
                                            <label for="url">เลือกไฟล์เอกสาร (*เฉพาะไฟล์ .PNG,.JPG,)</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label" id="response">
                                                    <label class="custom-file-label" id="file_name">
                                                        (กว้าง 1140 px * สูง 400 px เท่านั้น )
                                                    </label>
                                                </label>
                                                <input id="b_name" type="hidden" name="b_name">
                                                <input id="b_file" type="file" class="custom-file-input" name="b_file">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group col-sm-12 w-100 ">
                                        <input id="b_id" type="hidden" name="b_id">

                                        <button type="submit" class="btn btn-primary btn-block mx-auto w-100"
                                            name="submit">บันทึกข้อมูล</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div id="ebanner_uploads" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-lg mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-edit"></i>
                                แก้ไขแบนเนอร์
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="eadbanner" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form">
                                        <label for="eb_name" class="py-2">
                                            <h4>รายละเอียดแบนเนอร์</h4>
                                        </label>
                                        <div class="col-md-12">
                                            <div id="ebshowimg" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="b_name">ชื่อแบนเนอร์</label>
                                            <input type="text" class="form-control" name="eb_title" id="eb_title"
                                                placeholder="กรุณากรอกชื่อแบนเนอร์" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="n_name">ลิงค์แบนเนอร์(*ถ้ามี)</label>
                                            <input type="text" class="form-control" name="eb_link" id="eb_link"
                                                placeholder="กรุณากรอกลิงค์แบนเนอร์" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-group">
                                                <label for="">รายละเอียดแบนเนอร์</label>
                                                <textarea class="form-control" id="eb_detail" type="text"
                                                    name="eb_detail" rows="3"
                                                    placeholder="กรุณากรอกรายละเอียดแบนเนอร์"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="url">หน่วยงาน / สถาบัน</label>
                                                    <input type="text" class="form-control" name="eb_by" id="eb_by"
                                                        placeholder="สถาบันสุขภาพอาเซียน">
                                                </div>

                                                <div class="col">
                                                    <label for="url">วันเดือนปี</label>
                                                    <div class="input-group">
                                                        <div id="datepicker" class="input-group date">
                                                            <input class="form-control" type="text" id="eb_date"
                                                                name="eb_date" readonly />
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-secondary"
                                                                    type="button"><span class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12" onchange="preview_image(event)">
                                            <!-- <label for="url">เลือกไฟล์เอกสาร (*เฉพาะไฟล์ .PNG,.JPG,)</label>
                                            <div class="custom-file">
                                                <label class="custom-file-label" id="eresponse">
                                                    <label class="custom-file-label" id="efile_name">
                                                        (กว้าง 1140 px * สูง 400 px เท่านั้น )
                                                    </label>
                                                </label>
                                                <input id="eb_name" type="hidden" name="eb_name">
                                                <input id="eb_file" type="file" class="custom-file-input"
                                                    name="eb_file">
                                            </div> -->
                                        </div>

                                    </div>


                                    <div class="form-group col-sm-12 w-100 ">
                                        <input id="eb_id" type="hidden" name="eb_id">

                                        <button type="submit" class="btn btn-primary btn-block mx-auto w-100"
                                            name="submit">บันทึกข้อมูล</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



</body>