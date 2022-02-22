<?php
session_start();
require_once './database/connect.php';


// Get user enter a new password, confirm password and a token value via $.ajax() method
if (isset($_POST["upassword"]) && isset($_POST["ucpassword"]) && isset($_POST["utoken"])) {
	$password 	= strip_tags($_POST["upassword"]);
	$cpassword 	= strip_tags($_POST["ucpassword"]);
	$token 		= strip_tags($_POST["utoken"]);

	// New password and confirm password value encrypting using password_hash() function
	$new_password	= password_hash($password, PASSWORD_DEFAULT);
	$new_cpassword	= password_hash($cpassword, PASSWORD_DEFAULT);

	// Apply SQL update query and updating new password 
	$update_stmt = $conn->prepare("UPDATE tbl_user SET user_password=:pwd, user_cpassword=:cpwd WHERE token=:token");

	// If query properly executed, then password updated successfully in the table  
	if ($update_stmt->execute(array(
		":pwd"	=> $new_password,
		":cpwd"	=> $new_cpassword,
		":token" => $token
	))) {

		// Using session method send password updated successfully message to reset_password.php page  
		$_SESSION["updateMsg"] = "Password Updated Successfully.... Please Login";
		header("location:reset_password.php");
	}
}