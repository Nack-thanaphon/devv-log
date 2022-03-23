<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";

function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}


if (isset($_GET['action']) == 'by_week') {

    $stmt = $conn->prepare("SELECT *,COUNT(c_id) AS Total FROM tbl_webstat WHERE c_date between date_sub(now(),INTERVAL 1 WEEK) and now() GROUP BY c_date ");
    $stmt->execute();

    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $create = ($row["c_date"]);
        $c_date = DateThai($create);



        $data[] = array(
            'date' => $c_date,
            'total' => $row['Total']
        );
    }
    echo json_encode($data);
    http_response_code(200);
} else {
    http_response_code(405);
}