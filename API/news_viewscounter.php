<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
include "../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST["id"])) {
        $stmt = $conn->prepare("UPDATE tbl_news SET n_views = n_views +1 WHERE n_id = '" . $_POST["id"] . "'");
        $stmt->execute();


        http_response_code(200);
    } else {
        http_response_code(405);
    }
};