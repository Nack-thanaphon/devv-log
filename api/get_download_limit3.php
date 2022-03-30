<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");


include "../database/connect.php";


function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT * FROM tbl_file 
    INNER JOIN  tbl_file_type ON  
    tbl_file_type.t_id= tbl_file.t_id
    INNER JOIN  tbl_file_group ON  
    tbl_file_group.g_id = tbl_file.f_group WHERE f_status = '1'
    ORDER BY f_id  DESC LIMIT 3 ");
    $stmt->execute();

    $response = array();
    $response['result'] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $c_time = DateThai($row['f_update']);
        $data_items = array(
            "id" => $f_id,
            "name" => $f_name,
            "group" => $g_name,
            "type" => $t_name,
            "file" => $f_file,
            "date" => $c_time,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}