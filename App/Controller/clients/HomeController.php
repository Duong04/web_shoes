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

        public function search() {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);

            $searchResult = [
                'status' => 'success',
                'message' => 'Search results',
                'data' => $data['data']
            ];

            echo json_encode($searchResult);
        }
    }

?>