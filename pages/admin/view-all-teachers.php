<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {

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
        <title>All Staff Members - Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="../../js/jquery-3.6.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            body {
                /* background: #DCDCDC; */
                margin-top: 20px;
            }

            .card-box {
                padding: 20px;
                border-radius: 3px;
                margin-bottom: 30px;
                background: rgb(245, 245, 245);
            }

            .thumb-lg {
                height: 150px;
                width: 150px;
            }

            .img-thumbnail {
                padding: .25rem;
                background-color: rgb(245, 245, 245);
                /* border: 1px solid #dee2e6; */
                border-radius: .25rem;
                /* max-width: 100%; */
                /* height: auto; */
            }

            .text-pink {
                color: #ff679b !important;
            }

            .btn-rounded {
                border-radius: 2em;
            }

            .text-muted {
                color: #98a6ad !important;
            }

            h4 {
                line-height: 22px;
                font-size: 18px;
            }
        </style>
    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->
            <div class="container-fluid">
                <h1 class="mt-4">All Staff Members</h1>
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
                                <th scope="col">Name</th>
                                <th scope="col">NIC</th>
                                <th scope="col">Staff No.</th>
                                <th scope="col">Role</th>
                                <th scope="col">Appointed Subject</th>
                                <th scope="col">Section</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../controls/connection.php';
                            $count = 1;
                            foreach ($teachers as $teacher) {
                                $sql = "SELECT sub_name FROM subject_tbl WHERE sub_id='" . $teacher[9] . "'";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) == 1) {
                                    $d = mysqli_fetch_assoc($result);
                                    $sub_name = $d['sub_name'];
                                } else {
                                    $sub_name = "";
                                }

                                $nic = $teacher[3];
                                $sql1 = "SELECT role FROM user_role_tbl urt INNER JOIN user_tbl ut ON (ut.role_id = urt.role_id) WHERE (ut.nic='$nic')";
                                $result1 = mysqli_query($con, $sql1);
                                $d = mysqli_fetch_assoc($result1);
                                $role =  $d['role'];

                                $sec_id = $teacher[11];
                                $sql2 = "SELECT sec_name FROM section_tbl WHERE sec_id='$sec_id'";
                                $result2 = mysqli_query($con, $sql2);
                                $d = mysqli_fetch_assoc($result2);
                                $sec_name = $d['sec_name'];

                            ?>

                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $teacher[1] . " " . $teacher[2]; ?></td>
                                    <td><?php echo $teacher[3]; ?></td>
                                    <td><?php echo $teacher[5]; ?></td>
                                    <td><?php echo $role; ?></td>
                                    <td><?php echo $sub_name; ?></td>
                                    <td><?php echo $sec_name; ?></td>
                                    <td>
                                        <a class="btn btn-info" name="profile" href="view-teacher-info.php?id=<?= $teacher[0] ?>">Profile</a>
                                        <a class="btn btn-warning" name="edit" href="edit_teacher.php?id=<?= $teacher[0] ?>">Edit</a>
                                        <a class="btn btn-danger" name="delete" href="delete_teacher.php?id=<?= $teacher[0] ?>">Delete</a>
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