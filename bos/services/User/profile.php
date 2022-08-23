<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";

if (isset($_POST['p_name'])) {
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['p_file']) ? $_POST['p_file'] : '');
    $upload = $_FILES['p_file']['name'];

    //มีการอัพโหลดไฟล์
    if ($upload != '') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['p_file']['name'], ".");

        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        if ($typefile != '') {
            //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
            $path = "../../uploads/profile/";
            //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
            $newname = 'profile_' . $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            //คัดลอกไฟล์ไปยังโฟลเดอร์
            move_uploaded_file($_FILES['p_file']['tmp_name'], $path_copy);

            //ประกาศตัวแปรรับค่าจากฟอร์ม
            $salt = $_POST['p_salt'];

            $query = " UPDATE tbl_user SET `user_image` = '" . $newname . "' WHERE `salt` = '" . $salt . "' ";

            $stmt = $conn->prepare($query);
            $stmt->execute();

            $items_arr = array();
            $items_arr['result'] = array();

            $items = array(
                "msg" => "success",
                "code" => 200
            );
            array_push($items_arr['result'], $items);
            echo json_encode($items_arr);

            http_response_code(200);
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
