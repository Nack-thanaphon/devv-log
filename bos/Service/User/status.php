<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $status = $_POST['status'];

    $query = "UPDATE tbl_user SET user_status = '" . $status . "'  WHERE user_id =  '" . $id . "' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    http_response_code(200);
    echo json_encode('success');
} else {
    http_response_code(405);
}