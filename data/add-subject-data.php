<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {

		if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-1234567890]/', $_POST['sub_name'])) {
			$sub_name = $_POST['sub_name'];
			$sub_code = $_POST['sub_code'];


			$sql1 = "SELECT * FROM subject_tbl WHERE sub_code='$sub_code' OR sub_name='$sub_name'";
			$result1 = mysqli_query($con, $sql1);
			if (mysqli_num_rows($result1) < 1) {
				$sql2 = "INSERT INTO subject_tbl(sub_code, sub_name) VALUES ('$sub_code', '$sub_name')";
				if (mysqli_query($con, $sql2)) {
					$sm = "New Subject, $sub_name - $sub_code added successfully!";
					header("Location: ../pages/admin/add-subject.php?success=$sm");
					exit;
				}
			} else {
				$em = "$sub_name - $sub_code is already exist!";
				header("Location: ../pages/admin/add-subject.php?error=$em");
				exit;
			}
		} else {
			$em = "Numbers and Special Characters are not allowed!";
			header("Location: ../pages/admin/add-teacher.php?error=$em");
			exit;
		}
	}
} else {
	header("Location:../../index.php");
	exit;
}
