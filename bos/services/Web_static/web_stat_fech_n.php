<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if (isset($_GET['action']) == 'by_nation') {

    // $stmt = $conn->prepare("SELECT * FROM tbl_file INNER JOIN  tbl_file_type ON  tbl_file_type.t_id = tbl_file.t_id");
    $stmt = $conn->prepare("SELECT (c_nation),COUNT(c_id) AS Total FROM tbl_webstat  GROUP BY c_nation");
    $stmt->execute();

    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);



        $data[] = array(
            'name' => $row['c_nation'],
            'total' => $row['Total']
        );
    }
    echo json_encode($data);
    http_response_code(200);
} else {
    http_response_code(405);
}