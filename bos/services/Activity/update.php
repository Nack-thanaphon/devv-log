<?php
include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_events WHERE id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //ประกาศตัวแปรรับค่าจากฟอร์ม

    $id = $_POST['id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $link = $_POST['link'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];

    $query = " UPDATE tbl_events SET 
    `title` = '" . $title . "',
    `e_detail` = '" . $detail . "', 
    `e_link` = '" . $link . "' ,
    `et_id` = '" . $type . "',
    `e_address` = '" . $address . "',
    `start` = '" . $start . "',
    `end` = '" . $end . "',
    `time_start` = '" . $time_start . "',
    `time_end` = '" . $time_end . "'
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