<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {
		$stream_id = $_POST['stream'];
		$subjects = $_POST['subject'];
		$grade = $_POST['grade'];
		$year = $_POST['year'];


		$sql2 = "SELECT grade_id FROM grade_tbl WHERE grade_name='$grade'";
		$result2 = mysqli_query($con, $sql2);
		if (mysqli_num_rows($result2) == 1) {
			$d = mysqli_fetch_assoc($result2);
			$grade_id = $d['grade_id'];
		} else {
			$em = "No record in grade table!";
			header("Location: ../pages/admin/assign-to-class.php?error=$em");
			exit;
		}

		$sql4 = "SELECT * FROM grade_subject_tbl WHERE (stream_id='$stream_id' AND grade_id='$grade_id')";
		$result4 = mysqli_query($con, $sql4);
		if (mysqli_num_rows($result4) < 1) {
			foreach ($subjects as $subject) {
				$sql = "SELECT * FROM grade_subject_tbl WHERE sub_id='$subject'";
				$result = mysqli_query($con, $sql);
				// if (mysqli_num_rows($result) < 1) {
				$sql3 = "INSERT INTO grade_subject_tbl (grade_id, stream_id, year, sub_id) VALUES ('$grade_id', '$stream_id', '$year', '$subject')";
				$result3 = mysqli_query($con, $sql3);
				if (!$result) {
					$em = "Data already exist!";
					header("Location: ../pages/admin/assign-to-class.php?error=$em");
					exit;
				}
				// }
			}
		} else {
			$em = "Data already exist!";
			header("Location: ../pages/admin/assign-to-class.php?error=$em");
			exit;
		}

		if ($result3) {
			$sm = "Selected subjects are successfully assigned!";
			header("Location: ../pages/admin/assign-to-class.php?success=$sm");
			exit;
		}
	}
} else {
	header("Location:../../login.php");
	exit;
}
