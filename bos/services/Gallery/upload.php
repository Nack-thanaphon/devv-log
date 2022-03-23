<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

// Count total files

$countfiles = count($_FILES['files']['name']);

// Upload directory
$gallery = "../../uploads/gallery/";
$upload_location = $gallery . $_POST['folder'];
$id = $_POST['id'];

// To store uploaded files path
$files_arr = array();

// Loop all files
for ($index = 0; $index < $countfiles; $index++) {

    if (isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '') {
        // File name
        $filename = $_FILES['files']['name'][$index];
        // Get extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Valid image extension
        $valid_ext = array("png", "jpeg", "jpg");

        // Check extension
        if (in_array($ext, $valid_ext)) {

            // File path

            $params = array();
            $path = $upload_location . "/" . $filename;
            $news_name = "gallery" . "/" . $_POST['folder'] . "/" . $filename;

            // Upload file
            if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
                $params = array(
                    'image' => $news_name,
                    'g_id' => $id,
                    /** ตัวอย่าง FK สำหรับอ้างถึงว่า รูปภาพที่บันทึกนี้ ถูกใช้กับข้อมูลอะไร */
                    'datetime' => date("Y-m-d h:i:s")
                );
                /** เพิ่มข้อมูลชื่อรูปภาพเข้าสู่ฐานข้อมูล */
                $sql = "INSERT INTO tbl_images (i_name, g_id, i_create) 
                        VALUES (:image, :g_id, :datetime)";
                $stmt = $conn->prepare($sql);
                $stmt->execute($params);
            }
        }
    }
}

echo json_encode($files_arr);
die;