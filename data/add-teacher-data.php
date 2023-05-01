<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {

    require_once '../controls/connection.php';
    if (isset($_POST['add'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic = $_POST['nic'];
        $dob = $_POST['dob'];
        $t_no = $_POST['t_no'];
        $app_date = $_POST['app_date'];
        $rc_app_date = $_POST['rc_app_date'];
        $email = $_POST['email'];
        $app_subject = $_POST['app_subject'];
        $sec_id = $_POST['sec_id'];

        $sql1 = "SELECT * FROM teacher_tbl tt INNER JOIN user_tbl ut ON 
        (tt.nic = ut.nic) WHERE (tt.teacher_no = '$t_no')";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1) < 1) {
            $sql2 = "INSERT INTO teacher_tbl (first_name, last_name, nic, dob, teacher_no, app_date, rc_app_date, email, app_subject, sec_id)
                     VALUES ('$fname', '$lname', '$nic', '$dob', '$t_no', '$app_date', '$rc_app_date', '$email', '$app_subject', '$sec_id')";
            if (mysqli_query($con, $sql2)) {
                $sql3 = "INSERT INTO user_tbl (username, password, role_id, admission_no, nic, status) 
                         VALUES ('$nic', '" . password_hash($nic, PASSWORD_DEFAULT) . "', '4', '', '$nic', '1')";
                if (mysqli_query($con, $sql3)) {
                    $sm = "As the new teacher <b>$fname $lname</b> has been successfully registered!";
                    header("Location: ../pages/admin/add-teacher.php?success=$sm");
                    exit;
                } else {
                    $em = "An error occurred";
                    header("Location: ../pages/admin/add-teacher.php?error=$em");
                    exit;
                }
            } else {
                $em = "An error occurred";
                header("Location: ../pages/admin/add-teacher.php?error=$em");
                exit;
            }
        } else {
            $em = "$fname $lname already exist!";
            header("Location: ../pages/admin/add-teacher.php?error=$em");
            exit;
        }
    }
} else {
    header("Location:../../login.php");
    exit;
}
