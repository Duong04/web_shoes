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
                    <h1>Orders</h1>
                    <nav class="d-flex align-items-center">
                        <a href="./">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Orders</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
		<div class="tab-container">
			<ul class="tab-menu">
				<li class="tab-link active" data-tab="pending">Pending</li>
				<li class="tab-link" data-tab="processing">Processing</li>
				<li class="tab-link" data-tab="shipped">Shipped</li>
				<li class="tab-link" data-tab="delivered">Delivered</li>
				<li class="tab-link" data-tab="cancelled">Cancelled</li>
			</ul>
			<div id="pending" class="tab-content active">
				<h2>Pennding Orders</h2>
				<?php
				if (count($pending) > 0) {
					foreach($pending as $item) {?>
					<div class="order mt-3">
						<h3>Order: #DH000<?=$item['order_id']?></h3>
						<p><strong>Status:</strong> <?=$item['order_status']?></p>
						<p><strong>Order Date:</strong> <?=$item['order_date']?></p>
						<p><strong>Subtotal:</strong> $<?=round($item['total_amount'])?>.00</p>
						<p><strong>Shipping Money:</strong> <?=$item['shipping_money'] == 0 ? 'Freeship' : '$'.$item['shipping_money'].'.00'?></p>
						<p><strong>Total:</strong> $<?=round($item['amount'])?>.00</p>
						<p><strong>Payment Method:</strong> <?=$item['payment_method']?></p>
						<p><strong>Payment Status:</strong> <?=$item['payment_status']?></p>
						<div class="btn-event">
							<a class="btn btn-outline-success" href="./?page=order-detail&order_id=<?=$item['order_id']?>">View Detail</a>
							<a onclick="updatee(event)" class="btn btn-outline-danger" href="">Cancel Order</a>
						</div>
					</div>
				<?php } } else {?>
					<div class="no-order">
						<img src="public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
						<p>No Oder!</p>
               		</div>
				<?php } ?>
			</div>
			<div id="processing" class="tab-content">
				<h2>Processing Orders</h2>
				<?php
				if (count($processing) > 0) {
					foreach($processing as $item) {?>
					<div class="order mt-3">
						<h3>Order: #DH000<?=$item['order_id']?></h3>
						<p><strong>Status:</strong> <?=$item['order_status']?></p>
						<p><strong>Order Date:</strong> <?=$item['order_date']?></p>
						<p><strong>Subtotal:</strong> $<?=round($item['total_amount'])?>.00</p>
						<p><strong>Shipping Money:</strong> <?=$item['shipping_money'] == 0 ? 'Freeship' : '$'.$item['shipping_money'].'.00'?></p>
						<p><strong>Total:</strong> $<?=round($item['amount'])?>.00</p>
						<p><strong>Payment Method:</strong> <?=$item['payment_method']?></p>
						<p><strong>Payment Status:</strong> <?=$item['payment_status']?></p>
						<div class="btn-event">
							<a class="btn btn-outline-success" href="./?page=order-detail&order_id=<?=$item['order_id']?>">View Detail</a>
						</div>
					</div>
				<?php } } else {?>
					<div class="no-order">
						<img src="public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
						<p>No Oder!</p>
               		</div>
				<?php } ?>
			</div>
			<div id="shipped" class="tab-content">
				<h2>Shipped Orders</h2>
				<?php
				if (count($shipped) > 0) {
					foreach($shipped as $item) {?>
					<div class="order mt-3">
						<h3>Order: #DH000<?=$item['order_id']?></h3>
						<p><strong>Status:</strong> <?=$item['order_status']?></p>
						<p><strong>Order Date:</strong> <?=$item['order_date']?></p>
						<p><strong>Subtotal:</strong> $<?=round($item['total_amount'])?>.00</p>
						<p><strong>Shipping Money:</strong> <?=$item['shipping_money'] == 0 ? 'Freeship' : '$'.$item['shipping_money'].'.00'?></p>
						<p><strong>Total:</strong> $<?=round($item['amount'])?>.00</p>
						<p><strong>Payment Method:</strong> <?=$item['payment_method']?></p>
						<p><strong>Payment Status:</strong> <?=$item['payment_status']?></p>
						<div class="btn-event">
							<a class="btn btn-outline-success" href="./?page=order-detail&order_id=<?=$item['order_id']?>">View Detail</a>
						</div>
					</div>
				<?php } } else {?>
					<div class="no-order">
						<img src="public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
						<p>No Oder!</p>
               		</div>
				<?php } ?>
			</div>
			<div id="delivered" class="tab-content">
				<h2>Delivered Orders</h2>
				<?php
				if (count($delivered) > 0) {
					foreach($delivered as $item) {?>
					<div class="order mt-3">
						<h3>Order: #DH000<?=$item['order_id']?></h3>
						<p><strong>Status:</strong> <?=$item['order_status']?></p>
						<p><strong>Order Date:</strong> <?=$item['order_date']?></p>
						<p><strong>Subtotal:</strong> $<?=round($item['total_amount'])?>.00</p>
						<p><strong>Shipping Money:</strong> <?=$item['shipping_money'] == 0 ? 'Freeship' : '$'.$item['shipping_money'].'.00'?></p>
						<p><strong>Total:</strong> $<?=round($item['amount'])?>.00</p>
						<p><strong>Payment Method:</strong> <?=$item['payment_method']?></p>
						<p><strong>Payment Status:</strong> <?=$item['payment_status']?></p>
						<div class="btn-event">
							<a class="btn btn-outline-success" href="./?page=order-detail&order_id=<?=$item['order_id']?>">View Detail</a>
						</div>
					</div>
				<?php } } else {?>
					<div class="no-order">
						<img src="public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
						<p>No Oder!</p>
               		</div>
				<?php } ?>
			</div>
			<div id="cancelled" class="tab-content">
				<h2>Cancelled Orders</h2>
				<?php
				if (count($cancelled) > 0) {
					foreach($cancelled as $item) {?>
					<div class="order mt-3">
						<h3>Order: #DH000<?=$item['order_id']?></h3>
						<p><strong>Status:</strong> <?=$item['order_status']?></p>
						<p><strong>Order Date:</strong> <?=$item['order_date']?></p>
						<p><strong>Subtotal:</strong> $<?=round($item['total_amount'])?>.00</p>
						<p><strong>Shipping Money:</strong> <?=$item['shipping_money'] == 0 ? 'Freeship' : '$'.$item['shipping_money'].'.00'?></p>
						<p><strong>Total:</strong> $<?=round($item['amount'])?>.00</p>
						<p><strong>Payment Method:</strong> <?=$item['payment_method']?></p>
						<p><strong>Payment Status:</strong> <?=$item['payment_status']?></p>
						<div class="btn-event">
							<a class="btn btn-outline-success" href="./?page=order-detail&order_id=<?=$item['order_id']?>">View Detail</a>
						</div>
					</div>
				<?php } } else {?>
					<div class="no-order">
						<img src="public/img/icon/5fafbb923393b712b96488590b8f781f.png" alt="">
						<p>No Oder!</p>
               		</div>
				<?php } ?>
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