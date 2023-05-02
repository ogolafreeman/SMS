<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {

    include '../../data/admin_operations.php';
    $teachers = getAllTeachers();
    // print_r($teachers);
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
        <title>All Teachers - Admin</title>
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
                <h1 class="mt-4">All Teachers</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
                </ol>

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
                        </ /?=$_GET['error'] ?>
                    </div> -->

                    <script>
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "<?= $_GET['error'] ?>"
                            })
                        </script>
                <?php } ?>

                <!-- Your further code goes here. keep coding in this div -->
                <?php if ($teachers) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">NIC</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Teacher No.</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">RC Appointment Date</th>
                                <!-- <th scope="col">Email</th> -->
                                <th scope="col">Appointed Subject</th>
                                <th scope="col">Section ID</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($teachers as $teacher) { ?>
                                <tr>
                                    <th scope="row"><?php echo $teacher[0]; ?></th>
                                    <td><?php echo $teacher[1]; ?></td>
                                    <td><?php echo $teacher[2]; ?></td>
                                    <td><?php echo $teacher[3]; ?></td>
                                    <td><?php echo $teacher[4]; ?></td>
                                    <td><?php echo $teacher[5]; ?></td>
                                    <td><?php echo $teacher[6]; ?></td>
                                    <td><?php echo $teacher[7]; ?></td>
                                    <!-- <td><?php echo $teacher[8]; ?></td> -->
                                    <td><?php echo $teacher[9]; ?></td>
                                    <td><?php echo $teacher[10]; ?></td>
                                    <td>
                                        <a class="btn btn-warning" name="edit" href="edit_teacher.php?id=<?= $teacher[0] ?>">Edit</a>
                                        <a class="btn btn-danger" name="delete" href="delete_teacher.php?id=<?= $teacher[0] ?>">Delete</a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                <?php } ?>


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