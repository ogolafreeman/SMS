<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    include '../../data/admin_operations.php';
    include '../../controls/connection.php';
    $id = $_GET['id'];
    $teacher = getTeacherById($id, $con);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="shortcut icon" href="../../Media/Richmond Colleg LOGO.png" type="image/x-icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Teacher's Data - Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="../../js/jquery-3.6.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->
            <div class="container-fluid">
                <h1 class="mt-4">Edit Teacher's Data</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
                </ol>

                <!-- Your further code goes here. keep coding in this div -->
                <div class="container mt-5">
                    <!-- <a href="teacher.php" class="btn btn-dark">Go Back</a><br><br> -->

                    <?php if (isset($_GET['success'])) { ?>
                        <!-- <div class='alert alert-success' role='alert'>
                            <?= $_GET['success'] ?>
                        </div> -->

                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Done',
                                text: "<?= $_GET['success'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <?php if (isset($_GET['error'])) { ?>
                        <!-- <div class='alert alert-danger' role='alert'>
                            <?= $_GET['error'] ?>
                        </div> -->

                        <script>
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "<?= $_GET['error'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <form action="../../data/update-teacher-data.php?id=<?= $teacher['teacher_id'] ?>" method="post" class="shadow p-3  mt-5 form-w">
                        <h3>Teacher's Info</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['first_name'])) {
                                                                                                                        echo $teacher['first_name'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lname" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['last_name'])) {
                                                                                                                        echo $teacher['last_name'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIC</label>
                            <input type="text" name="nic" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['nic'])) {
                                                                                                                        echo $teacher['nic'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['dob'])) {
                                                                                                                        echo $teacher['dob'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teacher Number</label>
                            <input type="text" name="t_no" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['teacher_no'])) {
                                                                                                                        echo $teacher['teacher_no'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Appointment Date</label>
                            <input type="date" name="app_date" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['app_date'])) {
                                                                                                                            echo $teacher['app_date'];
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">RC Appointment Date</label>
                            <input type="date" name="rc_app_date" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['rc_app_date'])) {
                                                                                                                                echo $teacher['rc_app_date'];
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['email'])) {
                                                                                                                            echo $teacher['email'];
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Appointed Subject</label>
                            <select name="app_subject" class="form-select" required>
                                <option value="Subject 1" <?php if (!isset($_GET['error']) && !empty($teacher['rc_app_date'])) {
                                                                if ($teacher['app_subject'] == 'Subject 1') echo ' selected="selected"';
                                                            } ?>>Subject 1</option>
                                <option value="Subject 2" <?php if (!isset($_GET['error']) && !empty($teacher['rc_app_date'])) {
                                                                if ($teacher['app_subject'] == 'Subject 2') echo ' selected="selected"';
                                                            } ?>>Subject 2</option>
                                <option value="Subject 3" <?php if (!isset($_GET['error']) && !empty($teacher['rc_app_date'])) {
                                                                if ($teacher['app_subject'] == 'Subject 3') echo ' selected="selected"';
                                                            } ?>>Subject 3</option>
                                <option value="Subject 4" <?php if (!isset($_GET['error']) && !empty($teacher['rc_app_date'])) {
                                                                if ($teacher['app_subject'] == 'Subject 4') echo ' selected="selected"';
                                                            } ?>>Subject 4</option>
                                <option value="Subject 5" <?php if (!isset($_GET['error']) && !empty($teacher['rc_app_date'])) {
                                                                if ($teacher['app_subject'] == 'Subject 5') echo ' selected="selected"';
                                                            } ?>>Subject 5</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Section ID</label>
                            <input type="text" name="sec_id" class="form-control" autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($teacher['sec_id'])) {
                                                                                                                            echo $teacher['sec_id'];
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        } ?>">
                        </div>

                        <button type="submit" class="btn btn-warning" name="update">Update</button>
                    </form>

                    <form action="../../data/update-teacher-data.php?nic=<?= $teacher['nic'] ?>" method="post" class="shadow p-3  mt-5 form-w">
                        <h3>Change Password</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Admin Password</label>
                            <input type="password" name="admin_pwd" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Passowrd</label>
                            <div class="input-group mb-3">
                                <input type="text" name="new_pwd" class="form-control" id="passInput" required>
                                <button class="btn btn-secondary" id="gBTN">Random</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="c_new_pwd" class="form-control" autocomplete="off" required>
                        </div>
                        <button type="submit" class="btn btn-warning" name="change_pwd">Change</button>
                    </form>
                </div><br />


                <script src="../bootstrap/js/bootstrap.bundle.js"></script>
                <script>
                    var gBTN = document.getElementById('gBTN');
                    gBTN.addEventListener('click', function(e) {
                        e.preventDefault();
                        makePass(5)
                    });

                    function makePass(length) {
                        let result = '';
                        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                        const charactersLength = characters.length;
                        let counter = 0;
                        while (counter < length) {
                            result += characters.charAt(Math.floor(Math.random() * charactersLength));
                            counter += 1;
                        }

                        passInput.value = result;
                    }
                </script>

            </div>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>