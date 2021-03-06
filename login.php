<?php include("dbconnect.php"); ?>

<?php

if (isset($_POST['loginBtn'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);

    $rowcount=mysqli_num_rows($result);

    if ($rowcount == 0) { // if user exists
        //echo "more row exists";
        echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Invalid username or password');</SCRIPT>");
    } else {
        while($row = mysqli_fetch_assoc($result)) {
            $email = $row["email"];
            $isFirstTimeLogin = $row["isFirstTimeLogin"];
            session_start();
            $_SESSION['user'] = $email;

            if ($isFirstTimeLogin == 1) {
                header("Location: sports_selection.php");
            } else {
                header("Location: home.php");
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>My Game Match</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Login page">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<link rel="shortcut icon" href="images/favicon2.png" type="image/x-icon">
<link rel="icon" href="images/favicon2.png" type="image/x-icon">
</head>
<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo"><a href="index.php">My Game Match</a></div>
                        <nav class="main_nav">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active"><a href="login.php">Login</a></li>
                                <li><a href="signup.php">Signup</a></li>
                            </ul>
                        </nav>
                        <div class="hamburger ml-auto menu_mm">
                            <i class="fa fa-bars trans_200 menu_mm" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu -->

    <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
        <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
        <div class="logo menu_mm"><a href="#">My Game Match</a></div>
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
            </ul>
        </nav>
    </div>

    <div class="home">
        <div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>
        <div class="home_slider_content_container">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="myform form ">
                            <div class="logo mb-3">
                                <div class="col-md-12 text-center">
                                    <h1 class="text-light">Login</h1>
                                </div>
                            </div>

                            <form action="login.php" method="post" name="login">

                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="text-light">Email or Username:</label>
                                  <input type="text" name="email"  class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter email or Username">
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1" class="text-light">Password</label>
                                  <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                                </div>

                                <div class="form-group">
                                  <p class="text-center text-light">By Logging in you accept our <a href="#" class="text-light font-weight-bold">Terms of Use</a></p>
                                </div>

                                <div class="col-md-12 text-center ">
                                  <button type="submit" name="loginBtn" class=" btn btn-block mybtn btn-primary tx-tfm" id="loginBtn">Login</button>
                                </div>

                                <div class="col-md-12 ">
                                  <div class="login-or text-center">
                                    <hr class="hr-or">
                                      <span class="span-or text-light">OR</span>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <p class="text-center text-light">Don't have account? <a href="signup.php" id="signup" class="text-light font-weight-bold">Sign up here</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/lib/jquery.min.js"></script>
<script src="css/bootstrap4/popper.js"></script>
<script src="css/bootstrap4/bootstrap.min.js"></script>
</body>
</html>