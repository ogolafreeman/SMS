<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['add1'])) {
		$std = $_POST['std'];
		$section_id = $_POST['section'];
		$grade = $_POST['grade'];
		$class_id = $_POST['class'];
		$year = $_POST['year'];

		$sql1 = "SELECT grade_class_id FROM grade_class_tbl WHERE grade_id='$grade' AND class_id='$class_id' AND year='$year'";
		$result1 = mysqli_query($con, $sql1);
		if (mysqli_num_rows($result1) == 1) {
			$row2 = mysqli_fetch_assoc($result1);
			$grade_class_id = $row2['grade_class_id'];

			$result4;
			foreach ($std as $std_id) {
				$sql2 = "SELECT * FROM student_tbl WHERE std_id='$std_id'";
				$result2 = mysqli_query($con, $sql1);
				if (mysqli_num_rows($result2) == 1) {
					$row1 = mysqli_fetch_assoc($result2);
					$full_name = $row1['full_name'];

					$sql3 = "SELECT * FROM student_class_tbl WHERE std_id='$std_id'";
					$result3 = mysqli_query($con, $sql3);
					if (mysqli_num_rows($result3) < 1) {
						$sql4 = "INSERT INTO student_class_tbl (std_id, grade_class_id, year, sec_id) VALUES ('$std_id', '$grade_class_id', '$year', '$section_id')";
						if ($result4 = mysqli_query($con, $sql4)) {
							//
						} else {
							$em = "An unknown error occurred while $full_name is adding to database!";
							header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
						}
					} else {
						// raise an error -> student already assigned to a class
						$em = "$full_name ($result) has already assigned to a class!";
						header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
						exit;
					}
				} else {
					$em = "No Student";
					header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
					exit;
				}
			}
			if ($result4) {
				$sm = "Students assigning completed!";
				header("Location: ../pages/admin/assign-students-to-class.php?success=$sm");
				exit;
			}
		}

		// echo "1st form";
	}

	if (isset($_POST['add2'])) {
		// $std = $_POST['std'];
		$section_id = $_POST['section'];
		$grade = $_POST['grade'];
		$class_id = $_POST['class'];
		$year = $_POST['year'];

		$name = $_FILES['txtFile']['name'];
		$type = $_FILES['txtFile']['type'];
		$tmp_name = $_FILES['txtFile']['tmp_name'];
		$error = $_FILES['txtFile']['error'];

		if ($error == 0) {
			if (pathinfo($name, PATHINFO_EXTENSION) == "txt") {
				if (move_uploaded_file($tmp_name, "../textFile_uploads/$name")) {
					$fn = fopen("../textFile_uploads/$name", "r");

					$result4;
					while (!feof($fn)) {
						$result = fgets($fn);
						$sql1 = "SELECT * FROM student_tbl WHERE admission_no='$result'";
						$result1 = mysqli_query($con, $sql1);
						if (mysqli_num_rows($result1) == 1) {
							$row1 = mysqli_fetch_assoc($result1);
							$std_id = $row1['std_id'];
							$full_name = $row1['full_name'];
							$sql2 = "SELECT grade_class_id FROM grade_class_tbl WHERE grade_id='$grade' AND class_id='$class_id' AND year='$year'";
							$result2 = mysqli_query($con, $sql2);
							if (mysqli_num_rows($result2) == 1) {
								$row2 = mysqli_fetch_assoc($result2);
								$grade_class_id = $row2['grade_class_id'];

								$sql3 = "SELECT * FROM student_class_tbl WHERE std_id='$std_id'";
								$result3 = mysqli_query($con, $sql3);
								if (mysqli_num_rows($result3) < 1) {
									$sql4 = "INSERT INTO student_class_tbl (std_id, grade_class_id, year, sec_id) VALUES ('$std_id', '$grade_class_id', '$year', '$section_id')";
									if ($result4 = mysqli_query($con, $sql4)) {
										//
									} else {
										$em = "An unknown error occurred while $full_name is adding to database!";
										header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
									}
								} else {
									// raise an error -> student already assigned to a class
									$em = "$full_name has already assigned to a class!";
									header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
									exit;
								}
							} else {
								// raise an error -> no class
								$em = "No Class!";
								header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
								exit;
							}
						} else {
							// raise an error -> no student
							// $em = "$result not exist!";
							// header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
							// exit;
						}
						// echo $result . "<br>";
					}
					fclose($fn);
					if ($result4) {
						$sm = "Students assigning completed!";
						header("Location: ../pages/admin/assign-students-to-class.php?success=$sm");
						exit;
					}
				}
			} else {
				$em = "Text Files only!";
				header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
				exit;
			}
		} else {
			$em = "An unknown error occurred!";
			header("Location: ../pages/admin/assign-students-to-class.php?error=$em");
			exit;
		}

		// if ($result4) {
		// 	$sm = "Students assigning completed!";
		// 	header("Location: ../pages/admin/assign-students-to-class.php?success=$sm");
		// 	exit;
		// }
	}
} else {
	header("Location:../../index.php");
	exit;
}
