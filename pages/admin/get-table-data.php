<?php
include '../../controls/connection.php';
include '../../data/admin_operations.php';
$classes = getAllClasses();
//print_r($classes);

foreach ($classes as $class) {
	$grade_id = $class[1];
	$class_id = $class[2];
	$year = $class[3];
	$teacher_id = $class[4];

	// query to get the grade name using grade_id from grade_tbl
	$sql1 = "SELECT grade_name FROM grade_tbl WHERE grade_id='$grade_id'";
	$result1 = mysqli_query($con, $sql1);
	if (mysqli_num_rows($result1) == 1) {
		$d = mysqli_fetch_assoc($result1);
		$grade_name = $d['grade_name'];


		// query to get the class name using class_id from class_tbl
		$sql2 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
		$result2 = mysqli_query($con, $sql2);
		if (mysqli_num_rows($result2) == 1) {
			$d = mysqli_fetch_assoc($result2);
			$class_name = $d['class_name'];

			// query to get the class teacher's name using teacher_id from teacher_tbl
			$sql3 = "SELECT first_name, last_name FROM staff_tbl WHERE staff_id='$teacher_id'";
			$result3 = mysqli_query($con, $sql3);
			if (mysqli_num_rows($result3) == 1) {
				$d = mysqli_fetch_assoc($result3);
				$teacher_name = $d['first_name'] . " " . $d['last_name'];



				/* check the grade and return each class details via XMLHTTP request to ajax */
				if ($_POST['choice'] == 1) {
					if ($grade_name <= 11) {
						// return grade 6 -11 data
						echo "<tr>
    									<td>" . $grade_name . "</td>
    									<td>" . $class_name . "</td>
    									<td>" . $year . "</td>
    									<td>" . $teacher_name . "</td>
    							  </tr>";
					} else {
						continue;
					}
				} else {
					if ($grade_name <= 13 && $grade_name >= 12) {
						// return grade 6 -11 data
						echo "<tr>
    									<td>" . $grade_name . "</td>
    									<td>" . $class_name . "</td>
    									<td>" . $year . "</td>
    									<td>" . $teacher_name . "</td>
    							  </tr>";
					} else {
						continue;
					}
				}
			} else {
				// raise an error -> no record in teacher_tbl
				echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Teachers!'});</script>";
			}
		} else {
			// raise an error -> no record in class_tbl
			echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Classes!'});</script>";
		}
	} else {
		// raise an error -> no record in grade_tbl
		echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Grades!'});</script>";
	}
}
