<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

    require_once '../controls/connection.php';
    if (isset($_POST['add'])) {

        if (preg_match('/^[a-zA-Z]+$/', $_POST['fname']) && preg_match('/^[a-zA-Z]+$/', $_POST['lname'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
        } else {
            $em = "White Spaces and Special Characters are not allowed";
            header("Location: ../pages/admin/add-teacher.php?error=$em");
            exit;
        }

        if ((strlen($_POST['nic']) <= 12 && strlen($_POST['nic']) >= 9) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['nic'])) {
            $nic = $_POST['nic'];
        } else {
            $em = "Enter a Valid NIC Number!";
            header("Location: ../pages/admin/add-teacher.php?error=$em");
            exit;
        }

        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];
        // $nic = $_POST['nic'];
        $dob = $_POST['dob'];
        $t_no = $_POST['t_no'];
        $app_date = $_POST['app_date'];
        $rc_app_date = $_POST['rc_app_date'];
        $email = $_POST['email'];
        $app_subject = $_POST['app_subject'];
        $sec_id = $_POST['sec_id'];
        $role_id = $_POST['type'];
        $qualifications = $_POST['qualifications'];

        $name = $_FILES['pic']['name'];
        $type = $_FILES['pic']['type'];
        $error = $_FILES['pic']['error'];

        if (!file_exists("../uploads")) {
            mkdir("../uploads", 0777, true);
        }

        if ($error > 0) {
            // without profile pic
            $sql1 = "SELECT * FROM staff_tbl st INNER JOIN user_tbl ut ON (st.nic = ut.nic) WHERE (st.staff_no = '$t_no') OR (st.nic = '$nic')";
            $result1 = mysqli_query($con, $sql1);
            if (mysqli_num_rows($result1) < 1) {
                $sql2 = "INSERT INTO staff_tbl (first_name, last_name, nic, dob, staff_no, app_date, rc_app_date, email, app_subject, sec_id, status, qualifications, profile_pic)
                     VALUES ('$fname', '$lname', '$nic', '$dob', '$t_no', '$app_date', '$rc_app_date', '$email', '$app_subject', '$sec_id', '1', '$qualifications', '')";
                if (mysqli_query($con, $sql2)) {
                    $sql3 = "INSERT INTO user_tbl (username, password, role_id, admission_no, nic) 
                         VALUES ('$nic', '" . password_hash($nic, PASSWORD_DEFAULT) . "', '$role_id', '', '$nic')";
                    if (mysqli_query($con, $sql3)) {
                        $sm = "As the new teacher $fname $lname has been successfully registered!";
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
        } else {
            // with profile pic
            $temp2 = explode(".", $name);
            $filename = "../uploads/$nic." . $temp2[1];

            // resize the image
            if ($type == 'image/jpeg' || $type == 'image/png') {
                // Get the file size
                $file_size = $_FILES['pic']['size'];

                // Get the temporary file name
                $tmp_name = $_FILES['pic']['tmp_name'];

                // Set the maximum file size (in bytes)
                $max_size = 2000000;
                if ($file_size <= $max_size) {
                    // Set the new width and height 
                    $new_width = 320;
                    $new_height = 320;
                    // Get the original image dimensions 
                    list($width, $height) = getimagesize($tmp_name);
                    // Create a new image with the new dimensions 
                    $new_image = imagecreatetruecolor($new_width, $new_height);
                    // Load the original image
                    if ($type == 'image/jpeg') {
                        $original_image = imagecreatefromjpeg($tmp_name);
                    } else {
                        $original_image = imagecreatefrompng($tmp_name);
                    }
                    // Resize the original image to the new dimensions
                    imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    // Save the new image 
                    if ($type == 'image/jpeg') {
                        imagejpeg($new_image, $filename);
                    } else {
                        imagepng($new_image, $filename);
                    }
                    // Free up memory 
                    imagedestroy($original_image);
                    imagedestroy($new_image);
                    // Display a success message 

                    $sql1 = "SELECT * FROM staff_tbl st INNER JOIN user_tbl ut ON (st.nic = ut.nic) WHERE (st.staff_no = '$t_no' AND st.nic = '$nic')";
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1) < 1) {
                        $sql2 = "INSERT INTO staff_tbl (first_name, last_name, nic, dob, staff_no, app_date, rc_app_date, email, app_subject, sec_id, status, qualifications, profile_pic)
                     VALUES ('$fname', '$lname', '$nic', '$dob', '$t_no', '$app_date', '$rc_app_date', '$email', '$app_subject', '$sec_id', '1', '$qualifications', '$filename')";
                        if (mysqli_query($con, $sql2)) {
                            $sql3 = "INSERT INTO user_tbl (username, password, role_id, admission_no, nic) 
                         VALUES ('$nic', '" . password_hash($nic, PASSWORD_DEFAULT) . "', '$role_id', '', '$nic')";
                            if (mysqli_query($con, $sql3)) {
                                $sm = "As the new teacher $fname $lname has been successfully registered!";
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
                } else {
                    $em = " File size is too large. (File size < 2MB)";
                    header("Location: ../pages/admin/add-teacher.php?error=$em");
                    exit;
                }
            } else {
                // Display an error message if the file is not an image 
                $em = "File is not an image. Images Only.";
                header("Location: ../pages/admin/add-teacher.php?error=$em");
                exit;
            }
        }
    }
} else {
    header("Location:../../login.php");
    exit;
}
