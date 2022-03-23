<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";

if (isset($_POST['b_name'])) {
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['b_file']) ? $_POST['b_file'] : '');
    $upload = $_FILES['b_file']['name'];

    //มีการอัพโหลดไฟล์
    if ($upload != '') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['b_file']['name'], ".");

        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        if ($typefile != '') {
            //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
            $path = "../../uploads/banner/";
            //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
            $newname = 'banner_' . $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            //คัดลอกไฟล์ไปยังโฟลเดอร์
            move_uploaded_file($_FILES['b_file']['tmp_name'], $path_copy);

            //ประกาศตัวแปรรับค่าจากฟอร์ม
            $name = $_POST['b_title'];
            $detail = $_POST['b_detail'];
            $link = $_POST['b_link'];
            $by = $_POST['b_by'];
            $date = $_POST['b_date'];

            //sql insert
            $stmt = $conn->prepare("INSERT INTO tbl_banner (b_title,b_link,b_detail,b_by,b_image,b_date,b_status)
                 VALUES (:b_title,:b_link,:b_detail,:b_by,:b_image,:b_date,:b_status)");
            $result = $stmt->execute(
                array(

                    ':b_title' =>  $name,
                    ':b_link' => $link,
                    ':b_detail' => $detail,
                    ':b_by' => $by,
                    ':b_image' => $newname,
                    ':b_date' => $date,
                    ':b_status' => '1'
                )
            );
            $response = [
                'status' => true,
                'message' => 'Create Success'
            ];
            http_response_code(201);
            echo json_encode($response);
        } else {
            $response = [
                'status' => false,
                'message' => 'file not type'
            ];
            http_response_code(400);
            echo json_encode($response);
        } //else ของ if result
    } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
        $response = [
            'status' => false,
            'message' => 'Please Upload File'
        ];
        http_response_code(400);
        echo json_encode($response);
    } //else ของเช็คนามสกุลไฟล์

} else {
    $response = [
        'status' => false,
        'message' => 'Fail Systems'
    ];
    http_response_code(400);
    echo json_encode($response);
}