<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['student_role'])) {
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
        <title>Dashboard - Student Portal</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../../js/jquery-3.6.3.min.js"></script>

    </head>

    <body class="sb-nav-fixed">

        <?php include '../top-navbar.php'; ?>
        <?php include 'left-side-bar.php'; ?>
        <?php include '../../data/admin-data.php'; ?>

        <div id="layoutSidenav_content">

            <!-- content goes here. do not remove any code -->
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Welcome back,
                        <b>
                            <?php
                            $sql1 = "SELECT name_with_initials FROM student_tbl WHERE admission_no='" . $_SESSION['username'] . "'";
                            $result1 = mysqli_query($con, $sql1);
                            $data = mysqli_fetch_assoc($result1);
                            echo $data['name_with_initials'];
                            ?>
                        </b> !
                    </li>
                </ol>

                <div class="container mt-5">
                    <!-- <div class="row">
                        <div class="col-sm-12 col-lg-9"></div>
                        <div class="col-sm-12 col-lg-3">
                            <?php include 'calendar.php'; ?>
                        </div>
                    </div> -->

                    <?php
                    include '../../controls/connection.php';
                    $sql1 = "SELECT std_id FROM student_tbl WHERE admission_no='" . $_SESSION['username'] . "'";
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1) == 1) {
                        $row1 = mysqli_fetch_assoc($result1);
                        $sql2 = "SELECT * FROM student_marks_watched_tbl WHERE is_watched='0' AND std_id='" . $row1['std_id'] . "'";
                        $result2 = mysqli_query($con, $sql2);
                        if (mysqli_num_rows($result2) == 1) {
                            $row2 = mysqli_fetch_assoc($result2);
                            $term = $row2['term'];
                            echo "<script>
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'info',
                                        title: '$term Test Marks Released! Do you want to check it now?',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes',
                                        denyButtonText: `No`,
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = 'show-marks.php';
                                        }
                                        })
                              </script>";
                        }
                    }
                    ?>

                </div>

                <!-- Your further code goes here. keep coding in this div -->




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