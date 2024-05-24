<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="public/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="public/css/linearicons.css">
	<link rel="stylesheet" href="public/css/owl.carousel.css">
	<link rel="stylesheet" href="public/css/themify-icons.css">
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/nice-select.css">
	<link rel="stylesheet" href="public/css/nouislider.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.css">
	<link rel="stylesheet" href="public/css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<?php include_once './App/Views/includes/header.php' ?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Register/Login</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="./index.php?url=register">Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="./public/img/login.jpg" alt="">
						<div class="hover">
							<h4>Do you already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="./index.php?url=login">Log in to your account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Register in to enter</h3>
						<form class="row login_form" action="" method="POST" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email'">
                                <span class="text-danger" id="email-error"></span>
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="userName" name="userName" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                <span class="text-danger" id="name-error"></span>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="psw" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                <span class="text-danger" id="psw-error"></span>
							</div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirmPsw" name="confirm_password" placeholder="Confirm password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm password'">
                                <span class="text-danger" id="confirm-psw-error"></span>
                            </div>
							<div class="col-md-12 form-group">
								<button type="submit" name="submit" value="submit" class="primary-btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	<?php include_once './App/Views/includes/footer.php' ?>
	<!-- End footer Area -->


	<script src="public/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.public/js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="public/js/vendor/bootstrap.min.js"></script>
	<script src="public/js/jquery.ajaxchimp.min.js"></script>
	<script src="public/js/jquery.nice-select.min.js"></script>
	<script src="public/js/jquery.sticky.js"></script>
	<script src="public/js/nouislider.min.js"></script>
	<script src="public/js/jquery.magnific-popup.min.js"></script>
	<script src="public/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="public/js/gmaps.min.js"></script>
	<script src="public/js/main.js"></script>
    <script src="public/js/register.js"></script>
</body>

</html>