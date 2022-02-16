<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET');

include "../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE n_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll();

        echo json_encode($row);
        http_response_code(200);
    }
}