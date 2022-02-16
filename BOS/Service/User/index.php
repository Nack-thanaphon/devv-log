<?php

include "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$query = '';
	$output = array();
	$query = "SELECT * FROM tbl_user INNER JOIN  tbl_user_role ON tbl_user_role.user_role_id = tbl_user.user_role_id ";

	if (isset($_POST["search"]["value"])) {
		$query .= 'WHERE tbl_user.user_name LIKE "%' . $_POST["search"]["value"] . '%" ';
		$query .= 'OR tbl_user_role.user_role LIKE "%' . $_POST["search"]["value"] . '%" ';
		$query .= 'OR tbl_user.user_status LIKE "%' . $_POST["search"]["value"] . '%" ';
	}

	if (isset($_POST["order"])) {
		$query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
	} else {
		$query .= 'ORDER BY user_id DESC ';
	}

	if ($_POST["length"] != -1) {
		$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}

	$statement = $conn->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	$data = array();

	$filtered_rows = $statement->rowCount();

	foreach ($result as $row) {
		$status = '';
		if ($row["user_status"] == 'Active') {
			$status = '<span class="badge badge-success">ใช้งาน</span>';
		} else {
			$status = '<span class="badge badge-danger">ไม่ได้ใช้งาน</span>';
		}
		$sub_array = array();
		$sub_array[] = $row['user_id'];
		$sub_array[] = $row['user_email'];
		$sub_array[] = $row['user_name'];
		$sub_array[] = $row['user_role'];
		$sub_array[] = $status;
		$sub_array[] = '<button type="button" name="update" id="' . $row["user_id"] . '" class="btn-sm btn-info btn update ">แก้ไขข้อมูล</button>';
		$sub_array[] = '<button type="button" name="delete" id="' . $row["user_id"] . '" class="btn-sm btn-warning btn delete " data-status="' . $row["user_status"] . '">เปลี่ยนแปลงสถานะ</button>';
		$data[] = $sub_array;
	}


	function get_total_all_records($conn)
	{
		$statement = $conn->prepare('SELECT * FROM tbl_user');
		$statement->execute();
		return $statement->rowCount();
	}


	$output = array(
		"draw"				=>	intval($_POST["draw"]),
		"recordsTotal"  	=>  $filtered_rows,
		"recordsFiltered" 	=> 	get_total_all_records($conn),
		"data"    			=> 	$data
	);
	echo json_encode($output);
}