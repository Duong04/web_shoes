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
	<link href="
	https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
	" rel="stylesheet">
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="public/css/order.css">
</head>

<body>

	<!-- Start Header Area -->
	<?php include_once './App/Views/includes/header.php' ?>
	
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Order Deatil</h1>
                    <nav class="d-flex align-items-center">
                        <a href="./">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Order Detail</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="order_details section_gap">
		<div class="container">
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                            $subtotal = 0;
                            $shipping = 0;
                            foreach($orderDetails as $item) {
                                $subtotal += $item['price'];
                            ?>
							<tr>
								<td>
                                    <img width="70px" src="<?=$item['product_image']?>" alt="">
									<p class="mt-2"><?=$item['product_name']?></p>
								</td>
								<td>
									<h5>x <?=$item['quantity']?></h5>
								</td>
								<td>
									<p>$<?=round($item['price'])?>.00</p>
								</td>
							</tr>
                            <?php } 
                            if ($subtotal < 50) {
                                $shipping = 10;
                            }else if ($subtotal >= 50 && $subtotal < 100) {
                                $shipping = 5;
                            }else {
                                $shipping = 0;
                            } 
                            
                            $totalAmount = $subtotal + $shipping; 
                            ?>
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$<?=round($subtotal)?>.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Flat rate: <?=$shipping > 0 ? '$'.$shipping.'.00' : 'Free Ship' ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$<?=round($totalAmount)?>.00</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
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
	<script src="public/js/order.js"></script>
</body>

</html>