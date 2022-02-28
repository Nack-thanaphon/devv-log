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
                                        ระบบจัดการเอกสาร
                                    </h4>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary text-white" data-toggle="modal"
                                        data-target="#adfile_uploads">เพิ่มเอกสาร</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="card-body">
                                <table id="file_table" class="table table-hover" width="100%">
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="col-12 pb-5 p-0 m-0">
                    <div class="card">
                        <div class="card-header border-left-primary ">
                            <b>
                                <i class="fas fa-rss-square p-0"></i>
                                จำนวนเอกสารทั้งหมด
                            </b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                        <?php echo  count_total_file($conn) ?>
                                    </h1>
                                </div>
                                <div class="col-4">
                                    <p class="p-0 m-0 text-right">/ ไฟล์</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-12 p-0 pb-2">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">จำนวนชนิดเอกสาร</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="myPieChart" width="646" height="208"
                                    style="display: block; width: 646px; height: 208px;"
                                    class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> PDF
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> DOC
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> ETC
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <div class="container-fluid">
        <div id="adfile_uploads" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-md mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-plus"></i>
                                เพิ่มเอกสาร
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="fileupload" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form">
                                        <label for="n_name" class="py-2">
                                            <h4>รายละเอียดเอกสาร</h4>
                                        </label>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlSelect1">ประเภทเอกสาร </label>
                                            <select class="form-control" id="f_group" name="f_group">

                                                <?php echo  file_group($conn) ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="row ">
                                                <div class="col-4">
                                                    <label for="exampleFormControlSelect1">ชนิดเอกสาร</label>

                                                </div>
                                                <div class="col-8 text-right">
                                                    <div class="form-check form-check-inline ">
                                                        <?php echo  file_type($conn) ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label for="n_name">ชื่อเอกสาร</label>
                                            <input type="text" class="form-control" name="f_name" id="f_name"
                                                placeholder="กรุณากรอกชื่อเอกสาร" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-group">
                                                <label for="n_name">รายละเอียดเอกสาร</label>

                                                <textarea class="form-control" id="f_detail" type="text" name="f_detail"
                                                    rows="3" placeholder="กรุณากรอกรายละเอียดเอกสาร"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="url">ออกโดย</label>
                                                    <input type="text" class="form-control" name="f_by" id="f_by"
                                                        placeholder="สถาบันสุขภาพอาเซียน">
                                                </div>

                                                <div class="col">
                                                    <label for="url">วันเดือนปี</label>
                                                    <div class="input-group">
                                                        <div id="datepicker" class="input-group date">
                                                            <input class="form-control" type="text" id="f_date"
                                                                name="f_date" readonly />
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
                                        <div class="form-group col-md-12">
                                            <label for="url">เลือกไฟล์เอกสาร</label>

                                            <div class="custom-file">
                                                <label class="custom-file-label" id="file_name"> *เฉพาะไฟล์
                                                    .pdf,.doc,.ptt (ไม่เกิน 15MB เท่านั้น )
                                                </label>
                                                <input id="f_fname" type="hidden" name="f_fname">
                                                <input id="f_file" type="file" class="custom-file-input" name="f_file">
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
    </div>



    <div class="container-fluid">
        <div id="eadfile_uploads" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-md mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-edit"></i>
                                แก้ไขเอกสาร
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="efileupload" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form">
                                        <label for="n_name" class="py-2">
                                            <h4>รายละเอียดเอกสาร</h4>
                                        </label>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlSelect1">ประเภทเอกสาร </label>
                                            <select class="form-control" id="ef_group" name="ef_group">

                                                <?php echo  file_group($conn) ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="row ">
                                                <div class="col-4">
                                                    <label for="exampleFormControlSelect1">ชนิดเอกสาร</label>

                                                </div>
                                                <div class="col-8 text-right">
                                                    <div class="form-check form-check-inline ">
                                                        <?php echo  file_type($conn) ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label for="n_name">ชื่อเอกสาร</label>
                                            <input type="text" class="form-control" name="ef_name" id="ef_name"
                                                placeholder="กรุณากรอกชื่อเอกสาร" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-group">
                                                <label for="n_name">รายละเอียดเอกสาร</label>

                                                <textarea class="form-control" id="ef_detail" type="text"
                                                    name="ef_detail" rows="3"
                                                    placeholder="กรุณากรอกรายละเอียดเอกสาร"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="url">ออกโดย</label>
                                                    <input type="text" class="form-control" name="ef_by" id="ef_by"
                                                        placeholder="สถาบันสุขภาพอาเซียน">
                                                </div>

                                                <div class="col">
                                                    <label for="url">วันเดือนปี</label>
                                                    <div class="input-group">
                                                        <div id="datepicker" class="input-group date">
                                                            <input class="form-control" type="text" id="ef_date"
                                                                name="ef_date" readonly />
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
                                        <!-- <div class="form-group col-md-12">
                                            <label for="url">เลือกไฟล์เอกสาร</label>

                                            <div class="custom-file">
                                                <label class="custom-file-label" id="efile_name"> *เฉพาะไฟล์
                                                    .pdf,.doc,.ptt (ไม่เกิน 15MB เท่านั้น )
                                                </label>
                                                <input id="ef_fname" type="hidden" name="ef_fname">
                                                <input id="ef_file" type="file" class="custom-file-input"
                                                    name="ef_file">
                                            </div>
                                        </div> -->
                                    </div>


                                    <div class="form-group col-sm-12 w-100 ">
                                        <input id="ef_id" type="hidden" name="ef_id">
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








    <?php include "./include/footer.php"; ?>
</body>