<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_news INNER JOIN  tbl_news_type ON  tbl_news_type.type_id = tbl_news.type ORDER BY id ASC");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $status = '';
        if ($row["status"] == '1') {
            $status = true;
        } else {
            $status = false;
        }

        $data_items = array(
            "id" => $id,
            "name" => $name,
            "type" => $type,
            "url" => $url,
            "user_id" => $user_id,
            "image" => $image,
            "status" => $status,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}
