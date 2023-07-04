<?php

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['teacher_role'])) {

    include '../../controls/connection.php';
    $grade = $_POST['grade'];
    $term = $_POST['term'];
    $username = $_SESSION['username'];
    // arrays
    $sub_array = array();
    $std_array = array();

    echo "<thead><tr><th>Admission No.</th><th>Name</th>";

    $alyear = "";
    $stream_id = "";
    $sql1 = "SELECT staff_id FROM staff_tbl st INNER JOIN user_tbl ut ON (st.nic = ut.nic) WHERE ut.username='$username'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1) == 1) {
        $row1 = mysqli_fetch_assoc($result1);
        $staff_id = $row1['staff_id'];

        $sql2 = "SELECT * FROM student_class_tbl sct INNER JOIN grade_class_tbl gct ON (sct.grade_class_id = gct.grade_class_id) WHERE gct.staff_id='$staff_id'";
        $result2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $std_id = $row2['std_id'];
                $grade_class_id = $row2['grade_class_id'];
                $class_id = $row2['class_id'];
                // $grade_id = $row2['grade_id'];
                $alyear = $row2['year'];
                array_push($std_array, $std_id);

                $sql3 = "SELECT stream_id FROM class_stream_tbl WHERE class_id='$class_id'";
                $result3 = mysqli_query($con, $sql3);
                if (mysqli_num_rows($result3) == 1) {
                    $row3 = mysqli_fetch_assoc($result3);
                    $stream_id = $row3['stream_id'];
                    // echo "$stream_id";
                    $sql4 = "SELECT sub_id FROM grade_subject_tbl WHERE stream_id='$stream_id' AND grade_id='$grade' ORDER BY order_id ASC";
                    $result4 = mysqli_query($con, $sql4);
                    if (mysqli_num_rows($result4) > 0) {
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                            $sub_id = $row4['sub_id'];
                            array_push($sub_array, $sub_id);
                        }
                    } else {
                        echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No subjects assigned'});</script>";
                    }
                } else {
                    echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No streams Assigned!'});</script>";
                }
            }

            foreach (array_unique($sub_array) as $subs) {
                $sql5 = "SELECT * FROM subject_tbl WHERE sub_id='$subs'";
                $result5 = mysqli_query($con, $sql5);
                $s_name = mysqli_fetch_assoc($result5);
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
            echo "<tbody><>";

            foreach ($std_array as $std_id) {
                $sql6 = "SELECT * FROM student_tbl WHERE std_id='$std_id'";
                $result6 = mysqli_query($con, $sql6);
                if (mysqli_num_rows($result6) == 1) {
                    $row6 = mysqli_fetch_assoc($result6);
                    $admission_no = $row6['admission_no'];
                    $full_name = $row6['full_name'];
                    $name_with_init = $row6['name_with_initials'];
                    echo "<td title='$admission_no'>$admission_no</td><td title='$full_name'>$name_with_init</td>";

                    $count = 0;
                    $total = 0;
                    $avg = 0;
                    foreach (array_unique($sub_array) as $sub_id) {
                        $sql7 = "SELECT marks FROM al_marks_tbl WHERE sub_id='$sub_id' AND std_id='$std_id'  AND term='$term' AND grade_id='$grade'";
                        $result7 = mysqli_query($con, $sql7);
                        if (mysqli_num_rows($result7) == 1) {
                            $m = mysqli_fetch_assoc($result7);
                            $marks = $m['marks'];
                            if ($marks == 0) {
                                $sql8 = "SELECT * FROM al_absent_tbl WHERE sub_id='$sub_id' AND std_id='$std_id'  AND term='$term' AND grade_id='$grade'";
                                $result8 = mysqli_query($con, $sql8);
                                if (mysqli_num_rows($result6) == 1) {
                                    echo "<td><input type='text' value='ab' class='form-control' name='marks[][$std_id, $sub_id, $term, $alyear, $grade]'/></td>";
                                } else {
                                    echo "<td><input type='text' value='0' class='form-control' name='marks[][$std_id, $sub_id, $term, $alyear, $grade]'/></td>";
                                }
                                // echo "<td><input type='text' value='' class='form-control' name='marks[][$std_id, $sub_id, $grade_class_id, $term, $year]'/></td>";
                            } elseif ($marks == '') {
                                echo "<td><input type='text' value='' class='form-control' name='marks[][$std_id, $sub_id, $term, $alyear, $grade]'/></td>";
                            } else {
                                echo "<td><input type='text' value='$marks' class='form-control' name='marks[][$std_id, $sub_id, $term, $alyear, $grade]'/></td>";
                                $total += $marks;
                            }
                            // $count += 1;
                            if ($marks == "") {
                                continue;
                            } else {
                                $count += 1;
                            }
                        } else {
                            echo "<td><input type='text' value='' name='marks[][$std_id, $sub_id, $term, $alyear, $grade]' class='form-control'/></td>";
                        }
                    }
                    echo "<td><input type='text' value='" . $total . "' class='form-control' readonly/></td>";
                    if ($count >= 1 && $total >= 1) {
                        $avg = round($total / $count, 2);
                        echo "<td><input type='text' value='" . $avg . "' class='form-control' readonly/></td>";
                    } else {
                        echo "<td><input type='text' value='0' class='form-control' readonly/></td>";
                    }
                    echo "</tr>";
                }
            }
        } else {
            // raise an error -> no students assigned
            echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Students Assigned!'});</script>";
        }
    } else {
        // raise an error -> no teacher
        echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Teachers'});</script>";
    }
}
