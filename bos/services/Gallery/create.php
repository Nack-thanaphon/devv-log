<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


function format_folder_size($size)
{
    if ($size >= 1073741824) {
        $size = number_format($size / 1073741824, 2) . ' GB';
    } elseif ($size >= 1048576) {
        $size = number_format($size / 1048576, 2) . ' MB';
    } elseif ($size >= 1024) {
        $size = number_format($size / 1024, 2) . ' KB';
    } elseif ($size > 1) {
        $size = $size . ' bytes';
    } elseif ($size == 1) {
        $size = $size . ' byte';
    } else {
        $size = '0 bytes';
    }
    return $size;
}

if ($_POST["action"] == "create") {
    if (!file_exists($_POST["folder_name"])) {
        $path = "../../uploads/gallery/";
        mkdir($path . $_POST["folder_name"], 0777, true); {
            $statement = $conn->prepare("INSERT INTO tbl_gallery (g_name,g_detail,g_user) VALUES (:g_name,:g_detail,:g_user)");
            $result = $statement->execute(
                array(
                    ':g_name' => $_POST["folder_name"],
                    ':g_detail' => $_POST["gd_name"],
                    ':g_user' => $_POST["user"],
                )
            );
            $response = [
                'status' => true,
                'message' => 'Create Success'
            ];
        }
        http_response_code(201);
        echo json_encode($response);
    } else {
        echo 'ชื่อ folder ซ้ำ';
    }
}
