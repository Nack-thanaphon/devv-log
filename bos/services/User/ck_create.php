<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


date_default_timezone_set("Asia/Bangkok");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    // $image = $_POST['image'];


    $salt = generateRandomString(10);
    $newpassword = md5($password . $salt);

    $now = date("Y-m-d H:i:s");
    $token = md5(generateRandomString(10) . $now);

    $statement = $conn->prepare("INSERT INTO tbl_user (full_name,user_name,user_email,user_password,user_role_id,user_status,token,salt) 
    VALUES (:full_name,:user_name,:user_email,:user_password,:user_role_id,:user_status,:token,:salt)");
    $result = $statement->execute(
        array(
            ':full_name' => $fullname,
            ':user_name' => $username,
            ':user_email' =>  $email,
            ':user_password' => $newpassword,
            ':user_role_id' => $position,
            ':user_status' => '1',
            ':token' => $token,
            ':salt' => $salt,
        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);
