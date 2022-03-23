<?php

header('Content-Type: application/json');
include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $query = "DELETE  FROM `tbl_news` WHERE  n_id = '" . $id . "' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $items_arr = array();
    $items_arr['result'] = array();

    $items = array(
        "msg" => "success",
        "code" => 200
    );
    array_push($items_arr['result'], $items);
    echo json_encode($items_arr);

    http_response_code(200);
} else {
    http_response_code(405);
}