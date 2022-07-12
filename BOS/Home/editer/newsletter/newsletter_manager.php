<?php
include "../../../bos/function/function.php"

?>


<div class="row">
    <div class="col-12 mx-auto">
        <div class="card-header  border-left-primary  ">
            <div class="row mx-auto">
                <div class="col-6 p-0 ">
                    <h2 class="m-0 p-0 font-weight-bold text-primary">
                        <i class="fas fa-envelope-open-text m-0 p-0"></i>
                        จัดการจดหมายข่าว
                    </h2>
                    <small>จัดการจดหมายข่าว (Newsletter) : สำนักงานสุขภาพอาเซียน</small>
                </div>
                <div class="col-6 text-right">
                    <a href="./newsletter_create.php" class="btn btn-primary text-white">เพิ่มจดหมายข่าว</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">

        <div class="card-body">
            <table id="newsletter_table" class="table table-hover" width="100%">
            </table>
        </div>
    </div>

</div>