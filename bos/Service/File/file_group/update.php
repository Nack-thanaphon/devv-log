<?php
include "../../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_file_group WHERE g_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $id = $_POST['id'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $address = $_POST['address'];


    $query = " UPDATE tbl_file_group SET `g_name` = '" . $name . "', `g_detail` = '" . $detail . "', 
    `g_address` = '" . $address . "'
  

    
    WHERE g_id = '" . $id . "' ";
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