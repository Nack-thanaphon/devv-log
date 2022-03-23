<?php
include "../../database/connect.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_file WHERE f_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $id = $_POST['id'];
    $name = $_POST['name'];
    $group = $_POST['group'];

    $detail = $_POST['detail'];
    $by = $_POST['by'];
    $date = $_POST['date'];

    $query = " UPDATE tbl_file SET `f_name` = '" . $name . "', `f_detail` = '" . $detail . "', 
    `f_group` = '" . $group . "' ,`f_by` = '" . $by . "',`f_date` = '" . $date . "'
    WHERE f_id = '" . $id . "' ";
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