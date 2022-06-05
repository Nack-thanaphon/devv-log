<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";



if (isset($_POST['nf_name'])) {
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['nf_file']) ? $_POST['nf_file'] : '');
    $upload = $_FILES['nf_file']['name'];

    //มีการอัพโหลดไฟล์
    if ($upload != '') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['nf_file']['name'], ".");
        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
        $path = "../../uploads/newsletter/";
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = 'news_' . $numrand . $date1 . $typefile;
        $path_copy = $path . $newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['nf_file']['tmp_name'], $path_copy);

        //ประกาศตัวแปรรับค่าจากฟอร์ม
        $title = $_POST["n_title"];
        $user = $_POST["n_user_id"];
        $detail = $_POST["n_detail"];
        $filename = $_POST["nf_name"];
        $date = $_POST["n_date"];
       
        //sql insert
        $stmt = $conn->prepare("INSERT INTO tbl_newsletter(n_title, n_user_id ,n_detail ,n_file, n_date,n_views ,n_status) 
        VALUES (:n_title, :n_user_id ,:n_detail ,:n_file, :n_date,:n_views ,:n_status)");
        $result = $stmt->execute(
            array(
                ':n_title' =>$title ,
                ':n_user_id' =>  $user,
                ':n_detail' => $detail,
                ':n_file' => $newname,
                ':n_date'  => $date,
                ':n_status' => '1',
                ':n_views' => '0'
            )
        );
        $response = [
            'status' => true,
            'message' => 'Create Success'
        ];
        http_response_code(201);
        echo json_encode($response);
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
