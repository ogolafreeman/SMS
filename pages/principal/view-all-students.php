<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['principal_role'])) {

    include '../../data/admin_operations.php';
    $students = getAllStudents();
    // print_r($students);
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
        <title>All students - Principal's Portal</title>
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
                <h1 class="mt-4">All students</h1>
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
                <?php if ($students) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Admission No.</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Phone - Home</th>
                                <th scope="col">Date of Admission</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($students as $student) { ?>
                                <tr>
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td><?php echo $student[1]; ?></td>
                                    <td><?php echo $student[2]; ?></td>
                                    <td><?php echo $student[5]; ?></td>
                                    <td><?php echo $student[9]; ?></td>
                                    <td>
                                        <a class="btn btn-info" name="profile" href="view-student-info.php?id=<?= $student[0] ?>">Profile</a>
                                        <!-- <a class="btn btn-warning" name="edit" href="edit-students.php?id=<?= $student[0] ?>">Edit</a>
                                        <a class="btn btn-danger" name="delete" href="delete-student.php?id=<?= $student[0] ?>">Delete</a> -->
                                    </td>
                                </tr>

                            <?php $count += 1;
                            } ?>

                        </tbody>
                    </table>

                <?php } else { ?>
                    <div class="alert alert-info" role="alert">
                        Empty!
                    </div>
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