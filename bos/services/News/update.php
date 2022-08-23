<?php
include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE id = '" . $_GET["id"] . "'");
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
    $detail = $_POST['detail'];
    $date = $_POST['date'];
    $date_create = $_POST['date_create'];



    $query = " UPDATE tbl_news SET `name` = '" . $name . "', 
    `type` = '" . $type . "', 
    `url` = '" . $url . "', 
    `image` = '" . $image . "', 
    `detail` = '" . $detail . "',
    `date` = '" . $date . "',
    `create_at` = '" . $date_create . "'

  

    
    WHERE id = '" . $id . "' ";
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
