<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_news INNER JOIN  tbl_news_type ON  tbl_news_type.n_type_id = tbl_news.n_type");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $status = '';
        if ($row["n_status"] == '1') {
            $status = true;
        } else {
            $status = false;
        }



        $data_items = array(
            "id" => $n_id,
            "name" => $n_name,
            "type" => $n_type,
            "url" => $url,
            "user_id" => $user_id,
            "image" => $n_image,
            "n_status" => $status,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}