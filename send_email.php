<?php
require_once './database/connect.php';

// Get user enter email via $.ajax() method
if (isset($_POST['uemail'])) {
	$email = strip_tags($_POST["uemail"]);

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
			$reset_link = "Hi, $dbusername. Please Click here to reset your password
			
			http://localhost/reset_password.php?token=$dbtoken";
			https: //www.info-mugh.com/reset_password.php?token=$dbtoken";

			// Send email code
			require_once('smtp/PHPMailerAutoload.php');

			$mail = new phpmailer(true);
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 587;
			$mail->SMTPSecure = "tls";
			$mail->SMTPAuth = true;
			$mail->Username = "bemyspecialperson@gmail.com"; //Enter your gmail id
			$mail->Password = "F6e64gq6"; //Enter your gmail password
			$mail->SetFrom("bemyspecialperson@gmail.com"); //Enter your gmail id
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
				$_SESSION["successMsg"] = "กรุณาเช็คที่อีเมลล์ของคุณ";
				header("location:index.php");
			} else {
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		} else {
			$_SESSION["errorMsg"] = "ไม่มีอีเมลล์นี้ในระบบ";
			header("location:index.php");
		}
	} else {
		$_SESSION["errorMsg"] = "อีเมลล์ไม่ถูกต้อง";
		header("location:index.php");
	}
}