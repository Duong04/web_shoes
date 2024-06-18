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
</head>

<body>

	<!-- Start Header Area -->
	<?php include_once './App/Views/includes/header.php' ?>
	
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="./">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

   <!--================Checkout Area =================-->
   <section class="checkout_area section_gap">
        <div class="container">
            <div class="cupon_area">
                <div class="check_title">
                    <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
                </div>
                <input type="text" placeholder="Enter coupon code">
                <a class="tp_btn" href="#">Apply Coupon</a>
            </div>
            <div class="billing_details">
                <form class="row" action="#" method="POST">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <div class="row contact_form" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input value="<?=$user['phone']?>" placeholder="Number Phone" required type="text" class="form-control" id="number" name="number_phone">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input value="<?=$user['email']?>" placeholder="Email Address" disabled required type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input value="<?=$user['address']?>" placeholder="Address Line" required type="text" class="form-control" id="add1" name="address">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                            </div>
                            <div class="col-md-12 form-group">
                                <h3>Order Note</h3>
                                <textarea class="form-control" name="order_note" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                                <?php
                                $subTotal = 0; 
                                foreach($carts as $item) { 
                                    $subTotal += ($item['price'] * $item['quantity']);
                                ?>
                                <li><a href="./?page=product-detail&name=<?=urlencode($item['product_name'])?>" class="d-flex align-items-center" style="gap:10px"><span class="text-black" style="line-height: 25px; overflow: hidden;display: block;max-height: 1.5rem;-webkit-line-clamp: 1;display: -webkit-box;text-overflow: ellipsis;"><?=$item['product_name']?></span> <span style="width:50px;">x <?=$item['quantity']?></span> <span class="last">$<?=round($item['price'])?>.00</span></a></li>
                                <?php 
                                } 
                                    if ($subTotal < 50) {
                                        $shipping = 10;
                                    }else if ($subTotal >= 50 && $subTotal < 100) {
                                        $shipping = 5;
                                    }else {
                                        $shipping = 0;
                                    } 
                                ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Subtotal <span>$<?=round($subTotal)?>.00</span></a></li>
                                <li><a href="#">Shipping <span>Flat rate: <?=$shipping > 0 ? '$'.$shipping.'.00' : 'Free Ship'?></span></a></li>
                                <li><a href="#">Total <span>$<?=round($subTotal + $shipping)?>.00</span></a></li>
                            </ul>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input required type="radio" id="f-option6" name="payment_method" value="Paypal">
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input checked required type="radio" id="f-option5" name="payment_method" value="Payment on delivery">
                                    <label for="f-option5">Payment on delivery </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>You will pay when your order is sent to you.</p>
                            </div>
                            <div class="creat_account">
                                <input required type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <button name="submit" class="primary-btn btn w-100">Proceed to Paypal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

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