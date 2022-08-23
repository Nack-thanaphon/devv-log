<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $now = date("Y-m-d H:i:s");
    $statement = $conn->prepare("INSERT INTO tbl_news (name,type,detail,image,url,user_id,status,views,date,create_at) 
    VALUES (:name,:type,:detail,:image,:url,:user_id,:status,:views,:date,:create_at)");
    $result = $statement->execute(
        array(
            ':name' => $_POST["name"],
            ':type' => $_POST["type"],
            ':detail' => $_POST["detail"],
            ':url' => $_POST["url"],
            ':user_id' => $_POST["user_id"],
            ':date' => $_POST["date"],
            ':image'  => $_POST['imgname'],
            ':create_at'  => $_POST['create'],
            ':status' => '1',
            ':views' => '0'
        )
    );
    $response = [
        'status' => true,
        'message' => 'CreateSuccess'
    ];
}
http_response_code(201);
echo json_encode($response);
