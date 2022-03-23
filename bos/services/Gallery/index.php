<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


function format_folder_size($size)
{
    if ($size >= 1073741824) {
        $size = number_format($size / 1073741824, 2) . ' GB';
    } elseif ($size >= 1048576) {
        $size = number_format($size / 1048576, 2) . ' MB';
    } elseif ($size >= 1024) {
        $size = number_format($size / 1024, 2) . ' KB';
    } elseif ($size > 1) {
        $size = $size . ' bytes';
    } elseif ($size == 1) {
        $size = $size . ' byte';
    } else {
        $size = '0 bytes';
    }
    return $size;
}





function get_folder_size($folder_name)
{
    $total_size = 0;
    $file_data = scandir($folder_name);
    foreach ($file_data as $file) {
        if ($file === '.' or $file === '..') {
            continue;
        } else {

            $path = $folder_name . '/' . $file;
            $total_size = $total_size + filesize($path);
        }
    }
    return format_folder_size($total_size);
}



if (isset($_POST["action"])) {

    if ($_POST["action"] == "fetch") {
        $response = array();
        $response['result'] = array();

        $select_stmt = $conn->prepare("SELECT * FROM tbl_gallery WHERE g_status = '1' ");
        $select_stmt->execute();


        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $gallery = "../../uploads/gallery/";
            $g_name = $row['g_name'];
            $folder = array_filter(glob($gallery . $g_name), 'is_dir');

            if (count($folder) > 0) {
                foreach ($folder as $name) {
                    $total = (count(scandir($name)) - 2);
                    $size = get_folder_size($name);
                }
            }

            $data_items = array(
                "id" => $g_id,
                "name" => $g_name,
                "total" => $total,
                "size" => $size,
            );
            array_push($response['result'], $data_items);
        }
        echo json_encode($response);
        http_response_code(200);
    } else {
        http_response_code(405);
    }
}