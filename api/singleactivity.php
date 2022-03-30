<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET');

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
    if (isset($_GET["id"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_events 
        INNER JOIN tbl_events_type ON tbl_events.et_id = tbl_events_type.et_id 
        INNER JOIN tbl_user ON tbl_user.user_id = tbl_events.e_user 
        WHERE id = '" . $_GET["id"] . "'");
        $stmt->execute();

        $response = array();
        $response['result'] = array();


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $date = DateThai($row['end']);


            $data_items = array(
                "id" => $id,
                "creater" => $user_name,
                "title" => $title,
                "type" => $et_name,
                "detail" => $e_detail,
                "address" => $e_address,
                "start_date" => $start,
                "end_date" => $date,
                "start_time" => $time_start,
                "end_time" => $time_end,

            );
            array_push($response['result'], $data_items);
        }
        echo json_encode($response);
        http_response_code(200);
    }
} else {
    http_response_code(405);
}