<?php
include "../../../bos/function/function.php"
?>


<div class="row">
    <div class="col-md-3  text-white">
        <div class="panel panel-default text-center shadow-sm bg-primary">
            <div class="panel-heading"><strong>จำนวนผู้เข้าชมเว็บไซต์</strong></div>
            <div class="panel-body" align="center">


            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././webstatic.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="col-md-3  text-white">
        <div class="panel panel-default text-center shadow-sm bg-warning">
            <div class="panel-heading "><strong>จำนวนเอกสาร</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo  count_total_file($conn) ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././file.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3  text-white">
        <div class="panel panel-default text-center shadow-sm bg-success">
            <div class="panel-heading "><strong>ผู้ดูแลระบบ</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo count_total_user($conn); ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././user.php" class="small-box-footer py-3  text-white opacity-50"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3   text-white">
        <div class="panel panel-default text-center shadow-sm bg-info">
            <div class="panel-heading"><strong>จำนวนข่าวสาร</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo count_total_news($conn); ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././news.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-12 py-3">

        <h4>จำนวนผู้เข้าชมเว็บไซต์</h4>
    </div>
</div>