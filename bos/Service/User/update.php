<?php
include "../../database/connect.php";



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_user INNER JOIN  tbl_user_role ON  tbl_user_role.user_role_id = tbl_user.user_role_id WHERE user_id = '" . $_GET["id"] . "'");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($row);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $position = $_POST['position'];


    $query = " UPDATE tbl_user SET `full_name` = '" . $fullname . "', 
    `user_role_id` = '" . $position . "', 
    `user_name` = '" . $username . "', 
    `user_email` = '" . $email . "'
    WHERE `user_id` = '" . $id . "' ";

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