<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if(isset($_POST['add'])) {
		$sec_id = $_POST['section'];
		$subjects = $_POST['subject'];

		$arr = explode(" ", $_POST['grade']);
		if($arr[1] <= 11) {
			$grade = $arr[1];
		} else {
			$grade = $arr[1] . " " . $arr[2];
		}

		foreach($subjects as $subject) {
			$sql = "SELECT * FROM grade_subject_tbl WHERE sub_id='$subject' AND sec_id='$sec_id'";
			$result = mysqli_query($con, $sql);
			if(mysqli_num_rows($result) < 1) {
				$sql2 = "SELECT id FROM grade_tbl WHERE grade_name LIKE '%$grade%'";
				

			}
		}
		

		
	}

} else {
	header("Location:../../login.php");
	exit;
}

?>