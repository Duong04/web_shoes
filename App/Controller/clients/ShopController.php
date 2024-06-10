<?php 
    class ShopController {
        private $categoryModel;
        private $productModel;
        public function __construct() {
            $this->categoryModel = new Category();
            $this->productModel = new Product();
        }

        public function index() {
            $categories = $this->categoryModel->selectCategories();
            $countProducts = 0;
            $products = null;
            if (isset($_GET['category_name'])) {
                $category_name = urldecode($_GET['category_name']);
                $products = $this->productModel->selectAllProductWithCategories($category_name);
                $this->productModel->countProducts($category_name);
            }else {
                $products = $this->productModel->selectAllProductActive();
                $this->productModel->countProducts(null);
            }
            var_dump($countProducts);
            require_once './App/Views/clients/shop.php';
        }
    }
?>