<?php
include "../../../BOS/Function/function.php"

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
                                                <i class="fas fa-rss-square"></i>
                                                ระบบจัดการข่าวสาร
                                            </h4>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                            <button class="btn bg-success text-white " data-toggle="modal"
                                                data-target="#adnews">
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
                    </div>
                </div>
            </div>
        </div>

    </div>






    <!-- edit -->




    <div class="container-fluid">
        <div id="adnews" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-xl">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-plus"></i>
                                เพิ่มข่าว
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="formData" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="n_type">ประเภทข่าว</label>
                                        <select class="custom-select mb-3" name="n_type">
                                            <option disabled>กรุณาเลือกหัวข้อข่าว</option>
                                            <?php echo  news_type($conn) ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="n_name">ห้วข้อข่าว</label>
                                        <input type="text" class="form-control" name="n_name" id="n_name"
                                            placeholder="กรุณากรอกห้วข้อข่าว" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="price">ชนิดข่าว</label>
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            placeholder="Heathy,Knowledge,article" required>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="url">URL</label>
                                        <input type="text" class="form-control" name="url" id="url"
                                            placeholder="Url ข่าวเพิ่มเติม">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="customFile">รูปปกข่าว</label>
                                        <div class="custom-file" onchange="preview_image(event)">
                                            <input type="file" class="custom-file-input" name="n_image" id="n_image">

                                            <input id="n_imgname" type="hidden" name="n_imgname">
                                            <label class="custom-file-label" for="n_image">เลือกรูปภาพ</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="text-left"></h4>
                                            <img class="p-4 w-100" id="showimg" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="detail">รายละเอียด</label>
                                        <textarea id="detail" class="textarea" name="n_detail" value="dfasfasfasfs"
                                            placeholder="Place some text here" required>
                                            </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-block mx-auto w-75"
                                    name="submit">บันทึกข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div id="enews" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-xl">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-warning  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-edit"></i>
                                แก้ไขข่าว
                            </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="eformData" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="n_type">ประเภทข่าว</label>
                                        <select class="custom-select mb-3" name="n_type" id="etype">
                                            <?php echo  news_type($conn) ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="n_name">ห้วข้อข่าว</label>
                                        <input type="text" class="form-control" name="n_name" id="ename"
                                            placeholder="กรุณากรอกห้วข้อข่าว">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="price">ชนิดข่าว</label>
                                        <input type="text" class="form-control" name="slug" id="eslug"
                                            placeholder="Heathy,Knowledge,article">
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="url">URL</label>
                                        <input type="text" class="form-control" name="url" id="eurl"
                                            placeholder="Url ข่าวเพิ่มเติม">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="customFile">รูปปกข่าว</label>
                                        <div class="custom-file" onchange="preview_eimage(event)">
                                            <input type="file" class="custom-file-input" name="e_image" id="e_image">
                                            <input id="e_imgname" type="hidden" name="e_imgname">
                                            <label class="custom-file-label" id="eimage"
                                                for="n_image">เลือกรูปภาพ</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="text-left">ภาพตัวอย่าง</h4>
                                            <img class="p-4 w-100" id="update_showimg" alt="">
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="text-left">ภาพเก่า</h4>
                                            <div id="eshowimg" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="detail">รายละเอียด</label>
                                            <textarea id="edetail" class="textarea" name="n_detail"
                                                placeholder="Place some text here" required>
                                    </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input id="eid" type="hidden" name="id">
                                    <button type="submit" class="btn btn-primary btn-block mx-auto w-75"
                                        name="submit">บันทึกข้อมูล</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./include/footer.php"; ?>
</body>