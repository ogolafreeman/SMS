<!doctype html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="shortcut icon" href="Media/Richmond Colleg LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_home.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Student Management System</title>
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('Media/kids.jpg'); background-position: center; background-size: cover;"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Login to your account</h3>
                        <?php if (isset($_GET['error'])) { ?>
                            <script>
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: "<?= $_GET['error'] ?>"
                                })
                            </script>
                        <?php } ?>
                        <p class="mb-4">Please log in to access your account and manage student information.
                            Teachers can enter term test marks, while students can view their marks and track
                            their academic progress.</p>
                        <form action="data/login-data.php" method="post">
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" placeholder="NIC or Admission No." id="username" required name="username" autocomplete="off">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Your Password" id="password" required name="password" autocomplete="off">
                            </div>
                            <!-- <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                            </div> -->
                            <input type="submit" name="login" value="Log In" class="btn btn-block btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/main.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039" integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g==" data-cf-beacon='{"rayId":"7e99f8a88edaa11f","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>