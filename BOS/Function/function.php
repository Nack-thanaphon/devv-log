<?php
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

function count_total_user($conn)
{
    $query = "SELECT * FROM tbl_user WHERE user_status='1'";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

function count_total_news($conn)
{
    $query = "SELECT * FROM tbl_news ";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}



function user_role($conn)
{
    $query = "SELECT * FROM tbl_user_role ORDER BY user_role DESC ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '<option value="' . $row["user_role_id"] . '" >' . $row["user_role"] . '</option>';
    }
    return $output;
}



function news_type($conn)
{
    $query = "SELECT * FROM tbl_news_type  ORDER BY n_type DESC ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '<option value="' . $row["n_type_id"] . '" >' . $row["n_type"] . '</option>';
    }
    return $output;
}

function file_group($conn)
{
    $query = "SELECT * FROM tbl_file_group ORDER BY g_id ASC ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row) {
        $output .= '<option value="' . $row["g_id"] . '" required >' . $row["g_name"] . '</option>';
    }
    return $output;
}
function file_type($conn)
{
    $query = "SELECT * FROM tbl_file_type ORDER BY t_id ASC ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $i => $row) {
        $output .= ' <input class="editcheckbox edit-ftype' . ($i + 1) . ' form-check-input"  type="radio" 
        id="t_id' . $i + 1 . '" name="t_id" value="' . $row["t_id"] . '" required  > 
        <label class="form-check-label" for="f_group">' . $row["t_name"] . '</label>';
    }
    return $output;
}
function count_total_file($conn)
{
    $query = "SELECT * FROM tbl_file";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

function count_total_banner($conn)
{
    $query = "SELECT * FROM tbl_banner";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}



function count_total_gallery($conn)
{
    $query = "SELECT * FROM tbl_gallery";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

function count_total_images($conn)
{
    $query = "SELECT * FROM tbl_images";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

function count_prepare_delete($conn)
{
    $query = "SELECT * FROM tbl_gallery WHERE g_status = '0' ";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}



function total_banner_online($conn)
{
    $query = "SELECT * FROM tbl_banner where b_status ='1'";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

function web_count_static($conn)
{
    $query = "SELECT * FROM tbl_webstat";
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}


function event_type($conn)
{
    $query = "SELECT * FROM tbl_events_type ORDER BY et_id ASC ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    $output = '';
    foreach ($result as $row) {
        $output .= '<option value="' . $row["et_id"] . '" required >' . $row["et_name"] . '</option>';
    }
    return $output;
}