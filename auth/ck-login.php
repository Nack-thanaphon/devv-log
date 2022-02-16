    <?php
    header('content-type: application/json');

    require_once '../database/connect.php';

    if (isset($_SESSION['user'])) {
        header("location:index.php");
    }
    //Protect SQL INJECTION
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user_email = :user_email ");
        $stmt->execute(array(":user_email" => $_POST['user_email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($row) && password_verify($_POST['user_password'], $row['user_password'])) {
            if ($row['user_status'] == 'Active') {
                if ($stmt->rowCount() > 0) {
                    $_SESSION['user'] = array(
                        'user_email' => $row['user_email'],
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

                    $_SESSION['message'] = "ไม่มีไอดีคุณในระบบ";
                }
            } else {
                http_response_code(400);

                $_SESSION['message'] = "ไอดีของคุณไม่สามารถใช้งานได้กรุณาติดต่อแอดมิน";
            }
        } else {
            http_response_code(400);

            $_SESSION['message'] = "ชื่อและรหัสผ่านผู้ใช้งานไม่ตรงกัน";
        }
    } else {
        http_response_code(400);

        $_SESSION['message'] = "เกิดข้อผิดพลาด";
    }

    ?>