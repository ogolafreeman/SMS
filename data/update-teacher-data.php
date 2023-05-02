<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    require_once '../controls/connection.php';
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
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

        $sql = "UPDATE teacher_tbl SET first_name='$fname', last_name='$lname', nic='$nic', dob='$dob', teacher_no='$t_no',
                app_date='$app_date', rc_app_date='$rc_app_date', email='$email', app_subject='$app_subject', sec_id='$sec_id' WHERE teacher_id='$id'";
        if (mysqli_query($con, $sql)) {
            $sm = "Successfully updated!";
            header("Location: ../pages/admin/view-all-teachers.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred";
            header("Location: ../pages/admin/view-all-teachers.php?error=$em");
            exit;
        }
    }

    if (isset($_POST['change_pwd'])) {
        $admin_pwd = $_POST['admin_pwd'];
        $new_pwd = $_POST['new_pwd'];
        $c_new_pwd = $_POST['c_new_pwd'];
        $nic = $_GET['nic'];

        $sql1 = "SELECT password, nic FROM user_tbl WHERE username='admin'";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1)  < 2) {
            $data = mysqli_fetch_assoc($result1);
            $a_pwd = $data['password'];
            if (password_verify($admin_pwd, $a_pwd)) {
                if ($new_pwd == $c_new_pwd) {
                    $sql2 = "UPDATE user_tbl SET password='" . password_hash($new_pwd, PASSWORD_DEFAULT) . "' WHERE nic='$nic'";
                    if (mysqli_query($con, $sql2)) {
                        $sm = "The password has been changed successfully!";
                        header("Location: ../pages/admin/view-all-teachers.php?success=$sm");
                        exit;
                    }
                } else {
                    $em = "Enter the New Password Correctly!";
                    header("Location: ../pages/admin/view-all-teachers.php?error=$em");
                    exit;
                }
            } else {
                $em = "Incorrect Admin Passowrd";
                header("Location: ../pages/admin/view-all-teachers.php?error=$em");
                exit;
            }
        }
    }
} else {
    header("Location:../../login.php");
    exit;
}
