<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $now = date("Y-m-d H:i:s");
    $statement = $conn->prepare("INSERT INTO tbl_newsletter(n_title, n_user_id ,n_detail , n_date,n_views ,n_status) 
    VALUES (:n_title, :n_user_id ,:n_detail , :n_date,:n_views ,:n_status)");

    $result = $statement->execute(
        array(
            ':n_title' => $_POST["n_title"],
            ':n_user_id' => $_POST["n_user_id"],
            ':n_detail' => $_POST["n_detail"],
            ':n_date'  => $_POST["n_date"],
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