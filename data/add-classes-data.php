<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add'])) {
		$grade = $_POST['grade'];
		$class_teacher_id = $_POST['teacher'];
		$year = $_POST['year'];
		$class_name = $_POST['class_name'];

		// quey to  get the grade_id
		$sql2 = "SELECT grade_id FROM grade_tbl WHERE grade_name='$grade'";
		$result2 = mysqli_query($con, $sql2);
		if (mysqli_num_rows($result2) == 1) {
			$d = mysqli_fetch_assoc($result2);
			$grade_id = $d['grade_id'];

			// quey to get the class_id
			$sql3 = "SELECT class_id FROM class_tbl WHERE class_name='$class_name'";
			$result3 = mysqli_query($con, $sql3);
			if (mysqli_num_rows($result3) == 1) {
				$d2 = mysqli_fetch_assoc($result3);
				$class_id = $d2['class_id'];


				// query to check if the teacher_id, grade_id and class_id is already exist in the same row and also teacher_id in the grade_class_tbl
				$sql4 = "SELECT * FROM grade_class_tbl WHERE (grade_id='$grade_id' AND class_id='$class_id') OR teacher_id='$class_teacher_id'";
				$result4 = mysqli_query($con, $sql4);
				if (mysqli_num_rows($result4) < 1) {
					/* firts section for adding data to class_tbl */
					$class_name = $_POST['class_name'];
					$sql1 = "SELECT * FROM class_tbl WHERE class_name='$class_name'";
					$result1 = mysqli_query($con, $sql1);
					if (mysqli_num_rows($result1) < 0) {
						$sql = "INSERT INTO class_tbl (class_name) VALUES ('$class_name')";
						if (mysqli_query($con, $sql)) {
							$sql5 = "INSERT INTO grade_class_tbl (grade_id, class_id, year, teacher_id) VALUES ('$grade_id', '$class_id', '$year', '$class_teacher_id')";
							if (mysqli_query($con, $sql5)) {
								$sm = "New class $grade - $class_name added successfully!";
								header("Location: ../pages/admin/add-class.php?success=$sm");
								exit;
							} else {
								// raise an error -> unknown error
								$em = "Unknown error occurred";
								header("Location: ../pages/admin/add-class.php?error=$em");
								exit;
							}
						} else {
							// raise an error -> unknown error
							$em = "Unknown error occurred";
							header("Location: ../pages/admin/add-class.php?error=$em");
							exit;
						}
					} else {
						$sql5 = "INSERT INTO grade_class_tbl (grade_id, class_id, year, teacher_id) VALUES ('$grade_id', '$class_id', '$year', '$class_teacher_id')";
						if (mysqli_query($con, $sql5)) {
							$sm = "New class $grade - $class_name added successfully!";
							header("Location: ../pages/admin/add-class.php?success=$sm");
							exit;
						} else {
							// raise an error -> unknown error
							$em = "Unknown error occurred";
							header("Location: ../pages/admin/add-class.php?error=$em");
							exit;
						}
					}
				} else {
					// raise an error -> already exist!
					$em = "$grade - $class_name already exist or you selected class teacher is already assigned to another class!";
					header("Location: ../pages/admin/add-class.php?error=$em");
					exit;
				}
			} else {

				// query to check if the teacher_id, grade_id and class_id is already exist in the same row and also teacher_id in the grade_class_tbl
				$sql4 = "SELECT * FROM grade_class_tbl WHERE teacher_id='$class_teacher_id'";
				$result4 = mysqli_query($con, $sql4);
				if (mysqli_num_rows($result4) < 1) {
					/* firts section for adding data to class_tbl */
					$class_name = $_POST['class_name'];
					$sql1 = "SELECT * FROM class_tbl WHERE class_name='$class_name'";
					$result1 = mysqli_query($con, $sql1);
					if (mysqli_num_rows($result1) < 1) {
						$sql = "INSERT INTO class_tbl (class_name) VALUES ('$class_name')";
						if (mysqli_query($con, $sql)) {
							$sql6 = "SELECT class_id FROM class_tbl WHERE class_name='$class_name'";
							$result6 = mysqli_query($con, $sql6);
							if (mysqli_num_rows($result6) == 1) {
								$d = mysqli_fetch_assoc($result6);
								$class_id = $d['class_id'];

								$sql5 = "INSERT INTO grade_class_tbl (grade_id, class_id, year, teacher_id) VALUES ('$grade_id', '$class_id', '$year', '$class_teacher_id')";
								if (mysqli_query($con, $sql5)) {
									$sm = "New class $grade - $class_name added successfully!";
									header("Location: ../pages/admin/add-class.php?success=$sm");
									exit;
								} else {
									// raise an error -> unknown error
									$em = "Unknown error occurred";
									header("Location: ../pages/admin/add-class.php?error=$em");
									exit;
								}
							} else {
								// raise an error -> unknown error
								$em = "No record in class table";
								header("Location: ../pages/admin/add-class.php?error=$em");
								exit;
							}
						} else {
							// raise an error -> unknown error
							$em = "Unknown error occurred";
							header("Location: ../pages/admin/add-class.php?error=$em");
							exit;
						}
					} else {
						$sql6 = "SELECT class_id FROM class_tbl WHERE class_name='$class_name'";
						$result6 = mysqli_query($con, $sql6);
						if (mysqli_num_rows($result6) == 1) {
							$d = mysqli_fetch_assoc($result6);
							$class_id = $d['class_id'];

							$sql5 = "INSERT INTO grade_class_tbl (grade_id, class_id, year, teacher_id) VALUES ('$grade_id', '$class_id', '$year', '$class_teacher_id')";
							if (mysqli_query($con, $sql5)) {
								$sm = "New class $grade - $class_name added successfully!";
								header("Location: ../pages/admin/add-class.php?success=$sm");
								exit;
							} else {
								// raise an error -> unknown error
								$em = "Unknown error occurred";
								header("Location: ../pages/admin/add-class.php?error=$em");
								exit;
							}
						} else {
							// raise an error -> unknown error
							$em = "No record in class table";
							header("Location: ../pages/admin/add-class.php?error=$em");
							exit;
						}
					}
				} else {
					// raise an error -> already exist!
					$em = "Selected class teacher is already assigned to another class!";
					header("Location: ../pages/admin/add-class.php?error=$em");
					exit;
				}
			}
		} else {
			// raise an error -> no record
			$em = "No record in grade table";
			header("Location: ../pages/admin/add-class.php?error=$em");
			exit;
		}
	}
} else {
	header("Location: ../login.php");
	exit;
}
// raise an error
		// $em = "Class $class_name - $year already exist!";
		// header("Location: ../pages/admin/add-class.php?error=$em");
		// exit;
