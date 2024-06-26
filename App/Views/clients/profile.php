<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="public/public/./public/img/fav.png">
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
	
	<link rel="stylesheet" href="public/css/linearicons.css">
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/themify-icons.css">
	<link rel="stylesheet" href="public/css/bootstrap.css">
	<link rel="stylesheet" href="public/css/owl.carousel.css">
	<link rel="stylesheet" href="public/css/nice-select.css">
	<link rel="stylesheet" href="public/css/nouislider.min.css">
	<link rel="stylesheet" href="public/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="public/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="public/css/magnific-popup.css">
	<link rel="stylesheet" href="public/css/main.css">
	<link rel="stylesheet" href="public/css/profile.css">
	<link href="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
	" rel="stylesheet">
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

	<!-- Start Header Area -->
	<?php include_once './App/Views/includes/header.php' ?>
	
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Profile</h1>
                    <nav class="d-flex align-items-center">
                        <a href="./">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Profile</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <article>
        <h3>Your Profile</h3>
        <div class="main-form">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-left">
                    <div class="inp-item">
                        <label for="userName">User Name</label>
                        <input placeholder="Tên của bạn" type="text" name="userName" id="userName" required
                            value="<?=$_SESSION['userName']?>">
                    </div>
                    <div class="inp-item">
                        <label for="email">Your Email</label>
                        <input placeholder="Your Email" type="email" name="email" id="email" required
                            value="<?=$_SESSION['email']?>">
                    </div>
                    <div class="inp-item">
                        <label for="phone">Phone</label>
                        <input placeholder="Your Phone Number" type="number" name="phone" id="phone" required
                            value="<?=$_SESSION['phone']?>">
                    </div>
                    <div class="inp-item">
                        <label for="address">Address</label>
                        <input placeholder="Your Address" type="text" name="address" id="address" required
                            value="<?=$_SESSION['address']?>">
                    </div>
                    <div class="btn-submit">
                        <button name="submit">Save</button>
                    </div>
                </div>
                <div class="form-right">
                    <div class="inp-image">
                        <img src="<?=$_SESSION['avatar']?>" alt="" id="preview">
                        <label for="user-image"><i class="fa-solid fa-camera"></i></label>
                        <input type="file" name="avatar" id="user-image" hidden>
                    </div>
                    <p><strong>Format:</strong> .JPEG, .PNG, .WEBP, .JPG</p>
                    <div class="user-name"><?=$_SESSION['user_name']?></div>
                </div>
            </form>
        </div>
    </article>
    <!--================End Cart Area =================-->

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
	<script src="public/js/countdown.js"></script>
	<script src="public/js/jquery.magnific-popup.min.js"></script>
	<script src="public/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="public/js/gmaps.min.js"></script>
	<script src="public/js/main.js"></script>
	<script src="public/js/async.js"></script>
	<script src="public/js/profile.js"></script>
</body>

</html>