<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['student_role'])) {
    include '../../data/admin_operations.php';
    include '../../controls/connection.php';
    $admission_no = $_SESSION['username'];
    $sql = "SELECT * FROM student_tbl WHERE admission_no='$admission_no'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $student = getStudentById($row['std_id'], $con);
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
        <title>Settings - Student Portal</title>
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
                <h1 class="mt-4">Settings</h1>
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
                <!-- Your further code goes here. keep coding in this div -->
                <div class="container mt-3">
                    <form
                        action="../../data/change-std-password.php?id=<?= $student['std_id'] ?>&admission=<?= $student['admission_no'] ?>"
                        method="post" class="shadow p-3  mt-5 form-w">
                        <h3>Change Password</h3>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" readonly value="<?= $_SESSION['username'] ?>"
                                autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" name="old_pwd" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Passowrd</label>
                            <div class="input-group mb-3">
                                <input type="text" name="new_pwd" class="form-control" id="passInput" required>
                                <button class="btn btn-secondary" id="gBTN">Random</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="c_new_pwd" class="form-control" autocomplete="off" required>
                        </div>
                        <button type="submit" class="btn btn-warning" name="change_pwd">Change</button>
                    </form>
                </div><br />


                <script src="../../bootstrap/js/bootstrap.bundle.js"></script>

            </div>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <script src="../js/scripts.js"></script>
        <script>
            var gBTN = document.getElementById('gBTN');
            gBTN.addEventListener('click', function (e) {
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
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>