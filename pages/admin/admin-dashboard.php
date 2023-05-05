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
        <title>Dashboard - Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
                    <li class="breadcrumb-item">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li>
                </ol>

                <!-- Your further code goes here. keep coding in this div -->

                <div class="row">
                    <div class="col-md-3">
                      <div class="card-counter primary">
                        <!-- <i class="fa fa-code-fork"></i> -->
                        <i style="opacity: 0.4;" class="fa-solid fa-school fs-1"></i>
                        <span class="count-numbers"><?=getFullNumOfClasses() ?></span>
                        <span class="count-name">Classes</span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card-counter danger">
                        <!-- <i class="fa fa-ticket fs-1"></i> -->
                        <i style="opacity: 0.4;" class="fa-solid fa-chalkboard-user fs-1"></i>
                        <span class="count-numbers"><?=getFullNumOfTeachers() ?></span>
                        <span class="count-name">Teachers</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card-counter success">
                        <!-- <i class="fa fa-database  fs-1"></i> -->
                        <i style="opacity: 0.4;" class="fa-solid fa-graduation-cap fs-1"></i>
                        <span class="count-numbers"><?=getFullNumOfStudents() ?></span>
                        <span class="count-name">Students</span>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card-counter info">
                        <i style="opacity: 0.4;" class="fa fa-users  fs-1"></i>
                        <span class="count-numbers"><?=getFullNumOfUsers() ?></span>
                        <span class="count-name">Users</span>
                      </div>
                    </div>
                </div>


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