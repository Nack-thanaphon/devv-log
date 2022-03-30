<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $statement = $conn->prepare("INSERT INTO tbl_events_type (et_name) 
    VALUES (:et_name)");
    $result = $statement->execute(
        array(
            ':et_name' => $_POST["t_name"],

        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);