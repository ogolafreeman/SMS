<?php

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

    include '../../controls/connection.php';
    $grade = $_POST['grade'];
    $class_id = $_POST['class'];
    $year = $_POST['year'];
    $term = $_POST['term'];

    // // to get the grade_id from grade_tbl
    // $sql1 = "SELECT grade_id FROM grade_tbl WHERE grade_name='$grade'";
    // $result1 = mysqli_query($con, $sql1);
    // $g_data = mysqli_fetch_assoc($result1);
    // $grade_id = $g_data['grade_id'];

    // echo "<thead><tr><th scope='col'>Admission No.</th><th scope='col'>Full Name</th>"; // DONT FORGET TO CLOSE THE <THEAD> TAG

    // if ($grade >= 12) {
    //     // TO GET THE UNIQUE SUBJECTS IN THE AL_MARKS_TBL
    //     $sql2 = "SELECT DISTINCT sub_id FROM al_marks_tbl";
    //     $result2 = mysqli_query($con, $sql2);
    //     if(mysqli_num_rows($result2) > 0) {
    //         while ($row1 = mysqli_fetch_assoc($result2)) {
    //             $sub_id = $row1['sub_id'];

    //             $sql3 = "SELECT sub_name FROM subject_tbl WHERE sub_id='$sub_id'";
    //             $result3 = mysqli_query($con, $sql3);
    //             $row2 = mysqli_fetch_assoc($result3);
    //             $sub_name = $row2['sub_name'];
    //             echo "<th scope='col'>$sub_name</th>";
    //         }
    //     }
    // }
    // echo "<th scope='col'>Total</th></thead></tr>";
}
