<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $statement = $conn->prepare("INSERT INTO tbl_events (title,e_user,et_id,e_detail,e_address,e_link,start,end,time_start,time_end) 
    VALUES (:title,:e_user,:et_id,:e_detail,:e_address,:e_link,:start,:end,:time_start,:time_end)");
    $result = $statement->execute(
        array(

            ':title' => $_POST["title"],
            ':e_user' => $_POST["user_create"],
            ':et_id' => $_POST["type"],
            ':e_detail' => $_POST["detail"],
            ':e_address' => $_POST["address"],
            ':e_link' => $_POST["link"],
            ':start' => $_POST["start"],
            ':end'  => $_POST['end'],
            ':time_start'  => $_POST['t_start'],
            ':time_end' => $_POST['t_end']

        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);