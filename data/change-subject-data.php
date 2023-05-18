<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

    require_once '../controls/connection.php';
    if (isset($_POST['change'])) {
        $grade_id = $_GET['grade_id'];
        $stream_id = $_GET['stream_id'];
        $subjects = $_POST['subject'];
        $year = date("Y");

        $sql1 = "SELECT sub_id FROM al_subjects_tbl WHERE stream_id='$stream_id'";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            while ($all_subs = mysqli_fetch_assoc($result1)) {
                if (in_array($all_subs['sub_id'], $subjects)) {
                    // yes
                    foreach ($subjects as $sub) {
                        // check if the subject is not in grade_subject_tbl, then add new subject from the list
                        $sql2 = "SELECT * FROM grade_subject_tbl WHERE grade_id='$grade_id' AND sub_id='$sub'";
                        $result2 = mysqli_query($con, $sql2);
                        if (mysqli_num_rows($result2) < 1) {
                            $sql3 = "INSERT INTO grade_subject_tbl (grade_id, stream_id, year, sub_id) VALUES ('$grade_id', '$stream_id', '$year', '$sub')";
                            $result3 = mysqli_query($con, $sql3);
                        } else {
                            continue;
                        }
                    }
                } else {
                    // no
                    $sql3 = "SELECT sub_id FROM grade_subject_tbl WHERE grade_id='$grade_id' AND sub_id='" . $all_subs['sub_id'] . "'";
                    $result3 = mysqli_query($con, $sql3);
                    if (mysqli_num_rows($result3) > 0) {
                        // delete the record from grade_subject_tbl
                        $sql4 = "DELETE FROM grade_subject_tbl WHERE sub_id='" . $all_subs['sub_id'] . "'";
                        $result4 = mysqli_query($con, $sql4);
                    } else {
                        continue;
                    }
                }
            }
        }

        if ($result3 || $result4) {
            $sm = "Done!";
            header("Location: ../pages/admin/assign-to-class.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred!";
            header("Location: ../pages/admin/assign-to-class.php?error=$em");
            exit;
        }
    }
}
