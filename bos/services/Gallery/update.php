<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt = $conn->prepare("SELECT * FROM tbl_gallery WHERE g_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $g_name = $_POST['efolder_name'];
    $old_name = $_POST['eold_name'];
    $g_detail = $_POST['ed_gallary'];
    $dir = "../../uploads/gallery/";

    if (!file_exists($g_name)) {
        rename($dir . $old_name, $dir . $g_name);
    }

    $query = " UPDATE tbl_gallery SET `g_name` = '" . $g_name . "', `g_detail` = '" . $g_detail . "'  WHERE g_id = '" . $id . "' ";
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





    // if ($_POST["action"] == "change_file_name") {
    //     $old_name = $_POST["folder_name"] . '/' . $_POST["old_file_name"];
    //     $new_name = $_POST["folder_name"] . '/' . $_POST["new_file_name"];
    //     if (rename($old_name, $new_name)) {
    //         echo 'File name change successfully';
    //     } else {
    //         echo 'There is an error';
    //     }
    // }
// 