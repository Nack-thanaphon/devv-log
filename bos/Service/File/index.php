<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_file 
    INNER JOIN  tbl_file_type ON  
    tbl_file_type.t_id= tbl_file.f_type
    INNER JOIN  tbl_file_group ON  
    tbl_file_group.g_id = tbl_file.f_group
    ");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $status = '';
        if ($row["f_status"] == '1') {
            $status = true;
        } else {
            $status = false;
        }

        $data_items = array(
            "id" => $f_id,
            "name" => $f_name,
            "group" => '<span class="badge badge-info">' . $g_name . '</span>',
            "type" => $t_name,
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