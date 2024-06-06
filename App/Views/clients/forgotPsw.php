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
	<link rel="stylesheet" href="public/css/nouislider.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.css">
	<link rel="stylesheet" href="public/css/main.css">
	<link href="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
	" rel="stylesheet">
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  	/>
</head>

<body>

	<!-- Start Header Area -->
	<?php include_once './App/Views/includes/header.php' ?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="./?page=login">Login</a>
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
						<img class="img-fluid" src="public/img/login.jpg" alt="">
						<div class="hover">
							<h4>You Forgot Your Password?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="./?page=login">Return to Login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Forgot Password</h3>
						<form class="row login_form" action="" method="post" id="contactForm">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Your email" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email'">
                                <span class="text-danger" id="email-error"><?= isset($emailError) ? $emailError : ''?></span>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="submit" class="primary-btn">Send Mail</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	<?php include_once './App/Views/includes/footer.php' ?>
	<!-- End footer Area -->


	<script src="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js
	"></script>
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
</body>

</html>