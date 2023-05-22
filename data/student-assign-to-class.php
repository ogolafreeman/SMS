<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if(isset($_POST['add'])) {
		$std = $_POST['std'];
		$section_id = $_POST['section'];
		$grade = $_POST['grade'];
		$class_id = $_POST['class'];
		$year = $_POST['year'];

		// $sql = "SELECT * FROM user_tbl ut INNER JOIN user_role_tbl urt ON (ut.role_id = urt.role_id) WHERE (ut.username = '$uname')";
		$sql4 = "SELECT grade_id FROM grade_tbl WHERE grade_name='$grade'";
		$result4 = mysqli_query($con, $sql4);
		if(mysqli_num_rows($result4) == 1)  {
			$grd = mysqli_fetch_assoc($result4);
			$grade_id = $grd['grade_id'];

			$sql1 = "SELECT grade_class_id FROM grade_class_tbl WHERE grade_id='$grade_id' AND class_id='$class_id'";
			$result1 = mysqli_query($con, $sql1);
			if(mysqli_num_rows($result1) > 0) {
				$g = mysqli_fetch_assoc($result1);
				$grade_class_id = $g['grade_class_id'];
				foreach ($std as $std_id) {
					$sql2 = "SELECT * FROM student_tbl st INNER JOIN student_class_tbl sct ON (st.std_id = sct.std_id) WHERE (st.std_id='$std_id')";
					$result2 = mysqli_query($con, $sql2);
					if(mysqli_num_rows($result2) < 1) {
						$sql3 = "INSERT INTO student_class_tbl (std_id, grade_class_id, sec_id, year) VALUES ('$std_id', '$grade_class_id', '$section_id', '$year')";
						$result3 = mysqli_query($con, $sql3);
					} else {
						$em = "Already exist";
			            header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
			            exit;
					}
				}
			} else {
				$em = "No Classes!";
			    header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
			    exit;
			}
			if($result3) {
				$sm = "Selected Students assigned to class!";
				header("Location: ../pages/admin/assign-students-to-class.php?success=$sm");
				exit;
			} else {
				$em = "An unknown error occurred";
	            header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
	            exit;
			}
		} else {
			// raise an error -> no grades
			$em = "No Grades!";
			    header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
			    exit;
		}
	}

} else {
    header("Location:../../login.php");
    exit;
}
?>