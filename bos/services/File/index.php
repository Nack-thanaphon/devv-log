<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT * FROM tbl_file 
    INNER JOIN  tbl_file_type ON  
    tbl_file_type.t_id= tbl_file.t_id
    INNER JOIN  tbl_file_group ON  
    tbl_file_group.g_id = tbl_file.f_group");
    $stmt->execute();
    $response = array();
    $response['result'] = array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
            "group" => '<span class="badge rounded-pill bg-info text-white">' . $g_name . '</span>',
            "type" => $t_name,
            "f_status" => $status,
        );

        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}