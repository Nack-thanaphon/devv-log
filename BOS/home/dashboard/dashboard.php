<?php
include "../../bos/function/function.php"
?>
<div class="row \m-0 p-0">
    <div class="col-md-3  text-white">
        <div class="panel panel-head text-center shadow-sm">
            <div class="panel-heading "><strong>ผู้ดูแลระบบ</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo count_total_user($conn); ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././user.php" class="small-box-footer py-3  text-white opacity-50"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3   text-white">
        <div class="panel panel-head text-center shadow-sm">
            <div class="panel-heading shadow-sm"><strong>จำนวนบทความ</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo count_total_news($conn); ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././news.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>