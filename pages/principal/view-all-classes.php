<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['principal_role'])) {
    include '../../controls/connection.php';
    include '../../data/admin_operations.php';
    $classes = getAllClasses();
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
        <title>All Classes - Principal's Portal</title>
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
                <h1 class="mt-4">All Classes</h1>
                <ol class="breadcrumb mb-4">
                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['admin_role'] ?> </b> !</li> -->
                </ol>

                <div class="container mt-5">
                    <!-- <a href="teacher.php" class="btn btn-dark">Go Back</a><br><br> -->

                    <form method="post" class="p-3 mt-5 form-w">
                        <div class="mb-3 section">
                            <label class="form-label">Select a Section</label>
                            <select name="section" class="form-select sec" required>
                                <option value="1">Grade 6 - 11</option>
                                <option value="2">Grade 12 - 13</option>
                            </select>
                        </div><br />
                    </form>

                    <?php if ($classes) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">Grade</th>
                                    <!-- <th scope="col">Section</th> -->
                                    <th scope="col">Class</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Class Teacher</th>
                                </tr>
                            </thead>
                            <tbody id="t">
                                <?php
                                foreach ($classes as $class) {
                                    $grade_id = $class[1];
                                    $class_id = $class[2];
                                    $year = $class[3];
                                    $teacher_id = $class[4];

                                    // query to get the grade name using grade_id from grade_tbl
                                    $sql1 = "SELECT grade_name FROM grade_tbl WHERE grade_id='$grade_id'";
                                    $result1 = mysqli_query($con, $sql1);
                                    if (mysqli_num_rows($result1) == 1) {
                                        $d = mysqli_fetch_assoc($result1);
                                        $grade_name = $d['grade_name'];


                                        // query to get the class name using class_id from class_tbl
                                        $sql2 = "SELECT class_name FROM class_tbl WHERE class_id='$class_id'";
                                        $result2 = mysqli_query($con, $sql2);
                                        if (mysqli_num_rows($result2) == 1) {
                                            $d = mysqli_fetch_assoc($result2);
                                            $class_name = $d['class_name'];

                                            // query to get the class teacher's name using teacher_id from teacher_tbl
                                            $sql3 = "SELECT first_name, last_name FROM staff_tbl WHERE staff_id='$teacher_id'";
                                            $result3 = mysqli_query($con, $sql3);
                                            if (mysqli_num_rows($result3) == 1) {
                                                $d = mysqli_fetch_assoc($result3);
                                                $teacher_name = $d['first_name'] . " " . $d['last_name'];

                                                echo "<tr>
                                                            <td>" . $grade_name . "</td>
                                                            <td>" . $class_name . "</td>
                                                            <td>" . $year . "</td>
                                                            <td>" . $teacher_name . "</td>
                                                      </tr>";
                                            } else {
                                                // raise an error -> no record in teacher_tbl
                                                echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Teachers!'});</script>";
                                            }
                                        } else {
                                            // raise an error -> no record in class_tbl
                                            echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Classes!'});</script>";
                                        }
                                    } else {
                                        // raise an error -> no record in grade_tbl
                                        echo "<script>Swal.fire({icon: 'error', title: 'Oh no...', text: 'No Grades!'});</script>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="alert alert-info" role="alert">
                            Empty!
                        </div>
                    <?php } ?>

                </div>

            </div>

            <script>
                $(document).ready(function () {
                    $("select.sec").change(function () {
                        $.ajax({
                            url: "get-table-data.php",
                            type: "POST",
                            data: {
                                choice: $("select.sec").children("option:selected").val(),
                            },
                            success: function (data) {
                                $("#t").html(data);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log("Error: " + textStatus + " - " + errorThrown);
                            }
                        });
                    });
                });
            </script>

            <script src="../../bootstrap/js/bootstrap.bundle.js"></script>
            <!-- footer -->
            <?php include '../footer.php'; ?>
        </div>
        </div>

        <!-- content goes here -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
        <script src="../js/scripts.js"></script>
    </body>

    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>