<?php

require_once  "../../database/connect.php";


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

    $select_stmt = $conn->prepare("SELECT * FROM tbl_events INNER JOIN  tbl_events_type ON  tbl_events.et_id = tbl_events_type.et_id");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();


    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);



        $start_time = DateThai($row['start']);
        $end_time = DateThai($row['end']);

        $data_items = array(
            "id" => $id,
            "title" => $title,
            "start" => $start_time,
            "end" => $end_time,
            "address" => $e_address,
            "status" => '<span class="badge rounded-pill bg-success text-white">กำลังใช้งาน</span>',
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}