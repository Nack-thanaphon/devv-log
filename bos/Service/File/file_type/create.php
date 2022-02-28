<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $statement = $conn->prepare("INSERT INTO tbl_file_type (t_name) 
    VALUES (:t_name)");
    $result = $statement->execute(
        array(
            ':t_name' => $_POST["t_name"],

        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);