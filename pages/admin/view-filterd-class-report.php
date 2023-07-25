<?php

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

    include '../../controls/connection.php';
    $grade_id = $_POST['grade'];
    $class_id = $_POST['class'];
    $year = $_POST['year'];
    $term = $_POST['term'];
    $stream_id = $_POST['stream'];

    // arrays
    $sub_array = array();
    echo "<table class='table table-bordered'>";
    $sql1 = "SELECT sub_id FROM grade_subject_tbl WHERE stream_id='$stream_id' AND year='$year' ORDER BY order_id ASC";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        echo "<thead><tr><th>Admission No.</th><th>Name</th>";
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $sub_id = $row1['sub_id'];
            array_push($sub_array, $sub_id);
            $sql2 = "SELECT * FROM subject_tbl WHERE sub_id='$sub_id'";
            $result2 = mysqli_query($con, $sql2);
            $s_name = mysqli_fetch_assoc($result2);
            if ($s_name['sub_code'] == "") {
                $sub_code = $s_name['sub_name'];
                $sub_name = $s_name['sub_name'];
            } else {
                $sub_name = $s_name['sub_name'];
                $sub_code = $s_name['sub_code'];
            }
            echo "<th title='$sub_name'>$sub_code</th>";
        }
        echo "<th>Total</th><th>Average</th></tr></thead>";
        echo "<tbody><tr>";
        $sql3 = "SELECT grade_class_id, year FROM grade_class_tbl WHERE grade_id='$grade_id' AND class_id='$class_id'";
        $result3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($result3) == 1) {
            $grd_cls = mysqli_fetch_assoc($result3);
            $grade_class_id = $grd_cls['grade_class_id'];
            $al_year = $grd_cls['year'];

            $user = $_SESSION['username'];
            $sql4 = "SELECT * FROM student_tbl st INNER JOIN student_class_tbl sct ON (sct.std_id = st.std_id) WHERE sct.grade_class_id='$grade_class_id'";
            $result4 = mysqli_query($con, $sql4);
            if (mysqli_num_rows($result4) > 0) {
                while ($row2 = mysqli_fetch_assoc($result4)) {
                    $admission_no = $row2['admission_no'];
                    $name_with_init = $row2['name_with_initials'];
                    $full_name = $row2['full_name'];
                    $std_id = $row2['std_id'];
                    echo "<td>$admission_no</td>
                          <td title='$full_name'>$name_with_init</td>";

                    $count = 0;
                    $total = 0;
                    $avg = 0;
                    foreach ($sub_array as $sub_id) {
                        $sql5 = "SELECT marks FROM al_marks_tbl WHERE sub_id='$sub_id' AND std_id='$std_id'  AND term='$term' AND grade_id='$grade_id'";
                        $result5 = mysqli_query($con, $sql5);
                        if (mysqli_num_rows($result5) == 1) {
                            $m = mysqli_fetch_assoc($result5);
                            $marks = $m['marks'];
                            if ($marks == 0) {
                                $sql6 = "SELECT * FROM al_absent_tbl WHERE sub_id='$sub_id' AND std_id='$std_id'  AND term='$term' AND grade_id='$grade_id'";
                                $result6 = mysqli_query($con, $sql6);
                                if (mysqli_num_rows($result6) == 1) {
                                    echo "<td><input type='text' value='ab' class='form-control' name='marks[][$std_id, $sub_id, $term, $year, $grade_id, $class_id]'/></td>";
                                } else {
                                    echo "<td><input type='text' value='0' class='form-control' name='marks[][$std_id, $sub_id, $term, $year, $grade_id, $class_id]'/></td>";
                                }
                                // echo "<td><input type='text' value='' class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                            } elseif ($marks == '') {
                                echo "<td><input type='text' value='' class='form-control' name='marks[][$std_id, $sub_id, $term, $year, $grade_id, $class_id]'/></td>";
                            } else {
                                echo "<td><input type='text' value='$marks' class='form-control' name='marks[][$std_id, $sub_id, $term, $year, $grade_id, $class_id]'/></td>";
                                $total += $marks;
                            }
                            // $count += 1;
                            if ($marks == "") {
                                continue;
                            } else {
                                $count += 1;
                            }
                        } else {
                            echo "<td><input type='text' value='' name='marks[][$std_id, $sub_id, $term, $year, $grade_id, $class_id]' class='form-control'/></td>";
                        }
                    }
                    echo "<td><input type='text' value='" . $total . "' class='form-control' readonly/></td>";
                    if ($count >= 1 && $total >= 1) {
                        $avg = round($total / $count, 2);
                        echo "<td><input type='text' value='" . $avg . "' class='form-control' readonly/></td>";
                    } else {
                        echo "<td><input type='text' value='0' class='form-control' readonly/></td>";
                    }

                    // // Execute the SQL query to get the rank of the selected student
                    // $sql11 = "SELECT std_id, SUM(marks) AS total_marks, (SELECT COUNT(*) FROM (SELECT std_id, SUM(marks) AS total_marks FROM al_marks_tbl
                    //         WHERE term='$term' AND year='$year' GROUP BY std_id) AS ranks WHERE total_marks > (SELECT SUM(marks) FROM 
                    //         al_marks_tbl WHERE term='$term' AND year='$year' AND std_id = '$std_id')) + 1 AS rank FROM al_marks_tbl 
                    //         WHERE std_id = '$std_id' AND term='$term' AND year='$year'";
                    // $result11 = mysqli_query($con, $sql11);


                    // if (mysqli_num_rows($result11) > 0) {
                    //     $row = mysqli_fetch_assoc($result11);
                    //     $rank = $row['rank'];
                    //     // echo "The rank of student $std_id in grade class $grade_class_id is $rank";
                    //     echo "<td><input type='text' value='$rank' class='form-control' readonly/></td>";
                    // } else {
                    //     // echo "No results found";
                    // }
                    echo "</tr>";
                }
            } else {
                // no students assigned to class!
                echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Students Assigned!'});</script>";
            }
        } else {
            // echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Students Assigned for this grade!'});</script>";
            $sub_array2 = array();
            $std_array2 = array();
            $sql4 = "SELECT DISTINCT std_id FROM al_marks_tbl almt INNER JOIN al_subjects_tbl alst ON (almt.sub_id = alst.sub_id) WHERE almt.term='$term' AND almt.grade_id='$grade_id' AND alst.stream_id='$stream_id' AND almt.year='$year' AND almt.class_id='$class_id'";
            $result4 = mysqli_query($con, $sql4);
            if (mysqli_num_rows($result4) > 0) {
                while ($row2 = mysqli_fetch_assoc($result4)) {
                    // array_push($std_array2, $row2['std_id']);
                    $sid = $row2['std_id'];
                    // $subID = $row2['sub_id'];

                    $sql5 = "SELECT admission_no, full_name, name_with_initials FROM student_tbl WHERE std_id='$sid'";
                    $result5 = mysqli_query($con, $sql5);
                    if (mysqli_num_rows($result5) == 1) {
                        $row3 = mysqli_fetch_assoc($result5);
                        $full_name = $row3['full_name'];
                        $name_init = $row3['name_with_initials'];
                        $admissionNO = $row3['admission_no'];
                        echo "<td>$admissionNO</td>
                          <td title='$full_name'>$name_init</td>";

                        $count = 0;
                        $total = 0;
                        $avg = 0;
                        foreach ($sub_array as $subID) {
                            $sql5 = "SELECT marks FROM al_marks_tbl WHERE sub_id='$subID' AND std_id='$sid'  AND term='$term' AND grade_id='$grade_id' AND class_id='$class_id'";
                            $result5 = mysqli_query($con, $sql5);
                            if (mysqli_num_rows($result5) == 1) {
                                $m = mysqli_fetch_assoc($result5);
                                $marks = $m['marks'];
                                if ($marks == 0) {
                                    $sql6 = "SELECT * FROM al_absent_tbl WHERE sub_id='$subID' AND std_id='$sid'  AND term='$term' AND grade_id='$grade_id'";
                                    $result6 = mysqli_query($con, $sql6);
                                    if (mysqli_num_rows($result6) == 1) {
                                        echo "<td><input type='text' value='ab' class='form-control' name='marks[][$sid, $subID, $term, $year, $grade_id, $class_id]'/></td>";
                                    } else {
                                        echo "<td><input type='text' value='0' class='form-control' name='marks[][$sid, $subID, $term, $year, $grade_id, $class_id]'/></td>";
                                    }
                                    // echo "<td><input type='text' value='' class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                                } elseif ($marks == '') {
                                    echo "<td><input type='text' value='' class='form-control number-input' name='marks[][$sid, $sid, $subID, $year, $grade_id, $class_id]'/></td>";
                                } else {
                                    echo "<td><input type='text' value='$marks' class='form-control number-input' name='marks[][$sid, $subID, $term, $year, $grade_id, $class_id]'/></td>";
                                    $total += $marks;
                                }
                                // $count += 1;
                                if ($marks == "") {
                                    continue;
                                } else {
                                    $count += 1;
                                }
                            } else {
                                echo "<td><input type='text' value='' name='marks[][$sid, $subID, $term, $year, $grade_id, $class_id]' class='form-control number-input'/></td>";
                            }
                        }
                    } else {
                        echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Students!'});</script>";
                    }
                    echo "<td><input type='text' value='" . $total . "' class='form-control tot-out' readonly/></td>";
                    if ($count >= 1 && $total >= 1) {
                        $avg = round($total / $count, 2);
                        echo "<td><input type='text' value='" . $avg . "' class='form-control' readonly/></td>";
                    } else {
                        echo "<td><input type='text' value='0' class='form-control' readonly/></td>";
                    }
                    echo "</tr>";
                }
                // // echo "<td>" . $row2['std_id'] . "</td>";
                // array_push($sub_array2, $row2['sub_id']);
                echo "</table>";
            } else {
                echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Records!'});</script>";
            }
            // $sub_array2 = array_unique($sub_array2);
            // $std_array2 = array_unique($std_array2);
            // foreach ($std_array2 as $sid) {
            // }
        }
    } else {
        // no subjects assigned to grades!
        echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Subjects Assigned!'});</script>";
    }
} else {
    header("Location:../../index.php");
    exit;
}