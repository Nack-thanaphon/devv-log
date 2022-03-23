<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];

    $query = "SELECT * FROM tbl_gallery INNER JOIN  tbl_images ON  tbl_images.g_id = tbl_gallery.g_id WHERE tbl_images.g_id = '" . $id . "' ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $response = array();
    $response['result'] = array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);


        $data_items = array(
            "id" => $i_id,
            "name" => $g_name,
            "image" => $i_name,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}