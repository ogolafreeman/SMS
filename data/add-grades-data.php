<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {
		$grade = $_POST['grade'];
		$year = $_POST['year'];
		$teacher = $_POST['teacher'];

		if ($grade <= 11) {
			$sql1 = "SELECT * from grade_tbl WHERE grade_name='Grade $grade - $year'";
		} else {
			$section = $_POST['section'];
			$sql1 = "SELECT * from grade_tbl WHERE grade_name='Grade $grade $section - $year'";
		}


		$result1 = mysqli_query($con, $sql1);
		if (mysqli_num_rows($result1) == 0) {
			if ($grade <= 11) {
				$sql2 = "INSERT INTO grade_tbl (grade_name, teacher_id) VALUES ('Grade $grade - $year', '$teacher')";
				if (mysqli_query($con, $sql2)) {
					$em = "New Grade $grade - $year Added successfully!";
					header("Location: ../pages/admin/add-grades.php?success=$em");
					exit;
				}
			} else {
				$sql2 = "INSERT INTO grade_tbl (grade_name, teacher_id) VALUES ('Grade $grade $section - $year', '$teacher')";
				if (mysqli_query($con, $sql2)) {
					$em = "New Grade $grade $section - $year Added successfully!";
					header("Location: ../pages/admin/add-grades.php?success=$em");
					exit;
				}
			}
		} else {
			$em = "Grade is already exist!";
			header("Location: ../pages/admin/add-grades.php?error=$em");
			exit;
		}
	}
} else {
	header("Location:../../login.php");
	exit;
}
