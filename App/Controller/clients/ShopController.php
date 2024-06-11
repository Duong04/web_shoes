<?php 
    class ShopController {
        private $categoryModel;
        private $productModel;
        private $imageModel;
        public function __construct() {
            $this->categoryModel = new Category();
            $this->productModel = new Product();
            $this->imageModel = new Image();
        }

        public function index() {
            $categories = $this->categoryModel->selectCategories();
            $countProducts = null;
            $products = null;
            $limit = 6;
            $offset = 0;
            if (isset($_GET['per_page'])) {
                $offset = ($_GET['per_page'] - 1) * $limit;
            }

            if (isset($_GET['category_name'])) {
                $category_name = urldecode($_GET['category_name']);
                $products = $this->productModel->selectAllProductWithCategories($category_name, $limit, $offset);
                $countProducts = $this->productModel->countProducts($category_name);
            }else {
                $products = $this->productModel->selectAllProductActive($limit, $offset);
                $countProducts = $this->productModel->countProducts(null);
            }

            $pages = ceil($countProducts / $limit);
            $discountProductsRand = $this->productModel->saleProductsRand();

            require_once './App/Views/clients/shop.php';
        }

        public function single() {
            if (isset($_GET['name'])) {
                $name = urldecode($_GET['name']);

                $product = $this->productModel->selectName($name);
                $discountProductsRand = $this->productModel->saleProductsRand();
                $this->productModel->updateView($product['product_id']);
                $images = $this->imageModel->selectImagesByProductId($product['product_id']);
                require_once './App/Views/clients/product-detail.php';
            }
        }
    }
?>