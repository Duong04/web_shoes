<?php 
    class ProductController {
        public function index() {
            $content = 'products/list';
            require_once './App/Views/admins/layoutAdmin.php';
        }

        public function addProduct() {
            $content = 'products/add';
            require_once './App/Views/admins/layoutAdmin.php';
        }
    }
?>