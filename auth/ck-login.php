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

    // if (isset($_POST['g-recaptcha-response'])) {
    //     $recaptcha_secret = "6LdkIKweAAAAAD_c9CF-3uhNxBoQ7h9rKuts6Ba8";
    //     $recaptcha_response = trim($_POST['g-recaptcha-response']);
    //     $recaptcha_remote_ip = $_SERVER['REMOTE_ADDR'];

    //     $recaptcha_api = "https://www.google.com/recaptcha/api/siteverify?" .
    //         http_build_query(
    //             array(
    //                 'secret' => $recaptcha_secret,
    //                 'response' => $recaptcha_response,
    //                 'remoteip' => $recaptcha_remote_ip
    //             )
    //         );
    //     $response = json_decode(file_get_contents($recaptcha_api), true);
    // }
    // if (isset($response) && $response['success'] == true) { // ตรวจสอบสำเร็จ 
    //     echo "Successful!"; // ทำคำสั่งเพิ่มข้อมูลหรืออื่นๆ 

    $txt_email = $_POST['useremail'];
    $txt_password = $_POST['password'];

    $now = date("Y-m-d H:i:s");
    $gentoken = md5(generateRandomString(10) . $now);

    //Protect SQL INJECTION
    $stmt = $conn->prepare("SELECT * FROM tbl_user INNER JOIN  tbl_user_role ON  tbl_user_role.user_role_id = tbl_user.user_role_id  where user_email = ? ");
    if ($stmt->execute([$txt_email])) {
        $num = $stmt->rowCount();
        if ($num > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $encpassword = md5($txt_password . $salt);
                if ($encpassword == $user_password) {
                    if ($row['user_status'] == '1') {
                        $_SESSION['user'] = array(
                            'id' => $row['user_id'],
                            'user_email' => $row['user_email'],
                            'full_name' => $row['full_name'],
                            'user_name' => $row['user_name'],
                            'salt' => $row['salt'],
                            'user_password' => $row['user_password'],
                            'user_position' => $row['user_role'],
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
                            case '4':
                                echo json_encode("user");
                                break;
                        }
                    } else {
                        $_SESSION['message'] = "ไอดีของคุณไม่สามารถใช้งานได้กรุณาติดต่อแอดมิน";
                        http_response_code(400);
                    }
                } else {
                    $_SESSION['message'] = "ชื่อและรหัสผ่านผู้ใช้งานไม่ตรงกัน";
                    http_response_code(400);
                }
            }
        } else {
            $_SESSION['message'] = "ไม่มีไอดีคุณในระบบ";
            http_response_code(405);
        }
    } else {
        $_SESSION['message'] = "เกิดข้อผิดพลาด";
        http_response_code(405);
    }
    // } else {
    //     echo "Access denied!";
    // }
}