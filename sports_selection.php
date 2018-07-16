<?php include("dbconnect.php");
include("product-db-functions.php");
?>

<?php
    session_start();
    $user = $_SESSION['user'];


//debug
    //$baseball = 1;
    //$basketball = $football = $hockey = $soccer = 0;
    //$user = "caio_uechi@hotmail.com";

    //updateUserID($baseball, $basketball, $football, $hockey, $soccer, $user);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>My Game Match</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sports selection page">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap4/bootstrap.min.css">
<link href="css/image-picker.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/sports_selection.css">

<link rel="shortcut icon" href="images/favicon2.png" type="image/x-icon">
<link rel="icon" href="images/favicon2.png" type="image/x-icon">
<!-- <script src="js/jquery-3.3.1.min.js" /> -->
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
    </div>

    <div class="home">
        <div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>
        <div class="home_slider_content_container">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                      <h3 class="btn-default" id= "enlarge">Please select your favourite sports.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                      <select class="image-picker show-html" data-limit="8" multiple="multiple">
                        <option data-img-src="images/americanfootbal.jpg" value="Football">Football</option>
                        <option data-img-src="images/baseball.jpg" value="Baseball">Baseball</option>
                        <option data-img-src="images/basketball.jpg" value="Basketball">Basketball</option>
                        <option data-img-src="images/hockey.jpg" value="Hockey">Hockey</option>
                        <option data-img-src="images/soccer.jpg" value="Soccer">Soccer</option>
                      </select>
                    </div>
                </div>
                <div class="row">
                    <h3 onclick="nextButton();" class="btn-default" id= "enlarge">Done</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function nextButton(){
    var sportsSelected =  $("select").val();

    console.log(sportsSelected);

    var length = sportsSelected.length;

    if (length == null || length == undefined || length == 0) {
        return;
    }

    var user = '<?php echo $user; ?>';
    var football = 0;
    var baseball = 0;
    var basketball = 0;
    var hockey = 0;
    var soccer = 0;

    // Guys there is error here as we will not be able to unselect the sports here, we need new login
    for (var i = 0; i < length; i++){
        if (sportsSelected[i] == "Football") {
            football = 1;
        } else if(sportsSelected[i] == "Baseball"){
            baseball = 1;
        } else if(sportsSelected[i] == "Basketball"){
            basketball = 1;
        } else if(sportsSelected[i] == "Hockey"){
            hockey = 1;
        } else if(sportsSelected[i] == "Soccer"){
            soccer = 1;
        }
    }

    var postData = {
        'football' : football,
        'baseball' : baseball,
        'basketball' : basketball,
        'hockey' : hockey,
        'soccer' : soccer,
        'user' : user
    };
alert("ajax sent");
window.location = 'home.php';
    $.ajax({
        url: 'saveSportSelection.php',
        type: 'POST',
        data: postData,
        dataType  : 'json',
        success : function(data)
        {
            alert(data);

        }
        //fail : function(jqXHR jqXHR, String textStatus, String errorThrown){
        //     alert(textStatus);
        //}
    });

}
</script>

<script src="js/lib/jquery.min.js"></script>
<script src="css/bootstrap4/popper.js"></script>
<script src="css/bootstrap4/bootstrap.min.js"></script>
<script src="js/image-picker.js"></script>
<script src="js/sports_selection.js"></script>
</body>
</html>
