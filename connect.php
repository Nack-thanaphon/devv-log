<?php
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set('Asia/Bangkok');

$servername = "localhost";
$username = "devnackc_divisionblog";
$password = "f6e64gq6";
// devnackc_divisionblog
// f6e64gq6

try {

    $conn = new PDO("mysql:host=$servername;dbname=devnackc_divisionblog", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: "
        . $e->getMessage();
}
