<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";




if ($_POST["action"] == "delete") {
    $files = scandir($_POST["folder_name"]);
    foreach ($files as $file) {
        if ($file === '.' or $file === '..') {
            continue;
        } else {
            unlink($_POST["folder_name"] . '/' . $file);
        }
    }
    if (rmdir($_POST["folder_name"])) {

        $id = $_POST['id'];

        $query = " DELETE `tbl_gallery`,`tbl_images` FROM `tbl_gallery` INNER JOIN `tbl_images`  
        WHERE tbl_gallery.g_id = tbl_images.g_id and tbl_gallery.g_id = '" . $id . "' ";

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
} else if ($_POST["action"] == "remove_file") {

    $test = $_POST['path'];

    if (file_exists($_POST["path"])) {
        unlink($_POST["path"]);

        $id = $_POST['id'];
        $query = "DELETE  FROM `tbl_images` WHERE  i_id = '" . $id . "' ";
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
        echo $test;
        http_response_code(200);
    } else {
        http_response_code(405);
    }
}