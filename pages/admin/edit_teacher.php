<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {
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
        <link rel="shortcut icon" href="https://img.freepik.com/free-vector/hand-drawn-pencil-high-school-logo_23-2149689302.jpg?w=900&t=st=1694527035~exp=1694527635~hmac=8e02c01f5752c7f5d7ff35f802f5c0943179870c4028ad3a81221ef9cc71300d" type="image/x-icon">
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
                <div class="container mt-3">
                    <a class='btn btn-primary' href='view-all-teachers.php'>Go Back</a>

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

                    <form action="../../data/update-teacher-data.php?id=<?= $teacher['staff_id'] ?>" method="post"
                        class="shadow p-3  mt-3 form-w">
                        <h3>Profile Settings</h3>
                        <hr>

                        <div class="container rounded bg-white mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-3 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                        <img src="../<?php if (!isset($_GET['error']) && !empty($teacher['profile_pic'])) {
                                            echo $teacher['profile_pic'];
                                        } else {
                                            echo "../Media/dummy.jpg";
                                        } ?>" class="rounded-circle mt-5" width="250px"
                                            alt="profile picture" height="250px">
                                        <h4 class="font-weight-bold mt-3">
                                            <?php if (!isset($_GET['error']) && !empty($teacher['first_name'] && !empty($teacher['last_name']))) {
                                                echo $teacher['first_name'] . " " . $teacher['last_name'];
                                            } else {
                                                echo "";
                                            } ?>
                                        </h4>
                                        <h6 class="text-black-50">
                                            <?php if (!isset($_GET['error']) && !empty($teacher['nic'])) {
                                                // echo $teacher['email'];
                                                // $sql = "SELECT * FROM user_tbl ut INNER JOIN user_role_tbl urt ON (ut.role_id = urt.role_id) WHERE (ut.username = '$uname')";
                                                $nic = $teacher['nic'];
                                                $sql1 = "SELECT role FROM user_role_tbl urt INNER JOIN user_tbl ut ON (ut.role_id = urt.role_id) WHERE (ut.nic='$nic')";
                                                $result1 = mysqli_query($con, $sql1);
                                                $d = mysqli_fetch_assoc($result1);
                                                echo $d['role'];
                                            } else {
                                                echo "";
                                            } ?>
                                        </h6>
                                        <span> </span>
                                    </div>
                                </div>
                                <div class="col-md-5 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Personal Info</h4>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="labels">First Name</label>
                                                <input type="text" name="fname" class="form-control" autocomplete="off"
                                                    required
                                                    value="<?php if (!isset($_GET['error']) && !empty($teacher['first_name'])) {
                                                        echo $teacher['first_name'];
                                                    } else {
                                                        echo "";
                                                    } ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="labels">Last Name</label>
                                                <input type="text" name="lname" class="form-control" autocomplete="off"
                                                    value="<?php if (!isset($_GET['error']) && !empty($teacher['last_name'])) {
                                                        echo $teacher['last_name'];
                                                    } else {
                                                        echo "";
                                                    } ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label class="labels">NIC</label>
                                                <input type="text" name="nic" class="form-control" autocomplete="off"
                                                    required
                                                    value="<?php if (!isset($_GET['error']) && !empty($teacher['nic'])) {
                                                        echo $teacher['nic'];
                                                    } else {
                                                        echo "";
                                                    } ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="labels">Date of Birth</label>
                                                <input type="date" name="dob" class="form-control" autocomplete="off"
                                                    required
                                                    value="<?php if (!isset($_GET['error']) && !empty($teacher['dob'])) {
                                                        echo $teacher['dob'];
                                                    } else {
                                                        echo "";
                                                    } ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="labels">Email</label>
                                                <input type="email" name="email" class="form-control" autocomplete="off"
                                                    required
                                                    value="<?php if (!isset($_GET['error']) && !empty($teacher['email'])) {
                                                        echo $teacher['email'];
                                                    } else {
                                                        echo "";
                                                    } ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label">Professional Qualifications</label>
                                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                                                    name='qualifications'><?php if (!isset($_GET['error']) && !empty($teacher['qualifications'])) {
                                                        echo $teacher['qualifications'];
                                                    } else {
                                                        echo "";
                                                    } ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center experience">
                                            <h4 class="text-right">School Info</h4>
                                        </div><br>
                                        <div class="col-md-12">
                                            <label class="form-label">Staff Number</label>
                                            <input type="text" name="t_no" class="form-control" autocomplete="off" required
                                                value="<?php if (!isset($_GET['error']) && !empty($teacher['staff_no'])) {
                                                    echo $teacher['staff_no'];
                                                } else {
                                                    echo "";
                                                } ?>">
                                        </div> <br>
                                        <div class="col-md-12">
                                            <label class="form-label">Appointment Date</label>
                                            <input type="date" name="app_date" class="form-control" autocomplete="off"
                                                required
                                                value="<?php if (!isset($_GET['error']) && !empty($teacher['app_date'])) {
                                                    echo $teacher['app_date'];
                                                } else {
                                                    echo "";
                                                } ?>">
                                        </div><br>
                                        <div class="col-md-12">
                                            <label class="form-label">RC Appointment Date</label>
                                            <input type="date" name="rc_app_date" class="form-control" autocomplete="off"
                                                required
                                                value="<?php if (!isset($_GET['error']) && !empty($teacher['rc_app_date'])) {
                                                    echo $teacher['rc_app_date'];
                                                } else {
                                                    echo "";
                                                } ?>">
                                        </div><br>
                                        <div class="col-md-12">
                                            <label class="form-label">Appointed Subject</label>
                                            <select name="app_subject" class="form-select" required>
                                                <?php
                                                if (!isset($_GET['error']) && !empty($teacher['app_subject'])) {
                                                    // echo $teacher['sec_id'];
                                                    $sql = "SELECT * FROM subject_tbl";
                                                    $result = mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result)) {
                                                        while ($d = mysqli_fetch_assoc($result)) {
                                                            // echo $d['sec_name'];
                                                            ?>
                                                            <option value="<?php echo $d['sub_id']; ?>" <?php if ($teacher['app_subject'] == $d['sub_id'])
                                                                   echo " selected"; ?>><?php echo $d['sub_name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Section</label>
                                            <select name="sec_id" class="form-select" required>
                                                <?php
                                                if (!isset($_GET['error']) && !empty($teacher['sec_id'])) {
                                                    // echo $teacher['sec_id'];
                                                    $sql = "SELECT * FROM section_tbl";
                                                    $result = mysqli_query($con, $sql);
                                                    if (mysqli_num_rows($result)) {
                                                        while ($d = mysqli_fetch_assoc($result)) {
                                                            // echo $d['sec_name'];
                                                            ?>
                                                            <option value="<?php echo $d['sec_id']; ?>" <?php if ($teacher['sec_id'] == $d['sec_id'])
                                                                   echo " selected"; ?>><?php echo $d['sec_name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-warning profile-button" type="submit"
                                        name='update'>Save Profile</button></div>
                            </div>
                        </div>
                        <!-- </div>
            </div> -->
                    </form>

                    <form action="../../data/update-teacher-data.php?nic=<?= $teacher['nic'] ?>" method="post"
                        class="shadow p-3  mt-5 form-w">
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
                    gBTN.addEventListener('click', function (e) {
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>