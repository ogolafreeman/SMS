<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library Management System</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br /><br />
        <h1 class="d-flex justify-content-center align-items-center flex-column text-center display-3 fnt">Welcome to <br />Digital Library Management System</h1>

        <!-- Carousel -->
        <div class="container text-center"><br /><br />
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Media/c1.jpg" height="650" width="1280" />

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Example headline.</h1>
                                <p>Some representative placeholder content for the first slide of the carousel.</p>
                                <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="Media/c2.jpg" height="650" width="1280" />

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Another example headline.</h1>
                                <p>Some representative placeholder content for the second slide of the carousel.</p>
                                <!-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="Media/c4.jpg" height="650" width="1280" />

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>One more for good measure.</h1>
                                <p>Some representative placeholder content for the third slide of this carousel.</p>
                                <!-- <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="text-center"><br /><br /><br />
            <a class="btn btn-outline-success btn-lg" href="login.php">LOGIN</a>
        </div>

        <!-- footer -->
        <?php include "inc/footer.php"; ?>
    </div>
    <script>

    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>