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
        <link rel="shortcut icon" href="https://img.freepik.com/free-vector/hand-drawn-pencil-high-school-logo_23-2149689302.jpg?w=900&t=st=1694527035~exp=1694527635~hmac=8e02c01f5752c7f5d7ff35f802f5c0943179870c4028ad3a81221ef9cc71300d" type="image/x-icon">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Upgrade - Admin</title>
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
                <h1 class="mt-4">Upgrade</h1>

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

                <form method="post" class="shadow p-3  mt-5 form-w" id="form" action="../../data/pass_to_up.php">
                    <!-- <h3>Apply Filters</h3> -->
                    <!-- <hr> -->
                    <div class="mb-3">
                        <label class="form-label">Grade</label>
                        <select name="grade" class="form-select gradeSelect" id='grade' required>
                            <option>-- Select Grade --</option>
                            <?php
                            include '../../controls/connection.php';
                            $sql = "SELECT DISTINCT grade_id FROM grade_class_tbl";
                            $result = mysqli_query($con, $sql);
                            while ($ri = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $ri['grade_id']; ?>"><?php echo $ri['grade_id']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" id="pass" name="pass" class="btn btn-primary">Pass</button>
                </form>

            </div>

            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#pass").hide();
                $(".gradeSelect").change(function () {
                    var grade = Number($("select.gradeSelect").children("option:selected").val());
                    if (grade <= 12 && grade > 0) {
                        $("#pass").show();
                        $("#pass").text("Pass to Grade " + (grade + 1));
                    }
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>

    </html>

<?php } else {
    header("Location: ../../login.php");
    exit;
}
?>