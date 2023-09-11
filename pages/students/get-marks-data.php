<?php

include '../../controls/connection.php';
$algrade = $_POST['grade'];
$term = $_POST['term'];
$admission_no = $_POST['admission_no'];

$sub_array = array();
$marks_array = array();
// $pre_sub_array = array();

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


$sql1 = "SELECT * FROM student_tbl st INNER JOIN student_class_tbl sct ON (st.std_id = sct.std_id) WHERE st.admission_no='$admission_no'";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $std_id = $row1['std_id'];
    $admission_no = $row1['admission_no'];
    $full_name = $row1['full_name'];

    $sql2 = "SELECT * FROM grade_class_tbl gct INNER JOIN student_class_tbl sct ON (gct.grade_class_id = sct.grade_class_id) WHERE sct.std_id='$std_id'";
    $result2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($result2) == 1) {
        $row2 = mysqli_fetch_assoc($result2);
        $grade_id = $row2['grade_id'];
        $class_id = $row2['class_id'];
        $year = $row2['year'];

        // echo "<div class='row'>
        // 				<div class='col-md-5'>
        //                     <h5>Name: <span style='color: red'>$full_name</span></h5>
        //                 </div>
        // 				<div class='col-md-3'>
        //                     <h5>Year: <span style='color: red'>$res_year</span></h5>
        //                 </div>
        // 				<div class='col-md-3'>
        //                     <h5>Term: <span style='color: red'>$term</span></h5>
        //                 </div>
        // 		</div>";

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
        $sql3 = "SELECT DISTINCT sub_id FROM grade_subject_tbl WHERE year='$year' AND grade_id='$grade_id' ORDER BY order_id ASC";
        $result3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($result3) > 0) {
            while ($row3 = mysqli_fetch_assoc($result3)) {
                $sub_id = $row3['sub_id'];
                // array_push($pre_sub_array, $sub_id);
                $sql4 = "SELECT * FROM al_marks_tbl WHERE term='$term' AND sub_id='$sub_id' AND std_id='$std_id' AND year='$year' AND grade_id='$algrade' AND NOT marks=''";
                $result4 = mysqli_query($con, $sql4);
                if (mysqli_num_rows($result4) > 0) {
                    while ($row4 = mysqli_fetch_assoc($result4)) {
                        $sid = $row4['sub_id'];
                        $sql4 = "SELECT sub_name, sub_code FROM subject_tbl WHERE sub_id='$sid'";
                        $result4 = mysqli_query($con, $sql4);
                        if (mysqli_num_rows($result4) == 1) {
                            $sname = mysqli_fetch_assoc($result4);
                            $sub_name = $sname['sub_name'];
                            array_push($sub_array, $sname['sub_code']);
                            echo "<tr><td>$sub_name</td>";

                            $sql5 = "SELECT marks FROM al_marks_tbl WHERE sub_id='$sid' AND term='$term' AND std_id='$std_id' AND year='$year' AND grade_id='$algrade'";
                            $result5 = mysqli_query($con, $sql5);
                            if (mysqli_num_rows($result5) == 1) {
                                $m = mysqli_fetch_assoc($result5);
                                $marks = $m['marks'];

                                if ($marks == 0) {
                                    $sql6 = "SELECT * FROM al_absent_tbl WHERE sub_id='$sid' AND term='$term' AND std_id='$std_id' AND year='$year' AND grade_id='$algrade'";
                                    $result6 = mysqli_query($con, $sql6);
                                    if (mysqli_num_rows($result6) == 1) {
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
                                // raise an error -> no marks for this term
                            }
                        } else {
                            // raise an error -> no subjects
                        }
                    }
                } else {
                    // raise an error -> no marks for this term
                }
            }
            $avg = 0;
            if ($total > 0 && $count > 1) {
                $avg = round($total / $count, 2);

                echo "<tr><td> </td>  <td> </td>  <td> </td></tr>";
                echo "<tr>
						<td>Total Marks</td>
						<td colspan='2' class='text-center'><b>$total</b></td>
					  </tr>";
                echo "<tr>
						<td>Average Marks</td>
						<td colspan='2' class='text-center'><b>$avg</b></td>
					  </tr>";
                // echo "<tr>
                // 		<td>Rank</td>";

                // RANK
                // 	// Execute the SQL query to get the rank of the selected student
                // 	$sql7 = "SELECT std_id, SUM(marks) AS total_marks, (SELECT COUNT(*) FROM (SELECT std_id, SUM(marks) AS total_marks FROM al_marks_tbl
                // 	 	    WHERE term='$term' AND year='$year' GROUP BY std_id) AS ranks WHERE total_marks > (SELECT SUM(marks) FROM 
                // 			al_marks_tbl WHERE term='$term' AND year='$year' AND std_id = '$std_id')) + 1 AS rank FROM al_marks_tbl 
                // 			WHERE std_id = '$std_id' AND term='$term' AND year='$year'";
                // 	$result7 = mysqli_query($con, $sql7);

                // 	// Check if the query was successful
                // 	if (!$result7) {
                // 		die("Query failed: " . mysqli_error($con));
                // 	}

                // 	// Get the rank of the selected student from the result set
                // 	if (mysqli_num_rows($result7) > 0) {
                // 		$row = mysqli_fetch_assoc($result7);
                // 		$rank = $row['rank'];
                // 		// echo "The rank of student $std_id in grade class $grade_class_id is $rank";
                // 		echo "<td colspan='2' class='text-center'><b>$rank</b></td>
                // 		  </tr>";
                // 	} else {
                // 		// echo "No results found";
                // 	}
            }
            echo "</tbody></table>";
            echo "<a href='analytics.php' class='mt-4 btn btn-info'>Go to Analytics Page</a>";
        } else {
            // raise an error -> no subjects assigned for this grade
        }
    } else {
        // raise an error -> no class
    }
} else {
    // raise an error -> no students
}
