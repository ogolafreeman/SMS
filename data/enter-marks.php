<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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
				$key = array_search($m, $mark);

				if ($m == "ab" || $m == "") {
					continue;
				} else {
					if ($m >= 0 && $m <= 100) {
						$data = explode(", ", $key); // 0 -> std_id, 1-> sub_id, 2 -> grade_class_id, 3 -> term, 4 -> year

						$std_id = $data[0];
						$sub_id = $data[1];
						$term = $data[2];
						$year = $data[3];
						$grade = $data[4];
						$class_id = $data[5];

						array_push($std_array, $std_id);

						if ($m == "") {
							$sql3 = "SELECT * FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year' AND class_id='$class_id'";
							$result3 = mysqli_query($con, $sql3);
							if (mysqli_num_rows($result3) < 1) {
								$sql1 = "SELECT * FROM al_marks_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year'";
								$result1 = mysqli_query($con, $sql1);
								if (mysqli_num_rows($result1) < 1) {
									$sql2 = "INSERT INTO al_marks_tbl (std_id, year, term, sub_id, marks, grade_id, class_id) VALUES ('$std_id', '$year', '$term', '$sub_id', '', '$grade', '$class_id')";
									if (mysqli_query($con, $sql2)) {
										$state = 1;
									} else {
										//
									}
								} else {
									if (mysqli_num_rows($result1) == 1) {
										$sql2 = "UPDATE al_marks_tbl SET marks='' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id' AND grade_id='$grade' AND class_id='$class_id'";
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
									$sql4 = "DELETE FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year' AND grade_id='$grade' AND class_id='$class_id'";
									if (mysqli_query($con, $sql4)) {
										$sql2 = "UPDATE al_marks_tbl SET marks='' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id'";
										$result2 = mysqli_query($con, $sql2);
										$state = 2;
									}
								}
							}
						} elseif (strtolower($m) == "ab") {
							$sql4 = "DELETE FROM al_marks_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year' AND grade_id='$grade' AND class_id='$class_id'";
							if (mysqli_query($con, $sql4)) {
								$sql6 = "INSERT INTO al_marks_tbl (std_id, year, term, sub_id, marks, grade_id, class_id) VALUES ('$std_id', '$year', '$term', '$sub_id', '0', '$grade', '$class_id')";
								if (mysqli_query($con, $sql6)) {
									$sql3 = "SELECT * FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year' AND grade_id='$grade' AND class_id='$class_id'";
									$result3 = mysqli_query($con, $sql3);
									if (mysqli_num_rows($result3) < 1) {
										$sql2 = "INSERT INTO al_absent_tbl (std_id, year, term, sub_id, grade_id, class_id) VALUES ('$std_id', '$year', '$term', '$sub_id', '$grade', '$class_id')";
										$result2 = mysqli_query($con, $sql2);
										$state = 2;
									}
								}
							} else {
								continue;
							}
						} else {
							$sql3 = "SELECT * FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year' AND grade_id='$grade' AND class_id='$class_id'";
							$result3 = mysqli_query($con, $sql3);
							if (mysqli_num_rows($result3) < 1) {
								$sql1 = "SELECT * FROM al_marks_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year' AND grade_id='$grade' AND class_id='$class_id'";
								$result1 = mysqli_query($con, $sql1);
								if (mysqli_num_rows($result1) < 1) {
									$sql2 = "INSERT INTO al_marks_tbl (std_id, year, term, sub_id, marks, grade_id, class_id) VALUES ('$std_id', '$year', '$term', '$sub_id', '$m', '$grade', '$class_id')";
									$result2 = mysqli_query($con, $sql2);
									$state = 1;
								} else {
									if (mysqli_num_rows($result1) == 1) {
										$sql2 = "UPDATE al_marks_tbl SET marks='$m' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id' AND grade_id='$grade' AND class_id='$class_id'";
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
									$sql4 = "DELETE FROM al_absent_tbl WHERE std_id='$std_id' AND sub_id='$sub_id' AND term='$term' AND year='$year' AND grade_id='$grade' AND class_id='$class_id'";
									if (mysqli_query($con, $sql4)) {
										$sql2 = "UPDATE al_marks_tbl SET marks='$m' WHERE std_id='$std_id' AND term='$term' AND year='$year' AND sub_id='$sub_id' AND grade_id='$grade' AND class_id='$class_id'";
										$result2 = mysqli_query($con, $sql2);
										$state = 2;
									}
								}
							}
						}
					} else {
						$em = "Marks should be between 0 - 100";
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

	if (isset($_POST['export'])) {
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		echo $term . "<br>" . $year . "<br>" . $grade;

		// $sheet->setCellValue('A1', "Hello");
		// $writer = new Xlsx($spreadsheet);
		// $writer->save("hello.xlsx");
	}

} else {
	header("Location:../../index.php");
	exit;
}