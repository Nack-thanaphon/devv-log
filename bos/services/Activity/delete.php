<?php

header('Content-Type: application/json');
include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];

    $query = "DELETE  FROM `tbl_events` WHERE  id = '" . $id . "' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    echo $id;
}