<?php
header('content-type: application/json');

if (isset($_SESSION['user'])) {
    header("location:index.php");
}
require_once '../database/connect.php';

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $txt_email = $_POST['useremail'];
    $txt_password = $_POST['password'];

    $now = date("Y-m-d H:i:s");
    $gentoken = md5(generateRandomString(10) . $now);

    //Protect SQL INJECTION
    $query = "select * from tbl_user where user_email = ? ";
    $stmt = $conn->prepare($query);
    if ($stmt->execute([
        $txt_email
    ])) {
        $num = $stmt->rowCount();
        if ($num > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $encpassword = md5($txt_password . $salt);
                if ($encpassword == $user_password) {
                    if ($row['user_status'] == '1') {
                        $_SESSION['user'] = array(
                            'user_email' => $row['user_email'],
                            'full_name' => $row['full_name'],
                            'user_name' => $row['user_name'],
                            'user_password' => $row['user_password'],
                            'user_role_id' => $row['user_role_id'],
                        );
                        $role = $_SESSION['user']['user_role_id'];
                        //Redirecting user based on role
                        http_response_code(200);
                        switch ($role) {
                            case '1':
                                echo json_encode("superadmin");
                                break;
                            case '2':
                                echo json_encode("admin");
                                break;
                            case '3':
                                echo json_encode("editer");
                                break;
                        }
                    } else {
                        http_response_code(400);
                        $_SESSION['message'] = "ไอดีของคุณไม่สามารถใช้งานได้กรุณาติดต่อแอดมิน";
                    }
                } else {
                    http_response_code(400);
                    $_SESSION['message'] = "ชื่อและรหัสผ่านผู้ใช้งานไม่ตรงกัน";
                }
            }
        } else {
            http_response_code(405);
            $_SESSION['message'] = "ไม่มีไอดีคุณในระบบ";
        }
    }
} else {
    http_response_code(405);
    $_SESSION['message'] = "เกิดข้อผิดพลาด";
}