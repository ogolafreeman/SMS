<?php

include '../../controls/connection.php';
$year = $_POST['res_year'];
$query = $_POST['query'];

// array
$sub_array = array();
$marks_array = array();
$term_array = array();
// $pre_sub_array = array();

$sql1 = "SELECT std_id, full_name, admission_no FROM student_tbl WHERE admission_no='$query' AND status='1'";
$result1 = mysqli_query($con, $sql1);
if (mysqli_num_rows($result1) == 1) {
    $st_data = mysqli_fetch_assoc($result1);
    $std_id = $st_data['std_id'];
    $admission_no = $st_data['admission_no'];
    $full_name = $st_data['full_name'];

    $sql12 = "SELECT * FROM student_class_tbl WHERE std_id='$std_id'";
    $result12 = mysqli_query($con, $sql12);
    if (mysqli_num_rows($result12) == 1) {
        $gc_data = mysqli_fetch_assoc($result12);
        $grade_class_id = $gc_data['grade_class_id'];
        $year = $gc_data['year'];

        $sql3 = "SELECT grade_id, class_id FROM grade_class_tbl WHERE grade_class_id='$grade_class_id'";
        $result3 = mysqli_query($con, $sql3);
        if (mysqli_num_rows($result3) == 1) {
            $d = mysqli_fetch_assoc($result3);
            $grade_id = $d['grade_id'];
            $class_id = $d['class_id'];

            $sql4 = "SELECT grade_name FROM grade_tbl WHERE grade_id='$grade_id'";
            $result4 = mysqli_query($con, $sql4);
            $d = mysqli_fetch_assoc($result4);
            $grade_name = $d['grade_name'];

            $sql5 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
            $result5 = mysqli_query($con, $sql5);
            $d = mysqli_fetch_assoc($result5);
            $class_name = $d['class_name'];

            echo "<div class='row'>
						<div class='col-md-5'>
                            <h5>Name: <span style='color: red'>$full_name</span></h5>
                        </div>
						<div class='col-md-3'>
                            <h5>Year: <span style='color: red'>$year</span></h5>
                        </div>
				</div>";

            $sql5 = "SELECT DISTINCT term FROM al_marks_tbl WHERE std_id='$std_id' AND year='$year'";
            $result5 = mysqli_query($con, $sql5);
            if (mysqli_num_rows($result5) > 0) {
                while ($row1 = mysqli_fetch_assoc($result5)) {
                    array_push($term_array, $row1['term']);
                }
            }
        }
    }
}
