<?php
include "../../../bos/function/function.php"

?>


<div class="row">
    <div class="col-12 mx-auto">
        <div class="col-12">

            <div class="card-header  border-left-primary text-primary ">
                <div class="row mx-auto">
                    <div class="col-6 p-0 ">
                        <h2 class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-rss-square m-0 p-0"></i>
                            เพิ่มชนิดเอกสาร
                        </h2>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-primary text-white" data-toggle="modal"
                            data-target="#adfile_t">เพิ่มชนิดเอกสาร</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">

            <div class="card-body">
                <table id="file_t" class="table table-hover" width="100%">
                </table>
            </div>
        </div>

    </div>

</div>
</div>







<div class="container-fluid">
    <div id="adfile_t" class="modal fade" role="dialog">
        <div class=" modal-dialog  modal-md mx-auto">
            <div class="row">
                <div class="modal-content">
                    <div class="modal-header bg-primary  text-white border-0 pt-4">
                        <h4>
                            <i class="fas fa-plus"></i>
                            เพิ่มชนิดเอกสาร
                        </h4>
                        <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="file_type" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="form">

                                    <div class="form-group col-md-12">
                                        <label for="n_name">ชื่อชนิดเอกสาร</label>
                                        <input type="text" class="form-control" name="t_name" id="t_name"
                                            placeholder="กรุณากรอกชื่อชนิดเอกสาร" required>
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
</div>
<div class="container-fluid">
    <div id="eadfile_t" class="modal fade" role="dialog">
        <div class=" modal-dialog  modal-md mx-auto">
            <div class="row">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white border-0 pt-4">
                        <h4>
                            <i class="fas fa-edit"></i>
                            แก้ไขชนิดเอกสาร
                        </h4>
                        <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="efile_type" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="form">

                                    <div class="form-group col-md-12">
                                        <label for="n_name">ชื่อชนิดเอกสาร</label>
                                        <input type="text" class="form-control" name="et_name" id="et_name"
                                            placeholder="กรุณากรอกชื่อชนิดเอกสาร" required>
                                    </div>

                                </div>

                                <div class="form-group col-sm-12 w-100 ">
                                    <input type="hidden" name="et_id" id="et_id" />

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