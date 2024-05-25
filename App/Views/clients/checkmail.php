<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/img/fav.png">
    <title>Check Your Email</title>
    <link rel="stylesheet" href="public/css/linearicons.css">
	<link rel="stylesheet" href="public/css/owl.carousel.css">
	<link rel="stylesheet" href="public/css/themify-icons.css">
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/nice-select.css">
	<link rel="stylesheet" href="public/css/nouislider.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.css">
	<link rel="stylesheet" href="public/css/main.css">
    <style>
        article {
            max-width: 90%;
            margin: 40px auto;
        }

        .nottify-text {
            line-height: 25px;
        }

        .nottify-img {
            max-width: 500px;
            margin: auto;
            text-align: center;
        }

        .nottify-img img {
            width: 100%;
        }

        @media (max-width: 47.4375em) {
            .nottify-text {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <?php include_once './App/Views/includes/header.php' ?>

    <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Checkmail</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="./index.php?url=checkmail">Checkmail</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <article>
        <<div class="notify-text">
            <strong>Hello!</strong>
            <p>Congratulations on registering an account with us!</p>
            <p>We have sent an <strong>account activation email</strong> to the email address you provided during registration. To complete the registration process, <strong>please check your inbox and click on the activation link sent in the email</strong>. If you do not find the email in your inbox, please check your spam or junk folder.</p>
            <p>If you encounter any issues activating your account or need additional support, please do not hesitate to contact us through our website or at our support email address <a href="mailto:duongnt3092004@gmail.com"><strong>duongnt3092004@gmail.com</strong></a>. We are always ready to assist you.</p>
            <p>Best regards!</p>
        </div>
        <div class="nottify-img">
            <img src="./public/img/icon/8d4f7f858274a4a0eb507b49aee66385-removebg-preview.png" alt="">
        </div>
    </article>
    <?php include_once './App/Views/includes/footer.php' ?>
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