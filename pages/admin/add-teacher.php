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
        <title>Add a New Teacher - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
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
                <h1 class="mt-4">Add a New Teacher</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
                </ol>

                <!-- Your further code goes here. keep coding in this div -->
                <div class="container mt-5">
                    <!-- <a href="teacher.php" class="btn btn-dark">Go Back</a><br><br> -->

                    <?php if (isset($_GET['success'])) { ?>
                        <!-- <div class='alert alert-danger' role='alert'>
                            <//?= $_GET['error'] ?>
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
                            <//?= $_GET['error'] ?>
                          </div> -->

                        <script>
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "<?= $_GET['error'] ?>"
                            })
                        </script>
                    <?php } ?>

                    <form action="" method="post" class="shadow p-3  mt-5 form-w">
                        <h3>Fill all the Data</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="fname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIC</label>
                            <input type="text" name="nic" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teacher Number</label>
                            <input type="text" name="t_no" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Appointment Date</label>
                            <input type="date" name="app_date" class="form-control">
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Passowrd</label>
                            <div class="input-group mb-3">
                                <input type="text" name="pswd" class="form-control" id="passInput">
                                <button class="btn btn-secondary" id="gBTN">Random</button>
                            </div>
                        </div> -->
                        <div class="mb-3">
                            <label class="form-label">RC Appointment Date</label>
                            <input type="date" name="rc_app_date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>


                <script src="../bootstrap/js/bootstrap.bundle.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#navLinks li:nth-child(2) a").addClass('active');
                    });
                    var gBTN = document.getElementById('gBTN');

                    gBTN.addEventListener('click', function(e) {
                        e.preventDefault();
                        makePass(5)
                    });

                    function makePass(length) {
                        let result = '';
                        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                        const charactersLength = characters.length;
                        let counter = 0;
                        while (counter < length) {
                            result += characters.charAt(Math.floor(Math.random() * charactersLength));
                            counter += 1;
                        }

                        passInput.value = result;
                    }
                </script>




            </div>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>