<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Management System</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.3.min.js"></script>
</head>

<body>

    <div class="main-wrap">
        <div class="box-container">
            <div class="img-box">
                <div class="fill">
                    <div class="text-center inner-content"><br><br><br>
                        <img src="Media/Richmond Colleg LOGO.png" alt="Richmond Colleg logo" class="logo"><br><br>
                        <h2>Richmond College Student Portal Login</h2>
                    </div>
                    <!-- <br><br><br><br><br><br> -->
                    <div class="container">
                        <p title="About Richmond College" class="about">
                            Richmond College is a primary and secondary school in Galle, Sri Lanka which was
                            established as Galle High School in 1876.The founder of school was the Wesleyan Missionary
                            George Bough. The first principal of the school was Rev Samuel Langdon. In 1882, it was
                            renamed Richmond College.
                        </p>

                        <div class="footer">
                            <a href="https://www.facebook.com/richmondcollege?mibextid=LQQJ4d" target="_blank">
                                <img src="Media/Facebook.png" alt="facebook icon" width="32">&nbsp;
                                Find More About Us on Facebook!</a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="form-box">
                <div class="mid-container">
                    <h1>Welcome Back</h1>
                    <h6>Login to your account</h6>
                    <form action="" method="post" class="form">
                        <label for="username">Username</label><br>
                        <input type="text" name="username" id="username" placeholder="Your Username" autocomplete="off"><br><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Your Password" autocomplete="off"><br><br>
                        <label for="role">Role</label><br>
                        <select>
                            <option value="0">-- Select who you are --</option>
                            <option value="Admin">Admin</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Student">Student</option>
                        </select>
                        <br>
                        <button class="login" type="submit">Login</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>