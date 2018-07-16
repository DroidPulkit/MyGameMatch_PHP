<?php
  //include("db-connect.php");
  //include("db-functions.php");
  //include("loadEvents.php");
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <!-- CSS  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
  <link href="css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/agenda.css" type="text/css" rel="stylesheet">
  <!--<link href='css/plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
  <link href='css/plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <link href='https://bootswatch.com/4/sketchy/bootstrap.min.css' rel="stylesheet" >-->

  <!--HEADER-->
  <link href="css/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="css/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="css/post_nosidebar.css">
  <link rel="stylesheet" type="text/css" href="css/post_nosidebar_responsive.css">
  <link rel="shortcut icon" href="images/favicon2.png" type="image/x-icon">
  <link rel="icon" href="images/favicon2.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/poupupAddEvents.css">
</head>
<body>
  <div class="super_container">
    <!-- Header -->
  	<header class="header">
  		<div class="container">
  			<div class="row">
  				<div class="col">
  					<div class="header_content d-flex flex-row align-items-center justify-content-start">
  						<div class="logo"><a href="#">My Game Match</a></div>
  						<nav class="main_nav">
  							<ul>
  								<li><a href="home.php">Home</a></li>
  								<li><a href="agenda.php" onclick="refreshJSON()">Agenda</a></li>
  								<li class="active"><a href="#">Events</a></li>
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
  		<div class="logo menu_mm"><a href="#">My Game Match</a></div>
  		<nav class="menu_nav">
  			<ul class="menu_mm">
  				<li><a href="home.php">Home</a></li>
          <li><a href="agenda.php" onclick="refreshJSON()">Agenda</a></li>
          <li class="active"><a href="#">Events</a></li>
          <li><a href="index.php">Logout</a></li>
  			</ul>
  		</nav>
  	</div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h1 id="optionId" hidden></h1>
            <h1 id="optionTitle" hidden></h1>
            <h5 class="modal-title" id="modalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="modalBody" class="modal-body">
            <form>
              <input type="radio" name="gender" value="1"> High<br>
              <input type="radio" name="gender" value="2"> Medium<br>
              <input type="radio" name="gender" value="3"> Low
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnSaveModal">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Home -->
  	<div class="home">
  		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/basketball.jpg" data-speed="0.8"></div>
  		<div class="home_content">
  			<div class="post_title">Events</div>
  		</div>
  	</div>

    <!-- Page Content -->
    <div class="page_content">
      <div id="main">
        <div id='calendar-events'></div>
      </div>
      <div class="text-center">
        <h4 class="font-weight-bold" style="color: red; float: right; padding-right: 500px;">Attending</h4>
        <h4 class="font-weight-bold" style="color: blue; float: left; padding-left: 500px;"> Not Atteding </h4>
      </div>
    </div>
  </div>

  <!-- TESTE -->
    <!--<input type="text" name="hiddenArray" value="TESTE">-->
    <div id="data" hidden="hidden"></div>
    <div id="eventdata" hidden="hidden"></div>
    <div id="userEmail" hidden="hidden">
      <?php echo $_SESSION['user']; ?>
    </div>
  <!-- TESTE -->

  <!--<script src='js/lib/moment.min.js'></script>-->
  <script src='js/lib/jquery.min.js'></script>
  <!--<script src='js/lib/fullcalendar.min.js'></script>-->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
  <script src='js/events.js'></script>
  <script src="js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</body>
</html>
