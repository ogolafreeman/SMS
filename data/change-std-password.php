<?php
if (isset($_POST['change_pwd'])) {
    require_once '../controls/connection.php';
    $old_pwd = $_POST['old_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $c_new_pwd = $_POST['c_new_pwd'];
    $std_id = $_GET['id'];
    $admission_no = $_GET['admission'];

    $sql1 = "SELECT password, admission_no FROM user_tbl WHERE username='$admission_no'";
    $result1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($result1)  < 2) {
        $data = mysqli_fetch_assoc($result1);
        $o_pwd = $data['password'];
        if (password_verify($old_pwd, $o_pwd)) {
            if ($new_pwd == $c_new_pwd) {
                $sql2 = "UPDATE user_tbl SET password='" . password_hash($new_pwd, PASSWORD_DEFAULT) . "' WHERE admission_no='$admission_no'";
                if (mysqli_query($con, $sql2)) {
                    $sm = "The password has been changed successfully!";
                    header("Location: ../pages/students/settings.php?success=$sm");
                    exit;
                }
            } else {
                $em = "Enter the New Password Correctly!";
                header("Location: ../pages/admin/settings.php?error=$em");
                exit;
            }
        } else {
            $em = "Incorrect Old Passowrd";
            header("Location: ../pages/admin/settings.php?error=$em");
            exit;
        }
    }
}
