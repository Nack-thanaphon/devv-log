<?php
include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_newsletter WHERE id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['enf_name'])) {
        //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
        $date1 = date("Ymd_His");
        //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
        $numrand = (mt_rand());
        $doc_file = (isset($_POST['enf_file']) ? $_POST['enf_file'] : '');
        $upload = $_FILES['enf_file']['name'];

        //มีการอัพโหลดไฟล์

        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['enf_file']['name'], ".");
        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
        $path = "../../uploads/newsletter/";
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = 'news_' . $numrand . $date1 . $typefile;
        $path_copy = $path . $newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['enf_file']['tmp_name'], $path_copy);


        $id = $_POST['id'];
        $name = $_POST['en_title'];
        $filename = $newname;
        $detail = $_POST['en_detail'];
        $date = $_POST['en_date'];

        $query = " UPDATE tbl_newsletter 
    SET 
    `n_title` = '" . $name . "', 
    `n_detail` = '" . $detail . "',
    `n_file` = '" . $filename . "',
    `n_date` = '" . $date . "'
  
    WHERE id = '" . $id . "' ";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $items_arr = array();
        $items_arr['result'] = array();

        $items = array(
            "msg" => "success",
            "code" => 200
        );
    }
    array_push($items_arr['result'], $items);
    echo json_encode($items_arr);

    http_response_code(200);
} else {
    http_response_code(405);
}
