<?php
include "../../../bos/function/function.php"
?>
<div class="row">
    <div class="col-md-4  text-white">
        <div class="panel panel-head text-center shadow-sm ">
            <div class="panel-heading"><strong>จำนวนผู้เข้าชมเว็บไซต์</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo web_count_static($conn); ?> </h1>

            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="" disabled class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="col-md-4  text-white">
        <div class="panel panel-head text-center shadow-sm ">
            <div class="panel-heading "><strong>จำนวนเอกสาร</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo  count_total_file($conn) ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././file.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-4   text-white">
        <div class="panel panel-head text-center shadow-sm ">
            <div class="panel-heading"><strong>จำนวนข่าวสาร</strong></div>
            <div class="panel-body" align="center">
                <h1><?php echo count_total_news($conn); ?></h1>
            </div>
            <div class="panel-footer bg-secondary py-2">
                <a href="././news.php" class="small-box-footer py-3  text-white"> คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="row m-0 p-0  ">
        <div class="col-12 col-xl-12 py-3 d-none d-lg-block">

            <h4>จำนวนผู้เข้าชมเว็บไซต์</h4>
        </div>
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7 d-none d-lg-block">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">จำนวนผู้เข้าชม(7 วันล่าสุด)</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="web_stat_daily" style="display: block; width: 668px; height: 320px;" width="668" height="320" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 d-none d-lg-block">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">จำนวนผู้เข้าชม(ตามสถานที่)</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

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
                        <canvas id="web_stat_nation" width="301" height="245" style="display: block; width: 301px; height: 245px;" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> อัพเดตล่าสุด :
                            <?php echo DateThai(date("Y/m/d")) ?>
                        </span>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>