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
                                        <input class="form-control" type="text" id="n_date" name="n_date" readonly
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
                        <input type="text" class="form-control" name="n_title" id="n_title"
                            placeholder="กรุณากรอกชื่อจดหมายข่าว" required>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="">รายละเอียดจดหมายข่าว</label>
                            <textarea class="form-group col-md-12" class="textarea" name="n_detail" value="" id="detail"
                                name="n_detail"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="n_user_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                    <input type="hidden" name="id" id="newsletter_id" />
                    <button type="submit" class="btn-submit">เรียบร้อย</button>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    var baseUrl = (window.location).href; // You can also use document.URL
    var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../services/Newsletter/update.php",
        data: {
            id: id,
        },
        success: function(data) {
            $('#newsletter_id').val(data[0].id);
            $('#n_title').val(data[0].n_title);
            $('#detail').summernote('pasteHTML', data[0].n_detail);
            $('#n_date').val(data[0].n_date);

            // console.log("good", data)
        },
        error: function(err) {
            // console.log("bad", err)

        }
    })
})

$('#eNewsletter_ad').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../services/Newsletter/update.php",
        data: {
            id: $('#newsletter_id').val(),
            name: $("#n_title").val(),
            detail: $("#detail").val(),
            date: $("#n_date").val(),
        },
        success: function(response) {
            Swal.fire({
                text: 'อัพเดตข้อมูลเรียบร้อย',
                icon: 'success',
                confirmButtonText: 'ตกลง',
            }).then((result) => {
                location.assign('./newsletter.php');
            });
            // console.log("good", response);

        },
        error: function(err) {
            // console.log("bad", err);
        }
    })

})
</script>