<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

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
    $id = $_GET['id'];

    $query = "SELECT * FROM tbl_gallery INNER JOIN  tbl_images ON  tbl_images.g_id = tbl_gallery.g_id WHERE tbl_images.g_id = '" . $id . "' ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $response = array();
    $response['result'] = array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $date = DateThai($row['g_date']);

        $data_items = array(
            "id" => $i_id,
            "name" => $g_name,
            "image" => $i_name,
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