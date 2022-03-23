<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_user INNER JOIN  tbl_user_role ON  tbl_user_role.user_role_id = tbl_user.user_role_id ORDER BY user_id");
    $select_stmt->execute();
    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $status = '';
        if ($row["user_status"] == '1') {
            $status = '<span class="badge badge-success">กำลังใช้งาน</span>';
        } else {
            $status = '<span class="badge badge-danger">ไม่ได้ใช้งาน</span>';
        }


        $u_status = '';
        if ($row["user_status"] == '1') {
            $u_status = true;
        } else {
            $u_status = false;
        }

        $data_items = array(
            "id" => $user_id,
            "image" => $user_image,
            "name" => $full_name,
            "salt" => $salt,
            "email" => $user_email,
            "position" => $user_role,
            "status" => $status,
            "u_status" => $u_status,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}