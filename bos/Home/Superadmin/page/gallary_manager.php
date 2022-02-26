<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8">
                <div class="card-header bg-success text-white ">
                    <h4>
                        <i class="fas fa-rss-square p-0"></i>
                        ระบบจัดการรูปภาพ
                    </h4>
                </div>
                <div class="card-body">
                    <?php include '../../Service/Gallery/include/gdashboard.php'; ?>































                </div>
            </div>














































            <div class="col-12 col-sm-4">
                <div class="col-12 p-0 pb-2">
                    <div class="card">
                        <div class="card-header bg-success text-white ">
                            <b>
                                <i class="fas fa-rss-square p-0"></i>
                                จำนวนรูปภาพทั้งหมด
                            </b>

                        </div>
                        <div class="card-body p-2">
                            <div class="row">

                                <div class="col-md-12  text-white">
                                    <div class="panel panel-default text-center shadow-sm ">
                                        <div class="panel-heading bg-success"><strong>จำนวนเอกสาร</strong></div>
                                        <div class="panel-body">
                                            <h1>20</h1>
                                        </div>
                                        <div class="panel-footer bg-secondary py-2">
                                            <a href="././download.php" class="small-box-footer py-3  text-white">
                                                คลิกจัดการระบบ <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-header bg-success text-white ">
                            <b>
                                <i class="fas fa-rss-square p-0"></i>
                                รูปภาพที่รอการลบ
                            </b>
                        </div>
                        <div class="card-body p-2">

                        </div>
                        <div class="card">
                            <table class="table text-center">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th scope="col w-10">ลำดับ</th>
                                        <th scope="col">ชื่อไฟล์</th>
                                        <th scope="col w-100">จำนวนการดาวน์โหลด</th>
                                        <th scope="col w-10">เรียกดู</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>150</td>
                                        <td>
                                            <div class="btn btn-warning p-0 px-1">view</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>150</td>
                                        <td>
                                            <div class="btn btn-warning p-0 px-1">view</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>40</td>
                                        <td>
                                            <div class="btn btn-warning p-0 px-1">view</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./include/footer.php"; ?>
</body>