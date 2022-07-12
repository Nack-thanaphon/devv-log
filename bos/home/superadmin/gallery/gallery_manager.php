<?php
include "../../function/function.php"

?>

<style>
    .wrapper {

        background: #fff;
        border-radius: 5px;
        padding: 30px;

    }

    .wrapper header {
        color: #6990F2;
        font-size: 27px;
        font-weight: 600;
        text-align: center;
    }

    .wrapper form {
        height: 167px;
        display: flex;
        cursor: pointer;
        margin: 30px 0;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 5px;
        border: 2px dashed #6990F2;
    }

    form :where(i, p) {
        color: #6990F2;
    }

    form i {
        font-size: 50px;
    }

    form p {
        margin-top: 15px;
        font-size: 16px;
    }

    section .row {
        margin-bottom: 10px;
        background: #E9F0FF;
        list-style: none;
        padding: 15px 20px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    section .row i {
        color: #6990F2;
        font-size: 30px;
    }

    section .details span {
        font-size: 14px;
    }

    .progress-area .row .content {
        width: 100%;
        margin-left: 15px;
    }

    .progress-area .details {
        display: flex;
        align-items: center;
        margin-bottom: 7px;
        justify-content: space-between;
    }

    .progress-area .content .progress-bar {
        height: 6px;
        width: 100%;
        margin-bottom: 4px;
        background: #fff;
        border-radius: 30px;
    }

    .content .progress-bar .progress {
        height: 100%;
        width: 0%;
        background: #6990F2;
        border-radius: inherit;
    }

    .uploaded-area {
        max-height: 232px;
        overflow-y: scroll;
    }

    .uploaded-area.onprogress {
        max-height: 150px;
    }

    .uploaded-area::-webkit-scrollbar {
        width: 0px;
    }

    .uploaded-area .row .content {
        display: flex;
        align-items: center;
    }

    .uploaded-area .row .details {
        display: flex;
        margin-left: 15px;
        flex-direction: column;
    }

    .uploaded-area .row .details .size {
        color: #404040;
        font-size: 11px;
    }

    .uploaded-area i.fa-check {
        font-size: 16px;
    }
</style>

<div class="row mx-auto ">
    <div class="col-12 col-sm-9 p-0 m-0">
        <div class="card mb-4">
            <div class="card-header  border-left-primary text-primary ">
                <div class="row mx-auto">
                    <div class="col-6 p-0 ">
                        <h4 class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-rss-square m-0 p-0"></i>
                            ระบบจัดการคลังภาพ
                        </h4>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" name="create_folder" id="create_folder" class="btn btn-success" data-target="#exampleModal" data-toggle="modal">+เพิ่มอัลบั้ม </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="g_table" class="table table-hover" width="100%">
                </table>
            </div>

        </div>
    </div>

    <div class="col-12 col-sm-3 p-0 m-0 ">
        <div class="row mx-auto">
            <div class="col-12  pb-3 m-0">
                <div class="card">
                    <div class="card-header border-left-primary ">
                        <b>
                            <i class="fas fa-rss-square p-0"></i>
                            จำนวนอัลบั้มทั้งหมด
                        </b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                    <?php echo  count_total_gallery($conn) ?>
                                </h1>
                            </div>
                            <div class="col-4">
                                <p class="p-0 m-0 text-right">/ อัลบั้ม</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  pb-3 m-0">
                <div class="card">
                    <div class="card-header border-left-primary   ">
                        <b>
                            <i class="fas fa-camera p-0"></i>
                            จำนวนภาพทั้งหมด
                        </b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                    <?php echo  count_total_images($conn) ?>
                                </h1>
                            </div>
                            <div class="col-4">
                                <p class="p-0 m-0 text-right">/ ภาพ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  pb-3 m-0">
                <div class="card">
                    <div class="card-header border-left-primary   ">
                        <b>
                            <i class="fas fa-trash p-0"></i>
                            ถังขยะ
                        </b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                    <?php echo  count_prepare_delete($conn) ?>
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


    <div id="exampleModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  border-left-primary text-primary ">

                    <h4 class="m-0 p-0 font-weight-bold ">
                        <i class="fas fa-rss-square m-0 p-0"></i>
                        สร้างอัลบั้มรูปภาพ
                    </h4>
                </div>


                <div id="create_gallery">
                    <div class="modal-body">
                        <div class="form-group col-md-12">
                            <label for="" class="text-primary"> <label for="">ชื่ออัลบั้ม</label>
                            </label>
                            <small><span id="ck_gname"></span></small>
                            <input type="text" name="folder_name" id="folder_name" class="form-control" placeholder="กรุณากรอกชื่ออัลบั้ม" />
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="n_name" id="text_header" class="text-primary">รายละเอียดอัลบั้ม</label>

                                <textarea class="form-control" id="d_gallary" type="text" name="d_gallary" rows="3" placeholder="กรุณากรอกรายละเอียดอัลบั้ม"></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="guser_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="old_name" id="old_name" />
                        <button name="folder_button" id="c_gallery" class="btn btn-primary w-100" value="Create">เรียบร้อย</button>

                    </div>
                </div>

            </div>
        </div>



    </div>




    <div id="gedit_name" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  border-left-primary text-primary ">

                    <h4 class="m-0 p-0 font-weight-bold ">
                        <i class="fas fa-edit m-0 p-0"></i>
                        แก้ไขชื่ออัลบั้ม
                    </h4>
                </div>

                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="" class="text-primary"> <label for="">ชื่ออัลบั้ม</label>
                        </label>
                        <input type="hidden" name="old_name" id="old_name" />
                        <input type="text" name="folder_name" id="efolder_name" class="form-control" placeholder="กรุณากรอกชื่ออัลบั้ม" />
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label>รายละเอียดอัลบั้ม</label>

                            <textarea class="form-control" id="ed_gallary" type="text" name="ed_gallary" rows="3" placeholder="กรุณากรอกรายละเอียดอัลบั้ม"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="eid" id="eid" />
                    <button type="submit" name="eg_update" id="eg_update" class="btn btn-primary w-100" value="Create">อัพเดตเรียบร้อย</button>

                </div>


            </div>
        </div>
    </div>




    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header  border-left-primary text-primary ">

                    <h4 class="m-0 p-0 font-weight-bold ">
                        <i class="fas fa-rss-square m-0 p-0"></i>
                        อัพโหลดภาพ
                    </h4>
                </div>
                <div class="col-12">
                    <div class="wrapper">
                        <header>File Uploader JavaScript</header>
                        <form action="#">
                            <input class="file-input" type="file" id="files" name="files[]" hidden multiple>
                            <input type="hidden" name="folder" id="hidden_folder_name" />
                            <input type="hidden" id="g_id" name="g_id">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Browse File to Upload</p>
                        </form>
                        <section class="progress-area"></section>
                        <section class="uploaded-area"></section>
                        <button id="submit" type="submit" class="btn btn-primary w-100">อัพโหลดรูปภาพ</button>

                    </div>
                    <!-- <div class="col" id="middle_line">
                        <p class="text-primary"><span>กรุณาอัพโหลดภาพ</span></p>

                    </div>
                    <div class="form-group col-md-12">
                        <div class="custom-form-group">
                            <div class="custom-file-drop-area text-center ">
                                <form id="uploads_form" enctype="multipart/for-data">
                                    <label for="files">วางไฟล์ลงตรงนี้</label>
                                    <p>or</p>
                                    <br>
                                    <div class="btn btn-secondary w-100">เลือกไฟล์
                                    </div>

                                    <input type="hidden" name="folder" id="hidden_folder_name" />
                                    <input type="file" id="files" name="files[]" multiple>
                                    <input type="hidden" id="g_id" name="g_id">
                                </form>
                            </div>
                            <small class="text-danger text-center py-3" id="msg">อัพโหลดครั้งล่ะ 10 ภาพ เท่านั้น
                                !</small>
                        </div>
                        <section class="progress-area onprogress"></section>
                        <section class="uploaded-area"></section>
                        <div id="preview" class="row m-0  p-0 ">

                        </div>
                        <button id="submit" type="submit" class="btn btn-primary w-100">อัพโหลดรูปภาพ</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <div id="filelistModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-header  border-left-primary text-primary ">

                    <h4 class="m-0 p-0 font-weight-bold ">
                        <i class="fas fa-rss-square m-0 p-0"></i>
                        รายการภาพ
                    </h4>
                </div>
                <div class="card-body ">

                    <table class="table">
                        <thead class="table table-dark">
                            <tr>
                                <th style="width: 10%;">ลำดับ</th>
                                <th style="width: 40%;">รูปภาพ</th>
                                <th style="width: 40%;">ชื่อ-ไฟล์</th>
                                <th style="width: 10%;">จัดการ</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">

                        </tbody>


                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.querySelector("form"),
        fileInput = document.querySelector(".file-input"),
        progressArea = document.querySelector(".progress-area"),
        uploadedArea = document.querySelector(".uploaded-area");

    form.addEventListener("click", () => {
        fileInput.click();
    });

    fileInput.onchange = ({
        target
    }) => {
        let file = target.files[0];
        if (file) {
            let fileName = file.name;
            if (fileName.length >= 12) {
                let splitName = fileName.split('.');
                fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
            }
            uploadFile(fileName);
        }
    }

    function uploadFile(name) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/upload.php");
        xhr.upload.addEventListener("progress", ({loaded,total}) => {

            let fileLoaded = Math.floor((loaded / total) * 100);
            let fileTotal = Math.floor(total / 1000);
            let fileSize;
            (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) + " MB";
            let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
            uploadedArea.classList.add("onprogress");
            progressArea.append = progressHTML;
            if (loaded == total) {
                progressArea.innerHTML = "";
                let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                           
                            <i class="fas fa-trash m-0 p-0" id="remove"></i>
                          </li>`;
                uploadedArea.classList.remove("onprogress");
                uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
            }
            $("#remove").click(function() {
                $(this).parent(".row").remove();
            });

            var form_data = new FormData(form);


            $('#submit').on('click', 
            
            function() {
                let id = $('#g_id').val();
                let folder = $('#hidden_folder_name').val();
                var totalfiles = document.getElementById('files').files.length;
                form_data.append("id", id)
                form_data.append("folder", folder)

                // Read selected files
                for (var i = 0; i < totalfiles; i++) {
                    form_data.append("files[]", document.getElementById('files').files[i]);
                }

                $.ajax({
                    url: "../../services/Gallery/upload.php",
                    type: 'POST',
                    data: form_data,
                    id,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            text: 'อัพเดตข้อมูลเรียบร้อย',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                        }).then((response) => {
                            location.reload();
                        });
                    }
                });
            });
        });


    }
</script>