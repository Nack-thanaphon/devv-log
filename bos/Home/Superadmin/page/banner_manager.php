<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <div class="content-wrapper pt-3">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0 pt-4 bg-primary text-white">

                                    <div class="row  mx-auto">
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6 ">
                                            <h4>
                                                <i class="fab fa-font-awesome-flag"></i>
                                                ระบบจัดการป้ายแบนเนอร์
                                            </h4>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                            <button class="btn bg-success text-white " data-toggle="modal"
                                                data-target="#adbanner">
                                                <i class="fas fa-plus"></i>
                                                เพิ่มป้ายแบนเนอร์
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="banner" class="table table-hover" width="100%">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div id="adbanner" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-xl">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-plus"></i>
                                เพิ่มป้ายแบนเนอร์
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="formData" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-6 my-auto border h-100 w-100 ">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img class="p-2 w-100" id="showimg" alt="">
                                                <div class="form-group col-sm-12 w-100">
                                                    <label for="customFile"></label>
                                                    <div class="custom-file" onchange="preview_image(event)">
                                                        <input type="file" class="custom-file-input" name='n_image'
                                                            id="n_image">

                                                        <input id="n_imgname" type="hidden" name="n_imgname">
                                                        <label class="custom-file-label"
                                                            id="file-name">รูปภาพแบนเนอร์</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 my-auto ">
                                        <div class="form-row">
                                            <label for="n_name" class="py-5">
                                                <h4>BANNER | MUGH</h4>
                                            </label>

                                            <div class="form-group col-md-12">
                                                <label for="n_name">ชื่อแบนเนอร์</label>
                                                <input type="text" class="form-control" name="n_name" id="n_name"
                                                    placeholder="Banner title" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="form-group">
                                                    <label for="n_name">รายละเอียดแบนเนอร์</label>

                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        rows="3" placeholder="Banner Detail"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="url">ลิงค์แบนเนอร์</label>
                                                <input type="text" class="form-control" name="url" id="url"
                                                    placeholder="Banner link">
                                            </div>


                                            <div class="form-group col-sm-12 w-100 ">
                                                <button type="submit" class="btn btn-primary btn-block mx-auto w-100"
                                                    name="submit">บันทึกข้อมูล</button>

                                            </div>
                                        </div>
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