<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Digital Library Management System</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.3.min.js"></script>
</head>

<body class="banner">
    <div class="back-fill">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            &nbsp;&nbsp;<a class="navbar-brand" href="#">Lycoris Cafe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br /><br />

        <!-- content -->
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" action="" method="post">
                <h3>LOGIN</h3>
                <?php if (isset($_GET['error'])) { ?>
                    <div class='alert alert-danger' role='alert'>
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pswd" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="index.php" class="text-decoration-none">Home</a>
            </form><br />
            <div>
            </div>
            <!-- footer -->
            <?php include "inc/footer.php"; ?>
        </div>

        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>