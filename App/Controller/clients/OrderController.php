<?php 
    class OrderController {
        public function checkout() {
            $carts = json_decode($_COOKIE['cart'], true); 
            if (isset($carts) && count($carts) > 0 && isset($_SESSION['user_id'])) {
                require_once './App/Views/clients/checkout.php';
            }else {
                header('Location: ./?page=404');
            }
        }
    }