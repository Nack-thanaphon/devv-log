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
                        ระบบจัดการดาวน์โหลด
                    </h4>
                </div>
                <div class="card-body">
                    <table id="logs" class="table table-hover" width="100%">
                    </table>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="col-12 p-0 pb-2">
                    <div class="card">
                        <div class="card-header bg-success text-white ">
                            <b>
                                <i class="fas fa-rss-square p-0"></i>
                                จำนวนไฟล์ดาวน์โหลดสูงสุด
                            </b>
                        </div>
                        <div class="card-body p-2">
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
                <div class="col-12 p-0">
                    <div class="card">
                        <div class="card-header bg-success text-white ">
                            <b>
                                <i class="fas fa-rss-square p-0"></i>
                                ไฟล์เอกสารสำคัญ
                            </b>
                        </div>
                        <div class="card-body p-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic magni doloribus ipsa sunt
                            magnam excepturi rem voluptates modi iure quidem?
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