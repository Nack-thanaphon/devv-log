<?php
require_once '../database/connect.php';

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['uemail'])) {
	$email = ($_POST["uemail"]);

	// Select email from the user table 
	$select_stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user_email=:user_email");
	$select_stmt->execute(array(":user_email" => $email));
	$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

	if ($select_stmt->rowCount() > 0) {
		// If email present in the table, then sends email to user mailbox / junk box
		if ($email == $row["user_email"]) {
			$dbusername = $row["user_name"];
			$dbtoken = $row["token"];

			// They can click on this link to reset the password with the token. 
			$reset_link = "เรียนคุณ $dbusername! <br>
			กรุณาคลิ๊กด้านล่างนี้เพื่อเปลี่ยนรหัสผ่านของคุณ<br><br><br>
			โดย MUGH [team]<br><br>
			<hr><a href='https://info-mugh.com/forget-password/reset_password.php?token=$dbtoken' class='btn btn-success'>เปลี่ยนรหัสผ่าน</a>";


			require_once "../PHPMailer/PHPMailer.php";
			require_once "../PHPMailer/SMTP.php";
			require_once "../PHPMailer/Exception.php";

			$mail = new PHPMailer();

			// SMTP Settings
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Mailer = "smtp";
			$mail->SMTPAuth = true;
			$mail->Username = "mugh.mahidol@gmail.com"; // enter your email address
			$mail->Password = "@F6e64gq6"; // enter your password
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
			$mail->SMTPAutoTLS = false;

			$mail->SetFrom($email); //Enter your gmail id
			$mail->addAddress($email);
			$mail->IsHTML(true);
			$mail->Subject = "Reset Password";
			$mail->Body = ($reset_link);
			$mail->SMTPOptions = array('ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => false
			));
			if ($mail->send()) {
				$_SESSION["successMsg"] = "กรุณาตรวจสอบอีเมลล์ของคุณ";
			} else {
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		} else {
			$_SESSION["errorMsg"] = "คุณใส่อีเมลล์ไม่ถูกต้อง";
		}
	} else {
		$_SESSION["errorMsg"] = "ไม่มีอีเมลล์นี้ในระบบ";
	}
}