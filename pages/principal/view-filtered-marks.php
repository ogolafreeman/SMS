<?php

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['principal_role'])) {

    include '../../controls/connection.php';
    $grade = $_POST['grade'];
    $class_id = $_POST['class'];
    $year = $_POST['year'];
    $term = $_POST['term'];
    $stream_id = $_POST['stream'];

    // arrays
    $sub_array = array();
    $class_name = "";

    $sql9 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
    $result9 = mysqli_query($con, $sql9);
    if (mysqli_num_rows($result9) == 1) {
        $d = mysqli_fetch_assoc($result9);
        $class_name = $d['class_name'];
    }

    $sql1 = "SELECT grade_id FROM grade_tbl WHERE grade_name='$grade'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) == 1) {
        $g = mysqli_fetch_assoc($result1);
        $grade_id = $g['grade_id'];

        $sql2 = "SELECT sub_id FROM grade_subject_tbl WHERE stream_id='$stream_id' AND grade_id='$grade_id' AND year='$year' ORDER BY order_id ASC";
        $result2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            echo "<thead><tr><th>Admission No.</td><th>Name</td>";
            while ($row1 = mysqli_fetch_assoc($result2)) {
                $sub_id = $row1['sub_id'];
                array_push($sub_array, $sub_id);
                $sql3 = "SELECT sub_code FROM subject_tbl WHERE sub_id='$sub_id'";
                $result3 = mysqli_query($con, $sql3);
                $s_name = mysqli_fetch_assoc($result3);
                $sub_name = $s_name['sub_code'];

                echo "<th>$sub_name</td>";
            }
            echo "<th>Total</th><th>Average</th><th>Rank</th></tr></thead>";
            //     $sql = "SELECT * FROM user_tbl ut INNER JOIN user_role_tbl urt ON 
            // (ut.role_id = urt.role_id) WHERE (ut.username = '$uname')";
            $sql4 = "SELECT grade_class_id FROM grade_class_tbl WHERE grade_id='$grade_id' AND class_id='$class_id' AND year='$year'";
            $result4 = mysqli_query($con, $sql4);
            if (mysqli_num_rows($result4) == 1) {
                $grd_cls = mysqli_fetch_assoc($result4);
                $grade_class_id = $grd_cls['grade_class_id'];

                echo "<tbody><tr>";

                $sql5 = "SELECT std_id FROM student_class_tbl WHERE grade_class_id='$grade_class_id'";
                $result5 = mysqli_query($con, $sql5);
                if (mysqli_num_rows($result5) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result5)) {
                        $std_id = $row2['std_id'];
                        $sql6 = "SELECT std_id, admission_no, full_name FROM student_tbl WHERE status='1' AND std_id='$std_id' ORDER BY admission_no ASC";
                        $result6 = mysqli_query($con, $sql6);
                        if (mysqli_num_rows($result6)  == 1) {
                            $std = mysqli_fetch_assoc($result6);
                            $admission_no = $std['admission_no'];
                            $full_name = $std['full_name'];
                            // $std_id = $std['std_id'];
                            echo "<td>$admission_no</td>
                                  <td>$full_name</td>";
                            $count = 0;
                            $total = 0;
                            $avg = 0;
                            foreach ($sub_array as $sub_id) {
                                $sql10 = "SELECT * FROM al_marks_tbl WHERE year='$year' AND term='$term' AND grade_class_id='$grade_class_id'";
                                $result10 = mysqli_query($con, $sql10);
                                if (mysqli_num_rows($result10) > 0) {
                                    $sql7 = "SELECT marks FROM al_marks_tbl WHERE sub_id='$sub_id' AND std_id='$std_id' AND year='$year' AND term='$term'";
                                    $result7 = mysqli_query($con, $sql7);
                                    if (mysqli_num_rows($result7) == 1) {
                                        $m = mysqli_fetch_assoc($result7);
                                        $marks = $m['marks'];
                                        // echo "<td>$marks</td>";
                                        if ($marks == 0) {
                                            $sql8 = "SELECT * FROM al_absent_tbl WHERE sub_id='$sub_id' AND std_id='$std_id' AND year='$year' AND term='$term'";
                                            $result8 = mysqli_query($con, $sql8);
                                            if (mysqli_num_rows($result8) == 1) {
                                                echo "<td><input type='text' value='ab' readonly class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                                            } else {
                                                echo "<td><input type='text' value='0' readonly class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                                            }
                                            // echo "<td><input type='text' value='' class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                                        } elseif ($marks == '') {
                                            echo "<td><input type='text' value='' readonly class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                                        } else {
                                            echo "<td><input type='text' value='$marks' readonly class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                                            $total += $marks;
                                        }
                                        // $count += 1;
                                        if ($marks == "") {
                                            continue;
                                        } else {
                                            $count += 1;
                                        }
                                    } else {
                                        echo "<td><input type='text' value='' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]' readonly class='form-control'/></td>";
                                    }
                                } else {
                                    echo "<script>Swal.fire({icon: 'warning', title: 'Oops...', text: 'No marks found for this term!'});</script>";
                                    echo "<td><input type='text' value='' readonly name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]' class='form-control'/></td>";
                                }
                            }
                            echo "<td><input type='text' value='" . $total . "' class='form-control' readonly/></td>";
                            if ($count >= 1 && $total >= 1) {
                                $avg = round($total / $count, 2);
                                echo "<td><input type='text' value='" . $avg . "' class='form-control' readonly/></td>";
                            } else {
                                echo "<td><input type='text' value='0' class='form-control' readonly/></td>";
                            }

                            // Execute the SQL query to get the rank of the selected student
                            $sql11 = "SELECT std_id, SUM(marks) AS total_marks, (SELECT COUNT(*) FROM (SELECT std_id, SUM(marks) AS total_marks FROM al_marks_tbl
                            WHERE grade_class_id = '$grade_class_id' AND term='$term' AND year='$year' GROUP BY std_id) AS ranks WHERE total_marks > (SELECT SUM(marks) FROM 
                            al_marks_tbl WHERE grade_class_id = '$grade_class_id' AND term='$term' AND year='$year' AND std_id = '$std_id')) + 1 AS rank FROM al_marks_tbl 
                            WHERE grade_class_id = '$grade_class_id' AND std_id = '$std_id' AND term='$term' AND year='$year'";
                            $result11 = mysqli_query($con, $sql11);


                            if (mysqli_num_rows($result11) > 0) {
                                $row = mysqli_fetch_assoc($result11);
                                $rank = $row['rank'];
                                // echo "The rank of student $std_id in grade class $grade_class_id is $rank";
                                echo "<td><input type='text' value='$rank' class='form-control' readonly/></td>";
                            } else {
                                // echo "No results found";
                            }
                            echo "</tr>";
                        } else {
                            // raise an error -> no student record in student_tbl
                            echo "<script>Swal.fire({icon: 'warning', title: 'Oops...', text: 'No Students!'});</script>";
                        }
                    }
                    echo "</tbody>";
                } else {
                    // raise an error -> no records in student_class_tbl
                    // echo "<script>Swal.fire({icon: 'warning', title: 'Oops...', text: 'No Records!'});</script>";
                }
            } else {
                // raise an error -> no records or multiple items deteced in grade_tbl
                // $em = "no records or multiple items deteced in grade_tbl";
                // header("Location: show-marks.php?error=$em");
                // exit;
            }
        } else {
            // no subjects assigned to grades!
            echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Subjects Assigned!'});</script>";
        }
    } else {
        // raise an error -> no record in grade_tbl
        echo "<script>Swal.fire({icon: 'error', title: 'Oops...', text: 'No Grades'});</script>";
    }
}
