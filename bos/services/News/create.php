<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $now = date("Y-m-d H:i:s");
    $statement = $conn->prepare("INSERT INTO tbl_news (n_name, n_type,n_detail,n_image, url,user_id,n_status,n_views,n_date,create_at) 
    VALUES (:n_name, :n_type, :n_detail,:n_image, :url,:user_id,:n_status,:n_views,:n_date,:create_at)");
    $result = $statement->execute(
        array(
            ':n_name' => $_POST["n_name"],
            ':n_type' => $_POST["n_type"],
            ':n_detail' => $_POST["n_detail"],
            ':url' => $_POST["url"],
            ':user_id' => $_POST["user_id"],
            ':n_date' => $_POST["n_date"],
            ':n_image'  => $_POST['n_imgname'],
            ':create_at'  => $now,
            ':n_status' => '1',
            ':n_views' => '0'
        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);