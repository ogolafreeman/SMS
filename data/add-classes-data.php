<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {
		$grade = $_POST['grade'];
		$staff_id = $_POST['teacher'];
		$year = $_POST['year'];
		$class_id = $_POST['class_id'];

		$sql1 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
		$result1 = mysqli_query($con, $sql1);
		if (mysqli_num_rows($result1) == 1) {
			$row = mysqli_fetch_assoc($result1);
			$sql2 = "SELECT * FROM grade_class_tbl WHERE grade_id='$grade' AND class_id='$class_id' AND year='$year' AND staff_id='$staff_id'";
			$result2 = mysqli_query($con, $sql2);
			if (mysqli_num_rows($result2) < 1) {
				$sql3 = "INSERT INTO grade_class_tbl (grade_id, class_id, year, staff_id) VALUES ('$grade', '$class_id', '$year', '$staff_id')";
				if (mysqli_query($con, $sql3)) {
					$sm = "New Class $grade - " . $row['class_name'] . " Added";
					header("Location: ../pages/admin/add-class.php?success=$sm");
					exit;
				}
			} else {
				$em = "Class " . $row['class_name'] . " - $year already exist!";
				header("Location: ../pages/admin/add-class.php?error=$em");
				exit;
			}
		} else {
			$em = "No Class!";
			header("Location: ../pages/admin/add-class.php?error=$em");
			exit;
		}
	}
} else {
	header("Location: ../index.php");
	exit;
}
// raise an error
		// $em = "Class $class_name - $year already exist!";
		// header("Location: ../pages/admin/add-class.php?error=$em");
		// exit;
