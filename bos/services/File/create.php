<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";



if (isset($_POST['f_fname'])) {
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['f_file']) ? $_POST['f_file'] : '');
    $upload = $_FILES['f_file']['name'];

    //มีการอัพโหลดไฟล์
    if ($upload != '') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['f_file']['name'], ".");
        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
        $path = "../../uploads/docs/";
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = 'doc_' . $numrand . $date1 . $typefile;
        $path_copy = $path . $newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['f_file']['tmp_name'], $path_copy);

        //ประกาศตัวแปรรับค่าจากฟอร์ม
        $file_group = $_POST['f_group'];
        $file_type = $_POST['t_id'];
        $file_name = $_POST['f_name'];
        $file_detail = $_POST['f_detail'];
        $file_by = $_POST['f_by'];
        $u_id = $_POST['u_id'];
        $file_date = $_POST['f_date'];

        //sql insert
        $stmt = $conn->prepare("INSERT INTO tbl_file (f_name, f_group,t_id,f_detail,f_by,f_file,u_id,f_date,f_status)
                 VALUES (:f_name, :f_group,:t_id,:f_detail,:f_by,:f_file,:u_id,:f_date,:f_status)");
        $result = $stmt->execute(
            array(
                ':f_name' =>  $file_name,
                ':f_group' => $file_group,
                ':t_id' => $file_type,
                ':u_id' => $u_id,
                ':f_detail' => $file_detail,
                ':f_by' => $file_by,
                ':f_file' => $newname,
                ':f_date' =>  $file_date,
                ':f_status' => '1'
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