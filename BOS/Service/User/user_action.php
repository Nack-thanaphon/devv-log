<?php

//user_action.php

include "../../database/connect.php";

if (isset($_POST['btn_action'])) {
	if ($_POST['btn_action'] == 'Add') {
		$query = "INSERT INTO tbl_user (user_email, user_password, user_name, user_role_id, user_status) VALUES (:user_email, :user_password, :user_name, :user_role_id, :user_status)";
		$statement = $conn->prepare($query);
		$statement->execute(
			array(
				':user_email'		=>	$_POST["user_email"],
				':user_password'	=>	password_hash($_POST["user_password"], PASSWORD_DEFAULT),
				':user_name'		=>	$_POST["user_name"],
				':user_role_id'		=>	$_POST["user_role_id"],
				':user_status'		=>	'active'
			)
		);
		$result = $statement->fetchAll();
		if (isset($result)) {
			echo 'New User Added';
		}
	}
	if ($_POST['btn_action'] == 'fetch_single') {
		$query = "SELECT * FROM tbl_user WHERE user_id = :user_id
		";
		$statement = $conn->prepare($query);
		$statement->execute(
			array(
				':user_id'	=>	$_POST["user_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$output['user_email'] = $row['user_email'];
			$output['user_role_id'] = $row['user_role_id'];
			$output['user_name'] = $row['user_name'];
		}


		echo json_encode($output);
	}
	if ($_POST['btn_action'] == 'Edit') {
		if ($_POST['user_password'] != '') {
			$query = "
			UPDATE tbl_user SET 
				user_name = '" . $_POST["user_name"] . "',
				user_email = '" . $_POST["user_email"] . "',
				user_role_id = '" . $_POST["user_role_id"] . "',
				user_password = '" . password_hash($_POST["user_password"], PASSWORD_DEFAULT) . "'
				WHERE user_id = '" . $_POST["user_id"] . "'
			";
		} else {
			$query = "
			UPDATE tbl_user SET 
				user_name = '" . $_POST["user_name"] . "',
				user_email = '" . $_POST["user_email"] . "'
				user_role_id = '" . $_POST["user_role_id"] . "'
				WHERE user_id = '" . $_POST["user_id"] . "'				
			";
		}
		$statement = $conn->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();

		if (isset($result)) {
			echo 'แก้ไขข้อมูลเรียบร้อย';
		}
	}

	if ($_POST['btn_action'] == 'delete') {
		$status = 'Active';
		if ($_POST['status'] == 'Active') {
			$status = 'Inactive';
		}
		$query = "UPDATE tbl_user SET user_status = :user_status WHERE user_id = :user_id
		";
		$statement = $conn->prepare($query);
		$statement->execute(
			array(
				':user_status'	=>	$status,
				':user_id'		=>	$_POST["user_id"]
			)
		);
		$result = $statement->fetchAll();
		if (isset($result)) {
			echo 'User Status change to ' . $status;
		}
	}
}