<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['admin_role'])) {
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
        <title>Add Grades - Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <script src="../../js/jquery-3.6.3.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->
            <div class="container-fluid">
                <h1 class="mt-4">Add Grades</h1>
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

                    <form action="../../data/add-grades-data.php" method="post" class="shadow p-3  mt-5 form-w">
                        <!-- <h3>Fill all the Data</h3> -->
                        <!-- <hr> -->
                        <div class="mb-3">
                            <label class="form-label">Grade</label>
                            <select name="grade" class="form-select gradeSelect" required>
                                <!-- <?php
                                for ($i = 1; $i <= 13; $i++) {
                                    echo "<option value='$i'>Grade $i</option>";
                                }
                                ?> -->
                                <option value='12'>Grade 12</option>
                                <option value='13'>Grade 13</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Grade Head</label>
                            <select name="teacher" class="form-select" required>
                                <?php
                                include '../../controls/connection.php';
                                // $sql1 = "SELECT role FROM user_role_tbl urt INNER JOIN user_tbl ut ON (ut.role_id = urt.role_id) WHERE (ut.nic='$nic')";
                                $sql1 = "SELECT * FROM staff_tbl WHERE status='1'";
                                $result1 = mysqli_query($con, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $staff_id = $row1['staff_id'];
                                        $nic = $row1['nic'];
                                        $name = $row1['first_name'] . " " . $row1['last_name'];
                                        $sql2 = "SELECT role FROM user_role_tbl urt INNER JOIN user_tbl ut ON (ut.role_id = urt.role_id) WHERE (ut.nic='$nic')";
                                        $result2 = mysqli_query($con, $sql2);
                                        if (mysqli_num_rows($result2) == 1) {
                                            $row2 = mysqli_fetch_assoc($result2);
                                            if ($row2['role'] != 'Admin' && $row2['role'] != 'Principal') {
                                                echo "<option value='$staff_id'>$name</option>";
                                            } else {
                                                continue;
                                            }
                                        } else {
                                            echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Teachers!'});</script>";
                                        }
                                    }
                                } else {
                                    echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Teachers!'});</script>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                    </form>
                </div>
            </div><br />

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>

    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>