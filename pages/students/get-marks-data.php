<?php
$term = $_POST['term'];

$count = 0;
$total = 0;

$sub_array = array();
$sub_array = array();
$marks_array = array();
include '../../controls/connection.php';

function getResult($con, $query)
{
    $result = mysqli_query($con, $query);
    return $result;
}

function getGrade($marks)
{
    // $grade = "";
    if (
        $marks >= 0 && $marks <= 100
    ) {
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

echo "<table class='table mt-5 table-bordered'>
						<thead>
							<tr>
								<th rowspan='2'>Subjects</th>";

echo "			</tr>";
echo "			<tr>
								<td>Marks</td>
								<td>Grade</td>
							</tr>
						</thead>";

echo "		<tbody>";

$admission_no = $_POST['admission_no'];
$sql1 = "SELECT std_id FROM student_tbl WHERE admission_no='$admission_no'";
$row1 = mysqli_fetch_assoc(getResult($con, $sql1));
$std_id = $row1['std_id'];

$sql2 = "SELECT * FROM student_class_tbl WHERE std_id='$std_id'";
if (mysqli_num_rows(getResult($con, $sql2))) {
    $row2 = mysqli_fetch_assoc(getResult($con, $sql2));
    $grade_class_id = $row2['grade_class_id'];
    $year = $row2['year'];

    $sql3 = "SELECT grade_id FROM grade_class_tbl WHERE grade_class_id='$grade_class_id'";
    if (mysqli_num_rows(getResult($con, $sql3)) == 1) {
        $row3 = mysqli_fetch_assoc(getResult($con, $sql3));
        $grade_id = $row3['grade_id'];

        $sql4 = "SELECT DISTINCT sub_id FROM grade_subject_tbl WHERE year='$year' AND grade_id='$grade_id' ORDER BY order_id ASC";
        $result4 = mysqli_query($con, $sql4);
        if (mysqli_num_rows($result4) > 0) {
            while ($data = mysqli_fetch_assoc($result4)) {
                $sub_id = $data['sub_id'];
                // array_push($pre_sub_array, $sub_id);
                $sql5 = "SELECT DISTINCT * FROM al_marks_tbl WHERE term='$term' AND sub_id='$sub_id' AND std_id='$std_id' AND grade_class_id='$grade_class_id' AND year='$year' AND NOT marks='' ORDER BY term ASC";
                $result5 = mysqli_query($con, $sql5);
                if (mysqli_num_rows($result5) > 0) {
                    while ($row4 = mysqli_fetch_assoc($result5)) {
                        $sid = $row4['sub_id'];
                        $sql6 = "SELECT sub_name, sub_code FROM subject_tbl WHERE sub_id='$sid'";
                        $result6 = mysqli_query($con, $sql6);
                        if (mysqli_num_rows($result6) == 1) {
                            $sname = mysqli_fetch_assoc($result6);
                            $sub_name = $sname['sub_name'];
                            array_push($sub_array, $sname['sub_code']);
                            echo "<tr><td>$sub_name</td>";

                            $sql8 = "SELECT * FROM al_marks_tbl WHERE term='$term' AND year='$year' AND grade_class_id='$grade_class_id'";
                            $result8 = mysqli_query($con, $sql8);
                            if (mysqli_num_rows($result8) > 0) {
                                $sql9 = "SELECT marks FROM al_marks_tbl WHERE term='$term' AND sub_id='$sid' AND std_id='$std_id' AND year='$year'";
                                $result9 = mysqli_query($con, $sql9);
                                if (mysqli_num_rows($result9) == 1) {
                                    $m = mysqli_fetch_assoc($result9);
                                    $marks = $m['marks'];

                                    if ($marks == 0) {
                                        $sql10 = "SELECT * FROM al_absent_tbl WHERE term='$term' AND sub_id='$sid' AND std_id='$std_id' AND year='$year'";
                                        $result8 = mysqli_query($con, $sql10);
                                        if (mysqli_num_rows($result10) == 1) {
                                            echo "<td class='text-center'><b>ab</b></td>
												  <td class='text-center'>-</td></tr>";
                                            array_push($marks_array, 0);
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
                                        array_push($marks_array, $marks);
                                        echo "<td class='text-center'><b>$marks</b></td>
											  <td class='text-center'><b>$grade</b></td></tr>";
                                        $total += $marks;
                                    }
                                    $count += 1;
                                } else {
                                    // raise an error -> no marks for selected year
                                    echo "<script>Swal.fire({icon: 'warning', title: 'Oops...', text: 'No marks for selected year!'});</script>";
                                }
                            } else {
                                // raise an error -> no marks for selected year
                                echo "<script>Swal.fire({icon: 'warning', title: 'Oops...', text: 'No marks for selected year!'});</script>";
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

                // Execute the SQL query to get the rank of the selected student
                $sql11 = "SELECT std_id, SUM(marks) AS total_marks, (SELECT COUNT(*) FROM (SELECT std_id, SUM(marks) AS total_marks FROM al_marks_tbl
				 	    WHERE grade_class_id = '$grade_class_id' AND term='$term' AND year='$year' GROUP BY std_id) AS ranks WHERE total_marks > (SELECT SUM(marks) FROM 
						al_marks_tbl WHERE grade_class_id = '$grade_class_id' AND term='$term' AND year='$year' AND std_id = '$std_id')) + 1 AS rank FROM al_marks_tbl 
						WHERE grade_class_id = '$grade_class_id' AND std_id = '$std_id' AND term='$term' AND year='$year'";
                $result11 = mysqli_query($con, $sql11);

                // Check if the query was successful
                if (!$result11) {
                    die("Query failed: " . mysqli_error($con));
                }

                // Get the rank of the selected student from the result set
                if (
                    mysqli_num_rows($result11) > 0
                ) {
                    $row = mysqli_fetch_assoc($result11);
                    $rank = $row['rank'];
                    // echo "The rank of student $std_id in grade class $grade_class_id is $rank";
                    echo "<td colspan='2' class='text-center'><b>$rank</b></td>
					  </tr>";
                } else {
                    // echo "No results found";
                }
            }

            echo "";

            echo "</tbody>";
        }
    }
} else {
    // no record
}
