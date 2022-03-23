<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

include "../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_banner WHERE b_status = '1'
    ");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data_items = array(
            "id" => $b_id,
            "link" => $b_link,
            "image" => $b_image,

        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}