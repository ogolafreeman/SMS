<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

	require_once '../controls/connection.php';
	if (isset($_POST['save'])) {
		$marks = $_POST['marks'];
		foreach ($marks as $mark) {
			foreach ($mark as $m) {
				//echo "Marks: " . $m . "<br/>";
				$key = array_search($m, $mark);
				// echo "Key: ". $key. "<br/>". "<br/>";
				$data = explode(", ", $key); // 0 -> std_id, 1-> sub_id, 2 -> grade_class_id, 3 -> term, 4 -> year

				$sql1 = "SELECT * FROM al_marks_tbl WHERE std_id='" . $data[0] . "' AND grade_class_id='" . $data[2] . "' AND sub_id='" . $data[1] . "' AND term='" . $data[3] . "' AND year='" . $data[4] . "'";
				$result1 = mysqli_query($con, $sql1);
				if (mysqli_num_rows($result1) < 1) {
					$sql2 = "INSERT INTO al_marks_tbl (std_id, grade_class_id, year, term, sub_id, marks) VALUES ('" . $data[0] . "', '" . $data[2] . "', '" . $data[4] . "', '" . $data[3] . "', '" . $data[1] . "', '$m')";
					$result2 = mysqli_query($con, $sql2);
					$state = 1;
				} else {

					if (mysqli_num_rows($result1) == 1) {
						$sql2 = "UPDATE al_marks_tbl SET marks='$m' WHERE std_id='" . $data[0] . "' AND grade_class_id='" . $data[2] . "' AND term='" . $data[3] . "' AND year='" . $data[4] . "' AND sub_id='" . $data[1] . "'";
						$result2 = mysqli_query($con, $sql2);
						$state = 2;
					} else {
						$em = "Data Already Exist";
						header("Location: ../pages/admin/show-marks.php?error=$em");
						exit;
					}
				}
			}
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
