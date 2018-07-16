<?php include("dbconnect.php");
session_start();
$user = $_SESSION['user'];
//temporaray given default email to test as sport selection was not working
// $user = "vermasonal909@gmail.com";
$data = array();
$post = array();
$event = array(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>My Game Match</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Home page">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap4/bootstrap.min.css">
<link href="css/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="css/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="css/main_styles.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
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
								<li class="active"><a href="home.php">Home</a></li>
								<li><a href="agenda.php">Agenda</a></li>
								<li><a href="events.php">Events</a></li>
								<li><a href="index.php" id="logout">Logout</a></li>
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
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="#">Agenda</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Events</a></li>
				<li><a href="index.php" id="logout">Logout</a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->

		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">

				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content">
										<div class="home_slider_item_title">
											<a href="#">In order to succeed we must first believe that we can.</a>
										</div>
										<div class="home_slider_item_link">
											<div class="trans_200">Nikos Kazantzakis
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content">
										<div class="home_slider_item_title">
											<a href="#">Life is a sport. Make it count.</a>
										</div>
										<div class="home_slider_item_link">
											<div class="trans_200">Nike
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_slider.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content">
										<div class="home_slider_item_title">
											<a href="#">Nothing is impossible</a>
										</div>
										<div class="home_slider_item_link">
											<div class="trans_200">Addidas

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!--These are the dots to move to next top post-->
			<div class="custom_nav_container home_slider_nav_container">
				<div class="custom_prev custom_prev_home_slider">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
						<polyline fill="#FFFFFF" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 "/>
					</svg>
				</div>
		        <ul id="custom_dots" class="custom_dots custom_dots_home_slider">
					<li class="custom_dot custom_dot_home_slider active"><span></span></li>
					<li class="custom_dot custom_dot_home_slider"><span></span></li>
					<li class="custom_dot custom_dot_home_slider"><span></span></li>
				</ul>
				<div class="custom_next custom_next_home_slider">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
						<polyline fill="#FFFFFF" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 "/>
					</svg>
				</div>
			</div>

		</div>
	</div>

	<!-- Page Content -->

	<div class="page_content">
		<div class="container">
			<div class="row row-lg-eq-height">

				<!-- Main Content -->

				<div class="col-lg-9">
					<div class="main_content">

						<!-- Blog Section - Don't Miss -->

						<div class="blog_section">
							<div class="section_panel d-flex flex-row align-items-center justify-content-start">
								<div class="section_title">News</div>
							</div>
							<div class="section_content">
								<div class="grid clearfix" id = "postDataToDisplay">

									<?php

											$sql = "SELECT email, Soccer, Basketball, Football, Baseball, IceHockey FROM user WHERE email='$user'";
									    $result = mysqli_query($con, $sql);

									    $rowcount=mysqli_num_rows($result);

									    if ($rowcount != 0) { // if user exists
									    	while($row = mysqli_fetch_assoc($result)) {
									            $email = $row["email"];
															$data = $row;
									      }

												//check condition with == 1, 0 is written for testing as sport selection was not working
												if($data["Soccer"] == 1){
													$sport = "Soccer";
													$query = "SELECT * FROM posts WHERE Category='$sport'";
													$result = mysqli_query($con, $query);

												  $rowcount=mysqli_num_rows($result);
													if ($rowcount != 0) {
														while($row = mysqli_fetch_assoc($result)) {
															$post[] = $row;
											      }
														// print_r($post);
														foreach($post as $key => $val){
															$title = $post[$key]["Title"];
										          $content = $post[$key]["Content"];
										          $url = $post[$key]["url"];
										          $html = '<div class="card card_largest_with_image grid-item" style="position: relative; !important"> <img class="card-img-top" src="' . $url . '"  alt="#"><div class="card-body"><div class="card-title"><a href="#">' . $title . '</a></div><p class="card-text">' . $content . '</p></div></div>';
										          echo $html;
														}
														unset($post);
													}
												}

												if($data["Basketball"] == 1){
													$sport = "Basketball";
													$query = "SELECT * FROM posts WHERE Category='$sport'";
													$result = mysqli_query($con, $query);

												  $rowcount=mysqli_num_rows($result);
													if ($rowcount != 0) {
														while($row = mysqli_fetch_assoc($result)) {
															$post[] = $row;
											      }
														// print_r($post);
														foreach($post as $key => $val){
															$title = $post[$key]["Title"];
										          $content = $post[$key]["Content"];
										          $url = $post[$key]["url"];
										          $html = '<div class="card card_largest_with_image grid-item" style="position: relative; !important"> <img class="card-img-top" src="' . $url . '"  alt="#"><div class="card-body"><div class="card-title"><a href="#">' . $title . '</a></div><p class="card-text">' . $content . '</p></div></div>';
										          echo $html;
														}
														unset($post);
													}
												}

												if($data["Football"] == 1){
													$sport = "Football";
													$query = "SELECT * FROM posts WHERE Category='$sport'";
													$result = mysqli_query($con, $query);

												  $rowcount=mysqli_num_rows($result);
													if ($rowcount != 0) {
														while($row = mysqli_fetch_assoc($result)) {
															$post[] = $row;
											      }
														// print_r($post);
														foreach($post as $key => $val){
															$title = $post[$key]["Title"];
										          $content = $post[$key]["Content"];
										          $url = $post[$key]["url"];
										          $html = '<div class="card card_largest_with_image grid-item" style="position: relative; !important"> <img class="card-img-top" src="' . $url . '"  alt="#"><div class="card-body"><div class="card-title"><a href="#">' . $title . '</a></div><p class="card-text">' . $content . '</p></div></div>';
										          echo $html;
														}
														unset($post);
													}
												}

												if($data["Baseball"] == 1){
													$sport = "Baseball";
													$query = "SELECT * FROM posts WHERE Category='$sport'";
													$result = mysqli_query($con, $query);

												  $rowcount=mysqli_num_rows($result);
													if ($rowcount != 0) {
														while($row = mysqli_fetch_assoc($result)) {
															$post[] = $row;
											      }
														// print_r($post);
														foreach($post as $key => $val){
															$title = $post[$key]["Title"];
										          $content = $post[$key]["Content"];
										          $url = $post[$key]["url"];
										          $html = '<div class="card card_largest_with_image grid-item" style="position: relative; !important"> <img class="card-img-top" src="' . $url . '"  alt="#"><div class="card-body"><div class="card-title"><a href="#">' . $title . '</a></div><p class="card-text">' . $content . '</p></div></div>';
										          echo $html;
														}
														unset($post);
													}
												}

												if($data["IceHockey"] == 1){
													$sport = "Ice Hockey";
													$query = "SELECT * FROM posts WHERE Category='$sport'";
													$result = mysqli_query($con, $query);

												  $rowcount=mysqli_num_rows($result);
													if ($rowcount != 0) {
														while($row = mysqli_fetch_assoc($result)) {
															$post[] = $row;
											      }
														// print_r($post);
														foreach($post as $key => $val){
															$title = $post[$key]["Title"];
										          $content = $post[$key]["Content"];
										          $url = $post[$key]["url"];
										          $html = '<div class="card card_largest_with_image grid-item" style="position: relative; !important"> <img class="card-img-top" src="' . $url . '"  alt="#"><div class="card-body"><div class="card-title"><a href="#">' . $title . '</a></div><p class="card-text">' . $content . '</p></div></div>';
										          echo $html;
														}
														unset($post);
													}
												}
									    }
									?>

									<!-- Largest Card With Image -->
									<!--
									<div class="card card_largest_with_image grid-item" style="position: relative; !important">
										<img class="card-img-top" src="images/post_1.jpg" alt="https://unsplash.com/@cjtagupa">
										<div class="card-body">
											<div class="card-title"><a href="#">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
											<p class="card-text">Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
										</div>
									</div>

									<div class="card card_largest_with_image grid-item" style="position: relative; !important">
										<img class="card-img-top" src="images/post_1.jpg" alt="https://unsplash.com/@cjtagupa">
										<div class="card-body">
											<div class="card-title"><a href="#">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
											<p class="card-text">Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
										</div>
									</div>

									<div class="card card_largest_with_image grid-item" style="position:  relative; !important">
										<img class="card-img-top" src="images/post_1.jpg" alt="https://unsplash.com/@cjtagupa">
										<div class="card-body">
											<div class="card-title"><a href="#">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
											<p class="card-text">Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
										</div>
									</div>
								-->

								</div>
							</div>
						</div>
					</div>
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
			        <div class="modal-body">
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

				<!-- Sidebar -->
				<div class="col-lg-3">
					<div class="sidebar">
						<div class="sidebar_background"></div>

						<!-- Future Events -->
						<div class="sidebar_section future_events">
							<div class="sidebar_title_container">
								<div class="sidebar_title">Future Events</div>
							</div>
							<div class="sidebar_section_content">

								<!-- Sidebar Slider -->
								<div class="sidebar_slider_container">
									<div class="owl-carousel owl-theme sidebar_slider_events" id="addEventToHome">

										<!-- This is how to generate a event in new page -->
										<!--
										<div class="owl-item">



											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="event_date d-flex flex-column align-items-center justify-content-center">
															<div class="event_day">13</div>
															<div class="event_month">apr</div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>


											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="event_date d-flex flex-column align-items-center justify-content-center">
															<div class="event_day">27</div>
															<div class="event_month">apr</div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>


											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="event_date d-flex flex-column align-items-center justify-content-center">
															<div class="event_day">02</div>
															<div class="event_month">may</div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>


											<div class="side_post">
												<a href="post.html">
													<div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
														<div class="event_date d-flex flex-column align-items-center justify-content-center">
															<div class="event_day">09</div>
															<div class="event_month">may</div>
														</div>
														<div class="side_post_content">
															<div class="side_post_title">How Did van Gogh’s Turbulent Mind</div>
															<small class="post_meta">Katy Liu<span>Sep 29</span></small>
														</div>
													</div>
												</a>
											</div>

										</div>

										-->


									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>




<!-- Footer -->

<footer class="footer">
	<div class="container">
		<div class="row row-lg-eq-height">
			<div class="col-lg-9 order-lg-1 order-2">
				<div class="footer_content">
					<div class="footer_logo"><a href="#">My Game Match</a></div>
					<div class="footer_social">
						<ul>
							<li class="footer_social_facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li class="footer_social_twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-3 order-lg-2 order-1">
				<div class="subscribe">
					<div class="subscribe_background"></div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<script src="js/lib/jquery.min.js"></script>
<script src="css/bootstrap4/popper.js"></script>
<script src="css/bootstrap4/bootstrap.min.js"></script>
<script src="css/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="js/custom.js"></script>
<script src="js/home.js"></script>
<script src="js/database.js"></script>
</body>
</html>
