<?php

include '../../controls/connection.php';
$term = $_POST['term'];
$query = $_POST['query'];

$sub_array = array();
$pre_sub_array = array();

function getGrade($marks)
{
	// $grade = "";
	if ($marks >= 0 && $marks <= 100) {
		if ($marks >= 75) {
			return "A";
		} elseif ($marks >= 65) {
			return "B";
		} elseif ($marks >= 55) {
			return "C";
		} elseif ($marks >= 35) {
			return "S";
		} else {
			return "F";
		}
	} else {
		return "Invalid";
	}
}

$sql1 = "SELECT std_id, full_name, admission_no FROM student_tbl WHERE admission_no='$query' AND status=1";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) == 1) {
	$st_data = mysqli_fetch_assoc($result1);
	$std_id = $st_data['std_id'];
	$admission_no = $st_data['admission_no'];
	$full_name = $st_data['full_name'];

	$sql2 = "SELECT * FROM student_class_tbl WHERE std_id='$std_id'";
	$result2 = mysqli_query($con, $sql2);
	if (mysqli_num_rows($result2) == 1) {
		$gc_data = mysqli_fetch_assoc($result2);
		$grade_class_id = $gc_data['grade_class_id'];
		$year = $gc_data['year'];

		$sql5 = "SELECT grade_id, class_id FROM grade_class_tbl WHERE grade_class_id='$grade_class_id'";
		$result5 = mysqli_query($con, $sql5);
		if (mysqli_num_rows($result5) == 1) {
			$d = mysqli_fetch_assoc($result5);
			$grade_id = $d['grade_id'];
			$class_id = $d['class_id'];

			$sql6 = "SELECT grade_name FROM grade_tbl WHERE grade_id='$grade_id'";
			$result6 = mysqli_query($con, $sql6);
			$d = mysqli_fetch_assoc($result6);
			$grade_name = $d['grade_name'];

			$sql6 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
			$result6 = mysqli_query($con, $sql6);
			$d = mysqli_fetch_assoc($result6);
			$class_name = $d['class_name'];

			echo "<div class='row'>
						<div class='col-md-5'>
                            <h5>Name: <span style='color: red'>$full_name</span></h5>
                        </div>
						<div class='col-md-3'>
                            <h5>Year: <span style='color: red'>$year</span></h5>
                        </div>
						<div class='col-md-3'>
                            <h5>Term: <span style='color: red'>$term</span></h5>
                        </div>
				</div>";

			echo "<table class='table mt-5 table-bordered'>
						<thead>
							<tr>
								<th rowspan='2'>Subjects</th>
								<th colspan='2'>$term</th>";

			echo "			</tr>";
			echo "			<tr>
								<td>Marks</td>
								<td>Grade</td>
							</tr>
						</thead>";

			echo "		<tbody>";

			$count = 0;
			$total = 0;
			$sql3 = "SELECT sub_id FROM grade_subject_tbl WHERE year='$year' AND grade_id='$grade_id' ORDER BY order_id ASC";
			$result3 = mysqli_query($con, $sql3);
			if (mysqli_num_rows($result3) > 0) {
				while ($data = mysqli_fetch_assoc($result3)) {
					$sub_id = $data['sub_id'];
					// array_push($pre_sub_array, $sub_id);
					$sql4 = "SELECT * FROM al_marks_tbl WHERE term='$term' AND sub_id='$sub_id' AND std_id='$std_id' AND grade_class_id='$grade_class_id' AND year='$year' AND NOT marks=''";
					$result4 = mysqli_query($con, $sql4);
					if (mysqli_num_rows($result4) > 0) {
						$sql4 = "SELECT sub_name, sub_code FROM subject_tbl WHERE sub_id='$sub_id'";
						$result4 = mysqli_query($con, $sql4);
						if (mysqli_num_rows($result4) == 1) {
							$sname = mysqli_fetch_assoc($result4);
							$sub_name = $sname['sub_name'];
							array_push($sub_array, $sub_id);
							echo "<tr><td>$sub_name</td>";
							$sql5 = "SELECT * FROM al_marks_tbl WHERE year='$year' AND term='$term' AND grade_class_id='$grade_class_id'";
							$result5 = mysqli_query($con, $sql5);
							if (mysqli_num_rows($result5) > 0) {
								$sql6 = "SELECT marks FROM al_marks_tbl WHERE sub_id='$sub_id' AND term='$term' AND std_id='$std_id' AND year='$year'";
								$result6 = mysqli_query($con, $sql6);
								if (mysqli_num_rows($result6) == 1) {
									$m = mysqli_fetch_assoc($result6);
									$marks = $m['marks'];

									if ($marks == 0) {
										$sql8 = "SELECT * FROM al_absent_tbl WHERE sub_id='$sub_id' AND term='$term' AND std_id='$std_id' AND year='$year'";
										$result8 = mysqli_query($con, $sql8);
										if (mysqli_num_rows($result8) == 1) {
											echo "<td class='text-center'><b>ab</b></td>
												  <td class='text-center'>-</td></tr>";
										} else {
											$grade = getGrade($marks);
											echo "<td class='text-center'><b>0</b></td>
												  <td class='text-center'><b>$grade</b></td></tr>";
										}
									} elseif ($marks == "") {
										echo "<td></td>
											  <td></td></tr>";
									} else {
										$grade = getGrade($marks);
										echo "<td class='text-center'><b>$marks</b></td>
											  <td class='text-center'><b>$grade</b></td></tr>";
										$total += $marks;
									}
									$count += 1;
								}
							}
						}
					}
				}

				$avg = 0;
				if ($total > 0 && $count > 1) {
					$avg = $total / $count;

					echo "<tr><td> </td>  <td> </td>  <td> </td></tr>";
					echo "<tr>
						<td>Total Marks</td>
						<td colspan='2' class='text-center'><b>$total</b></td>
					  </tr>";
					echo "<tr>
						<td>Average Marks</td>
						<td colspan='2' class='text-center'><b>$avg</b></td>
					  </tr>";
					echo "<tr>
						<td>Rank</td>";

					// RANK
					// Execute the SQL query to get the rank of the selected student
					$sql = "SELECT std_id, SUM(marks) AS total_marks, (SELECT COUNT(*) FROM (SELECT std_id, SUM(marks) AS total_marks FROM al_marks_tbl
				 	    WHERE grade_class_id = '$grade_class_id' AND term='$term' AND year='$year' GROUP BY std_id) AS ranks WHERE total_marks > (SELECT SUM(marks) FROM 
						al_marks_tbl WHERE grade_class_id = '$grade_class_id' AND term='$term' AND year='$year' AND std_id = '$std_id')) + 1 AS rank FROM al_marks_tbl 
						WHERE grade_class_id = '$grade_class_id' AND std_id = '$std_id' AND term='$term' AND year='$year'";
					$result = mysqli_query($con, $sql);

					// Check if the query was successful
					if (!$result) {
						die("Query failed: " . mysqli_error($con));
					}

					// Get the rank of the selected student from the result set
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						$rank = $row['rank'];
						// echo "The rank of student $std_id in grade class $grade_class_id is $rank";
						echo "<td colspan='2' class='text-center'><b>$rank</b></td>
					  </tr>";
					} else {
						// echo "No results found";
					}
				}






				echo "</tbody></table>";
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
