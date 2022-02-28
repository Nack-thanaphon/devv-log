<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="container">
        <div class="row ">
            <div class="col-12 mx-auto ">
                <div class="col-12">

                    <div class="card-header  border-left-primary text-primary ">
                        <div class="row mx-auto">
                            <div class="col-6 p-0 ">
                                <h2 class="m-0 p-0 font-weight-bold ">
                                    <i class="fas fa-rss-square m-0 p-0"></i>
                                    จัดการประเภทเอกสาร
                                </h2>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary text-white" data-toggle="modal"
                                    data-target="#adfile_g">เพิ่มประเภทเอกสาร</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                    <div class="card-body">
                        <table id="file_g" class="table table-hover" width="100%">
                        </table>
                    </div>
                </div>

            </div>

        </div>



        <div id="adfile_g" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-md mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-plus"></i>
                                เพิ่มประเภทเอกสาร
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="file_group" method="post">
                            <div class="card-body">
                                <div class="col-12">

                                    <div class="form-group col-md-12">
                                        <label for="n_name">ชื่อประเภทเอกสาร</label>
                                        <input type="text" class="form-control" name="g_name" id="g_name"
                                            placeholder="กรุณากรอกชื่อประเภทเอกสาร" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group">
                                            <label for="g_detail">รายละเอียดประเภทเอกสาร</label>
                                            <textarea class="form-control" id="g_detail" type="text" name="g_detail"
                                                rows="3" placeholder="กรุณากรอกรายละเอียดประเภทเอกสาร"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <label for="url">ออกโดย</label>
                                                <input type="text" class="form-control" name="g_address" id="g_address"
                                                    placeholder="สถาบันสุขภาพอาเซียน">
                                            </div>

                                            <div class="col">
                                                <label for="url">วันเดือนปี</label>
                                                <div class="input-group">
                                                    <div id="datepicker" class="input-group date">
                                                        <input class="form-control" type="text" id="g_date"
                                                            name="g_date" readonly />
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

                                    <div class="form-group col-sm-12 w-100 ">
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








        <div id="eadfile_g" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-md mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-warning  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-edit"></i>
                                แก้ไขประเภทเอกสาร
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="efile_group" method="post">
                            <div class="card-body">
                                <div class="col-12">

                                    <div class="form-group col-md-12">
                                        <label for="n_name">ชื่อประเภทเอกสาร</label>
                                        <input type="text" class="form-control" name="eg_name" id="eg_name"
                                            placeholder="กรุณากรอกชื่อประเภทเอกสาร" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group">
                                            <label for="g_detail">รายละเอียดประเภทเอกสาร</label>
                                            <textarea class="form-control" id="eg_detail" type="text" name="eg_detail"
                                                rows="3" placeholder="กรุณากรอกรายละเอียดประเภทเอกสาร"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <label for="url">ออกโดย</label>
                                                <input type="text" class="form-control" name="eg_address"
                                                    id="eg_address" placeholder="สถาบันสุขภาพอาเซียน">
                                            </div>

                                            <div class="col">
                                                <label for="url">วันเดือนปี</label>
                                                <div class="input-group">
                                                    <div id="datepicker" class="input-group date">
                                                        <input class="form-control" type="text" id="eg_date"
                                                            name="eg_date" readonly />
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

                                    <div class="form-group col-sm-12 w-100 ">
                                        <input type="hidden" name="eg_id" id="eg_id" />
                                        <button type="submit" class="btn btn-primary btn-block mx-auto w-100"
                                            name="submit">อัพเดตข้อมูล</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>








    <?php include "./include/footer.php"; ?>
</body>