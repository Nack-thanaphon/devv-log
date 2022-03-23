<?php
include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_newsletter WHERE id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $id = $_POST['id'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $date = $_POST['date'];


    $query = " UPDATE tbl_newsletter 
    SET 
    `n_title` = '" . $name . "', 
    `n_detail` = '" . $detail . "',
    `n_date` = '" . $date . "'
  
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