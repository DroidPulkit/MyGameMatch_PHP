<?php include("dbconnect.php"); ?>


<?php
    // REGISTER USER
    if (isset($_POST["submit_reg"])) {
        // echo "Inside";

        // initializing variables
        $errors = array();
        // receive all input values from the form
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $password2 =$_POST['password2'];

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($firstname)) { array_push($errors, "Firstname is required"); }
        if (empty($lastname)) { array_push($errors, "Lastname is required"); }
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($password)) { array_push($errors, "Password is required"); }
        if ($password != $password2) {
            array_push($errors, "The two passwords do not match");
        }

        // first check the database to make sure
        // a user does not already exist with the same username and/or email
        $sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";

        $result = mysqli_query($con, $sql);

        $rowcount=mysqli_num_rows($result);

        if ($rowcount != 0) { // if user exists
            //echo "more row exists";
            array_push($errors, "Email already exists");
            echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Email already Exists!');</SCRIPT>");
        } else {
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                $query = "INSERT INTO user (firstname, lastname, email, phone, password) VALUES('$firstname', '$lastname', '$email', '$phonenumber', '$password')";
                if(mysqli_query($con, $query)){
                    // echo "Records added successfully.";
                    echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Registration Successfull');</SCRIPT>");
                    header("Location: index.php");
                } else{
                    echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
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
<meta name="description" content="Signup page">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/signup.css">

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
                                <li><a href="login.php">Login</a></li>
                                <li class="active"><a href="signup.php">Signup</a></li>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li class="active"><a href="signup.php">Signup</a></li>
            </ul>
        </nav>
    </div>

    <div class="home">
        <div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>
        <div class="home_slider_content_container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="signup.php" method="post" id="fileForm" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <label for="firstname" class="text-light"><span class="req">* </span> First name: </label>
                                    <input class="form-control" type="text" name="firstname" id = "firstname" onkeyup = "ValidateFirstName(this)" required />
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="text-light"><span class="req">* </span> Last name: </label>
                                    <input class="form-control" type="text" name="lastname" id = "lastname" onkeyup = "ValidateLastName(this)" required />
                                </div>

                                <div class="form-group">
                                    <label for="email" class="text-light"><span class="req" id="status">* </span> Email Address: </label>
                                    <input class="form-control" required type="text" name="email" id = "email" onchange="email_validate();"/>
                                </div>

                                <div class="form-group">
                                    <label for="phonenumber" class="text-light"><span class="req">* </span> Phone Number: </label>
                                    <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="10" onkeyup="validatephone(this.value)"/>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="text-light"><span class="req">* </span> Password: </label>
                                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="12"  id="pass1" /> </p>

                                    <label for="password2" class="text-light"><span class="req">* </span> Password Confirm: </label>
                                    <input required name="password2" type="password" class="form-control inputpass" minlength="4" maxlength="12" placeholder="Re-enter Password" onkeyup="checkPassword();" id="pass2" />
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="submit_reg" value="Register" id="register">
                                </div>

                            </fieldset>
                        </form><!-- ends register form -->
                    </div><!-- ends col-6 -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/lib/jquery.min.js"></script>
<script src="css/bootstrap4/popper.js"></script>
<script src="css/bootstrap4/bootstrap.min.js"></script>
<script type="text/javascript" src="js/signup.js"></script>
</body>
</html>
