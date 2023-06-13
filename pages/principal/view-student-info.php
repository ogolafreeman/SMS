<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['principal_role'])) {
    include '../../data/admin_operations.php';
    include '../../controls/connection.php';
    $id = $_GET['id'];
    $student = getStudentById($id, $con);
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
        <title><?php echo $student['name_with_initials']; ?>'s Profile - Principal's Portal</title>
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
                <h1 class="mt-4">Student Profile</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
                </ol>

                <!-- Your further code goes here. keep coding in this div -->
                <div class="container mt-3">
                    <a class='btn btn-primary' href='view-all-students.php'>Go Back</a>
                    <!-- <a class='btn btn-warning' href='edit-students.php?id=<?= $student['std_id'] ?>'>Edit Profile</a> -->

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

                    <form method="post" class="shadow p-3  mt-3 form-w">
                        <!-- <h3>Student Profile</h3>
                        <hr> -->

                        <div class="container rounded bg-white mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-3 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                        <img src="../../Media/graduate.png" class="rounded-circle mt-5" width="250px" alt="profile picture" height="250px">
                                        <h4 class="font-weight-bold mt-3"><?php if (!isset($_GET['error']) && !empty($student['name_with_initials'])) {
                                                                                echo $student['name_with_initials'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?></h4>
                                        <h6 class="text-black-50">Student</h6>
                                        <span> </span>
                                    </div>
                                </div>
                                <div class="col-md-5 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Personal Info</h4>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label class="labels">Full Name</label>
                                                <input type="text" class="form-control" autocomplete="off" readonly required value="<?php if (!isset($_GET['error']) && !empty($student['full_name'])) {
                                                                                                                                        echo $student['full_name'];
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    } ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="labels">Name with Initials</label>
                                                <input type="text" class="form-control" autocomplete="off" readonly value="<?php if (!isset($_GET['error']) && !empty($student['name_with_initials'])) {
                                                                                                                                echo $student['name_with_initials'];
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label class="labels">Address</label>
                                                <textarea class="form-control" id="floatingTextarea2" readonly style="height: 100px"><?php if (!isset($_GET['error']) && !empty($student['address'])) {
                                                                                                                                            echo $student['address'];
                                                                                                                                        } else {
                                                                                                                                            echo "";
                                                                                                                                        } ?></textarea>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="labels">Phone - Home</label>
                                                <input type="date" class="form-control" autocomplete="off" readonly required value="<?php if (!isset($_GET['error']) && !empty($student['phone_no_1'])) {
                                                                                                                                        echo $student['dob'];
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    } ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="labels">Phone - Mobile</label>
                                                <input type="date" class="form-control" autocomplete="off" readonly required value="<?php if (!isset($_GET['error']) && !empty($student['phone_no_2'])) {
                                                                                                                                        echo $student['dob'];
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    } ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="labels">Email</label>
                                                <input type="email" class="form-control" autocomplete="off" readonly required value="<?php if (!isset($_GET['error']) && !empty($student['email'])) {
                                                                                                                                            echo $student['email'];
                                                                                                                                        } else {
                                                                                                                                            echo "";
                                                                                                                                        } ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center experience mb-3">
                                            <h4 class="text-right">School Info</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Admission Number</label>
                                            <input type="text" class="form-control" readonly autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($student['admission_no'])) {
                                                                                                                                    echo $student['admission_no'];
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                } ?>">
                                        </div> <br>
                                        <div class="col-md-12">
                                            <label class="form-label">Date of Admission</label>
                                            <input type="date" class="form-control" readonly autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($student['d_o_admission'])) {
                                                                                                                                    echo $student['d_o_admission'];
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                } ?>">
                                        </div><br>
                                        <div class="col-md-12">
                                            <label class="form-label">Date Added</label>
                                            <input type="date" class="form-control" readonly autocomplete="off" required value="<?php if (!isset($_GET['error']) && !empty($student['date_added'])) {
                                                                                                                                    echo $student['date_added'];
                                                                                                                                } else {
                                                                                                                                    echo "";
                                                                                                                                } ?>">
                                        </div><br>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- </div>
            </div> -->
                    </form>
                </div><br />


                <script src="../../bootstrap/js/bootstrap.bundle.js"></script>

            </div>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <script src="../js/scripts.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>