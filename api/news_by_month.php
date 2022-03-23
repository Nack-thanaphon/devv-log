<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

include "../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT (n_date) FROM tbl_news WHERE n_status = '1'  GROUP BY n_date ");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();

    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $data_items = array(
            "id" => $n_id,
            "name" => $n_name,
            "type" => $n_type,
            "detail" => $n_detail,
            "url" => $url,
            "user_id" => $user_id,
            "image" => $n_image,
            "date" => $n_date,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}