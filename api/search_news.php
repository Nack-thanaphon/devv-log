<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

include "../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $items_arr['result'] = array();

    $month = $_POST['month'];

    $query = "SELECT * FROM tbl_news WHERE `n_name` LIKE '%$month%' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        array_push($items_arr['result'], $row);
    }
    echo json_encode($items_arr);
    http_response_code(200);
}