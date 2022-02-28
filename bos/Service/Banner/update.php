<?php
include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_banner WHERE b_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $id = $_POST['eb_id'];
    $name = $_POST['eb_title'];
    $detail = $_POST['eb_detail'];
    $link = $_POST['eb_link'];
    $by = $_POST['eb_by'];
    $date = $_POST['eb_date'];

    $query = " UPDATE tbl_banner SET `b_title` = '" . $name . "', `b_detail` = '" . $detail . "', 
        `b_link` = '" . $link . "' ,`b_by` = '" . $by . "',`b_date` = '" . $date . "'
        WHERE b_id = '" . $id . "' ";
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