<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_file_group ");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $status = '';
        if ($row["g_status"] == '1') {
            $status = true;
        } else {
            $status = false;
        }

        $data_items = array(
            "id" => $g_id,
            "name" => $g_name,
            "detail" => $g_detail,
            "status" => $status,
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