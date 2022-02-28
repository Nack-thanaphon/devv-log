<?php
include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE n_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $url = $_POST['url'];
    $image = $_POST['image'];
    $slug = $_POST['slug'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];




    $query = " UPDATE tbl_news SET `n_name` = '" . $name . "', `n_type` = '" . $type . "', 
    `url` = '" . $url . "', 
    `slug` = '" . $slug . "', 
    `n_image` = '" . $image . "', 
    `n_detail` = '" . $detail . "'
    `n_date` = '" . $date . "'
  

    
    WHERE n_id = '" . $id . "' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $items_arr = array();
    $items_arr['result'] = array();

    $items = array(
        "msg" => "success",
        "code" => 200
    );
    array_push($items_arr['result'], $items);
    echo json_encode($items_arr);

    http_response_code(200);
} else {
    http_response_code(405);
}