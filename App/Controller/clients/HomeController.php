<?php 
    class HomeController {
        private $productModel;

        public function __construct() {
            $this->productModel = new Product();
        }
        public function index() {
            $latestProducts = $this->productModel->latestProducts();
            $discountProducts = $this->productModel->saleProducts();
            $discountProductsRand = $this->productModel->saleProductsRand();
            require_once './App/Views/clients/home.php';
        }
    }

?>