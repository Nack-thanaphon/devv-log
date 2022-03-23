<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_newsletter INNER JOIN  tbl_user ON  tbl_user.user_id = tbl_newsletter.n_user_id");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $data_items = array(
            "id" => $id,
            "user" => $full_name,
            "title" => $n_title,
            "date" => $n_date,

        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     if (isset($_POST["id"])) {
//         $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE n_id = '" . $_POST["id"] . "'");
//         $stmt->execute();
//         $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         echo json_encode($row);
//         http_response_code(200);
//     }
// } else 
// if ($_SERVER['REQUEST_METHOD'] == "GET") {
//     if (isset($_GET["id"])) {
//         $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE n_id = '" . $_GET["id"] . "'");
//         $stmt->execute();
//         $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         echo json_encode($row);
//         http_response_code(200);
//     }
// }