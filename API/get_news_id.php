<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

include "../bos/database/connect.php";



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
        $stmt = $conn->prepare(
            "SELECT * FROM tbl_news 
        INNER JOIN  tbl_news_type ON  tbl_news_type.type_id = tbl_news.type 
        INNER JOIN  tbl_user ON  tbl_user.user_id = tbl_news.user_id 
        WHERE id = '" . $_GET["id"] . "'"
        );
        $stmt->execute();

        $response = array();
        $response['result'] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $c_time = DateThai($row['create_at']);

            $data_items = array(
                "id" => $id,
                "name" => $name,
                "type" => $type,
                "detail" => $detail,
                "url" => $url,
                "user_id" => $user_name,
                "image" => $image,
                "date" => $c_time,
            );
            array_push($response['result'], $data_items);
        }
        echo json_encode($response);
        http_response_code(200);
    }
} else {
    http_response_code(405);
}
