<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_file_type ");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data_items = array(
            "id" => $t_id,
            "name" => $t_name,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE n_id = '" . $_POST["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else 
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE n_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
}