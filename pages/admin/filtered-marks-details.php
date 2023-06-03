<?php

	include '../../controls/connection.php';
	$term = $_POST['term'];
	$query = $_POST['query'];

	$sub_array = array();
	$pre_sub_array = array();
	
	$sql1 = "SELECT std_id, full_name, admission_no FROM student_tbl WHERE admission_no='$query' AND status=1";
	$result1 = mysqli_query($con, $sql1);
	if(mysqli_num_rows($result1) == 1) {
		$st_data = mysqli_fetch_assoc($result1);
		$std_id = $st_data['std_id'];
		$admission_no = $st_data['admission_no'];
		$full_name = $st_data['full_name'];

		$sql2 = "SELECT * FROM student_class_tbl WHERE std_id='$std_id'";
		$result2 = mysqli_query($con, $sql2);
		if(mysqli_num_rows($result2) == 1) {
			$gc_data = mysqli_fetch_assoc($result2);
			$grade_class_id = $gc_data['grade_class_id'];
			$year = $gc_data['year'];

			$sql5 = "SELECT grade_id, class_id FROM grade_class_tbl WHERE grade_class_id='$grade_class_id'";
			$result5 = mysqli_query($con, $sql5);
			if(mysqli_num_rows($result5) == 1) {
				$d = mysqli_fetch_assoc($result5);
				$grade_id = $d['grade_id'];
				$class_id = $d['class_id'];

				$sql6 = "SELECT grade_name FROM grade_tbl WHERE grade_id='$grade_id'";
				$result6 = mysqli_query($con, $sql6);
				$d = mysqli_fetch_assoc($result6);
				$grade_name= $d['grade_name'];

				$sql6 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
				$result6 = mysqli_query($con, $sql6);
				$d = mysqli_fetch_assoc($result6);
				$class_name= $d['class_name'];


				echo "<table class='table mt-5'><thead><tr><th class='w-25'>Admission No.</th><th>Name</th>";
				$sql3 = "SELECT sub_id FROM grade_subject_tbl WHERE year='$year' AND grade_id='$grade_id' ORDER BY order_id ASC";
				$result3 = mysqli_query($con, $sql3);
				if(mysqli_num_rows($result3) > 0) {
					while($data = mysqli_fetch_assoc($result3)) {
						$sub_id = $data['sub_id'];
						// array_push($pre_sub_array, $sub_id);
						$sql4 = "SELECT * FROM al_marks_tbl WHERE sub_id='$sub_id' AND std_id='$std_id' AND grade_class_id='$grade_class_id' AND year='$year' AND term='$term' AND NOT marks=''";
						$result4 = mysqli_query($con, $sql4);
						if(mysqli_num_rows($result4) > 0) {
							$sql4 = "SELECT sub_name, sub_code FROM subject_tbl WHERE sub_id='$sub_id'";
							$result4 = mysqli_query($con, $sql4);
							if(mysqli_num_rows($result4) == 1) {
								$sname = mysqli_fetch_assoc($result4);
								$sub_code = $sname['sub_code'];
								array_push($sub_array, $sub_id);
								echo "<th>$sub_code</th>";
							}
						}
						
					}
					echo "<th>Total</th><th>Average</th></thead></tr>";
					echo "<tbody><tr><td>$admission_no</td><td>$full_name</td>";
					$count = 0;
					$total = 0;
					$avg = 0;
					foreach ($sub_array as $s) {
						$sql5 = "SELECT * FROM al_marks_tbl WHERE year='$year' AND term='$term' AND grade_class_id='$grade_class_id'";
						$result5 = mysqli_query($con, $sql5);
						if (mysqli_num_rows($result5) > 0) {
							$sql6 = "SELECT marks FROM al_marks_tbl WHERE sub_id='$s' AND std_id='$std_id' AND year='$year' AND term='$term'";
							$result6 = mysqli_query($con, $sql6);
							if (mysqli_num_rows($result6) == 1) {
								$m = mysqli_fetch_assoc($result6);
								$marks = $m['marks'];

								if($marks == 0) {
									$sql8 = "SELECT * FROM al_absent_tbl WHERE sub_id='$s' AND std_id='$std_id' AND year='$year' AND term='$term'";
									$result8 = mysqli_query($con, $sql8);
									if (mysqli_num_rows($result8) == 1) {
										echo "<td>ab</td>";
									} else {
										echo "<td>0</td>";
									}
								} elseif($marks == "") {
									echo "<td></td>";
								} else {
									echo "<td>$marks</td>";
									$total += $marks;
								}
								$count += 1;

							}
						}
					}
					echo "<td>$total</td>";
					if ($count >= 1 && $total >= 1) {
						$avg = round($total / $count, 2);
						echo "<td>$avg</td>";
					} else {
						echo "<td>0</td>";
					}
					echo "</tr></tbody></table>";

				} else {
					echo "<script>Swal.fire({icon: 'error', title: 'Oops', text: 'No Marks for this student'});</script>";
				}
			} else {
				// raise an error -> no class asigned to grade
			}

		} else {
			// raise an error -> student not assigned to a class
		}
	} else {
		echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Student'});</script>";
	}

	// } else {
		//
	// }

?>