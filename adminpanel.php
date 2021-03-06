<?php
include("dbconnect.php"); ?>

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
                                <li><a href="">Add News</a></li>
                                <li><a href="">Add Events</a></li>
                                <li><a href="index.php">Logout</a></li>
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
        <div class="logo menu_mm"><a href="index.php">My Game Match</a></div>
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li><a href="">Add News</a></li>
                <li><a href="">Add Events</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="home">
        <div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>
        <div class="home_slider_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_slider_content">
                            <div class="home_slider_item_title">
                                <a href="login.php">Welcome Admin</a>
                            </div>
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
