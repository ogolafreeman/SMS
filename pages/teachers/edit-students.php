<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['teacher_role'])) {
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
        <link rel="shortcut icon"
            href="https://img.freepik.com/free-vector/hand-drawn-high-school-logo-template_23-2149689290.jpg?w=900&t=st=1694450465~exp=1694451065~hmac=7a936b09b3a1b26e48c21cff671f711ffc7577f0e79a5b62864237f7f0f81168"
            type="image/x-icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Students's Data - Teacher's Portal</title>
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
                <h1 class="mt-4">Edit Students's Data</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
                </ol>

                <!-- Your further code goes here. keep coding in this div -->
                <div class="container mt-3">
                    <a class='btn btn-primary' href='view-all-students.php'>Go Back</a>

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

                    <form action="../../data/update-student-data.php?id=<?= $student['std_id'] ?>" method="post"
                        class="shadow p-3  mt-3 form-w">
                        <h3>Students's Info</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Admission No.</label>
                            <input type="text" readonly name="admission_no" class="form-control" autocomplete="off" required
                                value="<?php if (!isset($_GET['error']) && !empty($student['admission_no'])) {
                                    echo $student['admission_no'];
                                } else {
                                    echo "";
                                } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" autocomplete="off" required
                                value="<?php if (!isset($_GET['error']) && !empty($student['full_name'])) {
                                    echo $student['full_name'];
                                } else {
                                    echo "";
                                } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name with Initials</label>
                            <input type="text" name="name_with_init" class="form-control" autocomplete="off" required
                                value="<?php if (!isset($_GET['error']) && !empty($student['name_with_initials'])) {
                                    echo $student['name_with_initials'];
                                } else {
                                    echo "";
                                } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" required
                                    name='address'><?php if (!isset($_GET['error']) && !empty($student['address'])) {
                                        echo $student['address'];
                                    } else {
                                        echo "";
                                    } ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone - Home</label>
                            <input type="text" name="phone1" class="form-control" autocomplete="off" required
                                value="<?php if (!isset($_GET['error']) && !empty($student['phone_no_1'])) {
                                    echo $student['phone_no_1'];
                                } else {
                                    echo "";
                                } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone - Mobile</label>
                            <input type="text" name="phone2" class="form-control" autocomplete="off" required
                                value="<?php if (!isset($_GET['error']) && !empty($student['phone_no_2'])) {
                                    echo $student['phone_no_2'];
                                } else {
                                    echo "";
                                } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" autocomplete="off" required
                                value="<?php if (!isset($_GET['error']) && !empty($student['dob'])) {
                                    echo $student['dob'];
                                } else {
                                    echo "";
                                } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" value="<?php if (!isset($_GET['error']) && !empty($student['email'])) {
                                echo $student['email'];
                            } else {
                                echo "";
                            } ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Admission</label>
                            <input type="date" name="d_o_admission" class="form-control" autocomplete="off" required
                                value="<?php if (!isset($_GET['error']) && !empty($student['d_o_admission'])) {
                                    echo $student['d_o_admission'];
                                } else {
                                    echo "";
                                } ?>">
                        </div>

                        <button type="submit" class="btn btn-warning" name="update">Update</button>
                    </form>
                </div><br />


                <script src="../bootstrap/js/bootstrap.bundle.js"></script>
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