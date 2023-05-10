<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {
		$grade_name = explode(" ", $_POST['grade']);
		if ($grade_name[1] <= 11) {
			$class_name = $grade_name[1] . " - " . $_POST['class2'];
		} else {
			$class_name = $grade_name[1] . " " . $grade_name[2] . " - " . $_POST['class2'];
		}
		//echo $class_name;
		$class_teacher = $_POST['teacher'];
		$year = explode("-", $_POST['grade'])[1];

		// to get the grade_id using grade_name
		$sql1 = "SELECT grade_id FROM grade_tbl WHERE grade_name='" . $_POST['grade'] . "'";
		$result1 = mysqli_query($con, $sql1);
		$data = mysqli_fetch_assoc($result1);
		$grade_id = $data['grade_id'];

		// INSERT INTO class_tbl (class_name) VALUES ('$class_name')
		// SELECT * FROM class_tbl ct INNER JOIN grade_class_tbl gct ON (ct.class_id = gct.class_id) WHERE (ut.username = '$uname')
		$sql2 = "SELECT * FROM class_tbl WHERE class_name='$class_name'";
		$result2 = mysqli_query($con, $sql2);
		if (mysqli_num_rows($result2) < 1) {
			//$sql3 = "INSERT INTO class_tbl (class_name) VALUES ('$class_name')";
			$sql3 = "SELECT * FROM grade_class_tbl WHERE teacher_id='$class_teacher'";
			$result3 = mysqli_query($con, $sql3);
			if (mysqli_num_rows($result3) < 1) {
				$sql4 = "INSERT INTO class_tbl (class_name) VALUES ('$class_name')";
				if (mysqli_query($con, $sql4)) {
					$sql5 = "SELECT class_id FROM class_tbl WHERE class_name='$class_name'";
					$result5 = mysqli_query($con, $sql5);
					$d = mysqli_fetch_assoc($result5);
					$class_id = $d['class_id'];

					$sql6 = "SELECT * FROM class_tbl ct INNER JOIN grade_class_tbl gct ON (ct.class_id = gct.class_id) WHERE (ct.class_id = '$class_id')";
					$result6 = mysqli_query($con, $sql6);
					if (mysqli_num_rows($result6) < 1) {
						$sql7 = "INSERT INTO grade_class_tbl (grade_id, class_id, year, teacher_id) VALUES ('$grade_id', '$class_id', '$year', '$class_teacher')";
						if (mysqli_query($con, $sql7)) {
							$sm = "New Class $class_name Added successfully!";
							header("Location: ../pages/admin/add-class.php?success=$sm");
							exit;
						} else {
							$em = "Unknown error occurred!";
							header("Location: ../pages/admin/add-class.php?error=$em");
							exit;
						}
					} else {
						// raise an error
						$em = "Class ID already exist!";
						header("Location: ../pages/admin/add-class.php?error=$em");
						exit;
					}
				} else {
					$em = "Unknown error occurred!";
					header("Location: ../pages/admin/add-class.php?error=$em");
					exit;
				}
			} else {
				$em = "Class teacher is already assigned to an anothe class!";
				header("Location: ../pages/admin/add-class.php?error=$em");
				exit;
			}
		} else {
			$d = mysqli_fetch_assoc($result2);
			$class_id = $d['class_id'];
			$sql3 = "SELECT * FROM grade_class_tbl WHERE year='$year' AND class_id='$class_id'";
			$result3 = mysqli_query($con, $sql3);
			if (mysqli_num_rows($result3) < 1) {
				$sql4 = "SELECT * FROM grade_class_tbl WHERE teacher_id='$class_teacher'";
				$result4 = mysqli_query($con, $sql4);
				if (mysqli_num_rows($result4) < 1) {
					$sql4 = "INSERT INTO class_tbl (class_name) VALUES ('$class_name')";
					if (mysqli_query($con, $sql4)) {
						$sql5 = "SELECT class_id FROM class_tbl WHERE class_name='$class_name'";
						$result5 = mysqli_query($con, $sql5);
						$d = mysqli_fetch_assoc($result5);
						$class_id = $d['class_id'];

						$sql6 = "SELECT * FROM class_tbl ct INNER JOIN grade_class_tbl gct ON (ct.class_id = gct.class_id) WHERE (ct.class_id = '$class_id')";
						$result6 = mysqli_query($con, $sql6);
						if (mysqli_num_rows($result6) < 1) {
							$sql7 = "INSERT INTO grade_class_tbl (grade_id, class_id, year, teacher_id) VALUES ('$grade_id', '$class_id', '$year', '$class_teacher')";
							if (mysqli_query($con, $sql7)) {
								$sm = "New Class $class_name Added successfully!";
								header("Location: ../pages/admin/add-class.php?success=$sm");
								exit;
							} else {
								$em = "Unknown error occurred!";
								header("Location: ../pages/admin/add-class.php?error=$em");
								exit;
							}
						} else {
							// raise an error
							$em = "Class ID already exist!";
							header("Location: ../pages/admin/add-class.php?error=$em");
							exit;
						}
					} else {
						$em = "Unknown error occurred!";
						header("Location: ../pages/admin/add-class.php?error=$em");
						exit;
					}
				} else {
					$em = "Class teacher is already assigned to an anothe class!";
					header("Location: ../pages/admin/add-class.php?error=$em");
					exit;
				}
			} else {
				// raise an error
				$em = "Class $class_name - $year already exist!";
				header("Location: ../pages/admin/add-class.php?error=$em");
				exit;
			}
		}
	}
} else {
	header("Location: ../login.php");
	exit;
}
