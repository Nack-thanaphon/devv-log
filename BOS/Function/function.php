<?php


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

function web_count_static($conn)
{
    $sql = "select visitor_counter from tbl_visitor_counter";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $counter = $arr[0]['visitor_counter'];

    return $counter;
}