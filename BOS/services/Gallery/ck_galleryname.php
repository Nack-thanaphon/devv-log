<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";




if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $ck_gname = $_GET['gname'];

    $statement = $conn->prepare("SELECT * FROM tbl_gallery");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $g_name = $row['g_name'];

        if ($g_name != $ck_gname) {
            $res = true;
        } else {
            $res = false;
            http_response_code(200);
        }
    }
    echo json_encode($res);
}
