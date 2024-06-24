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
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="./">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container container-cart">
            <?php if (isset($cart) && count($cart) > 0) { ?>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $subTotal = 0;
                            $shipping = 0;
                
                            foreach($cart as $item) { 
                                $total = $item['price'] * $item['quantity'];
                                $subTotal += $total;
                            ?>
                            <tr data-id="<?=$item['id']?>">
                                <td>
                                    <div class="media">
                                        <div class="d-flex flex-column align-items-center" style="gap: 8px;">
                                            <img width="100px" src="<?=$item['image']?>" alt="">
                                            <div id="<?=$item['id']?>" data-href="./?page=remove-cart&product_id=<?=$item['id']?>" class="text-danger remove-cart" style="cursor: pointer;"><i class="fa-solid fa-trash"></i></div>
                                        </div>
                                        <div class="media-body">
                                            <p><?=$item['product_name']?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$<?=round($item['price'])?>.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst-<?=$item['id']?>" maxlength="12" value="<?=$item['quantity']?>" title="Quantity:"
                                            class="input-text qty">
                                        <button onclick="updateQuantity(<?=$item['id']?>, 1)"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="updateQuantity(<?=$item['id']?>, -1)"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="total-<?=$item['id']?>">$<?=round($total)?>.00</h5>
                                </td>
                            </tr>
                            <?php } 
                                if ($subTotal < 50) {
                                    $shipping = 10;
                                }else if ($subTotal >= 50 && $subTotal < 100) {
                                    $shipping = 5;
                                }else {
                                    $shipping = 0;
                                } 
                                
                                $totalAmount = $subTotal + $shipping; 
                            ?>
                            <tr class="bottom_button">
                                <td>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <form class="cupon_text d-flex align-items-center justify-content-end">
                                        <input type="text" required placeholder="Coupon Code">
                                        <button class="primary-btn btn">Apply</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5 class="subtotal">$<?=round($subTotal)?>.00</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li class="active-1 <?=$subTotal < 100 && $subTotal >= 50 ? 'active' : ''?>"><a>Flat Rate: $5.00</a></li>
                                            <li class="active-2 <?=$subTotal < 50 ? 'active' : ''?>"><a>Flat Rate: $10.00</a></li>
                                            <li class="active-3 <?=$subTotal >= 100 ? 'active' : ''?>"><a>Free Shipping</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Total Amount</h5>
                                </td>
                                <td>
                                    <h5 class="total-amount">$<?=round($totalAmount)?>.00</h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center justify-content-end" style="gap: 10px;">
                                        <?php
                                        if (isset($_SESSION['user_id'])) {
                                        ?>
                                        <a class="primary-btn" href="./?page=checkout">Proceed to checkout</a>
                                        <?php }else { ?>
                                        <a class="primary-btn text-white" onclick="confirmLogin()">Proceed to checkout</a>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } else { ?>
                <div class="container-fluid mt-10">
                    <div class="row">
                    
                        <div class="col-md-12"> 
                            <div class="card">
                                <div class="card-body cart">
                                    <div class="col-sm-12 empty-cart-cls text-center">
                                        <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                        <h3><strong>Your Cart is Empty</strong></h3>
                                        <h4>Add something to make me happy :)</h4>
                                        <a href="./" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    
                    </div>
                </div>
            <?php } ?>
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
</body>

</html>