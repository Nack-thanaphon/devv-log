<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

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
    $response = array();
    $response['result'] = array();

    $select_stmt = $conn->prepare("SELECT * FROM tbl_gallery WHERE g_status = '1' ");
    $select_stmt->execute();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $date = DateThai($row['g_date']);


        $data_items = array(
            "id" => $g_id,
            "name" => $g_name,
            "detail" => $g_detail,

            "date" => $date,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}