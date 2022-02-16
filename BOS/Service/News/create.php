<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $statement = $conn->prepare("INSERT INTO tbl_news (n_name, n_type,n_detail,n_image, url,slug,n_status) 
    VALUES (:n_name, :n_type, :n_detail,:n_image, :url,:slug,:n_status)");
    $result = $statement->execute(
        array(
            ':n_name' => $_POST["n_name"],
            ':n_type' => $_POST["n_type"],
            ':n_detail' => $_POST["n_detail"],
            ':url' => $_POST["url"],
            ':slug' => $_POST["slug"],
            ':n_image'  => $_POST['n_imgname'],
            ':n_status' => '1'
        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);