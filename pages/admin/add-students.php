<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
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
        <title>Add a New Student - Admin</title>
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
                <h1 class="mt-4">Add a New Student</h1>
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

                    <form action="../../data/add-student-data.php" method="post" class="shadow p-3  mt-5 form-w">
                        <h3>Fill all the Data</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Admission No.</label>
                            <input type="text" name="admission_no" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name with Initials</label>
                            <input type="text" name="name_with_init" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" required name='address'></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone - Home</label>
                            <input type="text" name="phone1" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone - Mobile</label>
                            <input type="text" name="phone2" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Admission</label>
                            <input type="date" name="d_o_admission" class="form-control" autocomplete="off" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Passowrd</label>
                            <div class="input-group mb-3">
                                <input type="text" name="pswd" class="form-control" id="passInput">
                                <button class="btn btn-secondary" id="gBTN">Random</button>
                            </div>
                        </div> -->

                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                    </form>
                </div><br />


                <script src="../bootstrap/js/bootstrap.bundle.js"></script>

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