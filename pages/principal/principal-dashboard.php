<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['principal_role'])) {
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
        <title>Dashboard - Principal's Portal</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="../../js/jquery-3.6.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <li class="breadcrumb-item">Welcome back, <b>
                            <?php
                            $sql1 = "SELECT first_name, last_name FROM staff_tbl WHERE nic='" . $_SESSION['username'] . "'";
                            $result1 = mysqli_query($con, $sql1);
                            $data = mysqli_fetch_assoc($result1);
                            echo $data['first_name'] . " " . $data['last_name'];
                            ?>
                        </b>!
                    </li>
                </ol>

                <!-- Your further code goes here. keep coding in this div -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <!-- <i class="fa fa-code-fork"></i> -->
                            <i style="opacity: 0.4;" class="fa-solid fa-school fa-4x"></i>
                            <span class="count-numbers"><?= getFullNumOfClasses() ?></span>
                            <span class="count-name">Classes</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <!-- <i class="fa fa-ticket fs-1"></i> -->
                            <i style="opacity: 0.4;" class="fa-solid fa-chalkboard-user fa-4x"></i>
                            <span class="count-numbers"><?= getFullNumOfTeachers() ?></span>
                            <span class="count-name">Staff Members</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter success">
                            <!-- <i class="fa fa-database  fs-1"></i> -->
                            <i style="opacity: 0.4;" class="fa-solid fa-graduation-cap fa-4x"></i>
                            <span class="count-numbers"><?= getFullNumOfStudents() ?></span>
                            <span class="count-name">Students</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter info">
                            <i style="opacity: 0.4;" class="fa fa-users  fa-4x"></i>
                            <span class="count-numbers"><?= getFullNumOfUsers() ?></span>
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

        <!-- <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'You Logged in successfully'
      })
    </script> -->

    </body>

    </html>

<?php } else {
    header("Location: ../../login.php");
    exit;
}
?>