<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    require_once '../controls/connection.php';
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $admission_no = $_POST['admission_no'];
        $full_name = $_POST['full_name'];
        $name_with_init = $_POST['name_with_init'];
        $address = $_POST['address'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $d_o_admission = $_POST['d_o_admission'];

        $current_date = date("Y-m-d"); // for date_updated

        $sql = "UPDATE student_tbl SET admission_no='$admission_no', full_name='$full_name', name_with_initials='$name_with_init',
                address='$address', phone_no_1='$phone1', phone_no_2='$phone2', dob='$dob', email='$email',
                d_o_admission='$d_o_admission', date_updated='$current_date' WHERE std_id='$id'";
        if (mysqli_query($con, $sql)) {
            $sm = "Successfully updated!";
            header("Location: ../pages/admin/view-all-students.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred";
            header("Location: ../pages/admin/view-all-students.php?error=$em");
            exit;
        }
    }

    if(isset($_POST['change_pwd'])) {
        $admin_pwd = $_POST['admin_pwd'];
        $new_pwd = $_POST['new_pwd'];
        $c_new_pwd = $_POST['c_new_pwd'];
        $admission_no = $_GET['admission_no'];

        $sql1 = "SELECT password FROM user_tbl WHERE username='admin'";
        $result1 = mysqli_query($con, $sql1);
        if (mysqli_num_rows($result1)  < 2) {
            $data = mysqli_fetch_assoc($result1);
            $a_pwd = $data['password'];
            if (password_verify($admin_pwd, $a_pwd)) {
                if ($new_pwd == $c_new_pwd) {
                    $sql2 = "UPDATE user_tbl SET password='" . password_hash($new_pwd, PASSWORD_DEFAULT) . "' WHERE admission_no='$admission_no'";
                    if (mysqli_query($con, $sql2)) {
                        $sm = "The password has been changed successfully!";
                        header("Location: ../pages/admin/view-all-students.php?success=$sm");
                        exit;
                    }
                } else {
                    $em = "Enter the New Password Correctly!";
                    header("Location: ../pages/admin/view-all-students.php?error=$em");
                    exit;
                }
            } else {
                $em = "Incorrect Admin Passowrd";
                header("Location: ../pages/admin/view-all-students.php?error=$em");
                exit;
            }
        }
    }

    

} else {
    header("Location:../../login.php");
    exit;
}
