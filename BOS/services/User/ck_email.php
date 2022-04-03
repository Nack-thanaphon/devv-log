<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";




if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $ck_email = $_GET['email'];

    $statement = $conn->prepare("SELECT * FROM tbl_user");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $email = $row['user_email'];

        if ($email == $ck_email) {
            $res = true;
        } else {
            $res = false;
            http_response_code(200);
        }
    }
    echo json_encode($res);
}