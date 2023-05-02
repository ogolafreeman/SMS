<?php
session_start();
require_once '../controls/connection.php';

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $uname = $_POST['username'];
        $pswd = $_POST['password'];
        // $role = $_POST['role'];

        // $sql = "SELECT * FROM user_tbl WHERE username='$uname'";
        $sql = "SELECT * FROM user_tbl ut INNER JOIN user_role_tbl urt ON 
        (ut.role_id = urt.role_id) WHERE (ut.username = '$uname')";

        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $sql2 = "SELECT role FROM user_role_tbl WHERE role_id='" . $data['role_id'] . "'";
            $result2 = mysqli_query($con, $sql2);
            $role_data = mysqli_fetch_assoc($result2);
            $role = $role_data['role'];
            $usrname = $data['username'];
            $pwd = $data['password'];

            if ($usrname == $uname) {
                if (password_verify($pswd, $pwd)) {
                    $_SESSION['username'] = $usrname;
                    $_SESSION['role'] = $role;
                    if ($role == 'Admin') {
                        header("Location: ../pages/admin/admin-dashboard.php");
                        exit;
                    } else if ($role == 'Principal') {
                        header("Location: ../pages/principal-dashboard.php");
                        exit;
                    } else if ($role == 'Section Head') {
                        header("Location: ../pages/section-head-dashboard.php");
                        exit;
                    } else if ($role == 'Teacher') {
                        header("Location: ../pages/teachers/teacher-dashboard.php");
                        exit;
                    } else {
                        header("Location: ../pages/students/student-dashboard.php");
                        exit;
                    }
                } else {
                    $em = "Incorrect Password";
                    header("Location: ../login.php?error=$em");
                    exit;
                }
            } else {
                $em = "Incorrect Username!";
                header("Location: ../login.php?error=$em");
                exit;
            }
        } else {
            $em = "Incorrect Username / Password or Role!";
            header("Location: ../login.php?error=$em");
            exit;
        }
    } else {
        $em = "All fields are required!";
        header("Location: ../login.php?error=$em");
        exit;
    }
}
