<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {

	require_once '../controls/connection.php';
	if(isset($_POST['add'])) {
		$grade_name = $_POST['grade'];
		$sec_id = $_POST['section'];
		$subjects = $_POST['subject'];

		$year = explode("-", $grade_name)[1];
		$grade = explode(" ",explode("-", $grade_name)[0])[1];
		

		foreach ($subjects as $subject) {
			$sql = "SELECT * FROM grade_subject_tbl WHERE sub_id='$subject' AND (sec_id='$sec_id' OR year='$year')";
			$result = mysqli_query($con, $sql);
			if(mysqli_num_rows($result) < 1) {
				$sql2 = "INSERT INTO grade_subject_tbl (sec_id, sub_id, year) VALUES ('$sec_id', '$subject', '$year')";
				$result2 = mysqli_query($con, $sql2);
			} else {
				$sql3 = "SELECT * FROM grade_subject_tbl WHERE sub_id='$subject' AND (sec_id='$sec_id' AND year='$year')";
				$result3 = mysqli_query($con, $sql3);
				if(mysqli_num_rows($result3) < 1) {
					$sql2 = "INSERT INTO grade_subject_tbl (sec_id, sub_id, year) VALUES ('$sec_id', '$subject', '$year')";
					$result2 = mysqli_query($con, $sql2);
				} else {
					$em = "Subjects are already assigned!";
					header("Location: ../pages/admin/assign-to-class.php?error=$em");
					exit;
				}
			}
		}
		if($result2) {
			$sm = "Selected subjects successfully assigned!";
			header("Location: ../pages/admin/assign-to-class.php?success=$sm");
			exit;
		} else {
			$em = "Unknown error occurred!";
			header("Location: ../pages/admin/assign-to-class.php?error=$em");
			exit;
		}
	}

} else {
	header("Location:../../login.php");
	exit;
}

?>