<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] = "GET") {
    // $stmt = $conn->prepare("SELECT * FROM tbl_file INNER JOIN  tbl_file_type ON  tbl_file_type.t_id = tbl_file.t_id");

    $stmt = $conn->prepare("SELECT * ,COUNT(f_id) AS Total FROM tbl_file  LEFT OUTER JOIN  tbl_file_type  ON  tbl_file.t_id = tbl_file_type.t_id GROUP BY tbl_file.t_id");
    $stmt->execute();

    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);



        $data[] = array(
            'name' => $row['t_name'],
            'total' => $row['Total']
        );
    }
    echo json_encode($data);
    http_response_code(200);
} else {

    http_response_code(405);
}