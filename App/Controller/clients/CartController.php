<?php 
    class CartController {
        public function addCart() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
                return true;
            }
        }
    }
?>