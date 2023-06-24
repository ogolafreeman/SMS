<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['save'])) {
		$std_id = "";
		$term = "";
		$year = "";
		$std_array = array();
		$marks = $_POST['marks'];
		foreach ($marks as $mark) {
			foreach ($mark as $m) {
				//echo "Marks: " . $m . "<br/>";
				$key = array_search($m, $mark);
				// echo "Key: ". $key. "<br/>". "<br/>";
				$data = explode(", ", $key); // 0 -> std_id, 1-> sub_id, 2 -> grade_class_id, 3 -> term, 4 -> year

				$std_id = $data[0];
				$sub_id = $data[1];
				$term = $data[2];
				$year = $data[3];

				array_push($std_array, $std_id);

				if ($m == "") {
					$sql3 = "SELECT * FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
					$result3 = mysqli_query($con, $sql3);
					if (mysqli_num_rows($result3) < 1) {
						$sql1 = "SELECT * FROM al_marks_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
						$result1 = mysqli_query($con, $sql1);
						if (mysqli_num_rows($result1) < 1) {
							$sql2 = "INSERT INTO al_marks_tbl (std_id, year, term, sub_id, marks) VALUES ('$std_id', '$year', '$term', '$sub_id', '')";
							$result2 = mysqli_query($con, $sql2);
							$state = 1;
						} else {
							if (mysqli_num_rows($result1) == 1) {
								$sql2 = "UPDATE al_marks_tbl SET marks='' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id'";
								$result2 = mysqli_query($con, $sql2);
								$state = 2;
							} else {
								// $em = "Data Already Exist";
								// header("Location: ../pages/admin/show-marks.php?error=$em");
								// exit;
							}
						}
					} else {
						if (mysqli_num_rows($result3) == 1) {
							$sql4 = "DELETE FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
							if (mysqli_query($con, $sql4)) {
								$sql2 = "UPDATE al_marks_tbl SET marks='' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id'";
								$result2 = mysqli_query($con, $sql2);
								$state = 2;
							}
						}
					}
				} elseif (strtolower($m) == "ab") {
					$sql4 = "DELETE FROM al_marks_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
					if (mysqli_query($con, $sql4)) {
						$sql6 = "INSERT INTO al_marks_tbl (std_id, year, term, sub_id, marks) VALUES ('$std_id', '$year', '$term', '$sub_id', '0')";
						if (mysqli_query($con, $sql6)) {
							$sql3 = "SELECT * FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
							$result3 = mysqli_query($con, $sql3);
							if (mysqli_num_rows($result3) < 1) {
								$sql2 = "INSERT INTO al_absent_tbl (std_id, year, term, sub_id) VALUES ('$std_id', '$year', '$term', '$sub_id')";
								$result2 = mysqli_query($con, $sql2);
								$state = 2;
							}
						}
					} else {
						continue;
					}
				} else {
					$sql3 = "SELECT * FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
					$result3 = mysqli_query($con, $sql3);
					if (mysqli_num_rows($result3) < 1) {
						$sql1 = "SELECT * FROM al_marks_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
						$result1 = mysqli_query($con, $sql1);
						if (mysqli_num_rows($result1) < 1) {
							$sql2 = "INSERT INTO al_marks_tbl (std_id, year, term, sub_id, marks) VALUES ('$std_id', '$year', '$term', '$sub_id', '$m')";
							$result2 = mysqli_query($con, $sql2);
							$state = 1;
						} else {
							if (mysqli_num_rows($result1) == 1) {
								$sql2 = "UPDATE al_marks_tbl SET marks='$m' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id'";
								$result2 = mysqli_query($con, $sql2);
								$state = 2;
							} else {
								// $em = "Data Already Exist";
								// header("Location: ../pages/admin/show-marks.php?error=$em");
								// exit;
							}
						}
					} else {
						if (mysqli_num_rows($result3) == 1) {
							$sql4 = "DELETE FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
							if (mysqli_query($con, $sql4)) {
								$sql2 = "UPDATE al_marks_tbl SET marks='$m' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id'";
								$result2 = mysqli_query($con, $sql2);
								$state = 2;
							}
						}
					}
				}

				// echo "Student ID: $std_id" . " " . "Subject: $sub_id" . " " . "Marks: $m<br>";
			}
		}

		foreach (array_unique($std_array) as $std_id) {
			$sql3 = "INSERT INTO student_marks_watched_tbl (std_id, term, year, is_watched) VALUES ('$std_id', '$term', '$year', '0')";
			$result3 = mysqli_query($con, $sql3);
		}

		if ($state == 1) {
			if ($result2) {
				$sm = "Marks added successfully!";
				header("Location: ../pages/admin/show-marks.php?success=$sm");
				exit;
			} else {
				$em = "Unknown error occurred";
				header("Location: ../pages/admin/show-marks.php?error=$em");
				exit;
			}
		} else {
			if ($result2) {
				$sm = "Marks updated successfully!";
				header("Location: ../pages/admin/show-marks.php?success=$sm");
				exit;
			} else {
				$em = "Unknown error occurred";
				header("Location: ../pages/admin/show-marks.php?error=$em");
				exit;
			}
		}
	}
}
