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
        <title>All Grades - Admin</title>
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
                	<h1 class="mt-4">All Grades</h1>
	                <ol class="breadcrumb mb-4">
	                    <!-- <li class="breadcrumb-item active">Welcome back, <b> <?= $_SESSION['role'] ?> </b> !</li> -->
	                </ol>

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

                    <form method="post" class="p-3 mt-5 form-w">
                        <div class="mb-3 section">
                            <label class="form-label">Select a Section</label>
                            <select name="section" class="form-select sec" required>
                                <option value="1">Grade 6 - 11</option>
                                <option value="2">Grade 12 - 13</option>
                            </select>
                        </div><br/>
                    </form>

                    <?php //if ($grades) { ?>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Grade</th>
                              <th scope="col">Section</th>
                              <th scope="col">Year</th>
                              <th scope="col">Teacher</th>
                            </tr>
                          </thead>
                          <tbody id="t">
                            
                          </tbody>
                        </table>
                    <?php //} ?>

                </div>

            	</div>

                <script>
                    $(document).ready(function() {
                        $("select.sec").change(function() {
                            //var selected = $(this).children("option:selected").val();
                                $.ajax({
                                  url: "get-table-data.php",
                                  type: "POST",
                                  data: {
                                    choice: $("select.sec").children("option:selected").val(),
                                  },
                                  success: function(data) {
                                    $("#t").html(data);
                                  },
                                  error: function(jqXHR, textStatus, errorThrown) {
                                    console.log("Error: " + textStatus + " - " + errorThrown);
                                  }
                                });      
                        });
                    });
                </script>


                <script src="../bootstrap/js/bootstrap.bundle.js"></script>
                <!-- footer -->
                <?php include '../footer.php'; ?>
            </div>
        </div>

        <!-- content goes here -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>
    </body>
    </html>

<?php } else {
    header("Location:../../login.php");
    exit;
}
?>