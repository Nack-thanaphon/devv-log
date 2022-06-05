<?php

require_once  "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT * FROM tbl_events ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $eventArray = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        array_push($eventArray, $row);
    }
    echo $row;
    echo json_encode($eventArray);
}
