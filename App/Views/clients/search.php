<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="public/public/./public/./public/img/fav.png">
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
	
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Search Product</h1>
					<nav class="d-flex align-items-center">
						<a href="./">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Seatch<span class="lnr lnr-arrow-right"></span></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->
    <section class="lattest-product-area pb-40 category-list container">
    <div class="row">
			<!-- single product -->
			<?php 
			if (!empty($products)) {
				foreach($products as $item) { 
			?>
			<div class="col-lg-4 col-md-6">
				<div class="single-product">
					<img class="img-fluid" src="<?=$item['product_image']?>" alt="">
					<div class="product-details">
						<h6><?=$item['product_name']?></h6>
						<div class="price">
							<?php if ($item['discount'] > 0) { ?>
								<h6>$<?=round($item['new_price'])?>.00</h6>
								<h6 class="l-through">$<?=round($item['initial_price'])?>.00</h6>
							<?php } else { ?>
								<h6>$<?=round($item['new_price'])?>.00</h6>
							<?php } ?>
						</div>
						<div class="prd-bottom">
							<span id="<?=$item['product_id']?>" class="social-info add-cart" style="cursor: pointer;">
								<span class="ti-bag"></span>
								<p class="hover-text">add to bag</p>
							</span>
							<a href="" class="social-info">
								<span class="lnr lnr-heart"></span>
								<p class="hover-text">Wishlist</p>
							</a>
							<a href="./?page=product-detail&name=<?=urlencode($item['product_name'])?>" class="social-info">
								<span class="lnr lnr-move"></span>
								<p class="hover-text">view more</p>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php } }else { ?>
				<div style="padding: 160px 0;" class="col d-flex flex-column align-items-center justify-content-center">
					<img width="170px" src="./public/img/huhu.jpg" alt="">
					<h4 class="mt-3">This has no products yet !</h4>
				</div>
			<?php } ?>
		</div>
	</section>
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
</body>

</html>