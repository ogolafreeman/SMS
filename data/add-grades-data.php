<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {
		$grade = $_POST['grade'];
		// $year = $_POST['year'];
		$staff_id = $_POST['teacher'];

		$sql1 = "SELECT * from grade_tbl WHERE grade_name='$grade' OR staff_id='$staff_id'";
		$result1 = mysqli_query($con, $sql1);
		if (mysqli_num_rows($result1) == 0) {
			$sql2 = "INSERT INTO grade_tbl (grade_name, staff_id) VALUES ('$grade', '$staff_id')";
			if (mysqli_query($con, $sql2)) {
				$em = "New Grade $grade Added successfully!";
				header("Location: ../pages/admin/add-grades.php?success=$em");
				exit;
			}
		} else {
			$em = "Grade is already exist or Grade Head is already assigned to another grade!";
			header("Location: ../pages/admin/add-grades.php?error=$em");
			exit;
		}
	}
} else {
	header("Location:../../index.php");
	exit;
}
