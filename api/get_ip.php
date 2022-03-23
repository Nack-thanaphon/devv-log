<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');


include "../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $ip = $_POST['ip'];
    $res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip . '');
    $res = json_decode($res);

    $c_country = $res->country; // United States
    $c_continent = $res->continent; // North America
    $c_latitude = $res->latitude; // 37.751
    $c_longitude = $res->longitude; // -97.822

    $query = $conn->prepare("SELECT `c_ip` FROM  tbl_webstat WHERE `c_ip` = '" . $ip . "' ");
    $query->execute();
    $num_rows = $query->fetchColumn();

    if ($num_rows > 0) {
        $err = [
            'status' => false,
            'message' => 'Ip aready Have'
        ];
        http_response_code(401);
        echo json_encode($err);
    } else {
        $statement = $conn->prepare("INSERT INTO tbl_webstat(c_ip,c_nation) 
        VALUES (:c_ip,:c_nation)");

        $result = $statement->execute(
            array(
                ':c_ip' => $ip,
                ':c_nation' => $c_country,
            )
        );
        $response = [
            'status' => true,
            'message' => 'Create Success'
        ];
        http_response_code(201);
        echo json_encode($response);
    }
}