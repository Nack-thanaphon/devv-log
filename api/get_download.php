<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");


include "../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT * FROM tbl_file 
    INNER JOIN  tbl_file_type ON  
    tbl_file_type.t_id= tbl_file.t_id
    INNER JOIN  tbl_file_group ON  
    tbl_file_group.g_id = tbl_file.f_group WHERE f_status = '1'");
    $stmt->execute();
    $response = array();
    $response['result'] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data_items = array(
            "id" => $f_id,
            "name" => $f_name,
            "group" => $g_name,
            "type" => $t_name,
            "file" => $f_file,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}