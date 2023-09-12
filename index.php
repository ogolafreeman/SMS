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
    <link rel="shortcut icon" href="https://img.freepik.com/free-vector/hand-drawn-pencil-high-school-logo_23-2149689302.jpg?w=900&t=st=1694527035~exp=1694527635~hmac=8e02c01f5752c7f5d7ff35f802f5c0943179870c4028ad3a81221ef9cc71300d" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_home.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/preloader.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="preloader">
    <div class="loading-content">
      <img id="logo" src="./Media/logo.png" alt="logo">
      <br><br><br>
      <p style="background: transparent">Loading...</p>
      <div class="loading">
  
      </div>
    </div>
  </div>

  <div class="login-container">
  <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $_GET['error'] ?>
        </div>
    <?php } ?>
  <img id="logo" src="./Media/logo.png" alt="logo"><br>
  <h2>Student Management System</h2>
      <br>
    <form action="data/login-data.php" method="post">
     
      <input placeholder="NIC or Admission No." id="username" required name="username" type="text">
      <input placeholder="Your Password" id="password" required name="password" type="password">

      <button name="login" value="Log In" type="submit" id=submit>Log In</button>
      <br><br>
    </form>
  </div>
  
  
  <script>
  
    let timeOut = setTimeout(function() {
      const preloader = document.querySelector('.preloader')
      preloader.classList.add('preloader--hidden')
    }, 3000);
  </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/main.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039" integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g==" data-cf-beacon='{"rayId":"7e99f8a88edaa11f","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>