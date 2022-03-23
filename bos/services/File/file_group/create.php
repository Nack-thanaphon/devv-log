<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $statement = $conn->prepare("INSERT INTO tbl_file_group (g_name,g_detail,g_address,g_date,g_status) 
    VALUES (:g_name,:g_detail,:g_address,:g_date,:g_status)");
    $result = $statement->execute(
        array(
            ':g_name' => $_POST["g_name"],
            ':g_detail' => $_POST["detail"],
            ':g_address' => $_POST["g_address"],
            ':g_date' => $_POST["date"],
            ':g_status' => '1'
        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);